<?php

declare(strict_types=1);

namespace Dbp\Relay\ExampleBundle\ApiPlatform;

use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Put;
use ApiPlatform\OpenApi\Model\Operation;
use Symfony\Component\Serializer\Annotation\Groups;

#[ApiResource(
    shortName: 'ExamplePlace',
    types: ['https://schema.org/Place'],
    operations: [
        new GetCollection(
            uriTemplate: '/example/places',
            openapi: new Operation(
                tags: ['Example']
            ),
            provider: PlaceProvider::class
        ),
        new Get(
            uriTemplate: '/example/places/{identifier}',
            openapi: new Operation(
                tags: ['Example']
            ),
            provider: PlaceProvider::class
        ),
        new Put(
            uriTemplate: '/example/places/{identifier}',
            openapi: new Operation(
                tags: ['Example']
            ),
            provider: PlaceProvider::class,
            processor: PlaceProcessor::class
        ),
        new Delete(
            uriTemplate: '/example/places/{identifier}',
            openapi: new Operation(
                tags: ['Example']
            ),
            provider: PlaceProvider::class,
            processor: PlaceProcessor::class
        ),
        new Get(
            uriTemplate: '/example/places/{identifier}/loggedin-only',
            controller: LoggedInOnly::class,
            openapi: new Operation(
                tags: ['Example'],
                summary: 'Only works when logged in.'
            ),
            security: "is_granted('IS_AUTHENTICATED_FULLY')",
            name: 'loggedin_only',
            provider: PlaceProvider::class
        ),
    ],
    normalizationContext: [
        'groups' => ['ExamplePlace:output'],
    ],
    denormalizationContext: [
        'groups' => ['ExamplePlace:input'],
    ]
)]
class Place
{
    #[ApiProperty(identifier: true)]
    #[Groups(['ExamplePlace:output'])]
    private $identifier;

    /**
     * @var string
     */
    #[ApiProperty(iris: ['https://schema.org/name'])]
    #[Groups(['ExamplePlace:output', 'ExamplePlace:input'])]
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
