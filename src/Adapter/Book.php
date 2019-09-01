<?php


namespace MCTing\Design\Adapter;


use MCTing\Design\SimpleFactory\BookInterface;

class Book implements PaperBookInterface
{
    private $page;

    public function open()
    {
        $this->page = 1;
    }

    public function turnPage()
    {
        $this->page++;
    }

    public function getPage(): int
    {
        return $this->page;
    }
}