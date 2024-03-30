<?php

namespace App\Controllers;

use App\Libraries\GlobalValidation;
use CodeIgniter\HTTP\RedirectResponse;
use GalleryModel;
use InfoModel;
use LogoModel;
use ProductModel;
use VisiMisiModel;

class Utilities extends BaseController
{
    public $GalleryModel, $ProductModel, $InfoModel, $pathUploadGallery, $pathViewGallery, $pathDeleteGallery;
    public GlobalValidation $GlobalValidation;
    public Admin $AdminController;
    public $pathUploadLogo;
    public $pathViewLogo;
    public $pathDeleteLogo;
    public $LogoModel;
    public $VisiMisiModel;
    public function __construct()
    {
        $this->GalleryModel = model(GalleryModel::class);
        $this->InfoModel = model(InfoModel::class);
        $this->ProductModel = model(ProductModel::class);
        $this->AdminController = new Admin();
        $this->GlobalValidation = new GlobalValidation();
        $this->pathUploadGallery = config('app')-> uploadGallery;
        $this->pathViewGallery = config('app')-> viewGallery;
        $this->pathDeleteGallery = config('app')-> deleteGallery;
        $this->pathUploadLogo = config('app')->uploadLogo;
        $this->pathViewLogo = config('app')->viewLogo;
        $this->pathDeleteLogo = config('app')->deleteLogo;
        $this->LogoModel = model(LogoModel::class);
        $this->VisiMisiModel = model(VisiMisiModel::class);
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
        $data['url_event'] = base_url() . 'admin/utilities/event';
        $data = $this->AdminController->defaultLoadSideBar();
        return $data;
    }

    public function indexEvent() {
        $data = $this->defaultLoadSideBar();
        $data['events'] = $this->InfoModel->getAllData();
        return view('Back/Admin/Info/info', $data);
    }

    public function formEvent() {
        $data = $this->defaultLoadSideBar();
        $data['events'] = $this->InfoModel->getAllData();
        return view('Back/Admin/Info/form', $data);
    }

    public function PostEvent() {
        $data = $_POST;
        if ($data) {
            $this->InfoModel->InsertData($data);
            session()->setFlashdata('message', 'Create Event Success');
            return redirect()->route('admin/utilities/event');
        } else {
            alert('oops, error!');
            return view('Back/Admin/Info/form');
        }
    }

    public function formDetail($id) {
        if ($id) {
            $data = $this->defaultLoadSideBar();
            $data['events'] = $this->InfoModel->getById($id);
            return view('Back/Admin/Info/form-detail', $data);
        }        
    }

    public function UpdateEvent($id) {
        $data = $_POST;
        if ($data) {
            $this->InfoModel->UpdateData($data, $id);
            session()->setFlashdata('message', 'Update Event Success');
            return redirect()->route('admin/utilities/event');
        } else {    
            alert('oops, error!');
            return view('Back/Admin/Info/form');
        }

    }

    public function indexGallery()
    {
        $data = $this->defaultLoadSideBar();
        $data['getList'] = $this->GalleryModel->MdlSelect();
        $data['upload'] = base_url() . 'admin/utilities/gallery/upload/';
        $data['getById'] = base_url() . 'admin/utilities/gallery/getGalleryById/';
        $data['idUpdated'] = 0;
        $data['deleteById'] = base_url() . 'admin/utilities/gallery/deleteById/';
        $data['updatePosition'] = base_url() . 'admin/utilities/gallery/updatePosition';
        $data['viewPathGallery'] = $this->pathViewGallery;
        return view('Back/Admin/Gallery/gallery', $data);
    }

     public function getGallery($id) {
         $query = $this->GalleryModel->MdlSelectById($id);

         return json_encode($query);
     }

    public function uploadGallery($id) {
        $msgInfo = $this->GlobalValidation->validation();
        $totalSize = 0;
        $getFile = service('request')->getFiles();
        foreach ($getFile['fileUpload'] as $validSize) {
            $totalSize += (int) $validSize->getSizeByUnit('mb');
        }
        if($totalSize > 8) {
            session()->setFlashdata($msgInfo);
            return redirect()->route('admin/utilities/gallery');
        }
        if(isset($id)){
            $storeValidate = array();
            $path = $this->pathUploadGallery;
            foreach ($getFile['fileUpload'] as $img) {
                if ($img->isValid() && ! $img->hasMoved()) {
                    $validate = $img->getClientMimeType() === "image/png"|$img->getClientMimeType() === "image/jpg"|$img->getClientMimeType() === "image/jpeg";
                    if (!$validate) {
                        $msgInfo['result'] = "File upload does not match the format";
                        session()->setFlashdata($msgInfo);
                        return redirect()->route('admin/utilities/gallery');
                    }
                    $checkData = count($this->GalleryModel->MdlSelect());
                    $newName = $img->getName();
                    $newPath = $path.'/' . $newName;

                    if($id == 0){
                        $value = array(
                            'id' => null,
                            'filename' => $newName,
                            'filepath' => $newPath,
                            'position' => $checkData,
                            'created_by' => isset($_SESSION['username'])? session()->get('username'): "SYSTEM",
                            'created_date' => '',
                            'updated_by' => '',
                            'updated_date' => ''
                        );
                        $res = $this->GalleryModel->MdlInsert($value);
                    }else{
                        $value = array(
                            'id' => $id,
                            'filename' => $newName,
                            'filepath' => $newPath,
                            'position' => $checkData,
                            'created_date' => '',
                            'updated_by' => isset($_SESSION['username'])? session()->get('username'): "SYSTEM",
                            'updated_date' => ''
                        );
                        $res = $this->GalleryModel->MdlUpdatedById($id, $value);
                        if ($res) unlink($this->pathDeleteGallery.$_POST['filename']);
                    }
                    if ($res) {
                        $success = $this->GlobalValidation->success();
                        $success['result'] = 'Upload '. $newName .' Success';
                        $storeValidate[] = $success;
                        $img->move($path, $newName);
                    } else {
                        $fail = $this->GlobalValidation->validation();
                        $fail['result'] = 'Upload '. $newName .' Failed';
                        $storeValidate[] = $fail;
                    }
                }
            }
            session()->setFlashdata('flashData', $storeValidate);
        }

        return redirect()->route('admin/utilities/gallery');
    }

     public function deleteGallery($id, $fileName) {
         $path = $this->pathDeleteGallery.$fileName;
         unlink($path);
         $this->GalleryModel->MdlDeleteById($id);
         $redirect = redirect()->to(base_url().'admin/utilities/gallery');
         return $redirect;
     }

     public function updatePositionGallery() {
        $data = $_POST;
        $start = $data['index_start'];
        $end = $data['index_end'];
        $selectStart = $this->GalleryModel->MdlGetByPosition($start);
        $selectEnd = $this->GalleryModel->MdlGetByPosition($end);
        $idStart = $selectStart[0]['id'];
        $idEnd = $selectEnd[0]['id'];
        $selectStart[0]['position'] = $end;
        $selectStart[0]['updated_by'] = isset($_SESSION['username'])? session()->get('username'): "SYSTEM";
        $selectEnd[0]['position'] = $start;
        $selectEnd[0]['updated_by'] = isset($_SESSION['username'])? session()->get('username'): "SYSTEM";

        if(count($selectStart)>0) $this->GalleryModel->MdlUpdatedById($idStart, $selectStart[0]);
        if(count($selectStart)>0) $this->GalleryModel->MdlUpdatedById($idEnd, $selectEnd[0]);
        $msgInfo = $this->GlobalValidation->success();
        $msgInfo['result'] = "Successfully moved the data";
        session()->setFlashdata($msgInfo);
        return json_encode(base_url().'admin/utilities/gallery');
     }


    public function indexLogo()
    {
        $data = $this->defaultLoadSideBar();
        $data['postData'] = base_url()."admin/utilities/logo/postLogo";
        $data['viewPathLogo'] = $this->pathViewLogo;
        $data['id'] = null;
        $data['filename'] = "";
        $data['title'] = "";
        $data['created_by'] = "";
        $data['created_date'] = "";
        $data['updated_by'] = "";
        $data['updated_date'] = "";
        $getLogo = $this->LogoModel->MdlSelect()[0];
        if($getLogo){
            $data['id'] = $getLogo['id'];
            $data['filename'] = $getLogo['filename'];
            $data['title'] = $getLogo['title'];
            $data['created_by'] = $getLogo['created_by'];
            $data['created_date'] = $getLogo['created_date'];
            $data['updated_by'] = $getLogo['updated_by'];
            $data['updated_date'] = $getLogo['updated_date'];
        }
        return view('Back/Admin/Logo/logo', $data);
    }

    public function getUpload($id) {
        $query = $this->LogoModel->MdlSelectById($id);

        return json_encode($query);
    }

    public function postLogo(){
        $path = realpath($this->pathUploadLogo);
        $msgInfo = $this->GlobalValidation->validation();
        $data = $_POST;
        $newName = "";
        unset($data['csrf_test_name']);
        $id = $data['id'];
        $getFile = service('request')->getFile('fileUpload');
        $getFileSize = (int) $getFile->getSizeByUnit('mb');
        if($getFileSize > 3) {
            $msgInfo['result'] = "Max Upload File 3 Megabyte";
            session()->setFlashdata($msgInfo);
            return redirect()->route('admin/utilities/logo');
        }

        if ($getFile->isValid() && ! $getFile->hasMoved()) {
            $validate = $getFile->getClientMimeType() === "image/png" | $getFile->getClientMimeType() === "image/jpg" | $getFile->getClientMimeType() === "image/jpeg";
            if (!$validate) {
                $msgInfo['result'] = "File upload does not match the format";
                session()->setFlashdata($msgInfo);
                return redirect()->route('admin/utilities/logo');
            }
            $newName = $getFile->getName();
        }

        if($id == NULL){
            $data['id'] = 0;
            $data['created_by'] = isset($_SESSION['username'])? session()->get('username'): "SYSTEM";
            $data['filename'] = $newName;
            $query = $this->LogoModel->MdlInsert($data);
        }else{
            $oldFile = $data['filename'];
            $data['filename'] = $newName;
            $data['updated_by'] = isset($_SESSION['username'])? session()->get('username'): "SYSTEM";
            $query = $this->LogoModel->MdlUpdatedById($id, $data);
            if($query) {
                 if($oldFile) unlink($this->pathDeleteLogo . $oldFile);
            }
        }
        if ($query) {
            $msgInfo = $this->GlobalValidation->success();
            $msgInfo['result'] = "Upload ".$newName." Success";
            $getFile->move($path, $newName);
        } else {
            $msgInfo['result'] = "Upload ".$newName." Failed";
        }
        session()->setFlashdata($msgInfo);
        return redirect()->route('admin/utilities/logo');
    }


    public function indexVm(): string
    {
        $data = $this->defaultLoadSideBar();
        $data['postData'] = base_url()."admin/utilities/vm/postVm";
        $data['id'] = null;
        $data['visi'] = "";
        $data['misi'] = "";
        $data['created_by'] = "";
        $data['created_date'] = "";
        $data['updated_by'] = "";
        $data['updated_date'] = "";
        $getVm = $this->VisiMisiModel->MdlSelect();
        if(count($getVm) > 0){
            $data['id'] = $getVm[0]['id'];
            $data['visi'] = $getVm[0]['visi'];
            $data['misi'] = $getVm[0]['misi'];
            $data['created_by'] = $getVm[0]['created_by'];
            $data['created_date'] = $getVm[0]['created_date'];
            $data['updated_by'] = $getVm[0]['updated_by'];
            $data['updated_date'] = $getVm[0]['updated_date'];
        }
        return view('Back/Admin/Visi_misi/visi_misi.php', $data);
    }

    public function postVm(): RedirectResponse
    {
        $msgInfo = $this->GlobalValidation->validation();
        $data = $_POST;
        unset($data['csrf_test_name']);
        $id = $data['id'];
        if($id == 0){
            $data['id'] = 0;
            $data['created_by'] = isset($_SESSION['username'])? session()->get('username'): "SYSTEM";
            $query = $this->VisiMisiModel->MdlInsert($data);
        }else{
            $data['updated_by'] = isset($_SESSION['username'])? session()->get('username'): "SYSTEM";
            $query = $this->VisiMisiModel->MdlUpdatedById($id, $data);
        }
        if ($query) {
            $msgInfo = $this->GlobalValidation->success();
        } else {
            $msgInfo['result'] = "Failed";
        }
        session()->setFlashdata($msgInfo);
        return redirect()->route('admin/utilities/vm');
    }

}
