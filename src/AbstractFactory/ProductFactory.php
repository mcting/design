<?php


namespace MCTing\Design\AbstractFactory;


class ProductFactory extends Factory
{
    public static function createTV(): TvInterface
    {
        return new HaierTv();
    }

    public static function createPc(): PcInterface
    {
        return new HuaweiPc();
    }
}