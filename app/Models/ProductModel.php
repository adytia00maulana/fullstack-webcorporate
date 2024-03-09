<?php
use CodeIgniter\Model;

class ProductModel extends Model
{
    private $tableProduct, $tableSourceProduct, $tableDetailProduct;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->tableProduct = config('app')->product;
        $this->tableSourceProduct = config('app')->source_product;
        $this->tableDetailProduct = config('app')->detail_product;
    }

    // Retrieve Source Product all
    public function MdlProductSelect(): array
    {
         $sqlQuery = "select * from ".$this->tableProduct;
        $query = $this->db->query($sqlQuery);
        return $query->getResultArray();
    }

    // Retrieve Product Active Users
    public function MdlProductSelectByActive(): array
    {
        $sqlQuery = "select * from ".$this->tableProduct." where active = '1'";
        $query = $this->db->query($sqlQuery);
        return $query->getResultArray();
    }

    // Retrieve Product By id
    public function MdlProductSelectById($id): array
    {
        if(isset($id)){
            $sqlQuery = "select
                p.id,
                p.id_source_product,
                sc.name as source_product_name,
                p.code,
                p.name,
                p.active,
                p.created_by,
                p.created_date,
                p.updated_by,
                p.updated_date
                from ". $this->tableProduct ." p 
                left join ". $this->tableSourceProduct ." sc
                on p.id_source_product = sc.id where p.id =".$id;
            $query = $this->db->query($sqlQuery);
        }
        return $query->getResultObject();
    }

    // Insert Product Data
    public function MdlProductInsert($body)
    {
        $now = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
        $timeStamp = $now->format("Y-m-d H:i:s");
        $data = $body;
        $data['id'] = 0;
        $data['created_date'] = $timeStamp;
        $data['updated_by'] = "";
        $data['updated_date'] = "";
        $result = $this->db->table($this->tableProduct)->insert($data);

        return $result;
    }

    // Updated Product Data
    public function MdlProductUpdatedById($id, $body)
    {
        $now = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
        $timeStamp = $now->format("Y-m-d H:i:s");
        $data = $body;
        $data['updated_date'] = $timeStamp;
        $result = $this->db->table($this->tableProduct)->update($data, ['id' => $id]);

        return $result;
    }

    // Delete Product Data
    public function MdlProductDeleteById($id): void
    {
        $sqlQuery = "DELETE FROM ".$this->tableProduct." where id =".$id;
        $this->db->query($sqlQuery);
    }

    // Retrieve Product Paginate
    public function MdlProductListPaginate($no_paginate): array
    {
        $no_paginate = ($no_paginate-1) * 5;

        $sqlQuery = "select
            p.id,
            p.id_source_product,
            sc.name as source_product_name,
            p.code,
            p.name,
            p.active,
            p.created_by,
            p.created_date,
            p.updated_by,
            p.updated_date
            from ". $this->tableProduct ." p 
            left join ". $this->tableSourceProduct ." sc
            on p.id_source_product = sc.id order by id asc limit ".$no_paginate.",5";
        
        $query = $this->db->query($sqlQuery);

        return $query->getResultArray();
    }

    // Paginate Product
    public function MdlCountPaginateProduct(): array
    {
        $result = array(1);

        $sqlQuery = "select * from ".$this->tableProduct;
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


    // Retrieve Source Product all
    public function MdlSourceProductSelect(): array
    {
        $sqlQuery = "select * from ".$this->tableSourceProduct;
        $query = $this->db->query($sqlQuery);
        return $query->getResultArray();
    }

    // Retrieve Source Product Active Users
    public function MdlSourceProductSelectByActive(): array
    {
        $sqlQuery = "select * from ".$this->tableSourceProduct." where active = '1'";
        $query = $this->db->query($sqlQuery);
        return $query->getResultArray();
    }

    // Retrieve Source Product Paginate
    public function MdlSourceProductListPaginate($no_paginate): array
    {
        $no_paginate = ($no_paginate-1) * 5;

        $sqlQuery = "select * from ".$this->tableSourceProduct." order by id asc limit ".$no_paginate.",5";
        $query = $this->db->query($sqlQuery);

        return $query->getResultArray();
    }

    // Paginate Source Product
    public function MdlCountPaginateSourceProduct(): array
    {
        $result = array(1);

        $sqlQuery = "select * from ".$this->tableSourceProduct;
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

    // Retrieve Source Product By id
    public function MdlSourceProductSelectById($id): array
    {
        if(isset($id)){
            $sqlQuery = "select * from ".$this->tableSourceProduct." where id =".$id;
            $query = $this->db->query($sqlQuery);
        }
        return $query->getResultArray();
    }

    // Insert Source Product Data
    public function MdlSourceProductInsert($body)
    {
        $now = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
        $timeStamp = $now->format("Y-m-d H:i:s");
        $data = $body;
        $data['id'] = 0;
        $data['created_date'] = $timeStamp;
        $data['updated_by'] = "";
        $data['updated_date'] = "";
        $result = $this->db->table($this->tableSourceProduct)->insert($data);

        return $result;
    }

    // Updated Source Product Data
    public function MdlSourceProductUpdatedById($id, $body)
    {
        $now = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
        $timeStamp = $now->format("Y-m-d H:i:s");
        $data = $body;
        $data['updated_date'] = $timeStamp;
        $result = $this->db->table($this->tableSourceProduct)->update($data, ['id' => $id]);

        return $result;
    }

    // Delete Source Product Data
    public function MdlSourceProductSelectByIdDel($id)
    {
        if(isset($id)){
            $sqlQuery = "DELETE FROM ".$this->tableSourceProduct." where id =".$id;
            $this->db->query($sqlQuery);
        }
    }


    // Retrieve Detail Product all
    public function MdlDetailProductSelect(): array
    {
        $sqlQuery = "select * from ".$this->tableDetailProduct;
        $query = $this->db->query($sqlQuery);
        return $query->getResultArray();
    }

    // Retrieve Detail Product Active Users
    public function MdlDetailProductSelectByActive(): array
    {
        $sqlQuery = "select * from ".$this->tableDetailProduct." where active = '1'";
        $query = $this->db->query($sqlQuery);
        return $query->getResultArray();
    }

    // Retrieve Detail Product By id
    public function MdlDetailProductSelectById($id): array
    {
        if(isset($id)){
            $sqlQuery = "select * from ".$this->tableDetailProduct." where id =".$id;
            $query = $this->db->query($sqlQuery);
        }
        return $query->getResultObject();
    }

    // Retrieve Detail Product By id product
    public function MdlDetailProductSelectByIdProduct($id_product): array
    {
        if(isset($id_product)){
            $sqlQuery = "select 
                dp.id,
                dp.id_product,
                p.name as name_product,
                dp.id_source_product,
                sp.name as name_source_product,
                dp.code,
                dp.name,
                dp.filename,
                dp.filepath,
                dp.description,
                dp.active,
                dp.created_by,
                dp.created_date,
                dp.updated_by,
                dp.updated_date
                from ".$this->tableDetailProduct." dp left join ".$this->tableProduct." p on dp.id_product  = p.id
                left join ".$this->tableSourceProduct." sp on
                dp.id_source_product = sp.id
                where id_product =".$id_product;
            $query = $this->db->query($sqlQuery);
        }
        return $query->getResultArray();
    }

    // Retrieve Detail Product By id product
    public function MdlPaginateDetailProductByIdProduct($id_product, $no_paginate=0): array
    {
        $no_paginate = ($no_paginate-1) * 5;

        if(isset($id_product)){
            $sqlQuery =
                "select 
                    dp.id,
                    dp.id_product,
                    p.name as name_product,
                    dp.id_source_product,
                    sp.name as name_source_product,
                    dp.code,
                    dp.name,
                    dp.filename,
                    dp.filepath,
                    dp.description,
                    dp.active,
                    dp.created_by,
                    dp.created_date,
                    dp.updated_by,
                    dp.updated_date
                from ".$this->tableDetailProduct." dp 
                left join ".$this->tableProduct." p on
                dp.id_product = p.id
                left join ".$this->tableSourceProduct." sp on
                dp.id_source_product = sp.id
                where id_product = ".$id_product." order by dp.id asc limit ".$no_paginate.",5";
            $query = $this->db->query($sqlQuery);
        }
        return $query->getResultArray();
    }

    // Retrieve Detail Product By id product
    public function MdlCountPaginateDetailProductByIdProduct($id_product): array
    {
        $result = array(1);

        if(isset($id_product)){
            $sqlQuery = "select 
                dp.id
                from ".$this->tableDetailProduct." dp left join ".$this->tableProduct." p on dp.id_product  = p.id
                left join ".$this->tableSourceProduct." sp on
                dp.id_source_product = sp.id
                where id_product =".$id_product;
            $query = $this->db->query($sqlQuery);

            $getPaginateLength = $query->getNumRows()/5;
            if ($getPaginateLength > 0) {
                $result = array();
                for ($i = 0; $i<$getPaginateLength; $i++){
                    $result[] = $i+1;
                }
            }
        }

        return $result;
    }

    // Insert Detail Product Data
    public function MdlDetailProductInsert($body = [])
    {
        $now = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
        $timeStamp = $now->format("Y-m-d H:i:s");
        $data = $body;
        $data['id'] = 0;
        $data['created_date'] = $timeStamp;
        $data['updated_by'] = "";
        $data['updated_date'] = "";
        $result = $this->db->table($this->tableDetailProduct)->insert($data);

        return $result;
    }

    // Updated Detail Product Data
    public function MdlDetailProductUpdatedById($id = 0, $body = [])
    {
        $now = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
        $timeStamp = $now->format("Y-m-d H:i:s");
        $data = $body;
        $data['updated_date'] = $timeStamp;
        $result = $this->db->table($this->tableDetailProduct)->update($data, ['id' => $id]);

        return $result;
    }

    // Delete Detail Product Data
    public function MdlDetailProductDeleteById($id = 0)
    {
        if(isset($id)){
            $sqlQuery = "DELETE FROM ".$this->tableDetailProduct." where id =".$id;
            $this->db->query($sqlQuery);
        }
    }
}
