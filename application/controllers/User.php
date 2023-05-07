<?php
/**
 * Created by PhpStorm.
 * User: ChathurangaH
 * Date: 2/24/18
 * Time: 11:44 AM
 */

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('UserModel');
        $this->load->model('PropertyModel');
        $this->load->model('UserModelAdmin');
        $this->load->library('form_validation');
    }


    function dashboard(){
        if(empty($this->session->userdata("logged_in")))
        {
            redirect('Login','refresh');
        }
        $data['main_content'] = 'user/dashboard';
        $this->load->view('includes/template', $data);
    }

    function ads($userId){
        if(empty($this->session->userdata("logged_in"))) {
            redirect('Login','refresh');
        }
        $data['properties'] = $this->PropertyModel->getAllPropertiesByUserId($userId);
        $data['main_content'] = 'user/properties';
        $this->load->view('includes/template', $data);
    }

    function make_as_sold($proId,$userId){
        if(empty($this->session->userdata("logged_in"))) {
            redirect('Login','refresh');
        }
        //$data['properties'] = $this->PropertyModel->getAllPropertiesByUserId($userId);
        $this->PropertyModel->updateTheAdAsSold($proId);
        //$data['main_content'] = 'user/properties';

        $this->session->set_flashdata('message_suc', 'Ad marked as Sold.');
        redirect('user/ads/'.$userId);

    }


    function ads_wanted($userId){
        $data['properties'] = $this->PropertyModel->getAllWantedPropertiesByUserId($userId);
        $data['main_content'] = 'user/properties_wanted';
        $this->load->view('includes/template', $data);
    }

    function profile($userId){
        if(empty($this->session->userdata("logged_in"))) {
            redirect('Login','refresh');
        }
        $data['customer'] = $this->UserModel->getCustomerByUserId($userId);
        $data['countries'] = $this->UserModel->locationDropList();
        $data['main_content'] = 'user/profile';
        $this->load->view('includes/template', $data);
    }

    function archived_ads($userId){
        $data['properties'] = $this->PropertyModel->getAllExpirePropertiesByUserId($userId);
        $data['main_content'] = 'user/archived_properties';
        $this->load->view('includes/template', $data);
    }

    function change_password($userId){
        $data['customer'] = $this->UserModel->getCustomerByUserId($userId);
        $data['main_content'] = 'user/change_password';
        $this->load->view('includes/template', $data);
    }

    function update_profile(){
        $this->form_validation->set_rules('cus_firstname', 'First Name', 'trim|required');
        $this->form_validation->set_rules('cus_lastname', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('cus_email', 'Email Address', 'trim|required|valid_email');
        $this->form_validation->set_rules('cus_contactno', 'Contact NUmber', 'trim|required');
        $this->form_validation->set_rules('cus_password', 'Password', 'trim|required|matches[cus_con_password]');
        $this->form_validation->set_rules('cus_con_password', 'Confirm Password', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $data['countries'] = $this->UserModel->locationDropList();
            $data['user_id'] = $this->UserModel->getUserId()[0]->user_id;
            $data['main_content'] = 'register';
            $this->load->view('includes/template', $data);
        }
        else {
            $arrayCustomer = array(
                'first_name' => $this->input->post('cus_firstname'),
                'last_name' => $this->input->post('cus_lastname'),
                'email_address' => $this->input->post('cus_email'),
                'contact_no' => $this->input->post('cus_phone'),
                'password' => $this->input->post('cus_password'),
//            'country' => $this->input->post('cus_country'),
//            'im_am_in' => $this->input->post('cus_who_am_i')
            );

            $userID = $this->input->post('user_id');
            $save = $this->UserModel->updateCustomerProfile($arrayCustomer,$userID);
            if($save){
                $this->session->set_flashdata('message_suc_acc_update', 'Your account has updated Successfully.');
                redirect('user/dashboard');
            }
        }
    }

    function update_password(){
        $userID = $this->input->post('user_id');
        $cur_pass = $this->input->post('cus_current_pass');
        $data['customer'] = $this->UserModel->getCustomerByUserId($userID);

        $this->form_validation->set_rules('cus_current_pass', 'Current Password', 'trim|required|callback_check_database');
        $this->form_validation->set_rules('cus_new_pass', 'New Password', 'trim|required|matches[cus_confirm_pass]');
        $this->form_validation->set_rules('cus_confirm_pass', 'Confirm Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['main_content'] = 'user/change_password';
            $this->load->view('includes/template', $data);
        }
        else {

            $result = $this->UserModel->checkCurrentPasswordAvailable($cur_pass);
            if($result){
                $arrayCustomer = array(
                    'password' => $this->input->post('cus_new_pass'),
                );


                $save = $this->UserModel->updateCustomerPassword($arrayCustomer,$userID);
                if($save){
                    $this->session->set_flashdata('message_suc_password_update', 'Your password has updated Successfully.');
                    redirect('user/dashboard');
                }
            }


        }
    }

    function check_database($password){
        $result = $this->UserModel->checkCurrentPasswordAvailable($password);

        if($result)
        {
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('check_database', 'Invalid Current Password');
            return false;
        }
    }

    function logout(){
        $this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();
        redirect('Login', 'refresh');
    }


    function wishlist($user_id = null, $status = null){
        //var_dump($this->input->post());
        $vehicle_id = explode(",", $this->input->post('wish_list_array'));
        //var_dump($vehicle_id);
        if($status == "del"){
            $user_id = $user_id;
        }else if($status == "view"){
            $user_id = $user_id;
        }else{
            $user_id = $this->input->post('user_id');
        }

        for ($i=0; $i < count($vehicle_id); $i ++){
           $result = $this->PropertyModel->checkPropertyAlreadyUserID($vehicle_id[$i], $user_id);
           if(is_array($result) && count($result) == 0){
               $arrayData = array(
                   'property_id' => $vehicle_id[$i],
                   'user_id' => $user_id,
                   'posted_date' => date('Y-m-d')
               );

               $this->PropertyModel->saveWishListData($arrayData);
           }
        }

        $data['user_id'] = $user_id;
        $data['main_content'] = 'user/wish_list';
        $this->load->view('includes/template', $data);
    }


    function delete_wishlist($id,$user_id){
        $result = $this->PropertyModel->deleteWishListById($id);
        if($result) {
            $this->session->set_flashdata('message_suc', 'Wish List item delete Successfully.');
            redirect('user/wishlist/'.$user_id .'/'."del");
        }
    }

    function save_leads_phone(){
        $tel_id = $this->input->post('tel_no');
        $pro_id = $this->input->post('pro_id');


        $arrayN = array(
            'tel_no' => $tel_id,
            'pro_id' => $pro_id,
        );

        $save = $this->PropertyModel->saveLeadDetails($arrayN);
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(
                array(
                    'status' => 'result',
                    'result' => $save
                )
            ));
    }


    function compare_list($session_id=null, $status = null){
        //echo session_id();
        $vehicle_id = explode(",", $this->input->post('compare_list_array'));
        //var_dump($vehicle_id);
        if($status == "del"){
            $session_id = $session_id;
            for ($i=0; $i < count($vehicle_id); $i ++){
                $result = $this->PropertyModel->checkPropertyAlreadySessionID($vehicle_id[$i], $session_id);
                if(is_array($result) && count($result) == 0){
                    $arrayData = array(
                        'property_id' => $vehicle_id[$i],
                        'session_id' => $session_id,
                        'posted_date' => date('Y-m-d')
                    );

                    $this->PropertyModel->saveCompareListData($arrayData);
                }
            }

            $data['session_id'] = $session_id;
            $data['main_content'] = 'user/compare_list';
            $this->load->view('includes/template', $data);
        }else if($status == "view"){
            $session_id = $session_id;
            for ($i=0; $i < count($vehicle_id); $i ++){
                $result = $this->PropertyModel->checkPropertyAlreadySessionID($vehicle_id[$i], $session_id);
                if(is_array($result) && count($result) == 0){
                    $arrayData = array(
                        'property_id' => $vehicle_id[$i],
                        'session_id' => $session_id,
                        'posted_date' => date('Y-m-d')
                    );

                    $this->PropertyModel->saveCompareListData($arrayData);
                }
            }

            $data['session_id'] = $session_id;
            $data['main_content'] = 'user/compare_list';
            $this->load->view('includes/template', $data);
        }else if($status == "delete"){
            $data['session_id'] = $session_id;
            $data['main_content'] = 'user/compare_list';
            $this->load->view('includes/template', $data);

        }else{
            $session_id = $this->input->post('session_id');
            for ($i=0; $i < count($vehicle_id); $i ++){
                $result = $this->PropertyModel->checkPropertyAlreadySessionID($vehicle_id[$i], $session_id);
                if(is_array($result) && count($result) == 0){
                    $arrayData = array(
                        'property_id' => $vehicle_id[$i],
                        'session_id' => $session_id,
                        'posted_date' => date('Y-m-d')
                    );

                    $this->PropertyModel->saveCompareListData($arrayData);
                }
            }

            $data['session_id'] = $session_id;
            $data['main_content'] = 'user/compare_list';
            $this->load->view('includes/template', $data);
        }


    }

    function compare_clear($sessionId){
        $result = $this->PropertyModel->deleteCompareItemFromSession($sessionId);
        if($result){
            $this->session->set_flashdata('message_suc', 'Compare Properties Deleted.');
            redirect(base_url(). 'user/compare_list/'.$sessionId.'/delete');
        }
        $data['main_content'] = 'user/compare';
        $this->load->view('includes/template', $data);
    }
}