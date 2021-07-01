<?php
namespace khaller\fakturowniasdk\models;

class AuthenticationModel
{
    /**
     * @var string|null AuthToken for logged user
     */
    private $value = null;
    /**
     * @var string|null Email of logged user
     */
    private $userEmail = null;
    /**
     * @var string|null Login email for user
     */
    private $userLoginEmail = null;
    /**
     * @var integer|null Unix timestamp for valid of token
     */
    private $valid = null;

    /**
     * ContractorModel constructor.
     * @param string|null $value AuthToken for logged user
     * @param string|null $userEmail Email of logged user
     * @param string|null $userLoginEmail Login email for user
     * @param integer|null $valid Unix timestamp for valid of token
     */
    function __construct(string $value = null, string $userEmail = null, string $userLoginEmail = null, int $valid = null)
    {
        $this->setValue($value);
        $this->setUserEmail($userEmail);
        $this->setUserLoginEmail($userLoginEmail);
        $this->setValid($valid);
    }

    /**
     * @return string|null AuthToken for logged user
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param null $value
     */
    private function setValue($value): void
    {
        $this->value = $value;
    }

    /**
     * @return string|null Email of logged user
     */
    public function getUserEmail()
    {
        return $this->userEmail;
    }

    /**
     * @param string|null $userEmail
     */
    private function setUserEmail($userEmail): void
    {
        $this->userEmail = $userEmail;
    }

    /**
     * @return string|null Login email for user
     */
    public function getUserLoginEmail()
    {
        return $this->userLoginEmail;
    }

    /**
     * @param null $userLoginEmail
     */
    private function setUserLoginEmail($userLoginEmail): void
    {
        $this->userLoginEmail = $userLoginEmail;
    }

    /**
     * @return integer|null Unix timestamp for valid of token
     */
    public function getValid()
    {
        return $this->valid;
    }

    /**
     * @param null $valid
     */
    private function setValid($valid): void
    {
        $this->valid = $valid;
    }
}