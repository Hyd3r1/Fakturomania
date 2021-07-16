<?php
namespace khaller\fakturomania;


use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use khaller\fakturomania\exceptions\ContractorException;
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
     * @return models\Contractor
     * @throws Exception
     */
    public function getContractor(int $contractorId): models\Contractor
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
            $apiResponse = json_decode($APIRequest->getBody()->getContents());
            return new models\Contractor([
                'contractorId' => $apiResponse->contractorId,
                'contractorVersionId' => $apiResponse->contractorVersionId,
                'name' => $apiResponse->name,
                'nipPrefix' => $apiResponse->nipPrefix,
                'nip' => $apiResponse->nip,
                'street' => $apiResponse->street,
                'postalCode' => $apiResponse->postalCode,
                'postalCity' => $apiResponse->postalCity,
                'customerAccountId' => $apiResponse->customerAccountId,
                'supplierAccountId' => $apiResponse->supplierAccountId
            ]);
        } catch (GuzzleException $e) {
            throw new ContractorException($e->getMessage());
        }
    }

    /**
     * @return models\Contractor
     * @throws Exception
     */
    public function updateContractor($contractorId, models\Contractor $contractor): models\Contractor
    {
        if(!$contractor || isset($contractorId))
            throw new ContractorException("[ FakturowaniaSDK ] contractorId and contractor is required");

        try {
            $APIOptions = [
                "headers" => [
                    "Accept" => "application/json",
                    "Content-Type" => "application/json",
                    "Auth-Token" => $this->authToken,
                ],
                "json" => $contractor->getForRequest()
            ];
            $APIRequest = $this->HTTPClient->request("PUT", "contractors/". $contractorId, $APIOptions);
            $apiResponse = json_decode($APIRequest->getBody()->getContents());
            return new models\Contractor([
                'contractorId' => $apiResponse->contractorId,
                'contractorVersionId' => $apiResponse->contractorVersionId,
                'name' => $apiResponse->name,
                'nipPrefix' => $apiResponse->nipPrefix,
                'nip' => $apiResponse->nip,
                'street' => $apiResponse->street,
                'postalCode' => $apiResponse->postalCode,
                'postalCity' => $apiResponse->postalCity,
                'customerAccountId' => $apiResponse->customerAccountId,
                'supplierAccountId' => $apiResponse->supplierAccountId
            ]);
        } catch (GuzzleException $e) {
            throw new ContractorException($e->getMessage());
        }
    }

    /**
     * @param models\Contractor $contractor
     * @return models\Contractor
     * @throws ContractorException
     */
    public function createContractor(models\Contractor $contractor): models\Contractor
    {
        if(count($contractor->toArray()) === 0)
            throw new ContractorException("[ FakturowaniaSDK ] contractor is required");

        try {
            $APIOptions = [
                "headers" => [
                    "Accept" => "application/json",
                    "Content-Type" => "application/json",
                    "Auth-Token" => $this->authToken,
                ],
                "json" => $contractor->getForRequest()
            ];
            $APIRequest = $this->HTTPClient->request("POST", "contractors", $APIOptions);
            $apiResponse = json_decode($APIRequest->getBody()->getContents());
            return new models\Contractor([
                'contractorId' => $apiResponse->contractorId,
                'contractorVersionId' => $apiResponse->contractorVersionId,
                'name' => $apiResponse->name,
                'nipPrefix' => $apiResponse->nipPrefix,
                'nip' => $apiResponse->nip,
                'street' => $apiResponse->street,
                'postalCode' => $apiResponse->postalCode,
                'postalCity' => $apiResponse->postalCity,
                'customerAccountId' => $apiResponse->customerAccountId,
                'supplierAccountId' => $apiResponse->supplierAccountId
            ]);
        } catch (GuzzleException $e) {
            throw new ContractorException($e->getMessage());
        }
    }
}