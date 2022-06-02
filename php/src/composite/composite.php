<?php

interface Component {
    //开火
    public function fire();
    //增加兵力
    public function add(Component $component);
    //削减兵力
    public function remove(Component $component);
    //展示所有下级
//    public function getSubordinate();
}

/**
 * 军官类
 */
class Officer implements Component
{
    private $_name;
    private $subordinate = [];

    public function __construct($name)
    {
        $this->_name = $name;
    }

    //开火
    public function fire()
    {
        echo $this->_name.':开炮'. "<br>";
        foreach ($this->subordinate as $subordinate) {

            $subordinate->fire();
        }
    }

    //增加兵力
    public function add(Component $component)
    {
        $this->subordinate[] = $component;
    }

    //削减兵力
    public function remove(Component $component)
    {
        foreach ($this->subordinate as $key => $row) {
            if ($component == $row) {
                unset($this->subordinate[$key]);
                return true;
            }
        }
        return false;
    }

    //展示所有下级
//    public function getSubordinate()
//    {
//        return $this->subordinate;
//    }

}

/**
 * 士兵类-最基础的类，只有一个 fire 的方法
 */
class Soldiers implements Component
{
    private $_name;

    public function __construct($name)
    {
        $this->_name = $name;
    }

    public function fire()
    {
        echo $this->_name . ":biubiubiu!" . "<br>";
    }

    public function add(Component $component)
    {
        return false;
    }

    public function remove(Component $component)
    {
        return false;
    }

//    public function getSubordinate()
//    {
//        return false;
//    }
}


class War{
    public static function main(){
        //来了2个小兵参军
        $soldiers1 = new Soldiers('魏和尚');
        $soldiers2 = new Soldiers('张大彪');

        //任命一个团长
        $Officer1 = new Officer('李云龙');
        //把小兵分配给团长
        $Officer1->add($soldiers1);
        $Officer1->add($soldiers2);
        //李云龙打平安县
        $Officer1->fire();
        //魏和尚战死了
        $Officer1->remove($soldiers1);

        echo '<hr>';

        //任命一个师长
        $Officer2 = new Officer('刘伯承');
//        //把独立团分配给师长
        $Officer2->add($Officer1);
//        //打仗
        $Officer2->fire();
    }
}

War::main();