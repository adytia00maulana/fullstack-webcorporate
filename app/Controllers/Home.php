<?php

namespace App\Controllers;
use App\Libraries\GlobalValidation;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use GalleryModel;
use ProductModel;
use LogoModel;
use StoreModel;

class Home extends BaseController
{
    private $LogoModel;
    private $ProductModel;
    private $StoreModel;
    public $GalleryModel;
    public $pathViewProduct;
    public $pathViewDetailProduct;
    public $pathViewGallery;
    public $pathViewLogo;
    public $pathViewEvent;
    public $pathViewBrandAmbassador;
    public $pathViewStore;
    public GlobalValidation $GlobalValidation;
    public function __construct()
    {
        $this->LogoModel = model(LogoModel::class);
        $this->ProductModel = model(ProductModel::class);
        $this->StoreModel = model(StoreModel::class);
        $this->GalleryModel = model(GalleryModel::class);
        $this->pathViewProduct = config('app')-> viewProduct;
        $this->pathViewDetailProduct = config('app')-> viewDetailProduct;
        $this->pathViewGallery = config('app')-> viewGallery;
        $this->pathViewLogo = config('app')->viewLogo;
        $this->pathViewEvent = config('app')->viewEvent;
        $this->pathViewBrandAmbassador = config('app')->viewBrandAmbassador;
        $this->pathViewStore = config('app')->viewStore;
        $this->GlobalValidation = new GlobalValidation();
    }
    public function defaultLoad(): array
    {
        $data['divVideo'] = 'hidden';
        $data['viewPathProduct'] = $this->pathViewProduct;
        $data['viewPathDetailProduct'] = $this->pathViewDetailProduct;
        $data['viewPathGallery'] = $this->pathViewGallery;
        $data['viewPathLogo'] = $this->pathViewLogo;
        $data['viewPathEvent'] = $this->pathViewEvent;
        $data['viewPathBrandAmbassador'] = $this->pathViewBrandAmbassador;
        $data['viewStore'] = $this->pathViewStore;
        $data['activeUrl'] = site_url();
        $data['getLogo'] = $this->LogoModel->MdlSelect();
        $data['getListProduct'] = $this->ProductModel->MdlProductSelectByActive();
        $data['getListStores'] = $this->StoreModel->getRefStore();
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
        $data['divVideo'] = 'show';
        $data['getAllStores'] = $this->StoreModel->getAllData();
        
        return view('Front/home', $data);
    }

    public function product($id): string {
        $data = $this->defaultLoad();
        $data['title'] = 'Product';
        $data['url_detail_product'] = base_url() . 'detailProduct/';
        $data['getListDetailProduct'] = $this->ProductModel->MdlDetailProductSelectByIdProduct($id);
        
        return view('Front/product', $data);
    }

    public function detailProduct($id): string {
        $data = $this->defaultLoad();
        $data['title'] = 'Product';
        $data['getDetailProduct'] = $this->ProductModel->MdlDetailProductSelectById($id);
        if(count($data['getDetailProduct']) > 0) {
            $data['getDetailProduct'] = $data['getDetailProduct'][0];
            $data['title'] = $data['getDetailProduct']->name;
        }
        
        return view('Front/detail_product', $data);
    }

    public function visiMisi(): string {
        $data = $this->defaultLoad();
        $data['title'] = 'Visi Misi';

        return view('Front/vm', $data);
    }
    
    public function about() {
        $data = $this->defaultLoad();
        $data['title'] = 'Tentang Kami';

        return view('Front/about', $data);
    }
    
    public function gallery($id_product): string {
        $data = $this->defaultLoad();
        $data['title'] = 'Gallery';
        $data['getGallery'] = $this->GalleryModel->MdlSelectByIdProduct($id_product);
        if(!empty($data['getGallery'])) $data['product_name'] = $data['getGallery'][0]['product_name'];
        return view('Front/gallery', $data);
    }

    public function brand(): string {
        $data = $this->defaultLoad();
        $data['title'] = 'Brand Ambasador';

        return view('Front/brand', $data);
    }

    public function info(): string {
        $data = $this->defaultLoad();
        $data['title'] = 'Info';

        return view('Front/info', $data);
    }

    public function faq(): string {
        $data = $this->defaultLoad();
        $data['title'] = 'Home';

        return view('Front/faq', $data);
    }
}
