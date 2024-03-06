<?php

use CodeIgniter\Model;

class UserModel extends Model
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->table = config('app')->tbl_users;
    }

    public function getAll(): array
    {
        $sqlQuery = "select * from ".$this->table;
        $query = $this->db->query($sqlQuery);
        return $query->getResultArray();
    }

    // public function check($data): array
    // {
    //     $sqlQuery = "select * from ".$this->table." where email = '$data' ";
    //     $query = $this->db->query($sqlQuery);
    //     return $query->getFieldNames();
    // }
    
    public function countRow(): int
    {
        $sqlQuery = "select * from ".$this->table;
        $query = $this->db->query($sqlQuery);
        return $query->getNumRows();
    }

    public function getUserActive(): array
    {
        $sqlQuery = "select * from ".$this->table." where is_active = '1'";
        $query = $this->db->query($sqlQuery);
        return $query->getResultArray();
    }

    public function getById($id): array
    {
        if(isset($id)){
            $sqlQuery = "select * from ".$this->table." where id =".$id;
            $query = $this->db->query($sqlQuery);
        }
        return $query->getResultObject();
    }

    public function CreateData($body = [])
    {
        $result = null;
        if(strlen($body) > 0){
            $data = $body;
            $data['created_date'] = date("Y-m-d H:i:s");
            $result = $this->db->insert($this->table, $data);
        }

        return $result;
    }

    public function UpdateById($id = null, $body = [])
    {
        $result = null;
        if(strlen($body) > 0){
            $data = $body;
            $data['updated_date'] = date("Y-m-d H:i:s");
            $this->db->where('id', $id);
            $result = $this->db->update($this->table, $data);
        }

        return $result;
    }

    public function DeleteById($id = null)
    {
        $result = null;
        if(isset($id)){
            $result = $this->db->delete($this->table, ['id' => $id]);
        }
        
        return $result;
    }
}