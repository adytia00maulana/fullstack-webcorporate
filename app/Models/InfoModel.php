<?php

use CodeIgniter\Model;

class InfoModel extends Model
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->table = config('app')->info;
    }

    public function getAllData(): array
    {
        $sqlQuery = "select * from ".$this->table;
        $query = $this->db->query($sqlQuery);
        return $query->getResultArray();
    }

}