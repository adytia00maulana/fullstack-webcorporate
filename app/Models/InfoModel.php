<?php

use CodeIgniter\Model;

class InfoModel extends Model
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->table = config('app')->info;
        $this->tableDetailInfo = config('app')->detail_info;
    }

    public function getAllData(): array {
        $sqlQuery = "select * from ".$this->table;
        $query = $this->db->query($sqlQuery);
        return $query->getResultArray();
    }

    public function getAllDataDetailEvent(): array {
        $sqlQuery = "select * from ".$this->tableDetailInfo;
        $query = $this->db->query($sqlQuery);
        return $query->getResultArray();
    }

    public function getDetailInfoById($id): array
    {
        // $sqlQuery = "SELECT * FROM ". $this->tableDetailInfo ." WHERE id_event = ". $id ." ORDER BY position asc;";
        $sqlQuery = 
        "SELECT 
            de.id,
            de.id_event,
            e.event_name,
            de.filename,
            de.position,
            de.created_by,
            de.created_date,
            de.updated_by,
            de.updated_date
        FROM ". $this->tableDetailInfo ." de
        left join ". $this->table ." e on de.id_event = e.id
        WHERE id_event = ". $id ." ORDER BY position asc;
        ";
        $query = $this->db->query($sqlQuery);
        return $query->getResultArray();
    }

    public function getById($id) {
        $sqlQuery = $this->db->table($this->table)->where('id', $id);
        return $sqlQuery->get()->getRowArray();
    }

    public function InsertData($data) {
        return $result = $this->db->table($this->table)->insert($data);
    }
    
    public function UpdateData($data, $id) {
        $result = $this->db->table($this->table)->where('id',$id)->update($data);
        return $result;
    }


    // Insert Data
    public function MdlInsertDetailEvent($body)
    {
        $now = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
        $timeStamp = $now->format("Y-m-d H:i:s");
        $data = $body;
        $data['id'] = 0;
        $data['created_date'] = $timeStamp;
        $data['updated_by'] = "";
        $data['updated_date'] = "";
        $result = $this->db->table($this->tableDetailInfo)->insert($data);

        return $result;
    }

    // Updated Data
    public function MdlUpdatedByIdDetailEvent($id, $body)
    {
        $now = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
        $timeStamp = $now->format("Y-m-d H:i:s");
        $data = $body;
        $data['updated_date'] = $timeStamp;
        $result = $this->db->table($this->tableDetailInfo)->update($data, ['id' => $id]);

        return $result;
    }

    // Get Data By Position
    public function MdlGetByPositionDetailEvent($id_event, $position)
    {
        $sqlQuery = "SELECT * FROM ".$this->tableDetailInfo." WHERE id_event=".$id_event." and position=".$position;
        $query = $this->db->query($sqlQuery);
        return $query->getResultArray();
    }

    // Delete Data
    public function MdlDeleteByIdDetailEvent($id): void
    {
        $sqlQuery = "DELETE FROM ".$this->tableDetailInfo." where id =".$id;
        $this->db->query($sqlQuery);
    }
}