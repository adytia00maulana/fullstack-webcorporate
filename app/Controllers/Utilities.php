<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;
use MstRoleModel;
use MstUserModel;
use ProductModel;
use AboutUsModel;

class Utilities extends BaseController
{
    private $AboutUsModel, $MstUserModel, $MstRoleModel, $ProductModel;
    public function __construct()
    {
        $this->MstUserModel = model(MstUserModel::class);
        $this->MstRoleModel = model(MstRoleModel::class);
        $this->ProductModel = model(ProductModel::class);
        $this->AboutUsModel = model(AboutUsModel::class);
    }

    public function defaultLoadSideBar(): array
    {
        $data['url_users_list'] = base_url() . 'admin/listUsers';
        $data['url_role_list'] = base_url() . 'admin/listRole';
        $data['url_product_list'] = base_url() . 'admin/listProduct/';
        $data['url_detail_product_list'] = base_url() . 'admin/listDetailProduct/';
        $data['url_source_product_list'] = base_url() . 'admin/listSourceProduct/';
        $data['url_about_us'] = base_url() . 'admin/utilities/aboutUs';
        $data['getListProduct'] = $this->ProductModel->MdlProductSelect();

        return $data;
    }

    public function index(): string
    {
        $data = $this->defaultLoadSideBar();
        $data['getData'] = $this->AboutUsModel->MdlAboutUsSelectById(1);
        // $data['getById'] = base_url() . 'admin/utilities/aboutUs/getAboutUsById/';
        $data['post'] = base_url() . 'admin/utilities/aboutUs/postAboutUs';
        // $data['deleteById'] = base_url() . 'admin/utilities/aboutUs/deleteAboutUsById/';

        return view('Back\Admin\About_us\about_us', $data);
    }

    public function getAboutUs($id) {
        $query = $this->AboutUsModel->MdlAboutUsSelectById($id);

        return json_encode($query);
    }

    public function postAboutUs()
    {
        $data = $_POST;
        unset($data['csrf_test_name']);
        $id = $data['id'];
        if($id == NULL){
            $data['id'] = 0;
            $this->AboutUsModel->MdlAboutUsInsert($data);
        }else{
            $this->AboutUsModel->MdlAboutUsUpdatedById($id, $data);
        }

        $redirect = print_r('<script type="text/javascript">window.history.back();</script>');
        return $redirect;
    }

    public function deleteAboutUs($id) {
        $this->AboutUsModel->MdlAboutUsDeleteById($id);

        $redirect = print_r('<script type="text/javascript">window.history.back();</script>');
        return $redirect;
    }

}
