<?php

/**
 * 抽象工厂模式
 */
interface AnimalsFactory // 抽象工厂
{
    public function createCat(); // 生产一尾猫
    public function createDog(); // 生产一头狗
}
abstract class Cat  // 猫抽象
{
    abstract function getCat();
}
class ForeignCat extends Cat // 猫具体
{
    public function getCat()
    {
        return "外国布偶猫".PHP_EOL;
    }
}
class ChineseCat extends Cat
{
    public function getCat()
    {
        return "华夏猫".PHP_EOL;
    }
}

abstract class Dog
{
    abstract function getDog();
}
class ChineseDog extends Dog
{
    public function getDog()
    {
        return "中华国犬".PHP_EOL;
    }
}
class ForeignDog extends Dog
{
    public function getDog()
    {
        return "外国哈士奇".PHP_EOL;
    }
}

class CreateChineseAnimalFactory implements AnimalsFactory
{
    public function createCat()
    {
        return new ChineseCat();
    }
    public function createDog()
    {
        return new ChineseDog();
    }
}
class CreateForeignAnimalFactory implements AnimalsFactory
{
    public function createCat()
    {
        return new ForeignCat();
    }
    public function createDog()
    {
        return new ForeignDog();
    }
}

$result = new CreateForeignAnimalFactory();
$ForeignCat = $result->createCat();
echo $ForeignCat->getCat(); // 布偶猫

$ForeignDog = $result->createDog();
echo $ForeignDog->getDog(); // 哈士奇
