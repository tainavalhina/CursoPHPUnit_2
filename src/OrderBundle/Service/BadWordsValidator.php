<?php

namespace OrderBundle\Service;

use OrderBundle\Repository\BadWordsRepositoryInterface;

class BadWordsValidator
{
    private $badWordsRepository;

    public function __construct(BadWordsRepositoryInterface $badWordsRepository)
    {
        $this->badWordsRepository = $badWordsRepository;
    }

    public function hasBadWords($text)
    {
        //pega as palavras que estão cadastradas como palavroes no banco
        $allBadWords = $this->badWordsRepository->findAllAsArray();
        foreach ($allBadWords as $badWord) {
            if (strpos($text, $badWord) !== false) {
                return true;
            }
        }

        return false;
    }
}