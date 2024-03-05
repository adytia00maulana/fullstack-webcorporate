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

    public function index(): string
    {
        $data['url_users_list'] = base_url() . 'admin/listUsers';
        $data['url_role_list'] = base_url() . 'admin/listRole';
        $data['url_product_list'] = base_url() . 'admin/listProduct';
        $data['url_source_product_list'] = base_url() . 'admin/listSourceProduct';

        return view('adm_layout\dashboard', $data);
    }

    public function applicationListUsers(): string
    {
        $data['url_users_list'] = base_url() . 'admin/listUsers';
        $data['url_role_list'] = base_url() . 'admin/listRole';
        $data['url_product_list'] = base_url() . 'admin/listProduct';
        $data['url_source_product_list'] = base_url() . 'admin/listSourceProduct';

        $data['getListUser'] = $this->MstUserModel->MdlSelect();
        return view('Back\Admin\Users\users-list', $data);
    }

    public function applicationListRole(): string
    {
        $data['url_users_list'] = base_url() . 'admin/listUsers';
        $data['url_role_list'] = base_url() . 'admin/listRole';
        $data['url_product_list'] = base_url() . 'admin/listProduct';
        $data['url_source_product_list'] = base_url() . 'admin/listSourceProduct';

        $data['getListRole'] = $this->MstRoleModel->MdlSelect();
        return view('Back\Admin\Users\role-list', $data);
    }

    public function applicationListProduct(): string
    {
        $data['url_users_list'] = base_url() . 'admin/listUsers';
        $data['url_role_list'] = base_url() . 'admin/listRole';
        $data['url_product_list'] = base_url() . 'admin/listProduct';
        $data['url_source_product_list'] = base_url() . 'admin/listSourceProduct';

        $data['getList'] = $this->ProductModel->MdlProductSelect();
        return view('Back\Admin\Users\product-list', $data);
    }

    public function applicationListSourceProduct(): string
    {
        $data['url_users_list'] = base_url() . 'admin/listUsers';
        $data['url_role_list'] = base_url() . 'admin/listRole';
        $data['url_product_list'] = base_url() . 'admin/listProduct';
        $data['url_source_product_list'] = base_url() . 'admin/listSourceProduct';

        $data['getList'] = $this->ProductModel->MdlSourceProductSelect();
        return view('Back\Admin\Users\source-product-list', $data);
    }

    public function applicationListDetailProduct(): string
    {
        $data['url_users_list'] = base_url() . 'admin/listUsers';
        $data['url_role_list'] = base_url() . 'admin/listRole';
        $data['url_product_list'] = base_url() . 'admin/listProduct';
        $data['url_source_product_list'] = base_url() . 'admin/listSourceProduct';

        $data['getList'] = $this->ProductModel->MdlDetailProductSelect();
        return view('Back\Admin\Users\detail-product-list', $data);
    }
}
