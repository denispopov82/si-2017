<?php

class A
{
    private $a; // скрытое свойство
    private $b; // скрытое свойство
    
    // закрытый метод
    private function doSomething()
    {
        //actions
    }
    
    //открытый интерфейс
    public function returnSomething()
    {
        // используется закрытый метод
        $this->doSomething();
        
        //actions
    }
}

$a = new A();
$a->returnSomething();
