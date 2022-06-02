<?php
/**
 * 抽象生成器类
 */
interface Builder
{
    public function producePartA();

    public function producePartB();

    public function producePartC();

    public function producePartD();

    public function producePartE();
}

/**
 * 具体生成器类-造房子
 */
class HouseBuilder implements Builder
{
    private $house;

    public function setHouse(House $house)
    {
        $this->house = $house;
    }

    public function producePartA()
    {
        $this->house->room[] = 'pool';
    }

    public function producePartB()
    {
        $this->house->room[] = 'garden';
    }

    public function producePartC()
    {
        $this->house->room[] = 'kitchen';
    }

    public function producePartD()
    {
        $this->house->room[] = 'bedroom';
    }

    public function producePartE()
    {
        $this->house->room[] = 'toilet';
    }
}
/**
 * 另外一个具体生成器类-造电脑
 */
class ComputerBuilder implements Builder
{
    private $computer;

    public function setComputer(Computer $computer)
    {
        $this->computer = $computer;
    }

    public function producePartA()
    {
        $this->computer->spareParts[] = 'cpu';
    }

    public function producePartB()
    {
        $this->computer->spareParts[] = 'gpu';
    }

    public function producePartC()
    {
        $this->computer->spareParts[] = 'mouse';
    }

    public function producePartD()
    {
        $this->computer->spareParts[] = 'keyboard';
    }

    public function producePartE()
    {
        $this->computer->spareParts[] = 'ram';
    }
}

/**
 * 主管类-造房子，造电脑的步骤
 */
class Worker
{
    private $builder;

    public function setBuilder(Builder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * 造一个简陋的房子
     */
    public function humble()
    {
        $this->builder->producePartD();
    }

    /**
     * 造一个普通的房子
     */
    public function ordinary()
    {
        $this->builder->producePartD();
        $this->builder->producePartE();
    }

    /**
     * 造一个豪华的房子
     */
    public function luxury()
    {
        $this->builder->producePartA();
        $this->builder->producePartB();
        $this->builder->producePartC();
        $this->builder->producePartD();
        $this->builder->producePartE();
    }

    /**
     * 造一个电脑
     */
    public function computer()
    {
        $this->builder->producePartA();
        $this->builder->producePartB();
        $this->builder->producePartC();
        $this->builder->producePartD();
        $this->builder->producePartE();
    }
}

/**
 * 具体产品类-电脑
 */
class Computer
{
    public $spareParts = [];

    public function showSpareParts()
    {
        echo "这个电脑的零件有: " . implode(', ', $this->spareParts) . PHP_EOL . '';

        echo "--------------------------------------------------".PHP_EOL;
    }
}

/**
 * 具体的产品类-房子
 */
class House
{
    public $room = [];

    public function showRoom()
    {
        echo "这个房子的房间有: " . implode(', ', $this->room) . PHP_EOL . '';

        echo "--------------------------------------------------".PHP_EOL;
    }
}

/**
 * 客户端代码
 */
function Client(Worker $worker)
{
    //实例化一个生成器
    $builder = new HouseBuilder();

    echo "造一个简陋的房子:" . PHP_EOL;
    //实例化一个简陋的房子
    $humble = new House();
    //将房子注入生成器
    $builder->setHouse($humble);
    //将生成器注入主管类
    $worker->setBuilder($builder);
    //开始造房子
    $worker->humble();
    //展示房子
    $humble->showRoom();


    echo "造一个普通的房子:" . PHP_EOL;
    //实例化一个普通的房子
    $ordinary = new House();
    //将房子注入生成器
    $builder->setHouse($ordinary);
    //将生成器注入主管类
    $worker->setBuilder($builder);
    //开始造房子
    $worker->ordinary();
    //展示房子
    $ordinary->showRoom();

    echo "造一个豪华的房子:" . PHP_EOL;
    //实例化一个豪华的房子
    $luxury = new House();
    //将房子注入生成器
    $builder->setHouse($luxury);
    //将生成器注入主管类
    $worker->setBuilder($builder);
    //开始造房子
    $worker->luxury();
    //展示房子
    $luxury->showRoom();


//    实例化一个电脑生成器
    $builder = new ComputerBuilder();
    echo "造一个电脑:" . PHP_EOL;
    //实例化一个电脑
    $computer = new Computer();
    //将电脑注入生成器
    $builder->setComputer($computer);
    //将生成器注入主管类
    $worker->setBuilder($builder);
    //开始造电脑
    $worker->computer();
    //展示电脑
    $computer->showSpareParts();
}

$worker = new Worker();

Client($worker);
