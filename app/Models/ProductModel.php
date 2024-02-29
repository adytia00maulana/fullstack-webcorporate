<?php
use CodeIgniter\Model;

class ProductModel extends Model
{
    // Create
    public function MdlInsert()
    {
        $tableProduct = config('app')->product;

        $data = $this->request->getPost();
        unset($data['submit']);
        unset($data['csrf_test_name']);

        $data['id'] = $this->request->getPost('id');
        $data['id_product_detail'] = $this->request->getPost('id_product_detail');
        $data['code'] = $this->request->getPost('code');
        $data['name'] = $this->request->getPost('name');
        $data['active'] = strlen($this->request->getPost('active')) ? "1" : "0";
        $data['created_by'] = $this->session->get('userdata')['USER_ID'];
        $data['created_date'] = date("Y-m-d H:i:s");
        $data['updated_by'] = $this->session->get('userdata')['USER_ID'];
        $data['updated_date'] = date("Y-m-d H:i:s");

        $res = $this->db->table($tableProduct)->insert($data);
        dd($res);
        if ($res) {
            //Update Order Number
            $parent_id = $data['parent_id'];
            $tid = $data['tid'];
            $appid = $data['app_id'];
            $sSQL = "
				SELECT id
				FROM $tableProduct
			";

            $ambil = $this->db->query($sSQL);
            dd($ambil);
            if ($ambil->getNumRows() > 0) {
                foreach ($ambil->getResult() as $rows) {
                    $tid++;
                    $data = array(
                        'tid' => $tid
                    );

                    $this->db->table($tableProduct)->update($data, ['id' => $rows->id]);
                }
            }
        }

        return $res;
    }

    // Updated
    public function MdlUpdate($id)
    {
        $tableProduct = config('app')->product;

        helper('uniqueid');
        $id = uniqueid();

        $data = $this->request->getPost();
        unset($data['submit']);
        unset($data['csrf_test_name']);

        $data['id'] = $id;
        $data['id_product_detail'] = $id;
        $data['code'] = $id;
        $data['name'] = $id;
        $data['active'] = strlen($this->request->getPost('active')) ? "1" : "0";
        $data['created_by'] = $this->session->get('userdata')['USER_ID'];
        $data['created_date'] = date("Y-m-d H:i:s");
        $data['updated_by'] = $this->session->get('userdata')['USER_ID'];
        $data['updated_date'] = date("Y-m-d H:i:s");

        $res = $this->db->table($tableProduct)->insert($data);
        if ($res) {
            //Update Order Number
            $parent_id = $data['parent_id'];
            $tid = $data['tid'];
            $appid = $data['app_id'];
            $sSQL = "
				SELECT id
				FROM $tableProduct
			";

            $ambil = $this->db->query($sSQL);
            dd($ambil);
            if ($ambil->getNumRows() > 0) {
                foreach ($ambil->getResult() as $rows) {
                    $tid++;
                    $data = array(
                        'tid' => $tid
                    );

                    $this->db->table($tableProduct)->update($data, ['id' => $rows->id]);
                }
            }
        }

        return $res;
    }

    // Retrive by Id
    public function MdlSelectId($id = NULL)
    {
        $hasil = array();
        if($id != null){
            $sSQL = "
                select * from product where id=1 and active =1
            ";
            $ambil = $this->db->query($sSQL);
            dd($ambil);
            if ($ambil->getNumRows() > 0) {
                foreach ($ambil->getResult() as $data) {
                    $hasil[] = $data;
                }
            }
        }

        return $hasil;
    }

    // Retrive all
    public function MdlSelect()
    {
        $tableProduct = config('app')->product;

        return $this->db->table($tableProduct)->findAll();
    }

    // Delete
    public function MdlDelete($id)
    {
        $tableProduct = config('app')->product;

        $res = $this->db->table($tableProduct)->delete(array('id' => $id));
        return $res;
    }

}

?>