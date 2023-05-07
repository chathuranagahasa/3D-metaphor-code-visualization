<?php
/**
 * Created by PhpStorm.
 * UserModel: ChathurangaH
 * Date: 11/9/17
 * Time: 9:12 PM
 */

class ForgotPassword  extends CI_Controller
{

    function __construct(){
        parent::__construct();
        $this->load->model('UserModel', '', TRUE);
        $this->load->helper('security');
        $this->load->model('PropertyModel');
        $this->load->model('UserModelAdmin');
        /*$this->load->library('google_url_api');*/
    }

    function index(){
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username_forgotp', 'Email Address', 'trim|required|xss_clean|callback_check_database');

        if($this->form_validation->run() == FALSE)
        {
            $data['main_content'] = 'files/forgot_password';
            $this->load->view('includes/template', $data);
        }
        else
        {
            $email = $this->input->post('username_forgotp');
            $id = $this->getUserId($email);
            //var_dump($id);
            if($id == ""){
                $this->load->view('errors/html/error_404');
            }else{
                $url = base_url().'login/get_password_change/'.$id;
                $user = $this->getUserDetails($email);

                //$convertUrl = $this->urlShorter($url); //call function
                $response = $this->sendEmailForPasswordChange($user[0]->email_address,$url,$user[0]->first_name);
                $this->session->set_flashdata('message_suc_acc_up',"We sent a password reset link to ".$user[0]->email_address.", Please Check.");
                redirect(base_url().'ForgotPassword/index');
            }
        }
    }

    function check_database($email){
        $result = $this->UserModel->validateEmailAddress($email);

        if($result)
        {
            $sess_array = array();
            foreach($result as $row)
            {
                $sess_array = array(
                    'user_id' => $row->user_id,
                    'email' => $row->email_address,
                    'first_name' => $row->first_name,
                    'last_name' => $row->last_name
                );
                $this->session->set_userdata('forgot_password',$sess_array);
            }
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('check_database', 'Invalid Email Address, Enter correct one.');
            return false;
        }
    }


    function verify_otp(){
        $data['main_content'] = 'files/otp_verify';
        $this->load->view('includes/template', $data);
    }


    function getUserId($email){
        $result = $this->UserModel->validateEmailForgotPassword($email);
        if($result) {
            $userId = $result[0]->user_id;
        }
        return $userId;
    }

    function getUserDetails($email){
        $result = $this->UserModel->validateEmailForgotPassword($email);
        return $result;
    }

    function urlShorter($url)
    {
        $this->google_url_api->enable_debug(FALSE);
        $short_url = $this->google_url_api->shorten($url);
        return $short_url->id;
    }


    public function sendEmailForPasswordChange($userEmail, $url, $userName)
    {

        $from = "chathurangahas87@gmail.com";

        $this->load->helper('path');
        $this->load->library('email');

//        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.zoho.com';
        $config['smtp_port'] = '465';
        $config['smtp_user'] = 'hello@webarktec.com';
        $config['smtp_pass'] = 'beenu1988';
        $config['charset'] = 'iso-8859-1'; # Added
        $config['wordwrap']     = TRUE;
        $config['validate']     = FALSE;

        $this->email->initialize($config); # Added


        $this->email->set_newline("\r\n");
        $this->email->set_mailtype("html");

        $this->email->from('info@carmart.com', 'CarMart');
        $subject = "Password Change Email - Car Mart";

        $data = array(
            'email' => $userEmail,
            'userName' => $userName,
            'url' => $url
        );

        $this->email->to($userEmail);
        $this->email->subject($subject);

        $body = $this->load->view('email/password_reset_request_email.php', $data, TRUE);

        $this->email->message($body);
//$send = $this->email->send();
        if($this->email->send()){
//Success email Sent
//echo $this->email->print_debugger();
        }else{
//Email Failed To Send
//echo $this->email->print_debugger();
        }

    }

    public function confirmPassword(){
        $this->load->library('form_validation');

        $this->form_validation->set_rules('new_password', 'Password', 'required');
        $this->form_validation->set_rules('confirm_new_password', 'Confirm Password', 'required|matches[new_password]');

        $newPassword = $this->input->post('new_password');
        $userId = $this->input->post('userId');
        $arrayChngePass = array(
            'password' => $newPassword
        );

        if($this->form_validation->run() == FALSE)
        {
            $data['userId'] = $userId;
            $this->load->view('includes/login_includes');
            $this->load->view('files/change_forgot_password',$data);
        }
        else{

            $result = $this->UserModel->updateNewPassword($userId, $arrayChngePass);
            if($result){
                $url = base_url().'login';
                $username = $this->UserModel->getUserNameByUserId($userId);
                //var_dump($username[0]->name);
                //$convertUrl = $this->urlShorter($url); //call function
                $response = $this->sendEmailForFinishPasswordChange( $this->UserModel->getUserNameByUserId($userId)[0]->email_address,$url,$username[0]->first_name);
                $this->session->set_flashdata('message_suc_acc_up',"Password changed Successfully, Please login.");
                redirect(base_url().'login');
            }else{
                $this->session->set_flashdata('message_suc_error',"You can't use the same password, you use in previously.");
                redirect(base_url().'login/get_password_change/'.$userId);
            }
        }
    }

    public function sendEmailForFinishPasswordChange($userEmail, $url, $userName){

        $from = "chathurangahas87@gmail.com";

        $this->load->helper('path');
        $this->load->library('email');

        $config['smtp_host'] = 'ssl://smtp.zoho.com';
        $config['smtp_port'] = '465';
        $config['smtp_user'] = 'hello@webarktec.com';
        $config['smtp_pass'] = 'beenu1988';
        $config['charset'] = 'iso-8859-1'; # Added
        $config['wordwrap']     = TRUE;
        $config['validate']     = FALSE;

        $this->email->initialize($config); # Added


        $this->email->set_newline("\r\n");
        $this->email->set_mailtype("html");

        $this->email->from('info@carmart.com', 'Car Mart');
        $subject = "Password change completed email - Car Mart";

        $data = array(
            'email' => $userEmail,
            'userName' => $userName,
            'url' => $url
        );

        $this->email->to($userEmail);
        $this->email->subject($subject);

        $body = $this->load->view('email/password_reset_complete_email.php', $data, TRUE);

        $this->email->message($body);
//$send = $this->email->send();
        if($this->email->send()){
//Success email Sent
//echo $this->email->print_debugger();
        }else{
//Email Failed To Send
//echo $this->email->print_debugger();
        }
    }

}