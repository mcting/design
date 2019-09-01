<?php


namespace MCTing\Design\Bridge;


class HelloWorldService extends Service
{
    public function get()
    {
        return $this->implementation->format('Hello World');
    }
}