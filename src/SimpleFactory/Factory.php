<?php
/**
 * 又称为静态工厂方法(Static Factory Method)模式，它属于类创建型模式。
 * 在简单工厂模式中，可以根据参数的不同返回不同类的实例。
 * 简单工厂模式专门定义一个类来负责创建其他类的实例，被创建的实例通常都具有共同的父类。
 * ---------------------------------------------------------------
 * Factory类：负责创建具体产品的实例
 * Product类：抽象产品类，定义产品子类的公共接口
 * ConcreteProduct 类：具体产品类，实现Product父类的接口功能，也可添加自定义的功能
 */

namespace MCTing\Design\SimpleFactory;


class Factory
{
    /**
     * @param string $language
     * @return BookInterface
     */
    public static function chooseBook(string $language): BookInterface
    {
        switch (strtolower($language)) {
            case "php":
                return new PHP();
            case "java":
                return new Java();
            case "python":
                return new Python();
        }
    }
}