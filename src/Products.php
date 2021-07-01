<?php
namespace khaller\fakturomania;

use Collections\Vector;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
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
     * @return ProductModel
     * @throws Exception
     */
    public function getProduct(int $productId): ProductModel
    {
        if(!isset($productId))
            throw new Exception("[ FakturomaniaSDK ] productId is required");

        try {
            $APIOptions = [
                "headers" => [
                    "Accept" => "application/json",
                    "Auth-Token" => $this->authToken,
                ],
            ];
            $APIRequest = $this->HTTPClient->request("GET", "invoice-product/get/". $productId, $APIOptions);
            $APIResponse = json_decode($APIRequest->getBody()->getContents(), true);
            return new ProductModel($APIResponse);
        } catch (GuzzleException $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * @param array $productData
     * @return ProductModel
     * @throws Exception
     */
    public function createProduct(array $productData): ProductModel
    {
        if(!isset($productData))
            throw new Exception("[ FakturomaniaSDK ] productData is required");

        try {
            $APIOptions = [
                "headers" => [
                    "Accept" => "application/json",
                    "Auth-Token" => $this->authToken,
                    "Content-Type" => "application/json"
                ],
                "json" => $productData
            ];
            $APIRequest = $this->HTTPClient->request("POST", "invoice-product/create", $APIOptions);
            $APIResponse = json_decode($APIRequest->getBody()->getContents(), true);
            return new ProductModel($APIResponse);
        } catch (GuzzleException $e) {
            throw new Exception($e->getMessage());
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
            throw new Exception("[ FakturomaniaSDK ] productId is required");

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
            throw new Exception($e->getMessage());
        }
    }

    /**
     * @param integer $productId
     * @param $productData
     * @return ProductModel
     * @throws Exception
     */
    public function updateProduct(int $productId, $productData): ProductModel
    {
        if(!isset($productData) || !isset($productId))
            throw new Exception("[ FakturomaniaSDK ] productId and productData is required");

        try {
            $APIOptions = [
                "headers" => [
                    "Accept" => "application/json",
                    "Auth-Token" => $this->authToken,
                    "Content-Type" => "application/json"
                ],
                "json" => $productData
            ];
            $APIRequest = $this->HTTPClient->request("POST", "invoice-product/create", $APIOptions);
            $APIResponse = json_decode($APIRequest->getBody()->getContents(), true);
            return new ProductModel($APIResponse);
        } catch (GuzzleException $e) {
            throw new Exception($e->getMessage());
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
            throw new Exception($e->getMessage());
        }
    }
}