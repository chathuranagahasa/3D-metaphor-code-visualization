<?php

class Login extends CI_Controller{

    function __construct(){
        parent::__construct();

        $this->load->model('UserModel');
        $this->load->library('form_validation');
        $this->load->model('PropertyModel');
        $this->load->model('UserModelAdmin');
    }

    function index($type=null){

        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

        if($this->form_validation->run() == FALSE)
        {
            if($type == "landing"){
                $data['hide_menu'] = "yes";
            }
            $data['main_content'] = 'login';
            $this->load->view('includes/template', $data);
        }
        else
        {
            $from_p = $this->input->post('landing_f');
            if($from_p == "yes"){
                $this->session->set_flashdata('message_suc_acc_up', 'Your Logged Successfully.');
                //redirect('https://bizlink.lk/landing/'. $customer[0]->user_id);
                $session_array  = $this->session->userdata('logged_in');
//                redirect('https://bizlink.lk/test/landing/home/index/'. $session_array['userId']);
                redirect('https://bizlink.lk/test/landing/home/index/'. $session_array['userId']);
            }else {
                redirect('User/dashboard', 'refresh');
            }
        }
    }

    function check_database($password)
    {

        $username = $this->input->post('username');

        $result = $this->UserModel->login($username, $password);

        if($result)
        {
            $sess_array = array();
            foreach($result as $row)
            {
                //var_dump($row);
                $sess_array = array(
                    'id' => $row->id,
                    'userId' => $row->user_id,
                    'first_name' => $row->first_name,
                    'last_name' => $row->last_name,
                    'email' => $row->email_address,
                    'country' => $row->country,
                    'im_am_in' => $row->im_am_in,
                );
                $this->session->set_userdata('logged_in',$sess_array);
            }
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('check_database', 'Invalid Username or Password');
            return false;
        }
    }
//
//    function my_account()
//    {
//        $data['main_content'] = 'property/postad';
//        $this->load->view('includes/template', $data);
//    }

    function check_default($post_string)
    {
        return $post_string == '0' ? FALSE : TRUE;
    }

    function check_default_country($post_string)
    {
        return $post_string == '0' ? FALSE : TRUE;
    }

    function check_default_i_am($post_string)
    {
        return $post_string == '0' ? FALSE : TRUE;
    }

    function store_customer(){
        var_dump($this->input->post());

//        $this->form_validation->set_rules('cus_firstname', 'First Name', 'trim|required');
//        $this->form_validation->set_rules('cus_lastname', 'Last Name', 'trim|required');
//        $this->form_validation->set_rules('cus_email', 'Email Address', 'trim|required|valid_email');
//        $this->form_validation->set_rules('cus_contactno', 'Contact NUmber', 'trim|required');
//        $this->form_validation->set_rules('cus_password', 'Password', 'trim|required|matches[cus_con_password]');
//        $this->form_validation->set_rules('cus_con_password', 'Confirm Password', 'trim|required');
//        $this->form_validation->set_rules('cus_country', 'Country', 'trim|required|callback_check_default_country');
//        $this->form_validation->set_rules('cus_who_am_i', 'I am', 'trim|required|callback_check_default_i_am');
//
//        $this->form_validation->set_rules('cus_terms_agree', 'Terms and Conditions', 'required|callback_check_default');
//        $this->form_validation->set_message('check_default', 'The Terms and Conditions field is required.');
//        $this->form_validation->set_message('check_default_country', 'The Country field is required.');
//        $this->form_validation->set_message('check_default_i_am', 'Who I am field is required.');

//        $this->form_validation->set_rules('g-recaptcha-response', 'recaptcha validation', 'required|callback_validate_captcha');
//        $this->form_validation->set_message('validate_captcha', 'Please check the the captcha form');

//        $check_email_available = $this->UserModel->checkEmailExistingUser($this->input->post('cus_email'));
//        if(count($check_email_available) > 0){
//            $this->session->set_flashdata('message_error_email', 'Your email address already exists');
//            redirect('home/register');
//
//        }

        $check_email_available = $this->UserModel->checkEmailExistingUser($this->input->post('cus_email'));
        $check_email_availablePro = $this->UserModel->checkFbUserAlreadyExistsMes($this->input->post('cus_email'));
        $check_email_availableCar = $this->UserModel->checkFbUserAlreadyExistsPro($this->input->post('cus_email'));
        if(count($check_email_available) > 0 ){
            $this->session->set_flashdata('message_error_email', 'Your email address already exists');
            redirect('home/register');
        }elseif(count($check_email_availablePro) > 0){
            $this->session->set_flashdata('message_error_email', 'Your email address already exists');
            redirect('home/register');
        }elseif(count($check_email_availableCar) > 0){
            $this->session->set_flashdata('message_error_email', 'Your email address already exists');
            redirect('home/register');
        }

//        if ($this->form_validation->run() == FALSE) {
//            $data['countries'] = $this->UserModel->locationDropList();
//            $data['user_id'] = $this->UserModel->getUserId()[0]->user_id;
//            $data['main_content'] = 'register';
//            $this->load->view('includes/template', $data);
//        }
//        else {
            $arrayCustomer = array(
                'user_id' => $this->input->post('user_id'),
                'first_name' => $this->input->post('cus_firstname'),
                'last_name' => $this->input->post('cus_lastname'),
                'email_address' => $this->input->post('cus_email'),
                'contact_no' => $this->input->post('cus_contactno'),
                'password' => $this->input->post('cus_password'),
                'country' => $this->input->post('cus_country'),
                'age_group' => $this->input->post('cus_age_group'),
                'occupation' => $this->input->post('cus_occupation'),
                'gender' => $this->input->post('cus_sex'),
                'im_am_in' => $this->input->post('cus_who_am_i'),
                'email_subs' => $this->input->post('cus_email_subscribe'),
                'agree_wth_terms' => $this->input->post('cus_terms_agree'),
                'loyalty_balance' => 500
            );

            $name = $this->input->post('cus_firstname') . " " . $this->input->post('cus_lastname');
            $userID = $this->input->post('user_id');
        $save = $this->UserModel->storeCustomer($arrayCustomer);
        $saveC = $this->UserModel->storeCustomerPro($arrayCustomer);
        $saveP = $this->UserModel->storeCustomerMes($arrayCustomer);
        if($save && $saveC && $saveP){
                $this->UserModel->updateCustomerId($userID);
                $customer = $this->UserModel->getCustomerByUserId($userID);
                $sessionArray = array(
                    'userId' => $customer[0]->user_id,
                    'first_name' => $customer[0]->first_name,
                    'last_name' => $customer[0]->last_name,
                    'email' => $customer[0]->email_address,
                    'country' => $customer[0]->country,
                    'i_am' => $customer[0]->im_am_in
                );
                $this->session->set_userdata('logged_in',$sessionArray);
                $this->sendEmailForSignUpVerification($this->input->post('cus_email'),$this->input->post('cus_firstname'),$this->input->post('user_id') );

                $from_p = $this->input->post('landing_f');
                if($from_p == "yes"){
                    $this->session->set_flashdata('message_suc_acc_up', 'Your account has created Successfully.');
                    //redirect('https://bizlink.lk/landing/'. $customer[0]->user_id);
//                    redirect('https://bizlink.lk/test/landing/home/index/'. $customer[0]->user_id);
                    redirect('https://bizlink.lk/test/landing/home/index/'. $customer[0]->user_id);

                }else{
                    $this->session->set_flashdata('message_suc_acc_up', 'Your account has created Successfully.');
                    redirect('user/dashboard');
                }

            }
        //}
    }

    function sendEmailForSignUpVerification($cus_email, $cus_name,$userId){


        $this->load->helper('path');
        $this->load->library('email');

        $config['protocol'] = 'mail';
        $config['smtp_host'] = 'ssl://mail.bizlink.lk';
        $config['smtp_port'] = 465;
        $config['smtp_user'] = 'info@bizlink.lk';
        $config['smtp_pass'] = 'yoYt43*4'; //beenu1988
        $config['charset'] = 'iso-8859-1'; # Added
        $config['wordwrap'] = TRUE;

        $this->email->initialize($config); # Added

        $this->email->set_newline("\r\n");
        $this->email->set_mailtype("html");

        $this->email->from('info@bizlink.lk', 'Bizlink');
        $subject = "Thank you for registering Bizlink";
        $data = array(
            'email' => $cus_email,
            'name' => $cus_name,
            'userId' => $userId
        );

        $this->email->to($cus_email);
        $this->email->subject($subject);

        $body = $this->load->view('email/email_verify_template',$data,TRUE);

        $this->email->message($body);
//$send = $this->email->send();
        if($this->email->send()){
//Success email Sent
echo $this->email->print_debugger();
        }else{
//Email Failed To Send
echo $this->email->print_debugger();
        }

    }


    public function get_password_change($userId){
        /* var_dump($userId);*/
        $data['userId'] = $userId;
        $data['main_content'] = 'files/change_forgot_password';
        $this->load->view('includes/template', $data);
    }

    public function forgot_password(){
        $data['main_content'] = 'files/forgot_password';
        $this->load->view('includes/template', $data);
    }

    function validate_captcha() {
        $captcha = $this->input->post('g-recaptcha-response');
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LeVol8UAAAAAG0Kk6rgY6Cm4EirUQefvgZcW9U0&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
        if ($response . 'success' == false) {
            return FALSE;
        } else {
            return TRUE;
        }
    }


}