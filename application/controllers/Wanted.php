<?php
/**
 * Created by PhpStorm.
 * User: ChathurangaH
 * Date: 2/24/18
 * Time: 11:44 AM
 */

class Wanted extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('text');
        $this->load->model('UserModel');
        $this->load->model('PropertyModel');
        $this->load->library('form_validation');
    }

    function index(){
        $data['properties'] = $this->PropertyModel->getAllWantedActiveAds();
        $data['latest_properties'] = $this->PropertyModel->getLatestProperties();
        $data['main_content'] = 'user/wanted_list';
        $this->load->view('includes/template', $data);
    }

    function view($id){
        $data['property_details'] = $this->PropertyModel->getWantedPropertyDetailsById($id);
        $data['latest_properties'] = $this->PropertyModel->getLatestProperties();
        $data['main_content'] = 'user/wanted_view';
        $this->load->view('includes/template', $data);
    }
}