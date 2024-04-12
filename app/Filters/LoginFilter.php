<?php
namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use ActivitiesModel;

class LoginFilter implements FilterInterface
{
    private $ActivitiesModel;
    public function __construct()
    {
        $this->ActivitiesModel = model(ActivitiesModel::class);
    }
    public function before(RequestInterface $req, $arguments = null)
    {
        $userdata = session()->get('username');
        $validated = isset($userdata) ? true : false;

        if (!$validated) return redirect()->to(base_url('/login'));

    }

    public function after(RequestInterface $req, ResponseInterface $res, $arguments = null)
    {
        $this->saveAdminActivities($req);
    }
    
    public function saveAdminActivities(RequestInterface $req){
        $pathData = $req->getPath();
        $data = array();
        if($pathData == 'admin/postDataSource'){
            $data = array(
                'id' => 0,
                'type' => 'administrator',
                'route_name' => $pathData,
                'route_params' => '',
                'description' => 'Updated Data in Module Source Product',
                'created_by' => session()->get('username'),
                'created_date' => '',
            );
        }
        if(strpos($pathData, 'admin/deleteDataSource') !== false){
            $data = array(
                'id' => 0,
                'type' => 'administrator',
                'route_name' => $pathData,
                'route_params' => '',
                'description' => 'Deleted Data in Module Source Product',
                'created_by' => session()->get('username'),
                'created_date' => '',
            );
        }
        if($pathData == 'admin/postDataProduct'){
            $data = array(
                'id' => 0,
                'type' => 'administrator',
                'route_name' => $pathData,
                'route_params' => '',
                'description' => 'Updated Data in Module Product',
                'created_by' => session()->get('username'),
                'created_date' => '',
            );
        }
        if(strpos($pathData, 'admin/deleteDataProduct') !== false){
            $data = array(
                'id' => 0,
                'type' => 'administrator',
                'route_name' => $pathData,
                'route_params' => '',
                'description' => 'Deleted Data in Module Product',
                'created_by' => session()->get('username'),
                'created_date' => '',
            );
        }
        if($pathData == 'admin/postDataDetailProduct'){
            $data = array(
                'id' => 0,
                'type' => 'administrator',
                'route_name' => $pathData,
                'route_params' => '',
                'description' => 'Updated Data in Module Detail Product Item',
                'created_by' => session()->get('username'),
                'created_date' => '',
            );
        }
        if(strpos($pathData, 'admin/deleteDataDetailProduct') !== false){
            $data = array(
                'id' => 0,
                'type' => 'administrator',
                'route_name' => $pathData,
                'route_params' => '',
                'description' => 'Deleted Data in Module Detail Product Item',
                'created_by' => session()->get('username'),
                'created_date' => '',
            );
        }
        if($pathData == 'admin/utilities/create-event'){
            $data = array(
                'id' => 0,
                'type' => 'administrator',
                'route_name' => $pathData,
                'route_params' => '',
                'description' => 'Created Data in Module Event',
                'created_by' => session()->get('username'),
                'created_date' => '',
            );
        }
        if(strpos($pathData, 'admin/utilities/update-event') !== false){
            $data = array(
                'id' => 0,
                'type' => 'administrator',
                'route_name' => $pathData,
                'route_params' => '',
                'description' => 'Updated Data in Module Event',
                'created_by' => session()->get('username'),
                'created_date' => '',
            );
        }
        // if(strpos($pathData, 'admin/utilities/event/upload') !== false){
        //     $data = array(
        //         'id' => 0,
        //         'type' => 'administrator',
        //         'route_name' => $pathData,
        //         'route_params' => '',
        //         'description' => 'Updated Data in Module Event',
        //         'created_by' => session()->get('username'),
        //         'created_date' => '',
        //     );
        // }
        if(strpos($pathData, 'admin/utilities/event/deleteById') !== false){
            $data = array(
                'id' => 0,
                'type' => 'administrator',
                'route_name' => $pathData,
                'route_params' => '',
                'description' => 'Deleted Data in Module Event Item',
                'created_by' => session()->get('username'),
                'created_date' => '',
            );
        }
        if($pathData == 'admin/utilities/create-store'){
            $data = array(
                'id' => 0,
                'type' => 'administrator',
                'route_name' => $pathData,
                'route_params' => '',
                'description' => 'Created Data in Module Store',
                'created_by' => session()->get('username'),
                'created_date' => '',
            );
        }
        if(strpos($pathData, 'admin/utilities/update-store') !== false){
            $data = array(
                'id' => 0,
                'type' => 'administrator',
                'route_name' => $pathData,
                'route_params' => '',
                'description' => 'Updated Data in Module Store',
                'created_by' => session()->get('username'),
                'created_date' => '',
            );
        }
        if(strpos($pathData, 'admin/utilities/deleteStoreById') !== false){
            $data = array(
                'id' => 0,
                'type' => 'administrator',
                'route_name' => $pathData,
                'route_params' => '',
                'description' => 'Deleted Data in Module Store Item',
                'created_by' => session()->get('username'),
                'created_date' => '',
            );
        }
        if(strpos($pathData, 'admin/utilities/gallery/upload/') !== false){
            $data = array(
                'id' => 0,
                'type' => 'administrator',
                'route_name' => $pathData,
                'route_params' => '',
                'description' => 'Updated Data in Module Gallery',
                'created_by' => session()->get('username'),
                'created_date' => '',
            );
        }
        if(strpos($pathData, 'admin/utilities/deleteGalleryById/') !== false){
            $data = array(
                'id' => 0,
                'type' => 'administrator',
                'route_name' => $pathData,
                'route_params' => '',
                'description' => 'Deleted Data in Module Gallery Item',
                'created_by' => session()->get('username'),
                'created_date' => '',
            );
        }
        if($pathData == 'admin/utilities/logo/postLogo'){
            $data = array(
                'id' => 0,
                'type' => 'administrator',
                'route_name' => $pathData,
                'route_params' => '',
                'description' => 'Updated Data in Module Logo',
                'created_by' => session()->get('username'),
                'created_date' => '',
            );
        }
        if($pathData == 'admin/utilities/vm/postVm'){
            $data = array(
                'id' => 0,
                'type' => 'administrator',
                'route_name' => $pathData,
                'route_params' => '',
                'description' => 'Updated Data in Module Visi and Misi',
                'created_by' => session()->get('username'),
                'created_date' => '',
            );
        }
        if(strpos($pathData, 'admin/utilities/ba/upload/') !== false){
            $data = array(
                'id' => 0,
                'type' => 'administrator',
                'route_name' => $pathData,
                'route_params' => '',
                'description' => 'Updated Data in Module Brand Ambassador',
                'created_by' => session()->get('username'),
                'created_date' => '',
            );
        }
        if(strpos($pathData, 'admin/utilities/ba/deleteById/') !== false){
            $data = array(
                'id' => 0,
                'type' => 'administrator',
                'route_name' => $pathData,
                'route_params' => '',
                'description' => 'Deleted Data in Module Brand Ambassador Item',
                'created_by' => session()->get('username'),
                'created_date' => '',
            );
        }
        if(!empty($data)) $this->ActivitiesModel->MdlInsert($data);
        // if(!empty($data)) dd($data);
    }
}

?>