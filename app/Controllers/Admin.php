<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use MstRoleModel;
use MstUserModel;

class Admin extends BaseController
{
    private $MstUserModel, $MstRoleModel;
    public function __construct()
    {
        $this->MstUserModel = model(MstUserModel::class);
        $this->MstRoleModel = model(MstRoleModel::class);
    }

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

        $data['getListUser'] = $this->MstUserModel->MdlSelect();
        return view('Back\Admin\Users\users-list', $data);
    }

    public function applicationListRole(): string
    {
        $data['url_users_list'] = base_url() . 'admin/applicationListUsers';
        $data['url_role_list'] = base_url() . 'admin/applicationListRole';

        $data['getListRole'] = $this->MstRoleModel->MdlSelect();
        return view('Back\Admin\Users\role-list', $data);
    }
}
