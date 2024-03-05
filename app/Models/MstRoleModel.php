<?php

use CodeIgniter\Model;

class MstRoleModel extends Model
{
    private $tableMstRole;
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

    // Retrieve By id
    public function MdlSelectById($id): array
    {
        if(isset($id)){
            $sqlQuery = "select * from ".$this->tableMstRole." where id =".$id;
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
            $result = $this->db->insert($this->tableMstRole, $data);
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
            $result = $this->db->update($this->tableMstRole, $data);
        }

        return $result;
    }

    // Delete Data
    public function MdlDeleteById($id = 0)
    {
        $result = null;
        if(isset($id)){
            $result = $this->db->delete($this->tableMstRole, array('id' => $id));
        }
        return $result;
    }
}