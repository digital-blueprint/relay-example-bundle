<?php

declare(strict_types=1);

namespace Dbp\Relay\ExampleBundle\ApiPlatform;

use Symfony\Component\Serializer\Annotation\Groups;

class Place
{
    /**
     * @Groups({"ExamplePlace:output"})
     */
    private $identifier;

    /**
     * @Groups({"ExamplePlace:output", "ExamplePlace:input"})
     *
     * @var string
     */
    private $name;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    public function setIdentifier(string $identifier): void
    {
        $this->identifier = $identifier;
    }
}
