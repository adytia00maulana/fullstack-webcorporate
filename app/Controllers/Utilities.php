<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;
use GalleryModel;
use ProductModel;

class Utilities extends BaseController
{
    public $GalleryModel, $ProductModel;
    public function __construct()
    {
        $this->GalleryModel = model(GalleryModel::class);
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

        return $data;
    }

    // public function index(): string
    // {
        // $data = $this->defaultLoadSideBar();
        // $data['getData'] = $this->AboutUsModel->MdlAboutUsSelectById(1);
        // // $data['getById'] = base_url() . 'admin/utilities/aboutUs/getAboutUsById/';
        // $data['post'] = base_url() . 'admin/utilities/aboutUs/postAboutUs';
        // // $data['deleteById'] = base_url() . 'admin/utilities/aboutUs/deleteAboutUsById/';

        // return view('Back\Admin\About_us\about_us', $data);
    // }

    // public function indexFaq(): string
    // {
        // $data = $this->defaultLoadSideBar();
        // $data['getData'] = $this->FaqModel->MdlFaqSelectById(1);
        // // $data['getById'] = base_url() . 'admin/utilities/aboutUs/getAboutUsById/';
        // $data['post'] = base_url() . 'admin/utilities/faq/postFaq';
        // // $data['deleteById'] = base_url() . 'admin/utilities/aboutUs/deleteAboutUsById/';

        // return view('Back\Admin\Faq\faq', $data);
    // }

    // public function getAboutUs($id) {
    //     $query = $this->AboutUsModel->MdlAboutUsSelectById($id);

    //     return json_encode($query);
    // }

    // public function postAboutUs()
    // {
    //     $data = $_POST;
    //     unset($data['csrf_test_name']);
    //     $id = $data['id'];
    //     if($id == NULL){
    //         $data['id'] = 0;
    //         $this->AboutUsModel->MdlAboutUsInsert($data);
    //     }else{
    //         $this->AboutUsModel->MdlAboutUsUpdatedById($id, $data);
    //     }

    //     $redirect = print_r('<script type="text/javascript">window.history.back();</script>');
    //     return $redirect;
    // }

    // public function deleteAboutUs($id) {
    //     $this->AboutUsModel->MdlAboutUsDeleteById($id);

    //     $redirect = print_r('<script type="text/javascript">window.history.back();</script>');
    //     return $redirect;
    // }

    // public function getFaq($id) {
    //     $query = $this->FaqModel->MdlFaqSelectById($id);

    //     return json_encode($query);
    // }

    // public function postFaq()
    // {
    //     $data = $_POST;
    //     unset($data['csrf_test_name']);
    //     $id = $data['id'];
    //     if($id == NULL){
    //         $data['id'] = 0;
    //         $this->FaqModel->MdlFaqInsert($data);
    //     }else{
    //         $this->FaqModel->MdlFaqUpdatedById($id, $data);
    //     }

    //     $redirect = print_r('<script type="text/javascript">window.history.back();</script>');
    //     return $redirect;
    // }

    // public function deleteFaq($id) {
    //     $this->FaqModel->MdlFaqDeleteById($id);

    //     $redirect = print_r('<script type="text/javascript">window.history.back();</script>');
    //     return $redirect;
    // }

    public function indexGallery()
    {
        $data = $this->defaultLoadSideBar();
        $data['getList'] = $this->GalleryModel->MdlSelect();
        $data['upload'] = base_url() . 'admin/utilities/gallery/upload/';
        $data['getById'] = base_url() . 'admin/utilities/gallery/getGalleryById/';
        $data['idUpdated'] = 0;
        $data['deleteById'] = base_url() . 'admin/utilities/gallery/deleteById/';

        return view('Back\Admin\Gallery\gallery', $data);
    }

     public function getGallery($id) {
         $query = $this->GalleryModel->MdlSelectById($id);

         return json_encode($query);
     }

    public function uploadGallery($id) {
        $path = realpath(ROOTPATH."/public/assets/img/gallery");
        $body = array();
        if(isset($id)){
            $getFile = service('request')->getFiles();
            foreach ($getFile['fileUpload'] as $img) {
                if ($img->isValid() && ! $img->hasMoved()) {
                    $validate = $img->getClientMimeType() === "image/png"|$img->getClientMimeType() === "image/jpg"|$img->getClientMimeType() === "image/jpeg";
                    if (!$validate) {
                        print_r('<script type="text/javascript">alert("File upload does not match the format"); window.history.back();</script>');
                        exit();
                    }
                    $newName = $img->getName();
                    $newPath = ROOTPATH.'/public/assets/admin/img/gallery/' . $newName;
                    $img->move($path, $newName);

                    if($id == 0){
                        $value = array(
                            'id' => null,
                            'filename' => $newName,
                            'filepath' => $newPath,
                            'created_by' => isset($_SESSION['username'])? session()->get('username'): "SYSTEM",
                            'created_date' => '',
                            'updated_by' => '',
                            'updated_date' => ''
                        );
                        $res = $this->GalleryModel->MdlInsert($value);
                        if ($res) {
                            print_r('<script type="text/javascript">alert("Upload '. $newName .' Success");</script>');
                        } else {
                            print_r('<script type="text/javascript">alert("Upload '. $newName .' Failed");</script>');
                        }
                    }else{
                        $value = array(
                            'id' => $id,
                            'filename' => $newName,
                            'filepath' => $newPath,
                            'created_by' => isset($_SESSION['username'])? session()->get('username'): "SYSTEM",
                            'created_date' => '',
                            'updated_by' => 'SYSTEM',
                            'updated_date' => ''
                        );
                        $res = $this->GalleryModel->MdlUpdatedById($id, $value);
                        if ($res) {
                            print_r('<script type="text/javascript">alert("Upload '. $newName .' Success");</script>');
                        } else {
                            print_r('<script type="text/javascript">alert("Upload '. $newName .' Failed");</script>');
                        }
                    }
                }

            }
        }

        return print_r('<script type="text/javascript">window.history.back();</script>');
    }

     public function deleteGallery($id, $fileName) {
         $path = './assets/img/gallery/'.$fileName;
         unlink($path);
         $this->GalleryModel->MdlDeleteById($id);
         $redirect = print_r('<script type="text/javascript">window.history.back();</script>');
         return $redirect;
     }
}
