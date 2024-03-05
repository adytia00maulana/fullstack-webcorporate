<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use MstRoleModel;
use MstUserModel;
use ProductModel;

class Admin extends BaseController
{
    private $MstUserModel, $MstRoleModel, $ProductModel;
    public function __construct()
    {
        $this->MstUserModel = model(MstUserModel::class);
        $this->MstRoleModel = model(MstRoleModel::class);
        $this->ProductModel = model(ProductModel::class);
    }

    public function defaultLoadSideBar(): array
    {
        $data['url_users_list'] = base_url() . 'admin/listUsers';
        $data['url_role_list'] = base_url() . 'admin/listRole';
        $data['url_detail_product_list'] = base_url() . 'admin/listDetailProduct/';
        $data['url_source_product_list'] = base_url() . 'admin/listSourceProduct';
        $data['getListProduct'] = $this->ProductModel->MdlProductSelect();

        return $data;
    }

    public function index(): string
    {
        $data = $this->defaultLoadSideBar();

        return view('adm_layout\dashboard', $data);
    }

    public function applicationListUsers(): string
    {
        $data = $this->defaultLoadSideBar();

        $data['getListUser'] = $this->MstUserModel->MdlSelect();
        return view('Back\Admin\Users\users-list', $data);
    }

    public function applicationListRole(): string
    {
        $data = $this->defaultLoadSideBar();

        $data['getListRole'] = $this->MstRoleModel->MdlSelect();
        return view('Back\Admin\Users\role-list', $data);
    }

    public function applicationListProduct(): string
    {
        $data = $this->defaultLoadSideBar();

        return view('Back\Admin\Users\product-list', $data);
    }

    public function applicationListSourceProduct(): string
    {
        $data = $this->defaultLoadSideBar();

        $data['getList'] = $this->ProductModel->MdlSourceProductSelect();
        return view('Back\Admin\Product\source-product-list', $data);
    }

    public function applicationListDetailProduct($id): string
    {
        $data = $this->defaultLoadSideBar();
        $query = $this->ProductModel->MdlDetailProductSelectByIdProduct($id);
        if(count($query)>0){
            $data['title'] = $query[0]['name_product'];
        }else{
            $data['title'] = 'Detail Product';
        }
        $data['getList'] = $query;

        return view('Back\Admin\Product\detail-product-list', $data);
    }
}
