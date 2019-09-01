<?php


namespace MCTing\Design\AbstractFactory;


class HuaweiPc implements PcInterface
{
    public function work(): void
    {
        echo "I'm working on a Lenovo computer", PHP_EOL;
    }

    public function play(): void
    {
        echo "Lenovo computers can be used to play games", PHP_EOL;
    }
}