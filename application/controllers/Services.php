<?php
/**
 * Created by PhpStorm.
 * User: ChathurangaH
 * Date: 3/3/18
 * Time: 10:43 PM
 */

include('FileUploader.php');
class Services extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model('UserModel');
        $this->load->model('PropertyModel');
        $this->load->helper('text');
        $this->load->library('form_validation');

        header("Cache-Control: no cache");
        session_cache_limiter("private_no_expire");

//        $current_date = date('Y-m-d H:i');
//        $this->PropertyModel->checkExpireAds($current_date);

    }


    function lists($serviceSubCatId){
        $data['properties'] = $this->PropertyModel->getAllServicesActiveAdsByServiceType($serviceSubCatId);
        $data['latest_properties'] = $this->PropertyModel->getLatestProperties();
        $data['main_content'] = 'services/list';
        $this->load->view('includes/template', $data);
    }

    function view($id){
        $data['property_details'] = $this->PropertyModel->getServiceDetailsById($id);
        $data['latest_properties'] = $this->PropertyModel->getLatestProperties();
        $data['main_content'] = 'services/view';
        $this->load->view('includes/template', $data);
    }
}