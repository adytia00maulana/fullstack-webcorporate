<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use UserModel;

class Auth extends BaseController
{
    private $UserModel;
    public function __construct()
    {
        $this->UserModel = model(UserModel::class);
    }

    public function login(): string {
        $data['title'] = 'Admin - Login';
        return view('back/auth/login', $data);
    }
    
    public function check() : string {
        $data['users'] = $this->UserModel->getAll();
        $result = [];

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        foreach ($data as $key => $value) {
            $result = $value[0]['email'];
        }

        if ($result == $email) {
            return 'login action berhasil';
        } else {
            return view('back/auth/login');
        }
    }

    public function logout() : string {
        return 'logout dan destroy session';
    }
}
