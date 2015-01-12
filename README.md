PostNord [![Build Status](https://travis-ci.org/lsolesen/postnord-sdk.svg?branch=master)](https://travis-ci.org/lsolesen/postnord-sdk)
==

PHP-SDK for [PostNord webservices](http://www.postdanmark.dk/da/Logistik/netbutikker/login/Sider/webservices.aspx). You need an [API-key](http://www.postdanmark.dk/da/Logistik/netbutikker/login/Sider/Opret.aspx) to use the service.

    <?php
    $request = new PostNord_Request($apiKey);
    $client = new PostNord_Client($request);

    $result = $client->findNearestByZipCode(7100);
