<?php


namespace MCTing\Design\Proxy;


class RealImage implements ImageInterface
{
    private $fileName;

    public function __construct(string $fileName)
    {
        $this->fileName = $fileName;
        $this->loadFromDisk($this->fileName);
    }

    public function display(): void
    {
        echo "Displaying ", $this->fileName, PHP_EOL;
    }

    private function loadFromDisk(string $fileName)
    {
        echo "Loading ", $fileName, PHP_EOL;
    }
}