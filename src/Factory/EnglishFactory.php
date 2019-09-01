<?php


namespace MCTing\Design\Factory;


class EnglishFactory extends Factory
{
    public function getLanguage(): LanguageInterface
    {
        return new English();
    }
}