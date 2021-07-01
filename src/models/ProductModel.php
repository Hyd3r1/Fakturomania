<?php
namespace khaller\fakturowniasdk\models;

class ProductModel
{
    /**
     * @var null|integer ID of Product
     */
    private $id;
    /**
     * @var null|integer Version ID
     */
    private $versionId;

    /**
     * @var null|string Version UUID
     */
    private $versionUUID;

    /**
     * @var null|integer Unix timestamp of create product
     */
    private $created;

    /**
     * @var null|integer ID of organization
     */
    private $organizationId;

    /**
     * @var null|integer Modified unix timestamp
     */
    private $modified;

    /**
     * @var null|string Name of product
     */
    private $name;

    /**
     * @var null|string Classification code
     */
    private $classificationCode;

    /**
     * @var null|string Unit
     */
    private $unit;

    /**
     * @var null|integer Quantity
     */
    private $quantity;

    /**
     * @var null|integer Netto price of product
     */
    private $netPrice;

    /**
     * @var null|integer Netto value of product
     */
    private $netValue;

    /**
     * @var null|string VAT percent
     */
    private $vatRate;

    /**
     * @var null|string VAT without percent symbol
     */
    private $vatValue;

    /**
     * @var null|string Gross Value
     */
    private $grossValue;

    /**
     * @var null|string GTU
     */
    private $GTU;

    /**
     * @var null|boolean isCurrent
     */
    private $isCurrent;

    /**
     * @var null|boolean Deleted
     */
    private $deleted;

    /**
     * ProductModel constructor.
     * @param $APIResponse
     */
    function __construct($APIResponse)
    {
        $this->setId($APIResponse["id"]);
        $this->setName($APIResponse["name"]);
        $this->setVersionId($APIResponse["versionId"]);
        $this->setVersionUUID($APIResponse["versionUUID"]);
        $this->setCreated($APIResponse["created"]);
        $this->setOrganizationId($APIResponse["organizationId"]);
        $this->setUnit($APIResponse["unit"]);
        $this->setClassificationCode($APIResponse["classificationCode"]);
        $this->setQuantity($APIResponse["quantity"]);
        $this->setNetPrice($APIResponse["netPrice"]);
        $this->setNetValue($APIResponse["netValue"]);
        $this->setVatRate($APIResponse["vatRate"]);
        $this->setVatValue($APIResponse["vatValue"]);
        $this->setGrossValue($APIResponse["grossValue"]);
        $this->setGTU($APIResponse["GTU"]);
        $this->setIsCurrent($APIResponse["isCurrent"]);
        $this->setDeleted($APIResponse["deleted"]);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getVersionId(): int
    {
        return $this->versionId;
    }

    /**
     * @return string
     */
    public function getVersionUUID(): string
    {
        return $this->versionUUID;
    }

    /**
     * @return int
     */
    public function getCreated(): int
    {
        return $this->created;
    }

    /**
     * @return int
     */
    public function getOrganizationId(): int
    {
        return $this->organizationId;
    }

    /**
     * @return int
     */
    public function getModified(): int
    {
        return $this->modified;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getClassificationCode(): string
    {
        return $this->classificationCode;
    }

    /**
     * @return string
     */
    public function getUnit(): string
    {
        return $this->unit;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @return int
     */
    public function getNetPrice(): int
    {
        return $this->netPrice;
    }

    /**
     * @return int
     */
    public function getNetValue(): int
    {
        return $this->netValue;
    }

    /**
     * @return string
     */
    public function getVatRate(): string
    {
        return $this->vatRate;
    }

    /**
     * @return string
     */
    public function getVatValue(): string
    {
        return $this->vatValue;
    }

    /**
     * @return string
     */
    public function getGrossValue(): string
    {
        return $this->grossValue;
    }

    /**
     * @return string
     */
    public function getGTU(): string
    {
        return $this->GTU;
    }

    /**
     * @return bool
     */
    public function isCurrent(): bool
    {
        return $this->isCurrent;
    }

    /**
     * @return bool
     */
    public function isDeleted(): bool
    {
        return $this->deleted;
    }

    /**
     * @param int $id
     */
    private function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @param int $versionId
     */
    private function setVersionId(int $versionId): void
    {
        $this->versionId = $versionId;
    }

    /**
     * @param string|null $versionUUID
     */
    private function setVersionUUID(?string $versionUUID): void
    {
        $this->versionUUID = $versionUUID;
    }

    /**
     * @param int|null $created
     */
    private function setCreated(?int $created): void
    {
        $this->created = $created;
    }

    /**
     * @param null|int $organizationId
     */
    private function setOrganizationId(?int $organizationId): void
    {
        $this->organizationId = $organizationId;
    }

    /**
     * @param null|int $modified
     */
    private function setModified(?int $modified): void
    {
        $this->modified = $modified;
    }

    /**
     * @param null|string $name
     */
    private function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param null|string $classificationCode
     */
    private function setClassificationCode(?string $classificationCode): void
    {
        $this->classificationCode = $classificationCode;
    }

    /**
     * @param null|string $unit
     */
    private function setUnit(?string $unit): void
    {
        $this->unit = $unit;
    }

    /**
     * @param null|int $quantity
     */
    private function setQuantity(?int $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @param null|int $netPrice
     */
    private function setNetPrice(?int $netPrice): void
    {
        $this->netPrice = $netPrice;
    }

    /**
     * @param null|int $netValue
     */
    private function setNetValue(?int $netValue): void
    {
        $this->netValue = $netValue;
    }

    /**
     * @param null|string $vatRate
     */
    private function setVatRate(?string $vatRate): void
    {
        $this->vatRate = $vatRate;
    }

    /**
     * @param null|string $vatValue
     */
    private function setVatValue(?string $vatValue): void
    {
        $this->vatValue = $vatValue;
    }

    /**
     * @param null|string $grossValue
     */
    private function setGrossValue(?string $grossValue): void
    {
        $this->grossValue = $grossValue;
    }

    /**
     * @param null|string $GTU
     */
    private function setGTU(?string $GTU): void
    {
        $this->GTU = $GTU;
    }

    /**
     * @param null|bool $isCurrent
     */
    private function setIsCurrent(?bool $isCurrent): void
    {
        $this->isCurrent = $isCurrent;
    }

    /**
     * @param null|bool $deleted
     */
    private function setDeleted(?bool $deleted): void
    {
        $this->deleted = $deleted;
    }

}