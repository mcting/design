<?php


namespace MCTing\Design\AbstractFactory;


class HaierTv implements TvInterface
{
    public function open(): void
    {
        echo "Open Haier TV", PHP_EOL;
    }

    public function use(): void
    {
        echo "I'm watching TV", PHP_EOL;
    }
}