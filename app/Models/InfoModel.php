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

    public function getById($id): array {
        $sqlQuery = $this->db->table($this->table)->where('id', $id);
        return $sqlQuery->get()->getResultArray();
    }

    public function InsertData($data) {
        return $result = $this->db->table($this->table)->insert($data);
    }

}