<?php

use CodeIgniter\Model;

class MstUserModel extends Model
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    // Retrieve all
    public function MdlSelect()
    {
        $table = config('app')->mst_users;
        $sqlQuery = "SELECT * FROM mst_users";
        return $this->db->query($sqlQuery);
    }
}