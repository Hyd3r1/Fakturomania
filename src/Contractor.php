<?php

namespace khaller\fakturomania;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use khaller\fakturomania\exceptions\ContractorException;
use khaller\fakturomania\utils\HTTPClient;

class Contractor
{
  /**
   * @var string $authToken generated with Authentication class
   */
  protected string $authToken;

  /**
   * Contractor constructor.
   * @param $authToken
   * @throws Exception
   */
  function __construct($authToken)
  {
    if (!isset($authToken))
      throw new ContractorException("[ FakturomaniaSDK ] authToken is required");

    $this->authToken = $authToken;
  }

  /**
   * @param integer $contractorId
   * @return models\Contractor
   * @throws Exception
   */
  public function getContractor(int $contractorId): models\Contractor
  {
    if (!isset($contractorId))
      throw new ContractorException("[ FakturomaniaSDK ] contractorId is required");

    try {
      return models\Contractor::getFromResponse(
        json_decode(
          (new HTTPClient())
            ->request("GET", "contractors/" . $contractorId, $this->authToken)
            ->getBody()
            ->getContents()
        )
      );
    } catch (ContractorException $e) {
      return $e;
    }
  }

  /**
   * @param $contractorId
   * @param models\Contractor $contractor
   * @return models\Contractor
   * @throws ContractorException
   */
  public function updateContractor($contractorId, models\Contractor $contractor): models\Contractor
  {
    if (!$contractor || isset($contractorId))
      throw new ContractorException("[ FakturowaniaSDK ] contractorId and contractor is required");

    try {
      $APIOptions = [
        "json" => $contractor->getForRequest()
      ];
      return models\Contractor::getFromResponse(
        json_decode(
          (new HTTPClient())
            ->request("PUT", "contractors/" . $contractorId, $this->authToken, $APIOptions)
            ->getBody()
            ->getContents()
        )
      );
    } catch (ContractorException $e) {
      return $e;
    }
  }

  /**
   * @param models\Contractor $contractor
   * @return models\Contractor
   * @throws ContractorException
   */
  public function createContractor(models\Contractor $contractor): models\Contractor
  {
    if (count($contractor->toArray()) === 0)
      throw new ContractorException("[ FakturowaniaSDK ] contractor is required");

    try {
      $APIOptions = [
        "json" => $contractor->getForRequest()
      ];
      return models\Contractor::getFromResponse(
        json_decode(
          (new HTTPClient())
            ->request("POST", "contractors", $this->authToken, $APIOptions)
            ->getBody()
            ->getContents()
        )
      );
    } catch (ContractorException $e) {
      return $e;
    }
  }
}
