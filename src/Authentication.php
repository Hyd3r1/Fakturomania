<?php
namespace khaller\fakturomania;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use khaller\fakturomania\dtos\AuthenticationDTO;
use khaller\fakturomania\exceptions\AuthenticationException;
use khaller\fakturomania\models\Auth;

class Authentication
{
    /**
     * @var Client HTTP Client initialize
     */
    private $HTTPClient;

    /*
     * Authentication construct function
     */
    function __construct()
    {
        $this->HTTPClient = new Client(["base_uri" => "https://app.fakturomania.pl/api/v1/"]);
    }

    /**
     * @throws Exception Guzzle HTTP error
     */
    public function generateSession(Auth $auth)
    {
        try {
            $APIOptions = [
                "json" => [
                    "email" => $auth->userEmail,
                    "password" => $auth->password,
                    "remember" => $auth->remember
                ],
                "headers" => [
                    "Accept" => "application/json",
                    "Content-Type" => "application/json"
                ]
            ];

            $APIRequest = $this->HTTPClient->request("POST", "session", $APIOptions);
            $APIResponse = json_decode($APIRequest->getBody()->getContents());
            return new Auth([
                'value' => $APIResponse->value,
                'userEmail' => $APIResponse->userEmail,
                'userLoginEmail' => $APIResponse->userLoginEmail,
                'valid' => $APIResponse->valid
            ]);
        } catch (GuzzleException $e) {
            throw new AuthenticationException($e->getMessage());
        }
    }
}