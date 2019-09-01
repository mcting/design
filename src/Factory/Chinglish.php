<?php


namespace MCTing\Design\Factory;


class Chinglish implements LanguageInterface
{
    public function showLanguage(): void
    {
        echo "Chinglish", PHP_EOL;
    }
}