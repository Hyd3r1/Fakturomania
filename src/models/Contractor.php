<?php
namespace khaller\fakturomania\models;


use Jenssegers\Model\Model;

class Contractor extends Model {
    protected $fillable = [
      'contractorId',
      'contractorVersionId',
      'name',
      'nipPrefix',
      'nip',
      'street',
      'postalCode',
      'postalCity',
      'customerAccountId',
      'supplierAccountId',
    ];

    public function getForRequest()
    {
        return [
            'name' => $this->name,
            'nipPrefix' => $this->nipPrefix,
            'nip' => $this->nip,
            'street' => $this->street,
            'postalCode' => $this->postalCode,
            'postalCity' => $this->postalCity
        ];
    }

    public static function getFromResponse($response)
    {
      return new Contractor([
        'contractorId' => $response->contractorId,
        'contractorVersionId' => $response->contractorVersionId,
        'name' => $response->name,
        'nipPrefix' => $response->nipPrefix,
        'nip' => $response->nip,
        'street' => $response->street,
        'postalCode' => $response->postalCode,
        'postalCity' => $response->postalCity,
        'customerAccountId' => $response->customerAccountId,
        'supplierAccountId' => $response->supplierAccountId
      ]);
    }
}