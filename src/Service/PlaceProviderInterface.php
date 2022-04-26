<?php

declare(strict_types=1);

namespace Dbp\Relay\ExampleBundle\Service;

use Dbp\Relay\ExampleBundle\Entity\Place;

interface PlaceProviderInterface
{
    public function getPlaceById(string $identifier): ?Place;

    public function getPlaces(): array;
}
