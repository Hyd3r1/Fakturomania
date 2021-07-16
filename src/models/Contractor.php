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
}