<?php


namespace MCTing\Design\Bridge;


class PlainTextFormatter implements FormatterInterface
{
    public function format(string $text): string
    {
        return $text;
    }
}