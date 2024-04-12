<?php
namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use ActivitiesModel;

class WebFilter implements FilterInterface
{
    private $ActivitiesModel;
    public function __construct()
    {
        $this->ActivitiesModel = model(ActivitiesModel::class);
    }
    public function before(RequestInterface $req, $arguments = null)
    {
        $this->saveAdminActivities($req);
    }

    public function after(RequestInterface $req, ResponseInterface $res, $arguments = null)
    {
        $this->saveAdminActivities($req);
    }
    
    public function saveAdminActivities(RequestInterface $req){
        $pathData = $req->getPath();
        $data = array(
            'id' => 0,
            'type' => 'user',
            'route_name' => $pathData,
            'route_params' => '',
            'description' => 'Visitor In Web Corporate',
            'created_by' => 'user',
            'created_date' => '',
        );
        if(!empty($data)) $this->ActivitiesModel->MdlInsert($data);
    }
}

?>