<?php


namespace MCTing\Design\Adapter;


interface EBookInterface
{
    public function unlock();

    public function pressNext();

    public function getPage(): array;
}