<?php

//观察者接口
Interface Observer
{
    public function update();
}

//被观察者接口
Interface Subject
{
    //增加观察者方法
    public function addObserver(Observer $observer);

    //删除观察者方法
    public function delObserver(Observer $observer);

    //通知所有观察者
    public function notifyObservers();
}

//具体观察者1
class Android implements Observer
{
    public function update()
    {
        var_dump('安卓端成功接收新闻');
    }
}
//具体观察者2
class IOS implements Observer
{
    public function update()
    {
        var_dump('iOS端成功接收新闻');
    }
}

//具体的被观察者
class Server implements Subject
{

    //定义一个观察者数组
    private $observers = array();

    //增加观察者
    public function addObserver(Observer $observer)
    {
        $this->observers[] = $observer;
        var_dump('新增一个观察者');
    }

    //剔除观察者
    public function delObserver(Observer $observer)
    {
        //判断是否有该观察者存在
        $key = array_search($observer, $this->observers);
        if ($observer === $this->observers[$key]) {
            unset($this->observers[$key]);
            var_dump('删除一个观察者');
        } else {
            var_dump('这个观察者不存在');
        }
    }

    //通知观察者
    public function notifyObservers()
    {
        foreach ($this->observers as $observer) {
            $observer->update();
        }
    }

    //具体被观察者业务,发布一条新闻,四端接收.
    public function publish()
    {
        var_dump('编辑发布了一篇新闻');
        $this->notifyObservers();
    }
}

$server = new Server();
//新增观察者
$server->addObserver(new Android());
$server->addObserver(new IOS());

//发布新闻
$server->publish();
