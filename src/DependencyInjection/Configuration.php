<?php

declare(strict_types=1);

namespace Dbp\Relay\ExampleBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('dbp_relay_example');

        $treeBuilder->getRootNode()
            ->children()
                ->scalarNode('example_config')
                    ->defaultValue('42')
                ->end()
            ->end();

        return $treeBuilder;
    }
}
