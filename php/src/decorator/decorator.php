<?php
//被装饰者基类
interface Component1{
    public function  operation();
}

//装饰者基类
abstract class Decorator implements Component1{
    protected $component;

    public function __construct(Component1 $component)
    {
        $this->component = $component;
    }

    public function operation()
    {
        $this->component->operation();
    }
}

//具体装饰者类
class ConcreteComponent implements Component1{
    public function operation(){
        return 'do operation';
    }
}
//具体装饰者a
class ConcreteDecoratorA extends Decorator{

    public function __construct(Component1 $component)
    {
        parent::__construct($component);
    }

    public function operation()
    {
        parent::operation();
        $this->addOperationA();
    }

    public function addOperationA(){
        return 'add operation a';
    }
}

//具体装饰者类b
class ConcreteDecoratorB extends Decorator{

    public function __construct(Component1 $component)
    {
        parent::__construct($component);
    }

    public function operation()
    {
        parent::operation();
        $this->addOperationB();
    }

    public function addOperationB(){
        echo 'add operation b';
    }
}

$decoratorA = new ConcreteDecoratorA(new ConcreteComponent());
$decoratorA->operation();