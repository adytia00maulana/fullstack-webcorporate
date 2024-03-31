<?php

namespace App\Controllers;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Home extends BaseController
{

    public function index(): string {
        $data = [
            'title' => 'Home',
            'activeUrl' => site_url()
        ];
        return view('front/home', $data);
    }
    
    public function about() {
        $data = [
            'title' => 'about',
            'activeUrl' => site_url()
        ];
        return view('front/about', $data);
    }

    public function product(): string {
        $data = [
            'title' => 'Product',
            'activeUrl' => site_url()
        ];
        return view('front/product', $data);
    }

    public function contact(): string {
        $data = [
            'title' => 'Contact',
            'activeUrl' => site_url()
        ];
        return view('front/contact', $data);
    }
    
    public function gallery(): string {
        $data = [
            'title' => 'Gallery',
            'activeUrl' => site_url()
        ];
        return view('front/gallery', $data);
    }

    public function brand(): string {
        $data = [
            'title' => 'Brand Ambasador',
            'activeUrl' => site_url()
        ];
        return view('front/brand', $data);
    }

    public function info(): string {
        $data = [
            'title' => 'Info',
            'activeUrl' => site_url()
        ];
        return view('front/info', $data);
    }

    public function faq(): string {
        $data = [
            'title' => 'Home',
            'activeUrl' => site_url()
        ];
        return view('front/faq', $data);
    }
}
