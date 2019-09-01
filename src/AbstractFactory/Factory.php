<?php


namespace MCTing\Design\AbstractFactory;


abstract class Factory
{
    abstract public static function createPc(): PcInterface;

    abstract public static function createTv(): TvInterface;
}