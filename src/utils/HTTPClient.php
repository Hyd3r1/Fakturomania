<?php
namespace khaller\fakturomania\utils;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;


class HTTPClient extends Client
{
  public function __construct(array $config = [])
  {
    $config["base_uri"] = "https://app.fakturomania.pl/api/v1/";
    parent::__construct($config);
  }

  public function request($method, $uri = '', $authToken = '', array $options = []): ResponseInterface
  {
    $options["headers"] = [
      "Accept" => "application/json",
      "Content-Type" => "application/json",
    ];
    if($authToken)
      $options["headers"]["Auth-Token"] = $authToken;
    return parent::request($method, $uri, $options);
  }
}