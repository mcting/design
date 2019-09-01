<?php


namespace MCTing\Design\IoC;


class User
{
    private $name;

    public function __construct(FileLog $name,$age = 0)
    {
        $this->name = $name;
    }

    public function run()
    {
        $this->name->write();
    }
}