<?php

declare(strict_types=1);

namespace Dbp\Relay\TemplateBundle\Controller;

use Dbp\Relay\TemplateBundle\Entity\Place;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class LoggedInOnly extends AbstractController
{
    public function __invoke(Place $data, Request $request): Place
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        return $data;
    }
}
