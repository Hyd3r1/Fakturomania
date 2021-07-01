<?php
namespace khaller\fakturomania;


use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use khaller\fakturomania\models\ContractorModel;

class Contractor
{
    /**
     * @var string $authToken generated with Authentication class
     */
    protected $authToken;

    /**
     * @var Client Guzzle HTTP Agent
     */
    private $HTTPClient;

    /**
     * Contractor constructor.
     * @param $authToken
     * @throws Exception
     */
    function __construct($authToken)
    {
        if(!isset($authToken))
            throw new Exception("[ FakturomaniaSDK ] authToken is required");

        $this->authToken = $authToken;
        $this->HTTPClient = new Client(["base_uri" => "https://app.fakturomania.pl/api/v1/"]);
    }

    /**
     * @param integer $contractorId
     * @return ContractorModel
     * @throws Exception
     */
    public function getContractor(int $contractorId): ContractorModel
    {
        if(!isset($contractorId))
            throw new Exception("[ FakturomaniaSDK ] contractorId is required");

        try {
            $APIOptions = [
                "headers" => [
                    "Accept" => "application/json",
                    "Content-Type" => "application/json",
                    "Auth-Token" => $this->authToken,
                ]
            ];
            $APIRequest = $this->HTTPClient->request("GET", "contractors/". $contractorId, $APIOptions);
            return new ContractorModel(json_decode($APIRequest->getBody()->getContents(), true));
        } catch (GuzzleException $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * @param integer $contractorId
     * @param array $contractorData
     * @return ContractorModel
     * @throws Exception
     */
    public function updateContractor(int $contractorId, array $contractorData): ContractorModel
    {
        if(!isset($contractorId) || !isset($contractorData))
            throw new Exception("[ FakturowaniaSDK ] contractorId and contractorData is required");

        try {
            $APIOptions = [
                "headers" => [
                    "Accept" => "application/json",
                    "Content-Type" => "application/json",
                    "Auth-Token" => $this->authToken,
                ],
                "json" => $contractorData
            ];
            $APIRequest = $this->HTTPClient->request("PUT", "contractors/". $contractorId, $APIOptions);
            return new ContractorModel(json_decode($APIRequest->getBody()->getContents(), true));
        } catch (GuzzleException $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * @param array $contractorData
     * @return ContractorModel
     * @throws Exception
     */
    public function createContractor(array $contractorData): ContractorModel
    {
        if(!isset($contractorData))
            throw new Exception("[ FakturowaniaSDK ] contractorData is required");

        try {
            $APIOptions = [
                "headers" => [
                    "Accept" => "application/json",
                    "Content-Type" => "application/json",
                    "Auth-Token" => $this->authToken,
                ],
                "json" => $contractorData
            ];
            $APIRequest = $this->HTTPClient->request("POST", "contractors", $APIOptions);
            return new ContractorModel(json_decode($APIRequest->getBody()->getContents(), true));
        } catch (GuzzleException $e) {
            throw new Exception($e->getMessage());
        }
    }
}