<?php


namespace MCTing\Design\Builder;


class CarBuilder extends Builder
{
    function __construct()
    {
        $this->car = new Car();
    }
    public function buildPartA(){
        $this->car->setPartA('发动机');
    }

    public function buildPartB(){
        $this->car->setPartB('轮子');
    }

    public function buildPartC(){
        $this->car->setPartC('其他零件');
    }

    public function getResult(){
        return $this->car;
    }
}