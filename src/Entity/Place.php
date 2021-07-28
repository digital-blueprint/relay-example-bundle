<?php

declare(strict_types=1);

namespace Dbp\Relay\TemplateBundle\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Dbp\Relay\TemplateBundle\Controller\LoggedInOnly;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     collectionOperations={
 *         "get" = {
 *             "path" = "/template/places",
 *             "openapi_context" = {
 *                 "tags" = {"Template"},
 *             },
 *         }
 *     },
 *     itemOperations={
 *         "get" = {
 *             "path" = "/template/places/{identifier}",
 *             "openapi_context" = {
 *                 "tags" = {"Template"},
 *             },
 *         },
 *         "put" = {
 *             "path" = "/template/places/{identifier}",
 *             "openapi_context" = {
 *                 "tags" = {"Template"},
 *             },
 *         },
 *         "delete" = {
 *             "path" = "/template/places/{identifier}",
 *             "openapi_context" = {
 *                 "tags" = {"Template"},
 *             },
 *         },
 *         "loggedin_only" = {
 *             "security" = "is_granted('IS_AUTHENTICATED_FULLY')",
 *             "method" = "GET",
 *             "path" = "/template/places/{identifier}/loggedin-only",
 *             "controller" = LoggedInOnly::class,
 *             "openapi_context" = {
 *                 "summary" = "Only works when logged in.",
 *                 "tags" = {"Template"},
 *             },
 *         }
 *     },
 *     iri="https://schema.org/Place",
 *     shortName="TemplatePlace",
 *     normalizationContext={
 *         "groups" = {"TemplatePlace:output"},
 *         "jsonld_embed_context" = true
 *     },
 *     denormalizationContext={
 *         "groups" = {"TemplatePlace:input"},
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
     * @Groups({"TemplatePlace:output", "TemplatePlace:input"})
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
