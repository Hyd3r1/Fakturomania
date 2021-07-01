<?php
namespace khaller\fakturomania;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use khaller\fakturomania\models\AuthenticationModel;

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
     * @param string $email Email to login
     * @param string $password Password for auth user
     * @param boolean $remember Long time of expire
     * @return AuthenticationModel Data model
     * @throws Exception Guzzle HTTP error
     */
    public function generateSession(string $email, string $password, bool $remember): AuthenticationModel
    {
        if(!isset($email) || !isset($password) || !isset($remember))
            throw new Exception("[ FakturomaniaSDK ] email, password, and remember is required!");

        try {
            $APIOptions = [
                "json" => [
                    "email" => $email,
                    "password" => $password,
                    "remember" => $remember
                ],
                "headers" => [
                    "Accept" => "application/json",
                    "Content-Type" => "application/json"
                ]
            ];

            $APIRequest = $this->HTTPClient->request("POST", "session", $APIOptions);
            $APIResponse = json_decode($APIRequest->getBody()->getContents(), true);
            return new AuthenticationModel($APIResponse["value"], $APIResponse["userEmail"], $APIResponse["userLoginEmail"], $APIResponse["valid"]);
        } catch (GuzzleException $e) {
            throw new Exception($e->getMessage());
        }
    }
}