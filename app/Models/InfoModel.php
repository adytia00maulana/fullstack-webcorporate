<?php

use CodeIgniter\Model;

class InfoModel extends Model
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->table = config('app')->info;
    }

    public function getAllData(): array {
        $sqlQuery = "select * from ".$this->table;
        $query = $this->db->query($sqlQuery);
        return $query->getResultArray();
    }

    public function getById($id) {
        $sqlQuery = $this->db->table($this->table)->where('id', $id);
        return $sqlQuery->get()->getRow();
    }

    public function InsertData($data) {
        return $result = $this->db->table($this->table)->insert($data);
    }
    
    public function UpdateData($data, $id) {
        $result = $this->db->table($this->table)->where('id',$id)->update($data);
        return $result;
    }

}