<?php

/**
 * SOLID
 * D - принцип инверсии зависимостей
 * Dependency Inversion Principle, DIP
 * Абстракции не должны зависить от деталей. А детали не должны зависеть от абстракций.
 */
class lowRankingMale
{
    /**
     * очень сильная зависимость от стороннего класса - Wife
     * если изменится класс Wife и будут обязательные параметры - придется менять и здесь.
     */
    public function eat()
    {
        $wife = new Wife();
        $food = $wife->getFood();
        // ...
    }
}

class averageRankingMale
{
    private $wife;
    
    /**
     * averageRankingMale constructor.
     * экземпляр класса приходит извне. Но все равно существует зависимость от конкретного класса Wife
     *
     * @param Wife $wife
     */
    public function __construct(Wife $wife)
    {
        $this->wife = $wife;
    }
    
    public function eat()
    {
        $food = $this->wife->getFood();
        // ...
    }
}

class highRankingMale
{
    private $foodProvider;
    
    /**
     * highRankingMale constructor.
     * Сюда может придти как обьект класса Wife, так и обьект класса Restaurant. У обоих есть getFood.
     * Зависимость построена на интерфейсе, а не конкретном классе.
     *
     * @param IFoodProvider $foodProvider
     */
    public function __construct(IFoodProvider $foodProvider)
    {
        $this->foodProvider = $foodProvider;
    }
    
    public function eat()
    {
        $this->foodProvider->getFood();
        // ...
    }
}
