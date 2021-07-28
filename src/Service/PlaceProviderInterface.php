<?php

declare(strict_types=1);

namespace Dbp\Relay\TemplateBundle\Service;

use Dbp\Relay\TemplateBundle\Entity\Place;

interface PlaceProviderInterface
{
    public function getPlaceById(string $identifier): ?Place;

    public function getPlaces(): array;
}
