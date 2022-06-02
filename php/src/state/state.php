<?php
/**
 * 状态模式
 * 类的行为是基于它的状态改变的。
 * 属于行为型模式。
 *
 * 角色:
 * 1)抽象状态
 * 2)具体状态
 * 3)环境上下文(调用状态)
 */

/**
 * 抽象状态类
 */
abstract class State
{
    abstract function doAction(Computer $computer);
}


/**
 * 具体状态类(开机)
 */
class PowerOn extends State{
    private $currentState = '开机';
    public function doAction(Computer $computer)
    {
        echo "你好";
        $computer->setState($this->currentState);
    }
}

/**
 * 具体状态类(关机)
 */
class PowerOff extends State{
    private $currentState = '关机';
    public function doAction(Computer $computer)
    {
        echo "再见";
        $computer->setState($this->currentState);
    }
}

/**
 * 具体状态类(重启)
 */
class Reboot extends State{
    private $currentState = '重启';
    public function doAction(Computer $computer)
    {
        echo "请稍后";
        $computer->setState($this->currentState);
    }
}
/**
 * 环境类(电脑进行操作)
 */
class Computer{
    private $state;
    public function __construct()
    {
        $state = null;
    }
    public function setState($_state)
    {
        $this->state = $_state;
    }
    public function getState()
    {
        return $this->state;
    }
}

$computer = new Computer();
$open = new PowerOn();
$open->doAction($computer);
echo "({$computer->getState()})"."<br>";

$close = new PowerOff();
$close->doAction($computer);
echo "({$computer->getState()})"."<br>";

$restart = new Reboot();
$restart->doAction($computer);
echo "({$computer->getState()})"."<br>";

/**
 * 优点:
 * 1)避免了过多的条件分支判断。
 * 2)将与特定状态相关的代码放在单独的类中,符合单一职责原则。
 * 缺点：
 * 1)增加系统类和对象的个数，特别是状态类别比较多的时候。
 * 2}实现和结构比较复杂，使用不当会导致程序结构和代码的混乱。
 */
