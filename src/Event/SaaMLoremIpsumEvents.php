<?php


namespace SaaM\LoremIpsumBundle\Event;


final class SaaMLoremIpsumEvents
{
    /**
     * Called directly before Lorem Ipsum Api is Retuned
     *
     * Listeners have the opportunity to change that data.
     *
     * @Event("SaaM\LoremIpsumBundle\Event\FilterApiResponseEvent")
     */
    const FILTER_API = 'saam_lorem_ipsum.filter_api';
}