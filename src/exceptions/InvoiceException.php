<?php


namespace Fakturomania\Exceptions;


class InvoiceException extends \Exception
{
    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}] - {$this->message}\n";
    }
}