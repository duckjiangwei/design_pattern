<?php

//颜色抽象类
abstract class Color
{
    abstract public function set();
}
//颜色具体类
class Blue extends Color
{
    public function set()
    {
        return '蓝色';
    }
}
//颜色具体类
class Red extends Color
{
    public function set()
    {
        return '红色';
    }
}

//形状抽象类
abstract class Shape
{
    public $color; //包含颜色

    public function __construct(Color $color)
    {
        $this->color = $color;
    }

    abstract public function show();
}
//形状具体类
class Square extends Shape
{
    public function show()
    {
        echo '这是一个正方形的' . $this->color->set() . '模型'. PHP_EOL;
        echo "--------------------------------------------------" . PHP_EOL;
    }
}
//形状具体类
class Circular extends Shape
{
    public function show()
    {
        echo '这是一个圆形的' . $this->color->set() . '模型'.PHP_EOL;
        echo "--------------------------------------------------".PHP_EOL;
    }
}



//造一个方形红色模型
$squareRedAlarm = new Square(new Red());
$squareRedAlarm->show();

//////造一个圆形蓝色模型
$circularBlue = new Circular(new Blue());
$circularBlue->show();
