<?php

class Home extends CI_Controller{

    function __construct(){
        parent::__construct();

        $this->load->model('UserModel');
        $this->load->model('PropertyModel');
        $this->load->model('UserModelAdmin');
        $this->load->library('form_validation');
        $this->load->helper('text');
    }

    public function index(){
        $session_id = session_id();
        $this->session->set_userdata('session_id',$session_id);
        //var_dump( count($this->PropertyModel->getLatestProperties()));
        $data['cities'] = $this->PropertyModel->getCities();
        $data['districts'] = $this->PropertyModel->getDistricts();
        $data['locations'] = $this->PropertyModel->districtDropList();
        $data['latest_properties'] = $this->PropertyModel->getLatestProperties();
        $data['featured_properties'] = $this->PropertyModel->getFeaturedProperties();
        $data['featured_properties_three'] = $this->PropertyModel->getFeaturedPropertiesFirstThree();
        $data['featured_properties_next_six'] = $this->PropertyModel->getFeaturedPropertiesNextSix();
        $data['property_types'] =$this->PropertyModel->getPropertyTypes();
        $data['models'] = $this->PropertyModel->getModelsList();
        $data['top_models'] = $this->PropertyModel->getTopModelsList();

          //var_dump($data['property_types']);
          $data['main_content'] = 'index';
          $this->load->view('includes/template', $data);
  }

    function register($type = null){
        if($type == "landing"){
            $data['hide_menu'] = "yes";
        }
        $data['countries'] = $this->UserModel->locationDropList();
        $data['customer_id'] = $this->UserModel->getCustomerId()[0]->customer_id;
        $data['main_content'] = 'register';
        $this->load->view('includes/template', $data);
    }

    function cities(){
        $cities = $this->PropertyModel->getCities();
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($cities));
    }

    function about(){
        $data['main_content'] = 'user/about';
        $this->load->view('includes/template', $data);
    }

    function terms_conditions($text = null){
         $data['main_content'] = 'user/terms_conditions';
        $this->load->view('includes/template', $data);
    }

    function register_email(){
        $data['main_content'] = 'email/email_verify_template';
        $this->load->view('includes/template', $data);
    }

    function postad_email(){
        $data['main_content'] = 'email/email_post_ad';
        $this->load->view('includes/template', $data);
    }


}


