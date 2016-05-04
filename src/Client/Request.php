<?php
/**
 * PostNord
 *
 * PHP version 5
 *
 * @category  PostNord
 * @package   PostNord
 * @author    Lars Olesen <lars@intraface.dk>
 * @copyright 2014 Lars Olesen
 * @license   For licensing, see LICENSE.md distributed with this source code.
 * @link      http://github.com/lsolesen/postnord-php-sdk
 */

namespace PostNord\Client;

use PostNord\Client\Response;

/**
 * PostNord: request.
 *
 * @category  PostNord
 * @package   PostNord
 * @author    Lars Olesen <lars@intraface.dk>
 * @copyright 2014 Lars Olesen
 */
class Request
{

    protected $apiKey;
    protected $numberOfServicePoints = 12;
    protected $countryCode = 'DK';

    /**
     * Construct a PostNord Request with an API key and an API version.
     *
     * @param string $apiKey ApiKey from PostNord
     */
    public function __construct($apiKey)
    {
        $this->apiKey = trim($apiKey);
    }

    /**
     * Run a custom request on PostNord API on a specific address
     * with possible parameters and receive a response array as
     * return.
     *
     * @param string  $method   Either GET, POST, PUT or DELETE
     * @param string  $url      Sub-address to call
     * @param integer $postcode Parameters to be sent to PostNord
     *
     * @return \stdClass Response from PostNord API
     */
    public function call($method, $url, $postcode)
    {
        $url = "http://api.postnord.com/wsp/rest/BusinessLocationLocator" .
            "/Logistics/ServicePointService_1.0/findNearestByAddress.json?" .
            "consumerId=" . $this->apiKey .
            "&countryCode=" . $this->countryCode .
            "&postalCode=" . $postcode .
            '&numberOfServicePoints='.$this->numberOfServicePoints;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $res = curl_exec($curl);
        $info = curl_getinfo($curl);
        curl_close($curl);
        return new Response($info, $res);
    }
}
