<?php


namespace MCTing\Design\SimpleFactory;


class Java implements BookInterface
{
    public function getTitle()
    {
        echo "Java", PHP_EOL;
    }
}