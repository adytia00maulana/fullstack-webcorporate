<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;
use FaqModel;
use MstRoleModel;
use MstUserModel;
use ProductModel;
use AboutUsModel;

class Utilities extends BaseController
{
    private $AboutUsModel, $FaqModel, $MstUserModel, $MstRoleModel, $ProductModel;
    public function __construct()
    {
        $this->MstUserModel = model(MstUserModel::class);
        $this->MstRoleModel = model(MstRoleModel::class);
        $this->ProductModel = model(ProductModel::class);
        $this->AboutUsModel = model(AboutUsModel::class);
        $this->FaqModel     = model(FaqModel::class);
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

    public function indexFaq(): string
    {
        $data = $this->defaultLoadSideBar();
        $data['getData'] = $this->FaqModel->MdlFaqSelectById(1);
        // $data['getById'] = base_url() . 'admin/utilities/aboutUs/getAboutUsById/';
        $data['post'] = base_url() . 'admin/utilities/faq/postFaq';
        // $data['deleteById'] = base_url() . 'admin/utilities/aboutUs/deleteAboutUsById/';

        return view('Back\Admin\Faq\faq', $data);
    }

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

    public function uploadGallery() {
        $nameFile = "";
        $file = $this->request->getFile('fupload');
        if ($file->isValid() && !$file->hasMoved()) {
            if (!$this->validate([
                // 'menuid' => 'required',
                'fupload' => 'mime_in[fupload,image/png,image/jpg,image/jpeg]|is_image[fupload]'
            ])) {
                // $validation = \Config\Services::validation();
                // $msg = $validation->getError('fupload'); //$validation->listErrors();
                $msg = "<strong>Info!</strong> File upload tidak sesuai format.";
                $this->session->setFlashdata('message', $msg);
                return redirect()->to('/' . config('app')->siteAdmin . '/mstKampus/add');
            }

            $path = realpath('./themes/PixelAdmin/images/kampus');
            $nameFile = $file->getName();
            $file->move($path, $nameFile, true);
        }

        $res = $this->appModel->MDL_Insert($nameFile);
        if ($res) {
            // Log Activity
            $ket = "Master Institusi Pendidikan, Success insert data";
            $this->authModel->saveLogActivity($ket);

            $msg = "<strong>Well done!</strong> Success save data.";
            $this->session->setFlashdata('message', $msg);
            return redirect()->to('/' . config('app')->siteAdmin . '/mstKampus');
        } else {
            // Log Activity
            $ket = "Master Institusi Pendidikan, Fail insert data";
            $this->authModel->saveLogActivity($ket);

            $msg = "<strong>Warning!</strong> Fail save data.";
            $this->session->setFlashdata('message', $msg);
            return redirect()->to('/' . config('app')->siteAdmin . '/mstKampus/add');
        }
    }
}
