
Create invoice
```php
    $sale = new \khaller\fakturowniasdk\Sale("AUTH TOKEN");
    $sale->createInvoice([
            "documentName" => "FVS 1/12/2020",
            "documentNameIsCustom" => true,
            "saleDate" => 1503885600000,
            "issueDate" => 1503885600000,
            "contractor" => [
                "contractorId" => 149284,
                "contractorVersionId" => 351004
            ],
            "records" => [
                [
                    "ordinal" => 1,
                    "name" => "Najem lokalu za miesiąc czerwiec",
                    "unit" => "szt",
                    "quantity" => 2,
                    "netPrice" => 50,
                    "netValue" => 100,
                    "vatRate" => "23%",
                    "vatValue" => 23,
                    "grossValue" => 123,
                    "invoiceProductId" => 177867,
                    "invoiceProductVersionId" => 233805,
                ],
            ],
            "buyerName" => "Jan Kupujący",
            "sellerName" => "Jan Sprzedający",
            "comments" => "Towar objęty 12 miesięczną gwarancą",
            "paymentInfo" => [
                "paymentDeadline" => 1503885600000,
                "paymentMethod" => "CASH",
                "paymentStatus" => "PARTLYPAID",
                "paymentDate" => 1503885600000,
                "amountPaid" => 100.12
            ],
            "bankName" => "Bank Name",
            "bankAccountNumber" => "33 3333 3333 3333 3333 3333 3333",
            "invoiceTaxInfo" => [
                "vatSaleArt23" => false,
                "vatSaleArt28K" => false,
                "vatRelatedEntitiesArt32Ust2Pkt1" => true,
                "vatSplitPaymentMechanismMPP" => true
            ]
        ]);
```

Get Invoices
```php
    $sale->getInvoices(0000, 1625151106577, "ascending", "issueDate")->each(function ($item){
        print_r($item->getInvoiceInfo());
    });
```

Delete Invoice
```php
$sale->deleteInvoice(637536);
```

Create Contractor
```php
    $con = new Contractor($authGet->getValue());
    $con1 = $con->createContractor([
      "name" => "Firma Testowa Sp. z o.o.",
      "nipPrefix" => "PL",
      "nip" => "644-340-68-04",
      "street" => "ul. gen. Stefana Grota-Roweckiego 38",
      "postalCode" => "41-214",
      "postalCity" => "Sosnowiec"
    ]);
```
