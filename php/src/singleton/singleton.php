<?php
/**
 * 单例好处：
 * 1. 减少频繁创建，节省了cpu
 * 2. 静态对象公用，节省了内存。
 * 3. 功能解耦，代码易维护。
 * 
 * 如何设计单例：
 * 1. 私有化构造函数，私有化clone。也就是不能new，不能clone。【唯一】
 * 2. 拥有一个静态变量，用于保存当前的类。【唯一如何保存】
 * 3. 提供一个公共的访问入口。【可以访问】
 */
class Singleton
{
    // 私有化构造方法
    private function __construct()
    {

    }

    // 私有化clone方法
    private function __clone()
    {

    }

    // 保存实例的静态对象
    public static $singleInstance;

    /**
     * 声明静态调用方法
     * 目的：保证该方法的调用全局唯一
     */
    public static function getInstance()
    {
        if (!self::$singleInstance) {
            self::$singleInstance = new self();
        }

        return self::$singleInstance;
    }


    // 调用单例的方法
    public function singletonFunc()
    {
        echo "call singleton method";
    }

}

$singleInstance = Singleton::getInstance();
$singleInstance->singletonFunc();

$singleInstance2 = Singleton::getInstance();
$singleInstance2->singletonFunc();

// 校验是否是一个实例
var_dump($singleInstance === $singleInstance2);  // true ，一个对象