<?php
class Fobia_model
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function getAllDataFobia()
    {
        $query = "SELECT * FROM fobia";
        $this->db->query($query);
        $this->db->execute();
        return $this->db->result_set();
    }
}
