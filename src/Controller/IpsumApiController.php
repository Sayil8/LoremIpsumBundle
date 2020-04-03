<?php


namespace SaaM\LoremIpsumBundle\Controller;
use SaaM\LoremIpsumBundle\Event\FilterApiResponseEvent;
use SaaM\LoremIpsumBundle\Event\SaaMLoremIpsumEvents;
use SaaM\LoremIpsumBundle\SaaMIpsum;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class IpsumApiController extends AbstractController
{

    private $saaMIpsum;
    private $eventDispatcher;

    public function __construct(SaaMIpsum $saaMIpsum, EventDispatcherInterface $eventDispatcher = null)
    {

        $this->saaMIpsum = $saaMIpsum;
        $this->eventDispatcher = $eventDispatcher;
    }

    public function index()
    {

        $data = [
            'paragraphs' => $this->saaMIpsum->getParagraphs(),
            'sentences' => $this->saaMIpsum->getSentences()
        ];


        $event = new FilterApiResponseEvent($data);
        if($this->eventDispatcher)
        {
            $this->eventDispatcher->dispatch($event, SaaMLoremIpsumEvents::FILTER_API);
        }

        return $this->json($event->getData());
    }

    
}