<?php

declare(strict_types=1);

namespace Dbp\Relay\ExampleBundle\DataProvider;

use ApiPlatform\Core\DataProvider\CollectionDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use Dbp\Relay\CoreBundle\Helpers\ArrayFullPaginator;
use Dbp\Relay\ExampleBundle\Entity\Place;
use Dbp\Relay\ExampleBundle\Service\PlaceProviderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * This is an example of a collection data provider that uses the PlaceProviderInterface to get the data for a collection of items.
 */
final class PlaceCollectionDataProvider extends AbstractController implements CollectionDataProviderInterface, RestrictedDataProviderInterface
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
