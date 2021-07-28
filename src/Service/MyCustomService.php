<?php

declare(strict_types=1);

namespace Dbp\Relay\TemplateBundle\Service;

class MyCustomService
{
    private $token;

    public function __construct(string $token)
    {
        $this->token = $token;
    }
}
