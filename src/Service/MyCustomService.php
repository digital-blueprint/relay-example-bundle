<?php

declare(strict_types=1);

namespace DBP\API\StarterBundle\Service;

class MyCustomService
{
    private $token;

    public function __construct(string $token)
    {
        $this->token = $token;
    }
}
