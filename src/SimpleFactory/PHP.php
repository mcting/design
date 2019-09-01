<?php


namespace MCTing\Design\SimpleFactory;


class PHP implements BookInterface
{
    public function getTitle()
    {
        echo "PHP", PHP_EOL;
    }
}