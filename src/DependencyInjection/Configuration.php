<?php


namespace SaaM\LoremIpsumBundle\DependencyInjection;


use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{

    /**
     * @inheritDoc
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('saam_lorem_ipsum');
        $rootNode = $treeBuilder->getRootNode();
        $rootNode
            ->children()
            ->booleanNode('tacos_are_great')->defaultTrue()->info('Do you think tacos are the best')->end()
            ->integerNode('min_salsa')->defaultValue(3)->info('How much do you like salsa')->end()
            ->scalarNode('word_provider')->defaultNull()->info('Override this amazing mexican slang')->end()
            ->end()
        ;
         return $treeBuilder;
    }
}