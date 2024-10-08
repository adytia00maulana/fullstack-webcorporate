<?php

namespace App\Controllers;

use App\Libraries\GlobalValidation;
use BrandAmbassadorModel;
use CodeIgniter\HTTP\RedirectResponse;
use GalleryModel;
use InfoModel;
use LogoModel;
use ProductModel;
use VisiMisiModel;
use StoreModel;

class Utilities extends BaseController
{
    public $GalleryModel, $ProductModel, $InfoModel, $StoreModel, $AdminController, $GlobalValidation, $pathUploadGallery, $pathViewGallery, $pathDeleteGallery;
    // public GlobalValidation $GlobalValidation;
    // public Admin $AdminController;
    public $pathUploadLogo;
    public $pathViewLogo;
    public $pathDeleteLogo;
    public $pathUploadEvent;
    public $pathViewEvent;
    public $pathDeleteEvent;
    public $pathUploadBrandAmbassador;
    public $pathViewBrandAmbassador;
    public $pathDeleteBrandAmbassador;
    public $LogoModel;
    public $VisiMisiModel;
    public $brandAmbassadorModel;
    public function __construct()
    {
        $this->GalleryModel = model(GalleryModel::class);
        $this->InfoModel = model(InfoModel::class);
        $this->StoreModel = model(StoreModel::class);
        $this->ProductModel = model(ProductModel::class);
        $this->AdminController = new Admin();
        $this->GlobalValidation = new GlobalValidation();
        $this->pathUploadGallery = config('app')-> uploadGallery;
        $this->pathViewGallery = config('app')-> viewGallery;
        $this->pathDeleteGallery = config('app')-> deleteGallery;
        $this->pathUploadLogo = config('app')->uploadLogo;
        $this->pathViewLogo = config('app')->viewLogo;
        $this->pathDeleteLogo = config('app')->deleteLogo;
        $this->pathUploadEvent = config('app')->uploadEvent;
        $this->pathViewEvent = config('app')->viewEvent;
        $this->pathDeleteEvent = config('app')->deleteEvent;
        $this->pathUploadBrandAmbassador = config('app')->uploadBrandAmbassador;
        $this->pathViewBrandAmbassador = config('app')->viewBrandAmbassador;
        $this->pathDeleteBrandAmbassador = config('app')->deleteBrandAmbassador;
        $this->LogoModel = model(LogoModel::class);
        $this->VisiMisiModel = model(VisiMisiModel::class);
        $this->brandAmbassadorModel = model(BrandAmbassadorModel::class);
    }

    public function defaultLoadSideBar(): array
    {
        // $data['url_users_list'] = base_url() . 'admin/listUsers';
        // $data['url_role_list'] = base_url() . 'admin/listRole';
        $data['url_product_list'] = base_url() . 'admin/listProduct/';
        $data['url_detail_product_list'] = base_url() . 'admin/listDetailProduct/';
        $data['url_source_product_list'] = base_url() . 'admin/listSourceProduct/';
        $data['getListProduct'] = $this->ProductModel->MdlProductSelect();
        $data['url_gallery'] = base_url() . 'admin/utilities/gallery';
        $data = $this->AdminController->defaultLoadSideBar();
        return $data;
    }

    public function indexStore() {
        $data = $this->defaultLoadSideBar();
        $data['stores'] = $this->StoreModel->getAllData();
        return view('Back/Admin/Store/store' , $data);
    }


    public function formStore() {
        $data = $this->defaultLoadSideBar();
        $data['stores'] = $this->StoreModel->getAllData();
        return view('Back/Admin/Store/form', $data);
    }

    public function PostStore() {
        $data = $_POST;
        if ($data) {
            $this->StoreModel->InsertData($data);
            session()->setFlashdata('message', 'Create Store Success');
            return redirect()->route('admin/utilities/store');
        } else {
            alert('oops, error!');
            return view('Back/Admin/Store/form');
        }
    }
    

    public function indexEvent() {
        $data = $this->defaultLoadSideBar();
        $data['events'] = $this->InfoModel->getAllData();
        return view('Back/Admin/Info/info', $data);
    }

    public function formEvent() {
        $data = $this->defaultLoadSideBar();
        return view('Back/Admin/Info/form', $data);
    }

    public function PostEvent() {
        $msgInfo = $this->GlobalValidation->validation();
        $path = realpath($this->pathUploadEvent);
        $data = $_POST;
        unset($data['csrf_test_name']);
        $getFile = service('request')->getFile('fileUpload');
        if($getFile){
            $checkData = $this->InfoModel->getAllData();
            $totalFile = count($checkData);
            $getFileSize = (int) $getFile->getSizeByUnit('mb');
            if($getFileSize > 3) {
                $msgInfo['result'] = "Max Upload File 3 Megabyte";
                session()->setFlashdata($msgInfo);
                return redirect()->to(base_url('admin/utilities/form-event'));
            }
            if ($getFile->isValid() && ! $getFile->hasMoved()) {
                $validate = $getFile->getClientMimeType() === "image/png" | $getFile->getClientMimeType() === "image/jpg" | $getFile->getClientMimeType() === "image/jpeg";
                if (!$validate) {
                    $msgInfo['result'] = "File upload does not match the format";
                    session()->setFlashdata($msgInfo);
                    return redirect()->to(base_url('admin/utilities/form-event'));
                }

                $newName = $getFile->getName();
                if($getFile->getClientExtension() === "JPG") $newName = strtolower($getFile->getName());

                if ($data) {
                    $idUniqFile = 'event_'.$totalFile.'_';
                    $data['filename'] = $idUniqFile.$newName;
                    $res = $this->InfoModel->InsertData($data);
                    if($res) {
                        $getFile->move($path, $idUniqFile.$newName);
                        $msgInfo = $this->GlobalValidation->success();
                    }else{
                        $msgInfo['result'] = "Failed to save data";
                    }
                    session()->setFlashdata($msgInfo);
                } else {
                    $msgInfo['result'] = "Please Insert Value";
                    session()->setFlashdata($msgInfo);
                    return redirect()->to(base_url('admin/utilities/form-event'));
                }
            }else{
                $msgInfo['result'] = "Please Selected File";
                session()->setFlashdata($msgInfo);
                return redirect()->to(base_url('admin/utilities/form-event'));
            }
        }else{
            $msgInfo['result'] = "Please Selected File";
            session()->setFlashdata($msgInfo);
            return redirect()->to(base_url('admin/utilities/form-event'));
        }

        return redirect()->route('admin/utilities/event');
    }

    public function formDetailStore($id) {
        if ($id) {
            $data = $this->defaultLoadSideBar();
            $data['stores'] = $this->StoreModel->getById($id);
            return view('Back/Admin/Store/form-detail', $data);
        }        
    }

    public function UpdateStore($id) {
        $data = $_POST;
        if ($data) {
            $this->StoreModel->UpdateData($data, $id);
            session()->setFlashdata('message', 'Update Event Success');
            return redirect()->route('admin/utilities/store');
        } else {    
            alert('oops, error!');
            return view('Back/Admin/Store/form');
        }

    }

    public function formDetail($id) {
        $data = $this->defaultLoadSideBar();
        $data['viewPathEvent'] = $this->pathViewEvent;
        $msgInfo = $this->GlobalValidation->validation();
        if ($id) {
            $dataEvents = $this->InfoModel->getById($id);
            if($dataEvents){
                $data['id'] = $dataEvents['id'];
                $data['event_name'] = $dataEvents['event_name'];
                $data['img_name'] = $dataEvents['img_name'];
                $data['description'] = $dataEvents['description'];
                $data['filename'] = $dataEvents['filename'];
                $data['start_date'] = $dataEvents['start_date'];
                $data['end_date'] = $dataEvents['end_date'];
                $data['created'] = $dataEvents['created'];
                $data['updated'] = $dataEvents['updated'];
            }else{
                $msgInfo['result'] = "Data not Found";
                session()->setFlashdata($msgInfo);
                return redirect()->route('admin/utilities/event');
            }
        }else{
            $msgInfo['result'] = "Data not Found";
            session()->setFlashdata($msgInfo);
            return redirect()->route('admin/utilities/event');
        }
        return view('Back/Admin/Info/form-detail', $data);
    }

    public function UpdateEvent($id) {
        $msgInfo = $this->GlobalValidation->validation();
        $path = realpath($this->pathUploadEvent);
        $data = $_POST;
        unset($data['csrf_test_name']);
        $getFile = service('request')->getFile('fileUpload');
        if($getFile){
            $getFileSize = (int) $getFile->getSizeByUnit('mb');
            if($getFileSize > 3) {
                $msgInfo['result'] = "Max Upload File 3 Megabyte";
                session()->setFlashdata($msgInfo);
                return redirect()->to(base_url().'admin/utilities/form-detail-event/'.$id);
            }
            if ($getFile->isValid() && ! $getFile->hasMoved()) {
                $validate = $getFile->getClientMimeType() === "image/png" | $getFile->getClientMimeType() === "image/jpg" | $getFile->getClientMimeType() === "image/jpeg";
                if (!$validate) {
                    $msgInfo['result'] = "File upload does not match the format";
                    session()->setFlashdata($msgInfo);
                    return redirect()->to(base_url().'admin/utilities/form-detail-event/'.$id);
                }

                $newName = $getFile->getName();
                if($getFile->getClientExtension() === "JPG") $newName = strtolower($getFile->getName());

                if ($data) {
                    $idUniqFile = 'event_'.$id.'_';
                    $oldFile = $data['filename'];
                    $data['filename'] = $idUniqFile.$newName;
                    $res = $this->InfoModel->UpdateData($data, $id);
                    if($res) {
                        if($oldFile) unlink($this->pathDeleteEvent . $oldFile);
                        $getFile->move($path, $idUniqFile.$newName);
                        $msgInfo = $this->GlobalValidation->success();
                    }else{
                        $msgInfo['result'] = "Failed to save data";
                    }
                    session()->setFlashdata($msgInfo);
                } else {
                    $msgInfo['result'] = "Please Insert Value";
                    session()->setFlashdata($msgInfo);
                    return redirect()->to(base_url().'admin/utilities/form-detail-event/'.$id);
                }
            }else{
                $res = $this->InfoModel->UpdateData($data, $id);
                if($res) {
                    $msgInfo = $this->GlobalValidation->success();
                }else{
                    $msgInfo['result'] = "Failed to save data";
                }
                session()->setFlashdata($msgInfo);
            }
        }else{
            $msgInfo['result'] = "Please Selected File";
            session()->setFlashdata($msgInfo);
            return redirect()->to(base_url().'admin/utilities/form-detail-event/'.$id);
        }

        return $this->formDetail($id);
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
        $idUniqFile = 0;
        $getFile = service('request')->getFiles();
        $totalFile = count($getFile['fileUpload']);
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
            foreach ($getFile['fileUpload'] as $key=>$img) {
                if ($img->isValid() && ! $img->hasMoved()) {
                    $validate = $img->getClientMimeType() === "image/png"|$img->getClientMimeType() === "image/jpg"|$img->getClientMimeType() === "image/jpeg";
                    if (!$validate) {
                        $msgInfo['result'] = "File upload does not match the format";
                        session()->setFlashdata($msgInfo);
                        return redirect()->route('admin/utilities/gallery');
                    }
                    $checkData = count($this->GalleryModel->MdlSelect());
                    $newName = $img->getName();
                    if($img->getClientExtension() === "JPG") $newName = strtolower($img->getName());
                    $newPath = $path.'/' . $newName;

                    if($id == 0){
                        $idUniqFile = 'gallery_'.$totalFile.$key.'_';
                        $value = array(
                            'id' => null,
                            'filename' => $idUniqFile.$newName,
                            'filepath' => $newPath,
                            'position' => $checkData,
                            'created_by' => isset($_SESSION['username'])? session()->get('username'): "SYSTEM",
                            'created_date' => '',
                            'updated_by' => '',
                            'updated_date' => ''
                        );
                        $res = $this->GalleryModel->MdlInsert($value);
                    }else{
                        $idUniqFile = 'gallery_'.$id.'_';
                        $value = array(
                            'id' => $id,
                            'filename' => $idUniqFile.$newName,
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
                        $img->move($path, $idUniqFile.$newName);
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
        $getLogo = $this->LogoModel->MdlSelect();
        if(count($getLogo) > 0){
            $data['id'] = $getLogo[0]['id'];
            $data['filename'] = $getLogo[0]['filename'];
            $data['title'] = $getLogo[0]['title'];
            $data['created_by'] = $getLogo[0]['created_by'];
            $data['created_date'] = $getLogo[0]['created_date'];
            $data['updated_by'] = $getLogo[0]['updated_by'];
            $data['updated_date'] = $getLogo[0]['updated_date'];
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
        $idUniqFile = 0;
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
            if($getFile->getClientExtension() === "JPG") $newName = strtolower($getFile->getName());
        }
        if($id == 0){
            $idUniqFile = 'logo_';
            $data['id'] = 0;
            $data['created_by'] = isset($_SESSION['username'])? session()->get('username'): "SYSTEM";
            $data['filename'] = $idUniqFile.$newName;
            $query = $this->LogoModel->MdlInsert($data);
        }else{
            $idUniqFile = 'logo_'.$id.'_';
            $oldFile = $data['filename'];
            $data['filename'] = $idUniqFile.$newName;
            $data['updated_by'] = isset($_SESSION['username'])? session()->get('username'): "SYSTEM";
            $query = $this->LogoModel->MdlUpdatedById($id, $data);
            if($query) {
                 if($oldFile) unlink($this->pathDeleteLogo . $oldFile);
            }
        }
        if ($query) {
            $msgInfo = $this->GlobalValidation->success();
            $msgInfo['result'] = "Upload ".$newName." Success";
            $getFile->move($path, $idUniqFile.$newName);
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


    public function indexBrandAmbassador()
    {
        $data = $this->defaultLoadSideBar();
        $data['getList'] = $this->brandAmbassadorModel->MdlSelect();
        $data['upload'] = base_url() . 'admin/utilities/ba/upload/';
        $data['idUpdated'] = 0;
        $data['deleteById'] = base_url() . 'admin/utilities/ba/deleteById/';
        $data['updatePosition'] = base_url() . 'admin/utilities/ba/updatePosition';
        $data['viewPathBa'] = $this->pathViewBrandAmbassador;
        return view('Back/Admin/Brand_ambassador/brandAmbassador', $data);
    }

    public function uploadBrandAmbassador($id) {
        $msgInfo = $this->GlobalValidation->validation();
        $totalSize = 0;
        $getFile = service('request')->getFiles();
        $totalFile = count($getFile['fileUpload']);
        $idUniqFile = 0;
        foreach ($getFile['fileUpload'] as $validSize) {
            $totalSize += (int) $validSize->getSizeByUnit('mb');
        }
        if($totalSize > 8) {
            session()->setFlashdata($msgInfo);
            return redirect()->route('admin/utilities/ba');
        }
        if(isset($id)){
            $storeValidate = array();
            $path = $this->pathUploadBrandAmbassador;
            foreach ($getFile['fileUpload'] as $key=>$img) {
                if ($img->isValid() && ! $img->hasMoved()) {
                    $validate = $img->getClientMimeType() === "image/png"|$img->getClientMimeType() === "image/jpg"|$img->getClientMimeType() === "image/jpeg";
                    if (!$validate) {
                        $msgInfo['result'] = "File upload does not match the format";
                        session()->setFlashdata($msgInfo);
                        return redirect()->route('admin/utilities/ba');
                    }
                    $checkData = count($this->brandAmbassadorModel->MdlSelect());
                    $newName = $img->getName();
                    if($img->getClientExtension() === "JPG") $newName = strtolower($img->getName());

                    if($id == 0){
                        $idUniqFile = 'ba_'.$totalFile.$key.'_';
                        $value = array(
                            'id' => null,
                            'filename' => $idUniqFile.$newName,
                            'position' => $checkData,
                            'created_by' => isset($_SESSION['username'])? session()->get('username'): "SYSTEM",
                            'created_date' => '',
                            'updated_by' => '',
                            'updated_date' => ''
                        );
                        $res = $this->brandAmbassadorModel->MdlInsert($value);
                    }else{
                        $idUniqFile = 'ba_'.$totalFile.$id.'_';
                        $value = array(
                            'id' => $id,
                            'filename' => $idUniqFile.$newName,
                            'position' => $checkData,
                            'created_date' => '',
                            'updated_by' => isset($_SESSION['username'])? session()->get('username'): "SYSTEM",
                            'updated_date' => ''
                        );
                        $res = $this->brandAmbassadorModel->MdlUpdatedById($id, $value);
                        if ($res) unlink($this->pathDeleteBrandAmbassador.$_POST['filename']);
                    }
                    if ($res) {
                        $success = $this->GlobalValidation->success();
                        $success['result'] = 'Upload '. $newName .' Success';
                        $storeValidate[] = $success;
                        $img->move($path, $idUniqFile.$newName);
                    } else {
                        $fail = $this->GlobalValidation->validation();
                        $fail['result'] = 'Upload '. $newName .' Failed';
                        $storeValidate[] = $fail;
                    }
                }
            }
            session()->setFlashdata('flashData', $storeValidate);
        }

        return redirect()->route('admin/utilities/ba');
    }

    public function deleteBrandAmbassador($id, $fileName) {
        $path = $this->pathDeleteBrandAmbassador.$fileName;
        unlink($path);
        $this->brandAmbassadorModel->MdlDeleteById($id);
        $redirect = redirect()->to(base_url().'admin/utilities/ba');
        return $redirect;
    }

    public function updatePositionBrandAmbassador() {
        $data = $_POST;
        $start = $data['index_start'];
        $end = $data['index_end'];
        $selectStart = $this->brandAmbassadorModel->MdlGetByPosition($start);
        $selectEnd = $this->brandAmbassadorModel->MdlGetByPosition($end);
        $idStart = $selectStart[0]['id'];
        $idEnd = $selectEnd[0]['id'];
        $selectStart[0]['position'] = $end;
        $selectStart[0]['updated_by'] = isset($_SESSION['username'])? session()->get('username'): "SYSTEM";
        $selectEnd[0]['position'] = $start;
        $selectEnd[0]['updated_by'] = isset($_SESSION['username'])? session()->get('username'): "SYSTEM";

        if(count($selectStart)>0) $this->brandAmbassadorModel->MdlUpdatedById($idStart, $selectStart[0]);
        if(count($selectStart)>0) $this->brandAmbassadorModel->MdlUpdatedById($idEnd, $selectEnd[0]);
        $msgInfo = $this->GlobalValidation->success();
        $msgInfo['result'] = "Successfully moved the data";
        session()->setFlashdata($msgInfo);
        return json_encode(base_url().'admin/utilities/ba');
    }

}
