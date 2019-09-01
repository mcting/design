<?php


namespace MCTing\Design\Prototype;


interface PrototypeInterface
{
    public function copy(): PrototypeInterface;
}