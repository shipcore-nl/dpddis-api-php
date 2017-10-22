# DPD Integration Service PHP Bindings

PHP Library to use DPD Integration Services as documented on http://diswiki.dpd.nl/.

## Implementation status

| Service                                               | Status                    |
| ----------------------------------------------------- | ------------------------- |
| Login Service                                         | alpha                     |
| Parcel Shop Finder Service                            | alpha                     |
| Shipment Service                                      | alpha                     |
| Depot Data Service                                    | alpha                     |
| Parcel LifeCycle Service                              | alpha                     |

## Install instructions

```
composer require shipcore-nl/dpddis-api-php
```

## Example

### Create Shipment Label

```
$delisId = 'YOUR_DELIS_ID'
$password = 'YOUR_PASSWORD';
$messageLanguage = 'en_EN';
$staging = true;

$cachedToken = null; // or load from storage 

// API Init
$dpd = new \ShipCore\DPDDis\Api($delisId, $password, $messageLanguage, $cachedToken, $staging);

$printOptions = \ShipCore\DPDDis\Entity\Shipment\Request\PrintOptions::fromDataArray([
        'paperFormat' => 'A6'
]);

$order = \ShipCore\DPDDis\Entity\Shipment\Request\Order::fromDataArray([
        'generalShipmentData' => [
            'sendingDepot' => '0522',
            'product' => 'CL',
            'sender' => [
                'name1' => 'CustomerIT',
                'street' => 'Tormentil',
                'houseNo' => '10',
                'country' => 'NL',
                'zipCode' => '5684PK',
                'city' => 'Best'
            ],
            'recipient' => [
                'name1' => 'Receiver',
                'street' => 'streetname',
                'houseNo' => '123',
                'country' => 'NL',
                'zipCode' => '5684PK',
                'city' => 'Best'
            ],
        ],
        'parcels' => [
            'customerReferenceNumber1' => 'CustRef1',
            'weight' => 360
        ],
        'productAndServiceData' => [
            'orderType' => 'consignment'
        ]
]);

// Create Label call
$orderResult = $dpd->storeOrders($printOptions, $order);

$trackingNumber = $orderResult
    ->getShipmentResponses()
    ->getParcelInformation()
    ->getParcelLabelNumber();

$labelBinary = $orderResult->getParcellabelsPDF();

file_put_contents($trackingNumber . '.pdf', $labelBinary);
```
