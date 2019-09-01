<?php


namespace MCTing\Design\Factory;


class StdoutLogger implements LoggerInterface
{
    public function log(string $message)
    {
        echo $message, PHP_EOL;
    }
}