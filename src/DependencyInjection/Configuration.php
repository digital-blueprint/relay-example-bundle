<?php

declare(strict_types=1);

namespace DBP\API\StarterBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('dbp_starter');

        $treeBuilder->getRootNode()
            ->children()
            ->scalarNode('secret_token')->end()
            ->end()
            ->end();

        return $treeBuilder;
    }
}
