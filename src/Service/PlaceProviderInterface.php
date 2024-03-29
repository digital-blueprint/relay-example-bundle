<?php

declare(strict_types=1);

namespace Dbp\Relay\ExampleBundle\Service;

use Dbp\Relay\ExampleBundle\ApiPlatform\Place;

interface PlaceProviderInterface
{
    public function getPlaceById(string $identifier): ?Place;

    public function getPlaces(): array;

    public function storePlace(Place $place): void;
}
