<?php

use CodeIgniter\Model;

class MstUserModel extends Model
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->tableMstUsers = config('app')->mst_users;
    }
    // Retrieve all
    public function MdlSelect(): array
    {
        $sqlQuery = "select * from ".$this->tableMstUsers;
        $query = $this->db->query($sqlQuery);
        return $query->getResultArray();
    }
    public function MdlSelectByActive(): array
    {
        $sqlQuery = "select * from ".$this->tableMstUsers." where active = '1'";
        $query = $this->db->query($sqlQuery);
        return $query->getResultArray();
    }
}