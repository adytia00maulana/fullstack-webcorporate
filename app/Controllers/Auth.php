<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Auth extends BaseController
{
    public function login(): string {
        $data['title'] = 'Admin Login';
        return view('back/auth/login', $data);
    }

    public function check() : string {
        return 'cek login action';
    }

    public function logout() : string {
        return 'logout dan destroy session';
    }
}
