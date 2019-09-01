<?php


namespace MCTing\Design\Factory;


interface LoggerFactoryInterface
{
    public function createLogger(): LoggerInterface;
}