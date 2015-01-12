<?php

namespace PostNord\Tests;

use PostNord\Client\PostNord_Client;
use PostNord\Client\PostNord_Request;

/**
 * Class ClientTest
 *
 * @package PostNord
 *
 * @covers PostNord_Request, PostNord_Client
 */
class ClientTest extends \PHPUnit_Framework_TestCase
{

    protected $api_key = '9d7adfc2-99f9-4509-9cfc-6a972ffbb8ae';
    protected $contactId;
    protected $organizationId;

    function getClient($key)
    {
        $request = new PostNord_Request($key);
        return new PostNord_Client($request);
    }

    function testConstructor()
    {
        $invalid_api_key = 'invalid';
        $client = $this->getClient($invalid_api_key);
        $this->assertTrue(is_object($client));
    }

    function testFindNearest()
    {
        $client = $this->getClient($this->api_key);
        $result = $client->findNearestByZipCode(7100);
        $this->assertEquals(12, count($result));
    }
}
