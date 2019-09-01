<?php


namespace MCTing\Design\Factory;


class FileLoggerFactory implements LoggerFactoryInterface
{
    private $filePath;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    public function createLogger(): LoggerInterface
    {
        return new FileLogger($this->filePath);
    }
}