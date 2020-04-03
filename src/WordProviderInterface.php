<?php


namespace SaaM\LoremIpsumBundle;


interface WordProviderInterface
{

    /**
     * Rerturn an array of words to use as a fake text
     *
     * @return array
     *
     */
    public function getWordList(): array;
}