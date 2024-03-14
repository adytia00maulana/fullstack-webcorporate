<?php
use CodeIgniter\Model;

class AboutUsModel extends Model
{
    private $tableAboutUs;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->tableAboutUs = config('app')->about_us;
    }

    // Retrieve About Us
    public function MdlAboutUsSelect(): array
    {
         $sqlQuery = "select * from ".$this->tableAboutUs;
        $query = $this->db->query($sqlQuery);
        return $query->getResultArray();
    }

    // Retrieve Product By id
    public function MdlAboutUsSelectById($id): array
    {
        if(isset($id)){
            $sqlQuery = "select * from ". $this->tableAboutUs ." where id =".$id;
            $query = $this->db->query($sqlQuery);
        }
        return $query->getResultArray();
    }

    // Insert Product Data
    public function MdlAboutUsInsert($body)
    {
        $now = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
        $timeStamp = $now->format("Y-m-d H:i:s");
        $data = $body;
        $data['id'] = 0;
        $data['created_date'] = $timeStamp;
        $data['updated_by'] = "";
        $data['updated_date'] = "";
        $result = $this->db->table($this->tableAboutUs)->insert($data);

        return $result;
    }

    // Updated Product Data
    public function MdlAboutUsUpdatedById($id, $body)
    {
        $now = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
        $timeStamp = $now->format("Y-m-d H:i:s");
        $data = $body;
        $data['updated_date'] = $timeStamp;
        $result = $this->db->table($this->tableAboutUs)->update($data, ['id' => $id]);

        return $result;
    }

    // Delete Product Data
    public function MdlAboutUsDeleteById($id): void
    {
        $sqlQuery = "DELETE FROM ".$this->tableAboutUs." where id =".$id;
        $this->db->query($sqlQuery);
    }
}
