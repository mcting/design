<?php


namespace MCTing\Design\Adapter;


interface PaperBookInterface
{
    public function turnPage();

    public function open();

    public function getPage(): int;
}