<?php

/**
 * 简单工厂模式
 */

 // 抽象产品角色
interface animals 
{
    public function animal();
}
// 具体产品角色
class Cat implements animals 
{
    public function animal()
    {
        return "猫猫";
    }
}
// 具体产品角色
class Dog implements animals 
{
    public function animal()
    {
        return "狗狗";
    }
}
// 工厂角色
class Factory 
{
    public static function createAnimal($param)
    {
        $result = null;
        switch($param)
        {
            case 'cat':
                $result = new Cat();
                break;
            case 'dog':
                $result = new Dog();
                break;
        }
        return $result;
    }
}
echo  Factory::createAnimal("cat")->animal(); // 猫猫
echo  Factory::createAnimal("dog")->animal(); // 狗狗