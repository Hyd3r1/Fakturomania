<?php
namespace Fakturomania;

use Fakturomania\Exceptions\ProductException;
use Fakturomania\Models\Product;
use Fakturomania\Utils\HTTPClient;

class Products
{
    /**
     * @var string Auth token
     */
    private string $authToken;

    /**
     * Products constructor.
     */
    function __construct($authToken)
    {
        $this->authToken = $authToken;
    }

    /**
     * @param integer $productId
     * @return Product
     * @throws Exception
     */
    public function getProduct(int $productId): Product
    {
        if(!isset($productId))
            throw new ProductException("[ FakturomaniaSDK ] productId is required");

        try {
            return Product::getForResponse(
              json_decode(
                (new HTTPClient())
                  ->request("GET", "invoice-product/get/". $productId, $this->authToken)
                  ->getBody()
                  ->getContents()
              )
            );
        } catch (ProductException $e) {
            return $e;
        }
    }

    /**
     * @param Product $product
     * @return Product
     * @throws ProductException
     */
    public function createProduct(Product $product): Product
    {
        if(!count($product->toArray()) == 0)
            throw new ProductException("[ FakturomaniaSDK ] productData is required");

        try {
            $APIOptions = ["json" => $product->getForRequest()];
            return Product::getForResponse(
              json_decode(
                (new HTTPClient())
                  ->request("POST", "invoice-product/create", $this->authToken, $APIOptions)
                  ->getBody()
                  ->getContents()
              )
            );
        } catch (ProductException $e) {
            return $e;
        }
    }

    /**
     * @param integer $productId
     * @return bool
     * @throws Exception
     */
    public function deleteProduct(int $productId): bool
    {
        if(!isset($productId))
            throw new ProductException("[ FakturomaniaSDK ] productId is required");

        try {
            $APIRequest = (new HTTPClient())
                            ->request("DELETE", "invoice-product/delete/". $productId, $this->authToken);

            return $APIRequest->getStatusCode() === 200;
        } catch (ProductException $e) {
            return $e;
        }
    }

    /**
     * @param integer $productId
     * @param Product $product
     * @return Product
     * @throws ProductException
     */
    public function updateProduct(int $productId, Product $product): Product
    {
        if(!count($product->toArray()) == 0 || !isset($productId))
            throw new ProductException("[ FakturomaniaSDK ] productData and productId is required");

        try {
            $APIOptions = ["json" => $product->getForRequest()];
            return Product::getForResponse(
              json_decode(
                (new HTTPClient())
                  ->request("POST", "invoice-product/update/". $productId, $this->authToken, $APIOptions)
                  ->getBody()
                  ->getContents()
              )
            );
        } catch (ProductException $e) {
            return $e;
        }
    }

    /**
     * @throws Exception
     * @return
     */
    public function getProductsList()
    {
        try {
            return json_decode(
              (new HTTPClient())
                ->request("GET", "productsList", $this->authToken)
                ->getBody()
                ->getContents(),
              true
            );
        } catch (ProductException $e) {
            return $e;
        }
    }
}