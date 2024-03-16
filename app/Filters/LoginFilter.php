<?php
namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;


class LoginFilter implements FilterInterface
{
    public function before(RequestInterface $req, $arguments = null)
    {
        // $userdata = $_SESSION['username'];
        $userdata = session()->get('username');
        $validated = isset($userdata) ? true : false;

        if (!$validated) return redirect()->to(base_url('/login'));

    }

    public function after(RequestInterface $req, ResponseInterface $res, $arguments = null)
    {
        // placeholder
    }
}

?>