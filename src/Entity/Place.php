<?php

declare(strict_types=1);

namespace Dbp\Relay\ExampleBundle\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Dbp\Relay\ExampleBundle\Controller\LoggedInOnly;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     collectionOperations={
 *         "get" = {
 *             "path" = "/example/places",
 *             "openapi_context" = {
 *                 "tags" = {"Example"},
 *             },
 *         }
 *     },
 *     itemOperations={
 *         "get" = {
 *             "path" = "/example/places/{identifier}",
 *             "openapi_context" = {
 *                 "tags" = {"Example"},
 *             },
 *         },
 *         "put" = {
 *             "path" = "/example/places/{identifier}",
 *             "openapi_context" = {
 *                 "tags" = {"Example"},
 *             },
 *         },
 *         "delete" = {
 *             "path" = "/example/places/{identifier}",
 *             "openapi_context" = {
 *                 "tags" = {"Example"},
 *             },
 *         },
 *         "loggedin_only" = {
 *             "security" = "is_granted('IS_AUTHENTICATED_FULLY')",
 *             "method" = "GET",
 *             "path" = "/example/places/{identifier}/loggedin-only",
 *             "controller" = LoggedInOnly::class,
 *             "openapi_context" = {
 *                 "summary" = "Only works when logged in.",
 *                 "tags" = {"Example"},
 *             },
 *         }
 *     },
 *     iri="https://schema.org/Place",
 *     shortName="ExamplePlace",
 *     normalizationContext={
 *         "groups" = {"ExamplePlace:output"},
 *         "jsonld_embed_context" = true
 *     },
 *     denormalizationContext={
 *         "groups" = {"ExamplePlace:input"},
 *         "jsonld_embed_context" = true
 *     }
 * )
 */
class Place
{
    /**
     * @ApiProperty(identifier=true)
     */
    private $identifier;

    /**
     * @ApiProperty(iri="https://schema.org/name")
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
