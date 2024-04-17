<?php

declare(strict_types=1);

namespace Dbp\Relay\ExampleBundle\ApiPlatform;

use ApiPlatform\Metadata\DeleteOperationInterface;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\Metadata\Put;
use ApiPlatform\State\ProcessorInterface;
use Dbp\Relay\ExampleBundle\Service\PlaceProviderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * This is an example of a data processor where you can persist data for example with the help of a service that implements the PlaceProviderInterface.
 *
 * @psalm-suppress MissingTemplateParam
 */
class PlaceProcessor extends AbstractController implements ProcessorInterface
{
    private $api;

    public function __construct(PlaceProviderInterface $api)
    {
        $this->api = $api;
    }

    /**
     * @return Place|null
     */
    public function process($data, Operation $operation, array $uriVariables = [], array $context = [])
    {
        // TODO: Enable this if a user needs to be authenticated to persist data
        // $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        // TODO: Enable this if a user needs to have a specific role to persist data
        // $this->denyAccessUnlessGranted('ROLE_SCOPE_EXAMPLE');

        if ($operation instanceof DeleteOperationInterface) {
            // TODO
        } elseif ($operation instanceof Put) {
            $data->setIdentifier($uriVariables['identifier']);
            $this->api->storePlace($data);

            return $data;
        } else {
            $this->api->storePlace($data);
        }

        return null;
    }
}
