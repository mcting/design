<?php


namespace MCTing\Design\Prototype;


class Prototype implements PrototypeInterface
{
    public function copy(): PrototypeInterface
    {
        //return clone $this;
        return unserialize(serialize($this));
    }
}