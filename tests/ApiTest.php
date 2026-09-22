<?php

declare(strict_types=1);

namespace Dbp\Relay\ExampleBundle\Tests;

use Dbp\Relay\CoreBundle\TestUtils\ApiTestCase;
use Symfony\Component\HttpFoundation\Response;

class ApiTest extends ApiTestCase
{
    public function setUp(): void
    {
        $this->createTestClient();
        $this->login();
    }

    /**
     * You can test some basic api functionality here.
     */
    public function testBasics()
    {
        $client = $this->testClient;
        $response = $client->request('GET', '/example/places');
        $this->assertSame(Response::HTTP_OK, $response->getStatusCode());

        $response = $client->request('GET', '/example/places/graz');
        $this->assertSame(Response::HTTP_OK, $response->getStatusCode());

        $response = $client->request('DELETE', '/example/places/graz');
        $this->assertSame(Response::HTTP_NO_CONTENT, $response->getStatusCode());

        $response = $client->request('PUT', '/example/places/graz', [
            'headers' => [
                'Content-Type' => 'application/ld+json',
            ],
            'body' => json_encode(['name' => 'foo']),
        ]);
        $this->assertSame(Response::HTTP_OK, $response->getStatusCode());
        $this->assertSame('foo', json_decode($response->getContent(), true)['name']);
    }

    /**
     * Test if you can access the api without a user.
     */
    public function testNoAuth()
    {
        $client = $this->testClient;
        $response = $client->request('GET', '/example/places/graz/loggedin-only', token: null);
        $this->assertSame(Response::HTTP_UNAUTHORIZED, $response->getStatusCode());
    }
}
