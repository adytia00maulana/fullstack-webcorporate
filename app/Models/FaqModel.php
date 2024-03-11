<?php
use CodeIgniter\Model;

class FaqModel extends Model
{
    private $tableFaq;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->tableFaq = config('app')->faq;
    }

    // Retrieve About Us
    public function MdlFaqSelect(): array
    {
         $sqlQuery = "select * from ".$this->tableFaq;
        $query = $this->db->query($sqlQuery);
        return $query->getResultArray();
    }

    // Retrieve Product By id
    public function MdlFaqSelectById($id): array
    {
        if(isset($id)){
            $sqlQuery = "select * from ". $this->tableFaq ." where id =".$id;
            $query = $this->db->query($sqlQuery);
        }
        return $query->getResultArray();
    }

    // Insert Product Data
    public function MdlFaqInsert($body)
    {
        $now = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
        $timeStamp = $now->format("Y-m-d H:i:s");
        $data = $body;
        $data['id'] = 0;
        $data['created_date'] = $timeStamp;
        $data['updated_by'] = "";
        $data['updated_date'] = "";
        $result = $this->db->table($this->tableFaq)->insert($data);

        return $result;
    }

    // Updated Product Data
    public function MdlFaqUpdatedById($id, $body)
    {
        $now = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
        $timeStamp = $now->format("Y-m-d H:i:s");
        $data = $body;
        $data['updated_date'] = $timeStamp;
        $result = $this->db->table($this->tableFaq)->update($data, ['id' => $id]);

        return $result;
    }

    // Delete Product Data
    public function MdlFaqDeleteById($id): void
    {
        $sqlQuery = "DELETE FROM ".$this->tableFaq." where id =".$id;
        $this->db->query($sqlQuery);
    }
}
