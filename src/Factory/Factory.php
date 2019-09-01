<?php
/**
 * 通过定义一个抽象的核心工厂类，并定义创建产品对象的接口，创建具体产品实例的工作延迟到其工厂子类去完成。
 * 这样做的好处是核心类只关注工厂类的接口定义，而具体的产品实例交给具体的工厂子类去创建。
 * 当系统需要新增一个产品是，无需修改现有系统代码，只需要添加一个具体产品类和其对应的工厂子类，是系统的扩展性变得很好，符合面向对象编程的开闭原则;
 * -----------------------------------------------------------------------------
 * Product：抽象产品类
 * ConcreteProduct：具体产品类
 * Factory：抽象工厂类
 * ConcreteFactory：具体工厂类
 */

namespace MCTing\Design\Factory;


abstract class Factory
{
    abstract public function getLanguage(): LanguageInterface;
}