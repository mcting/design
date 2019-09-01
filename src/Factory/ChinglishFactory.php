<?php


namespace MCTing\Design\Factory;


class ChinglishFactory extends Factory
{
    public function getLanguage(): LanguageInterface
    {
        return new Chinglish();
    }
}