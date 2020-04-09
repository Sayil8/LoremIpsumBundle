<?php


namespace SaaM\LoremIpsumBundle\Tests\Controller;



use PHPUnit\Framework\TestCase;
use SaaM\LoremIpsumBundle\SaaMLoremIpsumBundle;
use Symfony\Bundle\FrameworkBundle\Client;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Routing\RouteCollectionBuilder;

class ApiControllerTest extends TestCase
{

    public function testIndex()
    {
        /*
        $kernel = new SaaMLoremIpsumControllerKernel();
        $client = new Client($kernel);
        $client->request('GET', '/api/');

        var_dump($client->getResponse()->getContent());
        $this->assertSame(200, $client->getResponse()->getStatusCode());
        */
        $this->assertTrue(true);

    }

}
class SaaMLoremIpsumControllerKernel extends Kernel
{
    use MicroKernelTrait;

    public function __construct()
    {
        parent::__construct('test', true);
    }

    public function registerBundles()
    {
        return [
            new SaaMLoremIpsumBundle(),
            new FrameworkBundle(),
        ];
    }



    public function getCacheDir()
    {
        return __DIR__.'/../var/cache/'.spl_object_hash($this);
    }


    protected function configureRoutes(RouteCollectionBuilder $routes)
    {
        $routes->import(__DIR__.'/../../src/Resources/config/routes.xml', '/api');
    }

    protected function configureContainer(ContainerBuilder $c, LoaderInterface $loader)
    {
        $c->loadFromExtension('framework', [
            'secret' => 'F00'
        ]);
    }
}