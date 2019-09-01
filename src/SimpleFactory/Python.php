<?php


namespace MCTing\Design\SimpleFactory;


class Python implements BookInterface
{
    public function getTitle()
    {
        echo "Python", PHP_EOL;
    }
}