<?php
/**
 * Created by PhpStorm.
 * User: ChathurangaH
 * Date: 3/3/18
 * Time: 10:43 PM
 */


class Rent extends CI_Controller
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

        $maxPropertyId = $this->PropertyModel->getMaxPropertyId();
        if ($maxPropertyId == null) {
            $maxPropertyId = 0;
        }
//
    }

    function index(){
        $property_type = $this->input->post('property_type');
        $property_status = $this->input->post('property_status');
        $property_loc = $this->input->post('property_location');
        $data['property_type'] = $property_type;
        $data['status'] = $property_status;
        $data['location'] = $property_loc;
        $proMake = $this->input->post('vehicle_make');
        $proModel = $this->input->post('vehicle_model');

        $sess_array = array(
            'pro_type' => $property_type,
            'status' => 'rent',
            'location' => $property_loc,
            'make' => $proMake,
            'model' => $proModel
        );
        $this->session->set_userdata('property_search',$sess_array);

        $data['main_content'] = 'user/search_result';
        $data['property_types'] =$this->PropertyModel->getPropertyTypes();
        $data['latest_properties'] = $this->PropertyModel->getLatestProperties();
        $data['search_results'] = $this->PropertyModel->getSearchResult('','rent','');
        //var_dump($data['search_results']);
        $this->load->view('includes/template', $data);
    }
}