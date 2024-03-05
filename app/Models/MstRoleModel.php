<?php

use CodeIgniter\Model;

class MstRoleModel extends Model
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->tableMstRole = config('app')->mst_role;
    }
    // Retrieve all
    public function MdlSelect(): array
    {
        $sqlQuery = "select * from ".$this->tableMstRole;
        $query = $this->db->query($sqlQuery);
        return $query->getResultArray();
    }
    public function MdlSelectByActive(): array
    {
        $sqlQuery = "select * from ".$this->tableMstRole." where active = '1'";
        $query = $this->db->query($sqlQuery);
        return $query->getResultArray();
    }
}