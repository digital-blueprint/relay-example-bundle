<?php

declare(strict_types=1);

namespace Dbp\Relay\ExampleBundle\ApiPlatform;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

/**
 * This is an example controller that only allows logged-in users to access it.
 */
class LoggedInOnly extends AbstractController
{
    public function __invoke(Place $data, Request $request): Place
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        return $data;
    }
}
