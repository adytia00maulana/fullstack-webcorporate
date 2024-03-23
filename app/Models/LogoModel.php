<?php

use CodeIgniter\Model;

class LogoModel extends Model
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->table = config('app')->logo;
    }

    // Retrieve all
    public function MdlSelect(): array
    {
        $sqlQuery = "select * from ".$this->table;
        $query = $this->db->query($sqlQuery);
        return $query->getResultArray();
    }

    // Retrieve By id
    public function MdlSelectById($id): array
    {
        if(isset($id)){
            $sqlQuery = "select * from ". $this->table ." where id =".$id;
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
        $data['updated_by'] = "";
        $data['updated_date'] = "";
        $result = $this->db->table($this->table)->insert($data);

        return $result;
    }

    // Updated Data
    public function MdlUpdatedById($id, $body)
    {
        $now = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
        $timeStamp = $now->format("Y-m-d H:i:s");
        $data = $body;
        $data['updated_date'] = $timeStamp;
        $result = $this->db->table($this->table)->update($data, ['id' => $id]);

        return $result;
    }

    // Delete Data
    public function MdlDeleteById($id): void
    {
        $sqlQuery = "DELETE FROM ".$this->table." where id =".$id;
        $this->db->query($sqlQuery);
    }
}