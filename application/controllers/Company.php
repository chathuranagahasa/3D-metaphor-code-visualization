<?php
/**
 * Created by PhpStorm.
 * User: ChathurangaH
 * Date: 3/3/18
 * Time: 10:43 PM
 */

include('FileUploader.php');
class Company extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('PropertyModel');
    }

    function view($userId)
    {
        $data['main_content'] = 'user/seller_page';
        $data['cities'] = $this->PropertyModel->getCities();
        $data['districts'] = $this->PropertyModel->getDistricts();
        $data['property_types'] =$this->PropertyModel->getPropertyTypes();
        $data['makes'] =$this->PropertyModel->getModelTypes();
        $data['userId'] = $userId;
        $data['company_details'] = $this->PropertyModel->getCompanyDetialsByUserId($userId);
        $data['search_results'] = $this->PropertyModel->getAllPropertiesByUserId($userId);
        $this->load->view('includes/template', $data);
    }

}