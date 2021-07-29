<?php
namespace Fakturomania;

use Fakturomania\Exceptions\AuthenticationException;
use Fakturomania\Models\Auth;
use Fakturomania\Utils\HTTPClient;

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
        } catch (AuthenticationException $e) {
            return $e;
        }
    }
}