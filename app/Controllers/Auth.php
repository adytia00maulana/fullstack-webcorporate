<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use LogoModel;
use UserModel;

class Auth extends BaseController
{
    private $UserModel, $LogoModel;
    public $pathViewLogo;
    public function __construct()
    {
        $this->UserModel = model(UserModel::class);
        $this->LogoModel = model(LogoModel::class);
        $this->pathViewLogo = config('app')->viewLogo;
    }

    public function index()
    {
        $data['title'] = 'Admin - Login';
        $data['img_logo'] = base_url().'assets/admin/img/example-image.jpg';
        $queryLogo = $this->LogoModel->MdlSelect();
        $data['site_name'] = 'Admin Template';
        $data['img_icon'] = base_url().'assets/img/favicon512.png';
        if(!empty($queryLogo)) $data['title'] = $queryLogo[0]['title'];
        if(!empty($queryLogo)) $data['site_name'] = $queryLogo[0]['title'];
        if(!empty($queryLogo)) $data['img_logo'] = base_url().$this->pathViewLogo.$queryLogo[0]['filename'];
        if(!empty($queryLogo)) $data['img_icon'] = base_url().$this->pathViewLogo.$queryLogo[0]['filename'];

        return view('back/auth/login', $data);
    }

    public function loginAuth() {
        $session = session();
        $email = $this->request->getVar('email');
        $password = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
        
        $data_user = $this->UserModel->getAll();
        $res = '';
        foreach ($data_user as $key => $value) {
            $res = $value;
            $username = $res['username'];
            $user_email = $res['email'];
            $user_pass = $res['password'];
        }

        $get_num = $this->UserModel->countRow();
        if ($get_num > 0) {
            $verify_pass = password_verify($this->request->getVar('password'), $user_pass);
            if ($verify_pass != false) {
                $session_data = [
                    'username' => $username,
                    'email' => $user_email,
                    'roles' => 'admin',
                ];
                                                
                $session->set($session_data);
                return redirect()->route('admin');
            } else {
                $session->setFlashdata('msg', 'Password Salah !');
                return redirect()->route('login');
            }
        } else {
            $session->setFlashdata('msg', 'Email belum terdaftar silakan hubungi admin!');
            return redirect()->route('login');
        }
    }

    public function logout() {
        $session = session();
        $session->destroy();
        return redirect()->route('login');
    }
}
