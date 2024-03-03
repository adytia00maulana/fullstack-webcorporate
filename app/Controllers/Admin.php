<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Admin extends BaseController
{
    public function index(): string
    {
        $data['url_users_list'] = base_url() . 'admin/applicationListUsers';
        $data['url_role_list'] = base_url() . 'admin/applicationListRole';
        return view('adm_layout\dashboard', $data);
    }

    public function applicationListUsers(): string
    {
        $data['url_users_list'] = base_url() . 'admin/applicationListUsers';
        $data['url_role_list'] = base_url() . 'admin/applicationListRole';
        return view('Back\Admin\Users\users-list', $data);
    }

    public function applicationListRole(): string
    {
        $data['url_users_list'] = base_url() . 'admin/applicationListUsers';
        $data['url_role_list'] = base_url() . 'admin/applicationListRole';
        return view('Back\Admin\Users\role-list', $data);
    }
}
