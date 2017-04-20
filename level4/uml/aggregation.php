<?php
class Person
{
    public function selectAll()
    {
        return [];
    }
}

class Model
{
    /**
     * @var Person
     */
    private $person;
    
    public function __constructor(Person $person)
    {
        $this->person = $person;
    }
    
    public function getAll()
    {
        return $this->person->selectAll();
    }
}

class AnotherModel
{
    private $persons;
    
    public function setPerson(Person $person)
    {
        $this->persons[] = $person;
    }
    
    public function getAll()
    {
        /**
         * @var $person Person
         */
        foreach ($this->persons as $person) {
            $person->selectAll();
        }
    }
}
