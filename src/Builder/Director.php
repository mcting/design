<?php


namespace MCTing\Design\Builder;


class Director
{
    private $myBuilder;

    public function startBuild()
    {
        if ($this->myBuilder instanceof Builder) {
            $this->myBuilder->buildPartA();
            $this->myBuilder->buildPartB();
            $this->myBuilder->buildPartC();
            return $this->myBuilder->getResult();
        }
        return null;
    }

    public function setBuilder(Builder $builder)
    {
        $this->myBuilder = $builder;
    }
}