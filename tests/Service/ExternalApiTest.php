<?php

declare(strict_types=1);

namespace Dbp\Relay\ExampleBundle\Tests\Service;

use Dbp\Relay\ExampleBundle\Service\ExternalApi;
use Dbp\Relay\ExampleBundle\Service\MyCustomService;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ExternalApiTest extends WebTestCase
{
    private $api;

    protected function setUp(): void
    {
        $service = new MyCustomService('test-42');
        $this->api = new ExternalApi($service);
    }

    public function test()
    {
        $this->assertTrue(true);
        $this->assertNotNull($this->api);
    }
}
