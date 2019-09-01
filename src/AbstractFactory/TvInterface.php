<?php


namespace MCTing\Design\AbstractFactory;


interface TvInterface
{
    public function open(): void;

    public function use(): void;
}