<?php
namespace khaller\fakturomania\models;


class ContractorModel
{
    /**
     * @var null|integer Contractor Id
     */
    private $contractorId = null;

    /**
     * @var null|integer Version Id
     */
    private $contractorVersionId = null;

    /**
     * @var null|string Contractor name
     */
    private $name = null;

    /**
     * @var null|string Prefix of NIP number
     */
    private $nipPrefix = null;

    /**
     * @var null|string NIP number
     */
    private $nip = null;

    /**
     * @var null|string Contractor street
     */
    private $street = null;

    /**
     * @var null|string Postal code
     */
    private $postalCode = null;

    /**
     * @var null|string City name
     */
    private $postalCity = null;

    /**
     * @var null|integer Customer account ID
     */
    private $customerAccountId = null;

    /**
     * @var null|integer Supplier account ID
     */
    private $supplierAccountId = null;

    /**
     * ContractorModel constructor.
     */
    function __construct($APIResponse)
    {
        $this->setContractorId($APIResponse["contractorId"]);
        $this->setContractorVersionId($APIResponse["contractorVersionId"]);
        $this->setName($APIResponse["name"]);
        $this->setNipPrefix($APIResponse["nipPrefix"]);
        $this->setNip($APIResponse["nip"]);
        $this->setStreet($APIResponse["street"]);
        $this->setPostalCode($APIResponse["postalCode"]);
        $this->setPostalCity($APIResponse["postalCity"]);
        $this->setCustomerAccountId($APIResponse["customerAccountId"]);
        $this->setSupplierAccountId($APIResponse["supplierAccountId"]);
    }

    /**
     * @return int|null
     */
    public function getContractorId(): ?int
    {
        return $this->contractorId;
    }

    /**
     * @param int|null $contractorId
     */
    private function setContractorId(?int $contractorId): void
    {
        $this->contractorId = $contractorId;
    }

    /**
     * @return int|null
     */
    public function getContractorVersionId(): ?int
    {
        return $this->contractorVersionId;
    }

    /**
     * @param int|null $contractorVersionId
     */
    private function setContractorVersionId(?int $contractorVersionId): void
    {
        $this->contractorVersionId = $contractorVersionId;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    private function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getNipPrefix(): ?string
    {
        return $this->nipPrefix;
    }

    /**
     * @param string|null $nipPrefix
     */
    private function setNipPrefix(?string $nipPrefix): void
    {
        $this->nipPrefix = $nipPrefix;
    }

    /**
     * @return string|null
     */
    public function getNip(): ?string
    {
        return $this->nip;
    }

    /**
     * @param string|null $nip
     */
    private function setNip(?string $nip): void
    {
        $this->nip = $nip;
    }

    /**
     * @return string|null
     */
    public function getStreet(): ?string
    {
        return $this->street;
    }

    /**
     * @param string|null $street
     */
    private function setStreet(?string $street): void
    {
        $this->street = $street;
    }

    /**
     * @return string|null
     */
    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    /**
     * @param string|null $postalCode
     */
    private function setPostalCode(?string $postalCode): void
    {
        $this->postalCode = $postalCode;
    }

    /**
     * @return string|null
     */
    public function getPostalCity(): ?string
    {
        return $this->postalCity;
    }

    /**
     * @param string|null $postalCity
     */
    private function setPostalCity(?string $postalCity): void
    {
        $this->postalCity = $postalCity;
    }

    /**
     * @return int|null
     */
    public function getCustomerAccountId(): ?int
    {
        return $this->customerAccountId;
    }

    /**
     * @param int|null $customerAccountId
     */
    private function setCustomerAccountId(?int $customerAccountId): void
    {
        $this->customerAccountId = $customerAccountId;
    }

    /**
     * @return int|null
     */
    public function getSupplierAccountId(): ?int
    {
        return $this->supplierAccountId;
    }

    /**
     * @param int|null $supplierAccountId
     */
    private function setSupplierAccountId(?int $supplierAccountId): void
    {
        $this->supplierAccountId = $supplierAccountId;
    }
}