<?php

class MyIterator implements Iterator
{
    private $var = array();

    public function __construct($array)
    {
        if (is_array($array)) {
            $this->var = $array;
        }
    }

    public function rewind()
    {
        echo "倒回第一个元素\n";
        reset($this->var);
    }

    public function current()
    {
        $var = current($this->var);
        echo "当前元素: $var\n";
        return $var;
    }

    public function key()
    {
        $var = key($this->var);
        echo "当前元素的键: $var\n";
        return $var;
    }

    public function next()
    {
        $var = next($this->var);
        echo "移向下一个元素: $var\n";
        return $var;
    }


    public function valid()
    {
        $var = $this->current() !== false;
        echo "检查有效性: {$var}\n";
        return $var;
    }
}


$values = array(1, 2, 3);
$it = new MyIterator($values);
foreach ($it as $k => $v) {
    print "此时键值对 -- key $k: value $v\n\n";
}