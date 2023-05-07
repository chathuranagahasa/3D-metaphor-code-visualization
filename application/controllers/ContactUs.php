<?php
/**
 * Created by PhpStorm.
 * User: ChathurangaH
 * Date: 3/3/18
 * Time: 10:43 PM
 */


class ContactUs extends CI_Controller{

    function __construct(){
        parent::__construct();

        $this->load->model('UserModel');
        $this->load->model('PropertyModel');
        $this->load->model('UserModelAdmin');
        $this->load->helper('text');
        $this->load->library('form_validation');

    }

    function index(){
        $data['main_content'] = 'user/contact_us';
        $this->load->view('includes/template', $data);
    }
}