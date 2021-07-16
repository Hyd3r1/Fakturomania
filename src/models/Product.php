<?php
namespace khaller\fakturomania\models;
use Jenssegers\Model\Model;

class Product extends Model {
    protected $fillable = [
        'id',
        'versionId',
        'versionUUID',
        'created',
        'organizationId',
        'modified',
        'name',
        'classificationCode',
        'unit',
        'quantity',
        'netPrice',
        'netValue',
        'vatRate',
        'vatValue',
        'grossValue',
        'GTU',
        'isCurrent',
        'deleted'
    ];

    public function getForRequest()
    {
        return [
            'name' => $this->name,
            'classificationCode' => $this->classificationCode,
            'unit' => $this->unit,
            'quantity' => $this->quantity,
            'netPrice' => $this->netPrice,
            'netValue' => $this->netValue,
            'vatRate' => $this->vatRate,
            'vatValue' => $this->vatValue,
            'grossValue' => $this->grossValue,
            'GTU' => $this->GTU
        ];
    }
}