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

    // Retrieve Active Users
    public function MdlSelectByActive(): array
    {
        $sqlQuery = "select * from ".$this->tableMstUsers." where active = '1'";
        $query = $this->db->query($sqlQuery);
        return $query->getResultArray();
    }

    // Retrieve By id
    public function MdlSelectById($id): array
    {
        if(isset($id)){
            $sqlQuery = "select * from ".$this->tableMstUsers." where id =".$id;
            $query = $this->db->query($sqlQuery);
        }
        return $query->getResultObject();
    }

    // Insert Data
    public function MdlInsert($body = [])
    {
        $result = null;
        if(strlen($body) > 0){
            $data = $body;
            $data['created_date'] = date("Y-m-d H:i:s");
            $result = $this->db->insert($this->tableMstUsers, $data);
        }

        return $result;
    }

    // Updated Data
    public function MdlUpdatedById($id = 0, $body = [])
    {
        $result = null;
        if(strlen($body) > 0){
            $data = $body;
            $data['updated_date'] = date("Y-m-d H:i:s");
            $this->db->where('id', $id);
            $result = $this->db->update($this->tableMstUsers, $data);
        }

        return $result;
    }

    // Delete Data
    public function MdlDeleteById($id = 0)
    {
        $result = null;
        if(isset($id)){
            $result = $this->db->delete($this->tableMstUsers, array('id' => $id));
        }
        
        return $result;
    }
}