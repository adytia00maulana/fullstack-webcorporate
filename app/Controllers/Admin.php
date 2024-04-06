<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\GlobalValidation;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;
use MstRoleModel;
use MstUserModel;
use ProductModel;
use LogoModel;

class Admin extends BaseController
{
    private $MstUserModel, $MstRoleModel, $ProductModel, $pathUploadProduct, $pathViewProduct, $pathDeleteProduct, $LogoModel, $pathViewLogo;
    public GlobalValidation $GlobalValidation;
    public function __construct()
    {
        $this->MstUserModel = model(MstUserModel::class);
        $this->MstRoleModel = model(MstRoleModel::class);
        $this->ProductModel = model(ProductModel::class);
        $this->pathUploadProduct = config('app')-> uploadProduct;
        $this->pathViewProduct = config('app')-> viewProduct;
        $this->pathDeleteProduct = config('app')-> deleteProduct;
        $this->pathViewLogo = config('app')-> viewLogo;
        $this->GlobalValidation = new GlobalValidation();
        $this->LogoModel = model(LogoModel::class);
    }

    public function defaultLoadSideBar(): array
    {
        $data['title'] = 'Admin Template';
        // $data['url_users_list'] = base_url() . 'admin/listUsers';
        // $data['url_role_list'] = base_url() . 'admin/listRole';
        $data['url_product_list'] = base_url() . 'admin/listProduct/';
        $data['url_detail_product_list'] = base_url() . 'admin/listDetailProduct/';
        $data['url_source_product_list'] = base_url() . 'admin/listSourceProduct/';
        $data['getListProduct'] = $this->ProductModel->MdlProductSelect();
        $data['url_gallery'] = base_url() . 'admin/utilities/gallery';
        $data['url_event'] = base_url() . 'admin/utilities/event';
        $data['url_store'] = base_url() . 'admin/utilities/store';
        $data['url_logo'] = base_url() . 'admin/utilities/logo';
        $data['url_visi_misi'] = base_url() . 'admin/utilities/vm';
        $data['url_ba'] = base_url() . 'admin/utilities/ba';
        $data['pathViewLogo'] = $this->pathViewLogo;
        $queryLogo = $this->LogoModel->MdlSelect();
        $data['site_name'] = 'Admin Template';
        $data['sort_name_site'] = 'AT';
        $data['img_icon'] = base_url().'assets/img/favicon512.png';
        if(!empty($queryLogo)) $data['title'] = $queryLogo[0]['title'];
        if(!empty($queryLogo)) $data['site_name'] = $queryLogo[0]['title'];
        if(!empty($queryLogo)) $data['sort_name_site'] = $queryLogo[0]['sort_name'];
        if(!empty($queryLogo)) $data['img_icon'] = base_url().$this->pathViewLogo.$queryLogo[0]['filename'];

        return $data;
    }

    public function index(): string
    {
        $data = $this->defaultLoadSideBar();
        $data['title'] = 'Dashboard';
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
        $data['title'] = 'Users';

        $data['getListUser'] = $this->MstUserModel->MdlSelect();
        return view('Back/Admin/Users/users-list', $data);
    }

    public function applicationListRole(): string
    {
        $data = $this->defaultLoadSideBar();
        $data['title'] = 'Role';

        $data['getListRole'] = $this->MstRoleModel->MdlSelect();
        return view('Back/Admin/Users/role-list', $data);
    }

    public function applicationListProduct($paginate): string
    {
        $data = $this->defaultLoadSideBar();
        $data['title'] = 'Product';
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
            $res = $this->ProductModel->MdlProductInsert($data);
        }else{
            $data['updated_by'] = isset($_SESSION['username'])? session()->get('username'): "SYSTEM";
            $res = $this->ProductModel->MdlProductUpdatedById($id, $data);
        }
        if ($res) {
            $msgInfo = $this->GlobalValidation->success();
        } else {
            $msgInfo = $this->GlobalValidation->validation();
            $msgInfo['result'] = "Failed to save data";
        }
        session()->setFlashdata($msgInfo);
        return redirect()->to(base_url().'admin/listProduct/1');
    }

    public function deleteProduct($id) {
        $this->ProductModel->MdlProductDeleteById($id);

        return redirect()->to(base_url().'admin/listProduct/1');
    }

    public function applicationListSourceProduct($paginate): string
    {
        $data = $this->defaultLoadSideBar();
        $data['title'] = 'Source Product';
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
            $res = $this->ProductModel->MdlSourceProductInsert($data);
        }else{
            $data['updated_by'] = isset($_SESSION['username'])? session()->get('username'): "SYSTEM";
            $res = $this->ProductModel->MdlSourceProductUpdatedById($id, $data);
        }
        if ($res) {
            $msgInfo = $this->GlobalValidation->success();
        } else {
            $msgInfo = $this->GlobalValidation->validation();
            $msgInfo['result'] = "Failed to save data";
        }
        session()->setFlashdata($msgInfo);

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
        $data['viewPathProduct'] = $this->pathViewProduct;

        return view('Back/Admin/Product/detail-product-list', $data);
    }

    public function getDetailProduct($id) {
        $query = $this->ProductModel->MdlDetailProductSelectById($id);

        return json_encode($query);
    }

    public function postDetailProduct()
    {
        $msgInfo = $this->GlobalValidation->validation();
        $urlPrevious = $this->getUrlPrevious();
        $data = $_POST;
        unset($data['csrf_test_name']);
        if(!isset($data['active'])) $data['active'] = "0";
        $id = $data['id'];
        $getFile = service('request')->getFile('fileUpload');
        $checkData = $this->ProductModel->MdlProductSelect();
        $totalFile = count($checkData);
        $getFileSize = (int) $getFile->getSizeByUnit('mb');
        if($getFileSize > 3) {
            $msgInfo['result'] = "Max Upload File 3 Megabyte";
            session()->setFlashdata($msgInfo);
            return redirect()->to(base_url().$urlPrevious);
        }

        if ($getFile->isValid() && ! $getFile->hasMoved()) {
            $validate = $getFile->getClientMimeType() === "image/png" | $getFile->getClientMimeType() === "image/jpg" | $getFile->getClientMimeType() === "image/jpeg";
            if (!$validate) {
                $msgInfo['result'] = "File upload does not match the format";
                session()->setFlashdata($msgInfo);
                return redirect()->to(base_url().$urlPrevious);
            }
            $path = realpath($this->pathUploadProduct);
            $newName = $getFile->getName();
            if($getFile->getClientExtension() === "JPG") $newName = strtolower($getFile->getName());
            $data['filepath'] = $path .'/' . $newName;

            if($id == NULL){
                $idUniqFile = 'product_'.$totalFile.'_';
                $data['id'] = 0;
                $data['created_by'] = isset($_SESSION['username'])? session()->get('username'): "SYSTEM";
                $data['filename'] = $idUniqFile.$newName;
                $res = $this->ProductModel->MdlDetailProductInsert($data);
            }else{
                $idUniqFile = 'product_'.$totalFile.$id.'_';
                $oldFile = $data['filename'];
                $data['filename'] = $idUniqFile.$newName;
                $data['updated_by'] = isset($_SESSION['username'])? session()->get('username'): "SYSTEM";
                $res = $this->ProductModel->MdlDetailProductUpdatedById($id, $data);
                if($res) {
                    if ($oldFile) unlink($this->pathDeleteProduct . $oldFile);
                }
            }
            if ($res) {
                $msgInfo = $this->GlobalValidation->success();
                $getFile->move($path, $idUniqFile.$newName);
            } else {
                $msgInfo['result'] = "Failed to save data";
            }
            session()->setFlashdata($msgInfo);
        } else {
            if($id == NULL){
                $msgInfo['result'] = "Please fill in all data";
            }else{
                $data['updated_by'] = isset($_SESSION['username'])? session()->get('username'): "SYSTEM";
                $res = $this->ProductModel->MdlDetailProductUpdatedById($id, $data);
                if ($res) {
                    $msgInfo = $this->GlobalValidation->success();
                } else {
                    $msgInfo['result'] = "Failed to save data";
                }
            }
            session()->setFlashdata($msgInfo);
        }


        return print_r('<script type="text/javascript">window.location.href = "'.base_url().$urlPrevious.'"</script>', true);
    }

    public function deleteDetailProduct($id) {
        $urlPrevious = $this->getUrlPrevious();
        $queryGetById = $this->ProductModel->MdlDetailProductSelectById($id);
        if(count($queryGetById) > 0) unlink($this->pathDeleteProduct . $queryGetById[0]->filename);
        $this->ProductModel->MdlDetailProductDeleteById($id);
        $redirect = redirect()->to(base_url().$urlPrevious);
        return $redirect;
    }

    public function getUrlPrevious(): string
    {
        $getPrevious = previous_url(true)->getSegments();
        $result = "";
        foreach ($getPrevious as $index => $url){
            if($index > 0){
                $result .= $url;
                if($index !== count($getPrevious) - 1) $result .= '/';
            }
        }
        return $result;
    }
}
