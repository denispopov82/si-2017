<?php
class DataBase
{
    public function selectAll()
    {
        return [];
    }
}

class Model
{
    /**
     * @var DataBase
     */
    private $db;
    
    public function __constructor()
    {
        $this->db = new DataBase();
    }
    
    public function getAll()
    {
        return $this->db->selectAll();
    }
}
