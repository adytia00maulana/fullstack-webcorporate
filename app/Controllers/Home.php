<?php

namespace App\Controllers;
use App\Libraries\GlobalValidation;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use ProductModel;

class Home extends BaseController
{
    private $ProductModel;
    private $pathUploadProduct;
    private $pathViewProduct;
    private $pathDeleteProduct;
    public GlobalValidation $GlobalValidation;
    public function __construct()
    {
        $this->ProductModel = model(ProductModel::class);
        $this->pathUploadProduct = config('app')-> uploadProduct;
        $this->pathViewProduct = config('app')-> viewProduct;
        $this->pathDeleteProduct = config('app')-> deleteProduct;
        $this->GlobalValidation = new GlobalValidation();
    }
    public function defaultLoad(): array
    {
        $data['activeUrl'] = site_url();
        $data['getListProduct'] = $this->ProductModel->MdlProductSelectByActive();
        $data['getListStores'] = [
            array(
                'id' => 1,
                'name' => 'Toko Offline'
            ),
            array(
                'id' => 2,
                'name' => 'Toko Online'
            )
        ];
        $data['getListInfo'] = [
            array(
                'id' => 1,
                'name' => 'Brand Ambassador',
                'code' => 'brand'
            ),
            array(
                'id' => 2,
                'name' => 'Event',
                'code' => 'info'
            )
        ];

        return $data;
    }

    public function index(): string {
        $data = $this->defaultLoad();
        $data['title'] = 'Home';

        return view('front/home', $data);
    }
    
    public function about() {
        $data = $this->defaultLoad();
        $data['title'] = 'about';

        return view('front/about', $data);
    }

    public function product($id): string {
        $data = $this->defaultLoad();
        $data['title'] = 'Product';

        return view('front/product', $data);
    }

    public function contact(): string {
        $data = $this->defaultLoad();
        $data['title'] = 'Contact';

        return view('front/contact', $data);
    }
    
    public function gallery(): string {
        $data = $this->defaultLoad();
        $data['title'] = 'Gallery';

        return view('front/gallery', $data);
    }

    public function brand(): string {
        $data = $this->defaultLoad();
        $data['title'] = 'Brand Ambasador';

        return view('front/brand', $data);
    }

    public function info(): string {
        $data = $this->defaultLoad();
        $data['title'] = 'Info';

        return view('front/info', $data);
    }

    public function faq(): string {
        $data = $this->defaultLoad();
        $data['title'] = 'Home';

        return view('front/faq', $data);
    }
}
