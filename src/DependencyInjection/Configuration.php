<?php

declare(strict_types=1);

namespace Dbp\Relay\TemplateBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('dbp_relay_template');

        $treeBuilder->getRootNode()
            ->children()
                ->scalarNode('example_config')
                    ->defaultValue('42')
                ->end()
            ->end();

        return $treeBuilder;
    }
}
