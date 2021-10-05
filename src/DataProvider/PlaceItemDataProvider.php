<?php

declare(strict_types=1);

namespace Dbp\Relay\TemplateBundle\DataProvider;

use ApiPlatform\Core\DataProvider\ItemDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use Dbp\Relay\TemplateBundle\Entity\Place;
use Dbp\Relay\TemplateBundle\Service\PlaceProviderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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
