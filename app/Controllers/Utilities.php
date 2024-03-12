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

        return view('Back\Admin\Gallery\gallery', $data);
    }

    public function uploadGallery($id) {
        $body = array();
        if(isset($id)){
            if($id == 0){
                $getFile = service('request')->getFiles();
                foreach ($getFile['fileUpload'] as $img) {
                    if ($img->isValid() && ! $img->hasMoved()) {
                        if (!$this->validate([
                            'fileUpload' => 'mime_in[fileUpload,image/png,image/jpg,image/jpeg]|is_image[fileUpload]'
                        ])) {
                            print_r('<script type="text/javascript">alert("File upload tidak sesuai format");</script>');
                        }
                        $newName = $img->getName();
                        $newPath = '../public/assets/admin/img/gallery/' . $newName;
                        $value = array(
                            'id' => null,
                            'filename' => $newName,
                            'filepath' => $newPath,
                            'created_by' => '',
                            'created_date' => '',
                            'updated_by' => '',
                            'updated_date' => ''
                        );
                         $path = realpath('../public/assets/admin/img/gallery');
                         $img->move($path, $newName);
                    }

                    $res = $this->GalleryModel->MdlInsert($value);
                    if ($res) {
                        print_r('<script type="text/javascript">alert("Upload '. $newName .' Success");</script>');
                    } else {
                        print_r('<script type="text/javascript">alert("Upload '. $newName .' Failed");</script>');
                    }
                }
            }else{
                dd('ini bukan nol');
            }
        }

        return print_r('<script type="text/javascript">window.history.back();</script>');

        // dd(service('request')->getFile('fileUpload'));
//        $file = $this->request->getFile('fileUpload');
//        if ($file->isValid() && !$file->hasMoved()) {
//            if (!$this->validate([
//                'fileUpload' => 'mime_in[fileUpload,image/png,image/jpg,image/jpeg]|is_image[fileUpload]'
//            ])) {
//                $msg = "<strong>Info!</strong> File upload tidak sesuai format.";
//                $this->session->setFlashdata('message', $msg);
//                return redirect()->to('/' . config('app')->siteAdmin . '/mstKampus/add');
//            }
//
//            $path = realpath('./themes/PixelAdmin/images/kampus');
//            $nameFile = $file->getName();
//            $file->move($path, $nameFile, true);
//        }
//
//        $res = $this->appModel->MDL_Insert($nameFile);
//        if ($res) {
//            // Log Activity
//            $ket = "Master Institusi Pendidikan, Success insert data";
//            $this->authModel->saveLogActivity($ket);
//
//            $msg = "<strong>Well done!</strong> Success save data.";
//            $this->session->setFlashdata('message', $msg);
//            return redirect()->to('/' . config('app')->siteAdmin . '/mstKampus');
//        } else {
//            // Log Activity
//            $ket = "Master Institusi Pendidikan, Fail insert data";
//            $this->authModel->saveLogActivity($ket);
//
//            $msg = "<strong>Warning!</strong> Fail save data.";
//            $this->session->setFlashdata('message', $msg);
//        }
    }
}
