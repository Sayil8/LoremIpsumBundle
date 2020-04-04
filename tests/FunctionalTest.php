<?php


namespace SaaM\LoremIpsumBundle\Tests;


use PHPUnit\Framework\TestCase;
use SaaM\LoremIpsumBundle\SaaMIpsum;
use SaaM\LoremIpsumBundle\SaaMLoremIpsumBundle;
use SaaM\LoremIpsumBundle\WordProviderInterface;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\BundleInterface;
use Symfony\Component\HttpKernel\Kernel;

class FunctionalTest extends TestCase
{
    public function testServiceWiring()
    {

        $kernel = new SaaMLoremIpsumTestingKernel();
        $kernel->boot();
        $container = $kernel->getContainer();

        $ipsum = $container->get('saam_lorem_ipsum.saam_ipsum');
        $this->assertInstanceOf(SaaMIpsum::class, $ipsum);
        $this->assertIsString($ipsum->getParagraphs());


    }

}

class SaaMLoremIpsumTestingKernel extends Kernel
{
    public function __construct()
    {
        parent::__construct('test', true);
    }

    public function registerBundles()
    {
        return [
          new SaaMLoremIpsumBundle(),
        ];
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(function (ContainerBuilder $container){
            $container->register('stub_word_list', StubWordList::class)
                ->addTag('saam_ipsum_word_provider');
        });
    }

    public function getCacheDir()
    {
        return __DIR__.'/../var/cache/'.spl_object_hash($this);
    }


}

class StubWordList implements WordProviderInterface{
    public function getWordList(): array
    {
        return ['stub', 'stub2'];
    }
}

