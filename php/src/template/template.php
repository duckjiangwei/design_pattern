<?php

//先定义一个模板
abstract class Phone
{
    /**
     * 定义操作顺序
     */
    final public function action()
    {
        $this->powerOn();
        $this->showLogo();
        $this->palyGame();
    }

    /**
     * 开机
     */
    protected function powerOn()
    {
        echo '开机' . '<br>';
    }

    /**
     * logo
     *
     * @return mixed
     */
    abstract protected function showLogo();

    /**
     * 打农药
     */
    protected function palyGame()
    {
        echo 'TIMI' . '<br>';
    }
}
//华为手机
class HuaWeiPhone extends Phone
{
    protected function showLogo()
    {
        echo '华为logo' . '<br>';
    }
}
//小米手机
class XiaoMiPhone extends Phone
{
    protected function showLogo()
    {
        echo '小米logo' . '<br>';
    }
}
//客户端调用
class Client
{
    public static function run()
    {
        $xiaomi = new XiaoMiPhone();
        $xiaomi->action();

        echo '<hr>';

        $huawei = new HuaWeiPhone();
        $huawei->action();
    }
}

Client::run();