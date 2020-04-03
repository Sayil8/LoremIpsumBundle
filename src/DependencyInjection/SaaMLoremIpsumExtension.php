<?php

namespace SaaM\LoremIpsumBundle\DependencyInjection;

use SaaM\LoremIpsumBundle\DependencyInjection\Compiler\WordProviderCompilerPass;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class SaaMLoremIpsumExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        //var_dump($configs);die;
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');

        $configuration = $this->getConfiguration($configs, $container);
        $cofig = $this->processConfiguration($configuration, $configs);

        $definition = $container->getDefinition('saam_lorem_ipsum.saam_ipsum');
        $definition->setArgument(1, $cofig['tacos_are_great']);
        $definition->setArgument(2, $cofig['min_salsa']);

        $container->registerForAutoconfiguration(WordProviderCompilerPass::class)
            ->addTag('saam_ipsum_word_provider');
    }

    public function getAlias()
    {
        return 'saam_lorem_ipsum';
    }


}