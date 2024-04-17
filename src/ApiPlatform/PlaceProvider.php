<?php

declare(strict_types=1);

namespace Dbp\Relay\ExampleBundle\ApiPlatform;

use ApiPlatform\Metadata\CollectionOperationInterface;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\Pagination\PartialPaginatorInterface;
use ApiPlatform\State\ProviderInterface;
use Dbp\Relay\CoreBundle\Rest\Query\Pagination\PartialPaginator;
use Dbp\Relay\ExampleBundle\Service\PlaceProviderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * This is an example of a  provider that uses the PlaceProviderInterface to get the data for a collection of items.
 *
 * @implements ProviderInterface<Place>
 */
final class PlaceProvider extends AbstractController implements ProviderInterface
{
    private $api;

    public function __construct(PlaceProviderInterface $api)
    {
        $this->api = $api;
    }

    /**
     * @return PartialPaginatorInterface<object>|iterable<mixed, object>|object|null
     */
    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {
        if ($operation instanceof CollectionOperationInterface) {
            $perPage = 30;
            $page = 1;

            $filters = $context['filters'] ?? [];
            if (isset($filters['page'])) {
                $page = (int) $filters['page'];
            }
            if (isset($filters['perPage'])) {
                $perPage = (int) $filters['perPage'];
            }

            return new PartialPaginator($this->api->getPlaces(), $page, $perPage);
        } else {
            $id = $uriVariables['identifier'];
            assert(is_string($id));

            return $this->api->getPlaceById($id);
        }
    }
}
