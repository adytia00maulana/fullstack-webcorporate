<?php
use CodeIgniter\Model;

class ProductModel extends Model
{
    // Create
    public function MDL_Insert()
    {
        $tblmenu = config('app')->tmstMenu;

        helper('uniqueid');
        $id = uniqueid();

        $data = $this->request->getPost();
        unset($data['submit']);
        unset($data['csrf_test_name']);

        $data['id'] = $id;
        $data['active'] = strlen($this->request->getPost('active')) ? "1" : "0";
        $data['userid'] = $this->session->get('userdata')['USER_ID'];
        $data['recdate'] = date("Y-m-d H:i:s");
        $data['moduser'] = $this->session->get('userdata')['USER_ID'];
        $data['moddate'] = date("Y-m-d H:i:s");

        $res = $this->db->table($tblmenu)->insert($data);
        if ($res) {
            //Update Order Number
            $parent_id = $data['parent_id'];
            $tid = $data['tid'];
            $appid = $data['app_id'];
            $sSQL = "
				SELECT id, tid
				FROM $tblmenu
				WHERE 1=1
					AND id <> '$id'
					AND parent_id = '$parent_id'
					AND tid >= $tid
                    AND app_id = '$appid'
				ORDER BY tid
			";

            $ambil = $this->db->query($sSQL);
            if ($ambil->getNumRows() > 0) {
                foreach ($ambil->getResult() as $rows) {
                    $tid++;
                    $data = array(
                        'tid' => $tid
                    );

                    $this->db->table($tblmenu)->update($data, ['id' => $rows->id]);
                }
            }
        }

        return $res;
    }

    // Updated
    public function MDL_Update($id)
    {
        $tblmenu = config('app')->tmstMenu;

        $data = $this->request->getPost();
        unset($data['submit']);
        unset($data['csrf_test_name']);

        $data['active'] = strlen($this->request->getPost('active')) ? "1" : "0";
        $data['moduser'] = $this->session->get('userdata')['USER_ID'];
        $data['moddate'] = date("Y-m-d H:i:s");

        $res = $this->db->table($tblmenu)->update($data, ['id' => $id]);
        if ($res) {
            //Update Order Number
            $parent_id = $data['parent_id'];
            $tid = $data['tid'];
            $appid = $data['app_id'];
            $sSQL = "
				SELECT id, tid
				FROM $tblmenu
				WHERE 1=1
					AND id <> '$id'
					AND parent_id = '$parent_id'
					AND tid >= $tid
					AND app_id = '$appid'
				ORDER BY tid
			";

            $ambil = $this->db->query($sSQL);
            if ($ambil->getNumRows() > 0) {
                foreach ($ambil->getResult() as $rows) {
                    $tid++;
                    $data = array(
                        'tid' => $tid
                    );

                    $this->db->table($tblmenu)->update($data, ['id' => $rows->id]);
                }
            }
        }

        return $res;
    }

    // Retrive by Id
    public function MDL_Select($appid = '')
    {
        $tblmenu = config('app')->tmstMenu;

        $hasil = array();

        $sSQL = "
			SELECT m.id, det.custom_title as parentt, m.custom_title, m.tid, m.url_menu 
				,IIF(m.active=1,'Active','Not Active') as active
			FROM $tblmenu m LEFT JOIN $tblmenu det ON det.id = m.parent_id
			WHERE 1=1
                AND m.app_id = '$appid'
			ORDER BY m.parent_id,m.tid
		";

        $ambil = $this->db->query($sSQL);
        if ($ambil->getNumRows() > 0) {
            foreach ($ambil->getResult() as $data) {
                $hasil[] = $data;
            }
        }
        return $hasil;
    }

    // Retrive all
    public function MDL_SelectID($id)
    {
        $tblmenu = config('app')->tmstMenu;

        return $this->db->table($tblmenu)->getWhere(array('id' => $id))->getRow();
    }

    // Delete
    public function MDL_Delete($id)
    {
        $tblmenu = config('app')->tmstMenu;

        $res = $this->db->table($tblmenu)->delete(array('id' => $id));
        return $res;
    }

}

?>