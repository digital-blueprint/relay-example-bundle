<?php

declare(strict_types=1);

namespace Dbp\Relay\ExampleBundle\DataPersister;

use ApiPlatform\Core\DataPersister\DataPersisterInterface;
use Dbp\Relay\ExampleBundle\Entity\Place;
use Dbp\Relay\ExampleBundle\Service\PlaceProviderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * This is an example of a data persister where you can persist data for example with the help of a service that implements the PlaceProviderInterface.
 */
class PlaceDataPersister extends AbstractController implements DataPersisterInterface
{
    private $api;

    public function __construct(PlaceProviderInterface $api)
    {
        $this->api = $api;
    }

    public function supports($data): bool
    {
        return $data instanceof Place;
    }

    public function persist($data): void
    {
        // TODO: Enable this if a user needs to be authenticated to persist data
//        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        // TODO: Enable this if a user needs to have a specific role to persist data
//        $this->denyAccessUnlessGranted('ROLE_SCOPE_EXAMPLE');

        $this->api->storePlace($data);
    }

    public function remove($data)
    {
        // TODO
    }
}
