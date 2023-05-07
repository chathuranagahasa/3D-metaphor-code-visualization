<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LoginAdmin extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('UserModelAdmin','',TRUE);
        $this->load->helper('security');
    }

    function index()
    {
        $data['userId'] = $this->UserModelAdmin->getUserId()[0]->user_id;
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|min_length[6]|required|xss_clean|callback_check_database');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('admin/includes/login_includes');
            $this->load->view('admin/login_view',$data);
        }
        else
        {
            redirect('Admin', 'refresh');
        }

    }

    function check_database($password)
    {

        $username = $this->input->post('username');

        $result = $this->UserModelAdmin->login($username, $password);

        if($result)
        {
            $sess_array = array();
            foreach($result as $row)
            {
                //var_dump($row);
                $sess_array = array(
                    'id' => $row->id,
                    'user_id' => $row->user_id,
                    'user_role' => $row->user_role,
                    'fname' => $row->first_name,
                    'lname' => $row->last_name,
                    'email' => $row->email,
                    'nic' =>  $row->nic,
                    'user_verified' => $row->user_verified
                );
                $this->session->set_userdata('logged_in_admin',$sess_array);
            }
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('check_database', 'Invalid Username or Password');
            return false;
        }
    }

    function logout(){
        $this->session->unset_userdata('logged_in_admin');
        $this->session->sess_destroy();
        redirect('LoginAdmin', 'refresh');
    }


    public function forgot_password(){
        $this->load->view('admin/includes/login_includes');
        $this->load->view('files/forgot_password');
    }

    public function get_password_change($userId){
        /* var_dump($userId);*/
        $data['userId'] = $userId;
        $this->load->view('admin/includes/login_includes');
        $this->load->view('files/change_forgot_password',$data);
    }



}
?>