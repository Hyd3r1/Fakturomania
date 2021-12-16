<?php
namespace Fakturomania\Models;
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

    public static function getForResponse($APIResponse)
    {
      return new Product([
        'id' => $APIResponse->id,
        'versionId' => $APIResponse->versionId,
        'versionUUID' => $APIResponse->versionUUID,
        'created' => $APIResponse->created,
        'organizationId' => $APIResponse->organizationId,
        'modified' => $APIResponse->modified,
        'name' => $APIResponse->name,
        'classificationCode' => $APIResponse->classificationCode,
        'unit' => $APIResponse->unit,
        'quantity' => $APIResponse->quantity,
        'netPrice' => $APIResponse->netPrice,
        'netValue' => $APIResponse->netValue,
        'vatRate' => $APIResponse->vatRate,
        'grossValue' => $APIResponse->grossValue,
        'GTU' => $APIResponse->GTU,
        'isCurrent' => $APIResponse->isCurrent,
        'deleted' => $APIResponse->deleted
      ]);
    }
}
