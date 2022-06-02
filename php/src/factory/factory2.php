<?php

/**
 * 工厂方法模式，又称为工厂模式
 * 工厂父类负责定义创建产品对象的公共接口，而工厂子类则负责生成具体的产品对象
 * 目的是将产品类的实例化操作延迟到工厂子类中完成，即通过工厂子类来确定究竟应该实例化哪一个具体产品类
 */

 // 抽象产品类
abstract class animals 
{
    abstract public function animal();
}

// 具体产品类
class Cat extends animals 
{
    public function animal()
    {
        return "猫猫";
    }
}

class Dog extends animals // 具体产品类
{
    public function animal()
    {
        return "狗狗";
    }
}

// 抽象工厂类, 将对象的创建抽象成一个接口
interface Factory   
{
    public function create();
}
// 继承工厂类, 用于实例化产品
class CatFactory implements Factory  
{
    public function create()
    {
        return new Cat();
    }
}
// 继承工厂类, 用于实例化产品
class DogFactory implements Factory  
{
    public function create()
    {
        return new Dog();
    }
}
// 具体操作类
class Client   
{
    public function test()
    {
        $catResult = new CatFactory();
        echo $catResult->create()->animal();

        $DogResult = new DogFactory();
        echo $DogResult->create()->animal();
    }
}

$lala = new Client();
$lala->test(); //  猫猫狗狗