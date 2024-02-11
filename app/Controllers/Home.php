<?php

namespace App\Controllers;

class Home extends BaseController
{
    
    public function index(): string {
        $data = ['title' => 'Home'];
        return view('front/home', $data);
    }
    
    public function about(): string {
        $data = ['title' => 'About'];
        return view('front/about', $data);
    }

    public function product(): string {
        $data = ['title' => 'Product'];
        return view('front/product', $data);
    }

    public function contact(): string {
        $data = ['title' => 'Contact'];
        return view('front/contact', $data);
    }
    
    public function gallery(): string {
        $data = ['title' => 'Gallery'];
        return view('front/gallery', $data);
    }

    public function info(): string {
        $data = ['title' => 'Info'];
        return view('front/info', $data);
    }

    public function faq(): string {
        $data = ['title' => 'Home'];
        return view('front/gallery', $data);
    }
}
