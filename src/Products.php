<?php
namespace khaller\fakturomania;

use Collections\Vector;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Jenssegers\Model\Model;
use khaller\fakturomania\exceptions\ProductException;
use khaller\fakturomania\models\Product;
use khaller\fakturomania\models\ProductModel;

class Products
{
    /**
     * @var null|Client HTTP Connection
     */
    private $HTTPClient = null;

    /**
     * @var string Auth token
     */
    private $authToken;

    /**
     * Products constructor.
     */
    function __construct($authToken)
    {
        $this->HTTPClient = new Client(["base_uri" => "https://app.fakturomania.pl/api/v1/"]);
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
            $APIOptions = [
                "headers" => [
                    "Accept" => "application/json",
                    "Auth-Token" => $this->authToken,
                ],
            ];
            $APIRequest = $this->HTTPClient->request("GET", "invoice-product/get/". $productId, $APIOptions);
            $APIResponse = json_decode($APIRequest->getBody()->getContents());
            return new Product([
                'id' => $APIResponse->id,
                'versionId' => $APIResponse->versionId,
                'versionUUID' => $APIResponse->versionUUID,
                'created' => $APIResponse->created,
                'organizationId' => $APIResponse->organizationId,
                'modified' => $APIResponse->modified,
                'name' => $APIResponse->name,
                'classificationCode' => $APIResponse->classificationCode,
                'unit' => $APIResponse->unit,
                'quantity' => $APIResponse->quantity,
                'netPrice' => $APIResponse->netPrice,
                'netValue' => $APIResponse->netValue,
                'vatRate' => $APIResponse->vatRate,
                'grossValue' => $APIResponse->grossValue,
                'GUT' => $APIResponse->GTU,
                'isCurrent' => $APIResponse->isCurrent,
                'deleted' => $APIResponse->deleted
            ]);
        } catch (GuzzleException $e) {
            throw new ProductException($e->getMessage());
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
            $APIOptions = [
                "headers" => [
                    "Accept" => "application/json",
                    "Auth-Token" => $this->authToken,
                    "Content-Type" => "application/json"
                ],
                "json" => $product->getForRequest()
            ];
            $APIRequest = $this->HTTPClient->request("POST", "invoice-product/create", $APIOptions);
            $APIResponse = json_decode($APIRequest->getBody()->getContents());
            return new Product([
                'id' => $APIResponse->id,
                'versionId' => $APIResponse->versionId,
                'versionUUID' => $APIResponse->versionUUID,
                'created' => $APIResponse->created,
                'organizationId' => $APIResponse->organizationId,
                'modified' => $APIResponse->modified,
                'name' => $APIResponse->name,
                'classificationCode' => $APIResponse->classificationCode,
                'unit' => $APIResponse->unit,
                'quantity' => $APIResponse->quantity,
                'netPrice' => $APIResponse->netPrice,
                'netValue' => $APIResponse->netValue,
                'vatRate' => $APIResponse->vatRate,
                'grossValue' => $APIResponse->grossValue,
                'GUT' => $APIResponse->GTU,
                'isCurrent' => $APIResponse->isCurrent,
                'deleted' => $APIResponse->deleted
            ]);
        } catch (GuzzleException $e) {
            throw new ProductException($e->getMessage());
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
            $APIOptions = [
                "headers" => [
                    "headers" => [
                        "Accept" => "application/json",
                        "Auth-Token" => $this->authToken,
                    ],
                ]
            ];
            $APIRequest = $this->HTTPClient->request("DELETE", "invoice-product/delete/". $productId, $APIOptions);
            if($APIRequest->getStatusCode() == 200)
                return true;
            else
                return false;
        } catch (GuzzleException $e) {
            throw new ProductException($e->getMessage());
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
            $APIOptions = [
                "headers" => [
                    "Accept" => "application/json",
                    "Auth-Token" => $this->authToken,
                    "Content-Type" => "application/json"
                ],
                "json" => $product->getForRequest()
            ];
            $APIRequest = $this->HTTPClient->request("POST", "invoice-product/create", $APIOptions);
            $APIResponse = json_decode($APIRequest->getBody()->getContents());
            return new Product([
                'id' => $APIResponse->id,
                'versionId' => $APIResponse->versionId,
                'versionUUID' => $APIResponse->versionUUID,
                'created' => $APIResponse->created,
                'organizationId' => $APIResponse->organizationId,
                'modified' => $APIResponse->modified,
                'name' => $APIResponse->name,
                'classificationCode' => $APIResponse->classificationCode,
                'unit' => $APIResponse->unit,
                'quantity' => $APIResponse->quantity,
                'netPrice' => $APIResponse->netPrice,
                'netValue' => $APIResponse->netValue,
                'vatRate' => $APIResponse->vatRate,
                'grossValue' => $APIResponse->grossValue,
                'GUT' => $APIResponse->GTU,
                'isCurrent' => $APIResponse->isCurrent,
                'deleted' => $APIResponse->deleted
            ]);
        } catch (GuzzleException $e) {
            throw new ProductException($e->getMessage());
        }
    }

    /**
     * @throws Exception
     * @return
     */
    public function getProductsList()
    {
        try {
            $APIOptions = [
                "headers" => [
                    "Accept" => "application/json",
                    "Auth-Token" => $this->authToken,
                ],
            ];
            $APIRequest = $this->HTTPClient->request("GET", "productsList", $APIOptions);
            return json_decode($APIRequest->getBody()->getContents(), true);
        } catch (GuzzleException $e) {
            throw new ProductException($e->getMessage());
        }
    }
}