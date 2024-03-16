<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;
use MstRoleModel;
use MstUserModel;
use ProductModel;

class Admin extends BaseController
{
    private $MstUserModel, $MstRoleModel, $ProductModel;
    public function __construct()
    {
        $session = session();
        $this->MstUserModel = model(MstUserModel::class);
        $this->MstRoleModel = model(MstRoleModel::class);
        $this->ProductModel = model(ProductModel::class);
    }

    public function defaultLoadSideBar(): array
    {
        // $data['url_users_list'] = base_url() . 'admin/listUsers';
        // $data['url_role_list'] = base_url() . 'admin/listRole';
        $data['url_product_list'] = base_url() . 'admin/listProduct/';
        $data['url_detail_product_list'] = base_url() . 'admin/listDetailProduct/';
        $data['url_source_product_list'] = base_url() . 'admin/listSourceProduct/';
        // $data['url_about_us'] = base_url() . 'admin/utilities/aboutUs';
        // $data['url_faq'] = base_url() . 'admin/utilities/faq';
        $data['getListProduct'] = $this->ProductModel->MdlProductSelect();
        $data['url_gallery'] = base_url() . 'admin/utilities/gallery';
        $data['url_info'] = base_url() . 'admin/utilities/info';

        return $data;
    }

    public function index(): string
    {
        $data = $this->defaultLoadSideBar();
        $queryUsers = $this->MstUserModel->MdlSelect();
        $queryUsersActive = $this->MstUserModel->MdlSelectByActive();
        $querySourceProduct = $this->ProductModel->MdlSourceProductSelect();
        $queryDetailProduct = $this->ProductModel->MdlDetailProductSelect();
        $data['totalUsers'] = count($queryUsers);
        $data['totalUsersActive'] = count($queryUsersActive);
        $data['totalSourceProduct'] = count($querySourceProduct);
        $data['totalDetailProduct'] = count($queryDetailProduct);

        return view('adm_layout/dashboard', $data);
    }

    public function applicationListUsers(): string
    {
        $data = $this->defaultLoadSideBar();

        $data['getListUser'] = $this->MstUserModel->MdlSelect();
        return view('Back/Admin/Users/users-list', $data);
    }

    public function applicationListRole(): string
    {
        $data = $this->defaultLoadSideBar();

        $data['getListRole'] = $this->MstRoleModel->MdlSelect();
        return view('Back/Admin/Users/role-list', $data);
    }

    public function applicationListProduct($paginate): string
    {
        $data = $this->defaultLoadSideBar();
        if($paginate == null) $paginate = 1;
        $queryList = $this->ProductModel->MdlProductListPaginate($paginate);
        $queryListPaginate = $this->ProductModel->MdlCountPaginateProduct();
        $data['listPaginate'] = $queryListPaginate;
        $data['activePaginate'] = $paginate;
        $data['postData'] = base_url()."admin/postDataProduct";
        $data['getDataById'] = base_url()."admin/getDataProduct/";
        $data['deleteDataById'] = base_url()."admin/deleteDataProduct/";
        $data['getList'] = $queryList;
        $data['getSourceProductList'] = $this->ProductModel->MdlSourceProductSelect();

        return view('Back/Admin/Product/product-list', $data);
    }

    public function getProduct($id) {
        $query = $this->ProductModel->MdlProductSelectById($id);

        return json_encode($query);
    }

    public function postProduct(): RedirectResponse
    {
        $data = $_POST;
        unset($data['csrf_test_name']);
        if(!isset($data['active'])) $data['active'] = "0";
        $id = $data['id'];

        if($id == NULL){
            $data['id'] = 0;
            $data['created_by'] = isset($_SESSION['username'])? session()->get('username'): "SYSTEM";
            $this->ProductModel->MdlProductInsert($data);
        }else{
            $data['updated_by'] = isset($_SESSION['username'])? session()->get('username'): "SYSTEM";
            $this->ProductModel->MdlProductUpdatedById($id, $data);
        }

        return redirect()->to(base_url().'admin/listProduct/1');
    }

    public function deleteProduct($id) {
        $this->ProductModel->MdlProductDeleteById($id);

        return redirect()->to(base_url().'admin/listProduct/1');
    }

    public function applicationListSourceProduct($paginate): string
    {
        $data = $this->defaultLoadSideBar();
        $queryList = $this->ProductModel->MdlSourceProductListPaginate($paginate);
        $queryListPaginate = $this->ProductModel->MdlCountPaginateSourceProduct();
        $data['listPaginate'] = $queryListPaginate;
        $data['activePaginate'] = $paginate;
        $data['postData'] = base_url()."admin/postDataSource";
        $data['getDataById'] = base_url()."admin/getDataSource/";
        $data['deleteDataById'] = base_url()."admin/deleteDataSource/";
        $data['getList'] = $queryList;

        return view('Back/Admin/Product/source-product-list', $data);
    }

    public function getSourceProduct($id) {
        $query = $this->ProductModel->MdlSourceProductSelectById($id);

        return json_encode($query);
    }

    public function postSourceProduct(): RedirectResponse
    {
        $data = $_POST;
        unset($data['csrf_test_name']);
        if(!isset($data['active'])) $data['active'] = "0";
        $id = $data['id'];

        if($id == NULL){
            $data['id'] = 0;
            $data['created_by'] = isset($_SESSION['username'])? session()->get('username'): "SYSTEM";
            $this->ProductModel->MdlSourceProductInsert($data);
        }else{
            $data['updated_by'] = isset($_SESSION['username'])? session()->get('username'): "SYSTEM";
            $this->ProductModel->MdlSourceProductUpdatedById($id, $data);
        }

        return redirect()->to(base_url().'admin/listSourceProduct/1');
    }

    public function deleteSourceProduct($id) {
        $this->ProductModel->MdlSourceProductSelectByIdDel($id);

        return redirect()->to(base_url().'admin/listSourceProduct/1');
    }

    public function applicationListDetailProduct($id, $paginate): string
    {
        $data = $this->defaultLoadSideBar();
        $queryProduct = $this->ProductModel->MdlProductSelectById($id);
        $queryDetailProduct = $this->ProductModel->MdlPaginateDetailProductByIdProduct($id, $paginate);
        $queryListPaginateProduct = $this->ProductModel->MdlCountPaginateDetailProductByIdProduct($id);

        if(count($queryProduct)>0){
            $data['title'] = isset($queryProduct[0]->name)? $queryProduct[0]->name : "";
        }else{
            $data['title'] = 'Detail Product';
        }
        $data['activePaginate'] = $paginate;
        $data['id_product'] = $id;
        $data['getList'] = $queryDetailProduct;
        $data['listPaginate'] = $queryListPaginateProduct;
        $data['getSourceProductList'] = $this->ProductModel->MdlSourceProductSelect();
        $data['getProductList'] = $this->ProductModel->MdlProductSelect();
        $data['postData'] = base_url()."admin/postDataDetailProduct";
        $data['getDataById'] = base_url()."admin/getDataDetailProduct/";
        $data['deleteDataById'] = base_url()."admin/deleteDataDetailProduct/";

        return view('Back/Admin/Product/detail-product-list', $data);
    }

    public function getDetailProduct($id) {
        $query = $this->ProductModel->MdlDetailProductSelectById($id);

        return json_encode($query);
    }

    public function postDetailProduct()
    {
        $data = $_POST;
        unset($data['csrf_test_name']);
        if(!isset($data['active'])) $data['active'] = "0";
        $id = $data['id'];
        $getFile = service('request')->getFile('fileUpload');

        if($id != NULL) unlink('./assets/img/products/'.$data['filename']);

        if ($getFile->isValid() && ! $getFile->hasMoved()) {
            $validate = $getFile->getClientMimeType() === "image/png" | $getFile->getClientMimeType() === "image/jpg" | $getFile->getClientMimeType() === "image/jpeg";
            if (!$validate) {
                print_r('<script type="text/javascript">alert("File upload does not match the format"); window.history.back();</script>');
                exit();
            }
            $path = realpath(ROOTPATH."/public/assets/img/products");
            $newName = $getFile->getName();
            $newPath = ROOTPATH . '/public/assets/admin/img/products/' . $newName;
            $data['filename'] = $newName;
            $data['filepath'] = $newPath;
            $getFile->move($path, $newName);


            if($id == NULL){
                $data['id'] = 0;
                $data['created_by'] = isset($_SESSION['username'])? session()->get('username'): "SYSTEM";
                $this->ProductModel->MdlDetailProductInsert($data);
            }else{
                $data['updated_by'] = isset($_SESSION['username'])? session()->get('username'): "SYSTEM";
                $this->ProductModel->MdlDetailProductUpdatedById($id, $data);
            }
        }


        $redirect = print_r('<script type="text/javascript">window.history.back();</script>');
        return $redirect;
    }

    public function deleteDetailProduct($id) {
        $queryGetById = $this->ProductModel->MdlDetailProductSelectById($id);
        dd($queryGetById);
        $this->ProductModel->MdlDetailProductDeleteById($id);

        $redirect = print_r('<script type="text/javascript">window.history.back();</script>');
        return $redirect;
    }

}
