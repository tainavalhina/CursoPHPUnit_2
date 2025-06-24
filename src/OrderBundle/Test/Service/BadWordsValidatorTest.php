<?php

namespace OrderBundle\Test\Service;

use OrderBundle\Repository\BadWordsRepository;
use OrderBundle\Service\BadWordsValidator;
use PHPUnit\Framework\TestCase;

class BadWordsValidatorTest extends TestCase
{
    /**
     * @test
     * @dataProvider badWordsDataProvider
     */
    public function hasBadWords($badWordsList, $text, $foundBadWords)
    {

        //stubs -> um stub cria um objeto falso, muito semelhante ao objeto real, 
        //mas sem funcionalidade, retornando valores fixos para usar no teste
        //
        $badWordsRepository = $this->createMock(BadWordsRepository::class);

        $badWordsRepository->method('findAllAsArray')
            ->willReturn($badWordsList); 

        $badWordsValidator = new BadWordsValidator($badWordsRepository);

        $hasBadWords = $badWordsValidator->hasBadWords($text);

        $this->assertEquals($foundBadWords, $hasBadWords);
    }

    public function badWordsDataProvider() 
    {
        return [
            'shouldFindWhenHasBadWords' => [
                'badWordsList' => ['bobo', 'chule', 'besta'],
                'text' => 'Seu restaurante e muito bobo',
                'foundBadWords' => true
            ],
            'shouldNotFindWhenHasNoBadWords' => [
                'badWordsList' => ['bobo', 'chule', 'besta'],
                'text' => 'Trocar batata por salada',
                'foundBadWords' => false
            ],
            'shouldNotFindWhenTextIsEmpty' => [
                'badWordsList' => ['bobo', 'chule', 'besta'],
                'text' => '',
                'foundBadWords' => false
            ],
            'shouldNotFindWhenBadWordsListIsEmpty' => [
                'badWordsList' => [],
                'text' => 'Seu restaurante e muito bobo',
                'foundBadWords' => false
            ]
        ];
    }
}