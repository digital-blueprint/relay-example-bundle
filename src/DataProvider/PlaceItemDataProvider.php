<?php

declare(strict_types=1);

namespace Dbp\Relay\ExampleBundle\DataProvider;

use ApiPlatform\Core\DataProvider\ItemDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use Dbp\Relay\ExampleBundle\Entity\Place;
use Dbp\Relay\ExampleBundle\Service\PlaceProviderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * This is an example of an item data provider that uses the PlaceProviderInterface to get the data for a single item.
 */
final class PlaceItemDataProvider extends AbstractController implements ItemDataProviderInterface, RestrictedDataProviderInterface
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

    public function getItem(string $resourceClass, $id, string $operationName = null, array $context = []): ?Place
    {
        return $this->api->getPlaceById($id);
    }
}
