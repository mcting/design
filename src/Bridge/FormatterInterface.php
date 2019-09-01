<?php


namespace MCTing\Design\Bridge;


interface FormatterInterface
{
    public function format(string $text): string;
}