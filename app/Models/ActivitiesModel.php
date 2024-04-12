<?php

use CodeIgniter\Model;

class ActivitiesModel extends Model
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->table = config('app')->tbl_activities;
    }

    // Retrieve all
    public function MdlSelect(): array
    {
        $sqlQuery = "select * from ".$this->table;
        $query = $this->db->query($sqlQuery);
        return $query->getResultArray();
    }

    // Retrieve New Activity
    public function MdlSelectNewActivity(): array
    {
        $sqlQuery = "select * from ".$this->table." order by id DESC LIMIT 0,5";
        $query = $this->db->query($sqlQuery);
        return $query->getResultArray();
    }

    // Retrieve By id
    public function MdlSelectByType($type): array
    {
        if(isset($type)){
            $sqlQuery = "select * from ". $this->table ." where type =".$type;
            $query = $this->db->query($sqlQuery);
        }
        return $query->getResultObject();
    }

    // Insert Data
    public function MdlInsert($body)
    {
        $now = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
        $timeStamp = $now->format("Y-m-d H:i:s");
        $data = $body;
        $data['id'] = 0;
        $data['created_date'] = $timeStamp;
        $result = $this->db->table($this->table)->insert($data);

        return $result;
    }
}