<?php

declare(strict_types=1);

namespace Dbp\Relay\TemplateBundle\DataPersister;

use ApiPlatform\Core\DataPersister\DataPersisterInterface;
use Dbp\Relay\TemplateBundle\Entity\Place;
use Dbp\Relay\TemplateBundle\Service\PlaceProviderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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

    public function persist($data)
    {
        // TODO
    }

    public function remove($data)
    {
        // TODO
    }
}
