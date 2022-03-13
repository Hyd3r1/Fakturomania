## Fakturomania (Swagger)
https://api.fakturomania.pl/

## Install
```
composer require khaller/fakturomania-sdk
```
Packagist - https://packagist.org/packages/khaller/fakturomania-sdk

## Authentication
<hr />

Generate Auth-Token for another operations

```php
    $authData = new \Fakturomania\Models\Auth();
    $authData->userEmail = "admin@fakturomania.pl";
    $authData->password = "Hasło";
    
    $authentication = new \Fakturomania\Authentication();
    $authToken = $authentication->generateSession($authData);
```
Authentication available data
```
    $authToken->value - Get Auth-Token for other functions
    $authToken->userEmail - Get email address (used in registration)
    $authToken->userLoginEmail - Get email address used for login
    $authToken->valid - Get token valid time in unix
 ```

## Invoices
<hr />

Create invoice
```php
    $invoiceData = new \Fakturomania\Models\Invoice();
    $invoiceData->documentName = "FV";
    $invoiceData->documentNameIsCustom = false;
    $invoiceData->saleDate = now() * 1000;
    $invoiceData->issueDate = now() * 1000;
    $invoiceData->contractor = [
        'contractorId' => 1,
        'contractorVersionId' => 1
    ];
    $invoiceData->addRecord([
        'ordinal' => 1,
        'name' => 'Test',
        'unit' => 'szt',
        'quantity' => 10,
        'netPrice' => 100,
        'netValue' => 1000,
        'vatRate' => "23%",
        'vatValue' => 230,
        'grossValue' => 1230,
        'invoiceProductId' => 1,
        'invoiceProductVersion' => 22
    ]);
    $invoiceData->buyerName = "Andrzej Kowalski";
    $invoiceData->sellerName = "Fakturomania";
    $invoiceData->comments = "Gwarancja nie obowiązuje";
    $invoiceData->paymentInfo = [
        'paymentDeadline' => now() * 1000,
        'paymentMethod' => 'CASH',
    ];
    $invoiceData->bankName = "PKO BANK POLSKI";
    $invoiceData->bankAccountNumber = "33 3333 3333 3333 3333 3333 3333";
    $invoiceData->invoiceTaxInfo = [
        'vatSaleArt23' => false,
        'vatSaleArt28K' => false,
        'vatRelatedEntitiesArt32Ust2Pkt1' => false,
        'vatSplitPaymentMechanismMPP' => false,
    ];

    $sale = new \Fakturomania\Sale($authToken);
    $invoice = $sale->createInvoice($invoiceData);
```

Get Invoices
```php
    $sale = new \Fakturomania\Sale($authToken);
    $sale
        ->getInvoices(0000, 1625151106577, "ascending", "issueDate")
        ->each(function ($item){
            print_r($item);
        });
```

Delete Invoice
```php
    $sale = new \Fakturomania\Sale($authToken);
    $sale->deleteInvoice(637536);
```

Invoice available data
```
    $invoice->invoiceDetails - Get invoice details (Array)
    $invoice->invoiceInfo - Get invoice info (Array)
    $invoice->contractorInfo - Get contractor data (Array)
    $invoice->recordsInfo - Get information about products on invoice (Array)
    $invoice->paymentInfo - Get information about payment (Array)
    $invoice->taxInfo - Get information about tax (Array)
```

## Contractor
<hr />

Create Contractor
```php
    $contractorData = new \Fakturomania\Models\Contractor();
    $contractorData->name = "Andrzej Kowalski";
    $contractorData->nipPrefix = "PL";
    $contractorData->street = "ul. gen. Stefana Grota-Rowackiego 38";
    $contractorData->postalCode = "41-214";
    $contractorData->postalCity = "Sosnowiec";

    $contractorClass = new \Fakturomania\Contractor($authToken);
    $contractor = $contractorClass->createContractor($contractorData);
```

Update Contractor
```php
    $contractorData = new \Fakturomania\Models\Contractor();
    $contractorData->name = "Andrzej Maćkowiak";
    $contractorData->nipPrefix = "PL";
    $contractorData->street = "ul. gen. Stefana Grota-Rowackiego 40";
    $contractorData->postalCode = "41-214";
    $contractorData->postalCity = "Sosnowiec";
    
    $contractorNew = $contractorClass->updateContractor($contractor->contractorId, $contractorData);
```

Get Contractor
```php
    $contractor = $contractorClass->getContractor($id);
```

Contractor available data
```yaml
    $contractor->contractorId - Return contractor ID
    $contractor->contractorVersionId - ID of Contractor version
    $contractor->name - Get Contractor name
    $contractor->nipPrefix - Contractor nip prefix (no required)
    $contractor->nip - Contractor NIP
    $contractor->street - Get Contractor street
    $contractor->postalCode - Get Contractor postalcode
    $contractor->postalCity - Get contractor city
    $contractor->customerAccountId - Get contractor customer account Id
    $contractor->supplierAccountId - Get contractor supplier account id
```

## Products
<hr />

Create product
```php
    $productData = new \Fakturomania\Models\Product();
    $productData->name = "Testowy produkt";
    $productData->classificationCode = "69.20.2";
    $productData->unit = "szt";
    $productData->quantity = 1;
    $productData->netPrice = 100;
    $productData->netValue = 100;
    $productData->vatRate = "23%";
    $productData->vatValue = 23;
    $productData->grossValue = 123;
    $productData->GTU = "GTU_12";
    
    $productClass = new \Fakturomania\Products($authToken);
    $product = $productClass->createProduct($productData);
```

Update product
```php
    $productData = new \Fakturomania\Models\Product();
    $productData->name = "Fajny produkt";
    $productData->classificationCode = "69.20.2";
    $productData->unit = "szt";
    $productData->quantity = 1;
    $productData->netPrice = 100;
    $productData->netValue = 100;
    $productData->vatRate = "23%";
    $productData->vatValue = 23;
    $productData->grossValue = 123;
    $productData->GTU = "GTU_12";
    $product = $productClass->updateProduct($productId, $productData);
```

Get product
```php
    $product = $productClass->getProduct($productId);
```

Delete product
```php
    $productClass->deleteProduct($productId);
```


Product available data
```yaml
    $product->id - Product id
    $product->versionId - Product version id
    $product->versionUUID - Product version UUID
    $product->created - UNIX timestamp of product create
    $product->organizationId - Product owner company id
    $product->modified - UNIX timestamp of product last modify
    $product->name - Product name
    $product->classificationCode - CN / PKOB code
    $product->unit - Unit
    $product->quantity - Amount
    $product->netPrice - Netto price
    $product->netValue - Netto value
    $product->vatRate - Vat rate
    $product->vatValue - Vat value
    $product->grossValue - Brutto price
    $product->GTU - GTU Code
    $product->isCurrent - Product is current?
    $product->deleted - Product is deleted?
```
