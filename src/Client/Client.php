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

use PostNord\Exception\PostNordException;

/**
 * PostNord: client.
 *
 * @category  PostNord
 * @package   PostNord
 * @author    Lars Olesen <lars@intraface.dk>
 * @copyright 2014 Lars Olesen
 */
class Client
{
    /**
     * Request object.
     *
     * @var PostNord_Request
     */
    protected $request;

    /**
     * Construct a Billy Client with an API key and optionally an API version.
     *
     * @param PostNord_Request $request Request object
     */
    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * Get method
     *
     * @param string $url Url on the REST service
     *
     * @return PostNord_Response
     */
    public function get($url)
    {
        return $this->request->call('GET', $url);
    }

    /**
     * Get method
     *
     * @param string $url  Url on the REST service
     * @param array  $body Parameters for the request
     *
     * @return PostNord_Response
     */
    public function post($url, $body)
    {
        return $this->request->call('POST', $url, $body);
    }

    /**
     * Put method
     *
     * @param string $url  Url on the REST service
     * @param array  $body Parameters for the request
     *
     * @return PostNord_Response
     */
    public function put($url, $body)
    {
        return $this->request->call('PUT', $url, $body);
    }

    /**
     * Delete method
     *
     * @param string $url Url on the REST service
     *
     * @return PostNord_Response
     */
    public function delete($url)
    {
        return $this->request->call('DELETE', $url);
    }

    /**
     * Find nearest pickup places by zipcode.
     *
     * @param integer $zip_code Zip code
     *
     * @return stdClass with Service Points
     */
    public function findNearestByZipCode($zip_code)
    {
        $result = $this->request->call('GET', '', $zip_code);
        if (!empty($result->info['http_code']) && $result->info['http_code'] != 200) {
            throw new PostNordException(
                'Error with http_code: ' . $result->info['http_code']
            );
        }
        return $result->getBody()->servicePointInformationResponse->servicePoints;
    }
}
