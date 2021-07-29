<?php


namespace khaller\fakturomania\models;

use Jenssegers\Model\Model;

class Invoice extends Model
{
    protected $fillable = [
        'documentName',
        'documentNameIsCustom',
        'saleDate',
        'issueDate',
        'contractor',
        'records',
        'buyerName',
        'sellerName',
        'comments',
        'paymentInfo',
        'bankName',
        'bankAccountNumber',

        'invoiceTaxInfo',
        'invoiceDetails',
        'invoiceInfo',
        'contractorInfo',
        'recordsInfo',
        'taxInfo'
    ];

    public function getForRequest(): array
    {
        return [
            'documentName' => $this->documentName,
            'documentNameIsCustom' => $this->documentNameIsCustom,
            'saleDate' => $this->saleDate,
            'issueDate' => $this->issueDate,
            'contractor' => [
                'contractorId' => $this->contractor->contractorId,
                'contractorVersionId' => $this->contractor->contractorVersionId
            ],
            'records' => $this->records,
            'buyerName' => $this->buyerName,
            'sellerName' => $this->sellerName,
            'comments' => $this->comments,
            'paymentInfo' => $this->paymentInfo,
            'bankName' => $this->bankName,
            'bankAccountNumber' => $this->bankAccountNumber,
            'invoiceTaxInfo' => $this->invoiceTaxInfo,
        ];
    }

    public function addRecord(array $record)
    {
        array_push($this->records, $record);
    }

    public static function getForResponse($APIResponse)
    {
      return new Invoice([
        'invoiceDetails' => $APIResponse->invoiceDetails,
        'invoiceInfo' => $APIResponse->invoiceInfo,
        'contractorInfo' => $APIResponse->contractorInfo,
        'recordsInfo' => $APIResponse->recordsInfo,
        'paymentInfo' => $APIResponse->paymentInfo,
        'taxInfo' => $APIResponse->taxInfo,
      ]);
    }
}