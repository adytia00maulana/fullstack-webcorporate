<?php

use CodeIgniter\Model;

class GalleryModel extends Model
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->table = config('app')->gallery;
    }

    // Retrieve all
    public function MdlSelect(): array
    {
        // $sqlQuery = "select * from ".$this->table;
        $sqlQuery = "SELECT * FROM ". $this->table ." ORDER BY position asc;";
        $query = $this->db->query($sqlQuery);
        return $query->getResultArray();
    }

    // Retrieve all by Id Product
    public function MdlSelectByIdProduct($id): array
    {
        $sqlQuery = "SELECT * FROM ". $this->table ." WHERE id_product = ". $id ." ORDER BY position asc;";
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

    // Get Data By Position
    public function MdlGetByPosition($position)
    {
        $sqlQuery = "SELECT * FROM ".$this->table." WHERE position=".$position;
        $query = $this->db->query($sqlQuery);
        return $query->getResultArray();
    }

    // Delete Data
    public function MdlDeleteById($id): void
    {
        $sqlQuery = "DELETE FROM ".$this->table." where id =".$id;
        $this->db->query($sqlQuery);
    }

    // Retrieve Paginate
    public function MdlListPaginate($no_paginate): array
    {
        $no_paginate = ($no_paginate-1) * 5;

        $sqlQuery = "select * from ". $this->table ." order by id asc limit ".$no_paginate.",5";

        $query = $this->db->query($sqlQuery);

        return $query->getResultArray();
    }

    // Paginate
    public function MdlCountPaginate(): array
    {
        $result = array(1);

        $sqlQuery = "select * from ".$this->table;
        $query = $this->db->query($sqlQuery);

        $getPaginateLength = $query->getNumRows()/5;
        if ($getPaginateLength > 0) {
            $result = array();
            for ($i = 0; $i<$getPaginateLength; $i++){
                $result[] = $i+1;
            }
        }

        return $result;
    }
}