<?php

declare(strict_types=1);

namespace Dbp\Relay\TemplateBundle\DataProvider;

use ApiPlatform\Core\DataProvider\CollectionDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use DBP\API\CoreBundle\Helpers\ArrayFullPaginator;
use Dbp\Relay\TemplateBundle\Entity\Place;
use Dbp\Relay\TemplateBundle\Service\PlaceProviderInterface;

final class PlaceCollectionDataProvider implements CollectionDataProviderInterface, RestrictedDataProviderInterface
{
    private $api;

    public function __construct(PlaceProviderInterface $api)
    {
        $this->api = $api;
    }

    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        return Place::class === $resourceClass;
    }

    public function getCollection(string $resourceClass, string $operationName = null, array $context = []): ArrayFullPaginator
    {
        $perPage = 30;
        $page = 1;

        $filters = $context['filters'] ?? [];
        if (isset($filters['page'])) {
            $page = (int) $filters['page'];
        }
        if (isset($filters['perPage'])) {
            $perPage = (int) $filters['perPage'];
        }

        return new ArrayFullPaginator($this->api->getPlaces(), $page, $perPage);
    }
}
