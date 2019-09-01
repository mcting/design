<?php


namespace MCTing\Design\Factory;


class English implements LanguageInterface
{

    public function showLanguage():void
    {
        echo "English", PHP_EOL;
    }
}