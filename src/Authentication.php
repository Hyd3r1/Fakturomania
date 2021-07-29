<?php
namespace khaller\fakturomania;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use khaller\fakturomania\exceptions\AuthenticationException;
use khaller\fakturomania\models\Auth;
use khaller\fakturomania\utils\HTTPClient;

class Authentication
{
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
                ]
            ];

            $APIResponse = json_decode(
              (new HTTPClient())
                ->request("POST", "session", '', $APIOptions)
                ->getBody()
                ->getContents()
            );
            return new Auth([
                'value' => $APIResponse->value,
                'userEmail' => $APIResponse->userEmail,
                'userLoginEmail' => $APIResponse->userLoginEmail,
                'valid' => $APIResponse->valid
            ]);
        } catch (GuzzleException $e) {
            throw new AuthenticationException($e);
        }
    }
}