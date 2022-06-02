<?php

//原始的类
class Target
{
    public function request(): string
    {
        return "Target: The default target's behavior.";
    }
}

//转接头
class Adaptee
{
    public function specificRequest(): string
    {
        return ".eetpadA eht fo roivaheb laicepS";
    }
}

//适配器类：把转接头传进去，每次换转接头就好了。
class Adapter extends Target
{
    private $adaptee;

    public function __construct(Adaptee $adaptee)
    {
        $this->adaptee = $adaptee;
    }

    //重写父类的方法
    public function request(): string
    {
        return "Adapter: (TRANSLATED) " . strrev($this->adaptee->specificRequest());
    }
}

function clientCode(Target $target)
{
    echo $target->request();
}

echo "Client: I can work just fine with the Target objects:\n";
$target = new Target();
clientCode($target);
echo "\n\n";

//生成一个转接头对象
$adaptee = new Adaptee();
echo "Client: The Adaptee class has a weird interface. See, I don't understand it:\n";
echo "Adaptee: " . $adaptee->specificRequest();
echo "\n\n";


echo "Client: But I can work with it via the Adapter:\n";
//把转接头对象传到适配器类
$adapter = new Adapter($adaptee);
clientCode($adapter);