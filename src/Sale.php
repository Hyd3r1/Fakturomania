<?php
namespace khaller\fakturomania;

use Collections\Vector;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use khaller\fakturomania\exceptions\InvoiceException;
use khaller\fakturomania\models\Invoice;
use khaller\fakturomania\utils\HTTPClient;

class Sale
{
    /**
     * @var $authToken
     */
    private $authToken;

    /**
     * Sale constructor.
     */
    function __construct($authToken)
    {
        $this->authToken = $authToken;
    }

    /**
     * @param Invoice $invoice
     * @return Invoice
     * @throws InvoiceException
     */
    public function createInvoice(Invoice $invoice): Invoice
    {
        if(count($invoice->toArray()) == 0)
            throw new InvoiceException("[ Fakturomania SDK ] InvoiceData is required");

        try {
            $APIOptions = ["json" => $invoice->getForRequest()];
            return Invoice::getForResponse(
              json_decode(
                (new HTTPClient())
                  ->request("POST", "sale", $this->authToken, $APIOptions)
                  ->getBody()
                  ->getContents()
              )
            );
        } catch (GuzzleException $e) {
            throw new InvoiceException($e->getMessage());
        }
    }

    /**
     *
     * @throws Exception
     */
    public function getInvoices($from, $to, $sortDir, $sortPar): Vector
    {
        if(!isset($from) || !isset($to) || !isset($sortDir) || !isset($sortPar))
            throw new Exception("[ Fakturomania SDK ] InvoiceData is required");

        try {
            $coll = new Vector();
            $APIOptions = [
                "query" => [
                    "fromMoment" => $from,
                    "toMoment" => $to,
                    "sortDirection" => $sortDir,
                    "sortParameter" => $sortPar
                ]
            ];
            $APIResponse = json_decode(
              (new HTTPClient())
                ->request("GET", "sale", $this->authToken, $APIOptions)
                ->getBody()
                ->getContents()
            );
            foreach ($APIResponse->data as $invoice)
            {
                $coll->add(Invoice::getForResponse($invoice));
            }
            return $coll;
        } catch (GuzzleException $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * @param integer $invoiceId
     * @return bool
     * @throws Exception
     */
    public function deleteInvoice(int $invoiceId): bool
    {
        if(!isset($invoiceId))
            throw new Exception("[ Fakturomania SDK ] invoiceId is required");

        try {
            $APIRequest = (new HTTPClient())
              ->request("GET", "sale/". $invoiceId, $this->authToken);
            return $APIRequest->getStatusCode() == 200;
        } catch (GuzzleException $e) {
            throw new Exception($e->getMessage());
        }
    }
}
