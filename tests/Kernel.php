<?php

declare(strict_types=1);

namespace DBP\API\StarterBundle\Tests;

use ApiPlatform\Core\Bridge\Symfony\Bundle\ApiPlatformBundle;
use DBP\API\CoreBundle\DbpCoreBundle;
use DBP\API\StarterBundle\DbpStarterBundle;
use Nelmio\CorsBundle\NelmioCorsBundle;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Bundle\SecurityBundle\SecurityBundle;
use Symfony\Bundle\TwigBundle\TwigBundle;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Symfony\Component\Routing\RouteCollectionBuilder;

class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    public function registerBundles(): iterable
    {
        yield new FrameworkBundle();
        yield new SecurityBundle();
        yield new TwigBundle();
        yield new NelmioCorsBundle();
        yield new ApiPlatformBundle();
        yield new DbpStarterBundle();
        yield new DbpCoreBundle();
    }

    protected function configureRoutes(RouteCollectionBuilder $routes)
    {
        $routes->import('@DbpCoreBundle/Resources/config/routing.yaml');
    }

    protected function configureContainer(ContainerBuilder $c, LoaderInterface $loader)
    {
        $c->loadFromExtension('framework', [
            'test' => true,
            'secret' => '',
        ]);

        $c->loadFromExtension('dbp_starter', [
            'secret_token' => 'secret-test',
        ]);
    }
}
