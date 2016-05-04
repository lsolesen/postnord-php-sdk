PostNord [![Build Status](https://travis-ci.org/lsolesen/postnord-php-sdk.svg?branch=master)](https://travis-ci.org/lsolesen/postnord-php-sdk) [![Coverage Status](https://coveralls.io/repos/lsolesen/postnord-php-sdk/badge.svg)](https://coveralls.io/r/lsolesen/postnord-php-sdk)
==

PHP-SDK for [PostNord webservices](http://www.postdanmark.dk/da/erhverv/faa-raadgivning/e-handel/webservices/Sider/webservices.aspx). You need an [API-key](http://www.postdanmark.dk/da/erhverv/faa-raadgivning/e-handel/webservices/login/Sider/api-og-widgets.aspx) to use the service.

```php5
<?php
use PostNord\Client\Request;
use PostNord\Client\Client;

$request = new Request($apiKey);
$client = new Client($request);

$result = $client->findNearestByZipCode(7100);
```

Check out the full API for [servicepoints](http://logistics.postennorden.com/wsp/docs/servicepoints/index.html), [Track'n'Trace](http://logistics.postennorden.com/wsp/rest-services/ntt-service-rest/api/shipment/menu.html) and [Transit time](http://logistics.postennorden.com/wsp/rest-services/notis-rest/api/transitTimeInfo/menu.html).
