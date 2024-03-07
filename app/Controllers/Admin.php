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
        $data['url_source_product_list'] = base_url() . 'admin/listSourceProduct/';
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

    public function applicationListSourceProduct($paginate): string
    {
        $data = $this->defaultLoadSideBar();
        $queryList = $this->ProductModel->MdlSourceProductListPaginate($paginate);
        $queryListPaginate = $this->ProductModel->MdlCountPaginateSourceProduct();
        $data['listPaginate'] = $queryListPaginate;
        $data['activePaginate'] = $paginate;
        $data['postData'] = base_url()."admin/postDataSource";
        $data['getList'] = $queryList;

        return view('Back\Admin\Product\source-product-list', $data);
    }

    public function postSourceProduct(): void {
        dd($_POST);
    }

    public function applicationListDetailProduct($id, $paginate): string
    {
        $data = $this->defaultLoadSideBar();
        $queryProduct = $this->ProductModel->MdlPaginateDetailProductByIdProduct($id, $paginate);
        $queryListPaginateProduct = $this->ProductModel->MdlCountPaginateDetailProductByIdProduct($id);

        if(count($queryProduct)>0){
            $data['title'] = $queryProduct[0]['name_product'];
        }else{
            $data['title'] = 'Detail Product';
        }
        $data['activePaginate'] = $paginate;
        $data['id_product'] = $id;
        $data['getList'] = $queryProduct;
        $data['listPaginate'] = $queryListPaginateProduct;
        $data['plugin'] = base_url().'Back/Admin/Product/Config/plugin';

        return view('Back\Admin\Product\detail-product-list', $data);
    }
}
