<?php

use CodeIgniter\Model;

class StoreModel extends Model
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->table = config('app')->store;
        $this->refTable = config('app')->ref_store;
    }

    public function getAllData(): array {
        $sqlQuery = "select * from ".$this->table;
        $query = $this->db->query($sqlQuery);
        return $query->getResultArray();
    }

    public function getRefStore(): array {
        $sqlQuery = "select * from ".$this->refTable;
        $query = $this->db->query($sqlQuery);
        return $query->getResultArray();
    }

    public function getById($id) {
        // $sqlQuery = $this->db->table($this->table)->where('id', $id);
        $sqlQuery = "select
            s.id,
            s.id_ref_store,
            rs.name as ref_store_name,
            s.store_name,
            s.store_link,
            s.store_image,
            s.created,
            s.updated
            from ".$this->table." s
            left join ".$this->refTable." rs 
            on s.id = rs.id where s.id =".$id;
        // return $sqlQuery->get()->getRow();
        return $this->db->query($sqlQuery)->getResultArray();
    }

    public function getStoreByIdRef($id_ref_store) {
        $sqlQuery = "select 
            s.id,
            s.id_ref_store,
            rs.name as ref_store_name,
            s.store_name,
            s.store_link,
            s.store_image,
            s.created,
            s.updated
        from ".$this->table." s 
        left join ".$this->refTable." rs 
        on s.id_ref_store = rs.id 
        where s.id_ref_store = ".$id_ref_store.";";
        return $this->db->query($sqlQuery)->getResultArray();
    }

    public function InsertData($data) {
        return $result = $this->db->table($this->table)->insert($data);
    }
    
    public function UpdateData($data, $id) {
        $result = $this->db->table($this->table)->where('id',$id)->update($data);
        return $result;
    }

    // Delete Data
    public function MdlDeleteById($id): void
    {
        $sqlQuery = "DELETE FROM ".$this->table." where id =".$id;
        $this->db->query($sqlQuery);
    }

}