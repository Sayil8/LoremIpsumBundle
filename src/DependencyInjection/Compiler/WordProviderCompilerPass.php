<?php


namespace SaaM\LoremIpsumBundle\DependencyInjection\Compiler;


use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class WordProviderCompilerPass implements CompilerPassInterface
{

    public function process(ContainerBuilder $container)
    {
        $definition = $container->getDefinition('saam_lorem_ipsum.saam_ipsum');
        $refrences = array();
       foreach ($container->findTaggedServiceIds('saam_ipsum_word_provider') as $id => $tags){
           $refrences[ ] = new Reference($id);
       }

       $definition->setArgument(0, $refrences);
    }
}