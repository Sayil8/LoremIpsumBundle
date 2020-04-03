<?php


namespace SaaM\LoremIpsumBundle;


use SaaM\LoremIpsumBundle\DependencyInjection\Compiler\WordProviderCompilerPass;
use SaaM\LoremIpsumBundle\DependencyInjection\SaaMLoremIpsumExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class SaaMLoremIpsumBundle extends Bundle
{
    public function getContainerExtension()
    {
        if(null === $this->extension){
            $this->extension = new SaaMLoremIpsumExtension();
        }

        return $this->extension;
    }

    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new WordProviderCompilerPass());
    }
}