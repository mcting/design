<?php


namespace MCTing\Design\Singleton;


class Singleton
{
    private static $instance;

    private function __construct()
    {
    }

    public function getInstance(): Singleton
    {
        if (!self::$instance)
            self::$instance = new self();
        return self::$instance;
    }

    private function __clone()
    {

    }

    public function say(): void
    {
        echo "这是用单例模式创建对象实例";
    }

    public function operation(): void
    {
        echo "这里可以添加其他方法和操作";
    }
}