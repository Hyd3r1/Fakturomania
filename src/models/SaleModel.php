<?php
namespace khaller\fakturowniasdk\models;


class SaleModel
{
    /**
     * @var null[]
     */
    private $invoiceDetails = [
        "invoiceId" => null,
        "versionUuid" => null,
        "versionId" => null,
        "created" => null,
        "modified" => null,
        "documentType" => null,
        "state" => null,
    ];

    /**
     * @var null[]
     */
    private $invoiceInfo = [
        "documentName" => null,
        "documentNameIsCustom" => null,
        "saleDate" => null,
        "issueDate" => null,
        "bankName" => null,
        "bankAccountNumber" => null,
        "buyerName" => null,
        "sellerName" => null,
        "comments" => null
    ];

    /**
     * @var ContractorModel
     */
    private $contractorInfo;

    /**
     * @var null[]
     */
    private $recordsInfo = [
        "amountNet" => null,
        "amountGross" => null,
        "records" => null,
    ];

    /**
     * @var null[]
     */
    private $paymentInfo = [
        "paymentDeadline" => null,
        "paymentDate" => null,
        "paymentMethod" => null,
        "amountTotal" => null,
        "amountPaid" => null,
        "paymentStatus" => null
    ];

    /**
     * @var null[]
     */
    private $taxInfo = [
        "vatReckoningRule" => null,
        "vatReckoningRuleOriginal" => null,
        "vatExemption" => null,
        "vatSaleArt23" => null,
        "vatSaleArt28K" => null,
        "vatRelatedEntitiesArt32Ust2Pkt1" => null,
        "vatSplitPaymentMechanismMPP" => null,
        "vatReverseChangeMechanismOO" => null,
        "vatReversedGoodsValue" => false,
        "vatReversedServicesValue" => false,
    ];

    /**
     * SaleModel constructor.
     * @param $APIResponse
     */
    function __construct($APIResponse)
    {
        $this->setInvoiceDetails([
            "invoiceId" => $APIResponse["invoiceDetails"]["invoiceId"],
            "versionUuid" => $APIResponse["invoiceDetails"]["versionUuid"],
            "versionId" => $APIResponse["invoiceDetails"]["versionId"],
            "created" => $APIResponse["invoiceDetails"]["created"],
            "modified" => $APIResponse["invoiceDetails"]["modified"],
            "documentType" => $APIResponse["invoiceDetails"]["documentType"],
            "state" => $APIResponse["invoiceDetails"]["state"],
        ]);

        $this->setInvoiceInfo([
            "documentName" => $APIResponse["invoiceInfo"]["documentName"],
            "documentNameIsCustom" => $APIResponse["invoiceInfo"]["documentNameIsCustom"],
            "saleDate" => $APIResponse["invoiceInfo"]["saleDate"],
            "issueDate" => $APIResponse["invoiceInfo"]["issueDate"],
            "bankName" => $APIResponse["invoiceInfo"]["bankName"],
            "bankAccountNumber" => $APIResponse["invoiceInfo"]["bankAccountNumber"],
            "buyerName" => $APIResponse["invoiceInfo"]["buyerName"],
            "sellerName" => $APIResponse["invoiceInfo"]["sellerName"],
            "comments" => $APIResponse["invoiceInfo"]["comments"]
        ]);

        $this->setContractorInfo(new ContractorModel($APIResponse["contractorInfo"]));

        $this->setRecordsInfo([
            "amountNet" => $APIResponse["recordsInfo"]["amountNet"],
            "amountGross" => $APIResponse["recordsInfo"]["amountGross"],
            "records" => $APIResponse["recordsInfo"]["records"],
        ]);

        $this->setPaymentInfo([
            "paymentDeadline" => $APIResponse["paymentInfo"]["paymentDeadline"],
            "paymentDate" => $APIResponse["paymentInfo"]["paymentDate"],
            "paymentMethod" => $APIResponse["paymentInfo"]["paymentMethod"],
            "amountTotal" => $APIResponse["paymentInfo"]["amountTotal"],
            "amountPaid" => $APIResponse["paymentInfo"]["amountPaid"],
            "paymentStatus" => $APIResponse["paymentInfo"]["paymentStatus"]
        ]);

        $this->setTaxInfo([
            "vatReckoningRule" => $APIResponse["taxInfo"]["vatReckoningRule"],
            "vatReckoningRuleOriginal" => $APIResponse["taxInfo"]["vatReckoningRuleOriginal"],
            "vatExemption" => $APIResponse["taxInfo"]["vatExemption"],
            "vatSaleArt23" => $APIResponse["taxInfo"]["vatSaleArt23"],
            "vatSaleArt28K" => $APIResponse["taxInfo"]["vatSaleArt28K"],
            "vatRelatedEntitiesArt32Ust2Pkt1" => $APIResponse["taxInfo"]["vatRelatedEntitiesArt32Ust2Pkt1"],
            "vatSplitPaymentMechanismMPP" => $APIResponse["taxInfo"]["vatSplitPaymentMechanismMPP"],
            "vatReverseChangeMechanismOO" => $APIResponse["taxInfo"]["vatReverseChangeMechanismOO"],
            "vatReversedGoodsValue" => $APIResponse["taxInfo"]["vatReversedGoodsValue"] ?? false,
            "vatReversedServicesValue" => $APIResponse["taxInfo"]["vatReversedServicesValue"] ?? false,
        ]);
    }

    /**
     * @return null[]
     */
    public function getInvoiceDetails(): array
    {
        return $this->invoiceDetails;
    }


    /**
     * @return null[]
     */
    public function getInvoiceInfo(): array
    {
        return $this->invoiceInfo;
    }

    /**
     * @return ContractorModel
     */
    public function getContractorInfo(): ContractorModel
    {
        return $this->contractorInfo;
    }

    /**
     * @return null[]
     */
    public function getRecordsInfo(): array
    {
        return $this->recordsInfo;
    }

    /**
     * @return null[]
     */
    public function getPaymentInfo(): array
    {
        return $this->paymentInfo;
    }

    /**
     * @return null[]
     */
    public function getTaxInfo(): array
    {
        return $this->taxInfo;
    }

    /**
     * @param null[] $invoiceDetails
     */
    private function setInvoiceDetails(array $invoiceDetails): void
    {
        $this->invoiceDetails = $invoiceDetails;
    }

    /**
     * @param null[] $invoiceInfo
     */
    private function setInvoiceInfo(array $invoiceInfo): void
    {
        $this->invoiceInfo = $invoiceInfo;
    }

    /**
     * @param ContractorModel $contractorInfo
     */
    private function setContractorInfo(ContractorModel $contractorInfo): void
    {
        $this->contractorInfo = $contractorInfo;
    }

    /**
     * @param null[] $recordsInfo
     */
    private function setRecordsInfo(array $recordsInfo): void
    {
        $this->recordsInfo = $recordsInfo;
    }

    /**
     * @param null[] $paymentInfo
     */
    private function setPaymentInfo(array $paymentInfo): void
    {
        $this->paymentInfo = $paymentInfo;
    }

    /**
     * @param null[] $taxInfo
     */
    private function setTaxInfo(array $taxInfo): void
    {
        $this->taxInfo = $taxInfo;
    }


}