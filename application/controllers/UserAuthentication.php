<?php defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'../vendor/autoload.php';
class UserAuthentication extends CI_Controller
{

    function __construct() {
        parent::__construct();

//        // Load facebook library
//        $this->load->library('facebook');
//
//        //Load user model
$this->load->model('UserModel');
    }

    function fblogin(){

        $fb = new Facebook\Facebook([
            'app_id' => '1763140150410662',
            'app_secret' => '8df8f59a20a03e7c359f62d87f78ff9e',
            'default_graph_version' => 'v2.5',
        ]);

        $helper = $fb->getRedirectLoginHelper();

        $permissions = ['email','user_location','user_birthday','publish_actions'];
// For more permissions like user location etc you need to send your application for review

        $loginUrl = $helper->getLoginUrl('https://lankaresidence.com/UserAuthentication/fbcallback', $permissions);

        header("location: ".$loginUrl);
    }



    function fbcallback(){

        $fb = new Facebook\Facebook([
            'app_id' => '1763140150410662',
            'app_secret' => '8df8f59a20a03e7c359f62d87f78ff9e',
            'default_graph_version' => 'v2.5',
        ]);

        $helper = $fb->getRedirectLoginHelper();

        try {

            $accessToken = $helper->getAccessToken();

        }catch(Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }


        try {
            // Get the Facebook\GraphNodes\GraphUser object for the current user.
            // If you provided a 'default_access_token', the '{access-token}' is optional.
            $response = $fb->get('/me?fields=id,name,email,first_name,last_name,birthday,location,gender', $accessToken);
            // print_r($response);
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            echo 'ERROR: Graph ' . $e->getMessage();
            exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'ERROR: validation fails ' . $e->getMessage();
            exit;
        }

        // User Information Retrival begins................................................
        $me = $response->getGraphUser();
        //var_dump($me);

        $location = $me->getProperty('location');
        $profileid = $me->getProperty('id');
//        echo "Full Name: ".$me->getProperty('name')."<br>";
//        echo "First Name: ".$me->getProperty('first_name')."<br>";
//        echo "Last Name: ".$me->getProperty('last_name')."<br>";
//        echo "Gender: ".$me->getProperty('gender')."<br>";
//        echo "Email: ".$me->getProperty('email')."<br>";
//        echo "location: ".$location['name']."<br>";
//        echo "Birthday: ".$me->getProperty('birthday')->format('d/m/Y')."<br>";
//        echo "Facebook ID: <a href='https://www.facebook.com/".$me->getProperty('id')."' target='_blank'>".$me->getProperty('id')."</a>"."<br>";
//
//        echo "</br><img src='//graph.facebook.com/$profileid/picture?type=large'> ";
//        echo "</br></br>Access Token : </br>".$accessToken;

        $fbUserId = $me->getProperty('id');
        $arrayFBUser = array(
            'user_id' => $fbUserId,
            'first_name' => $me->getProperty('first_name'),
            'last_name' => $me->getProperty('last_name'),
            'email_address' => $me->getProperty('email'),
            'picture' => "//graph.facebook.com/$profileid/picture?type=large",
            'access_token' => $accessToken,
            'created' => date('Y-m-d H:i:s')
        );

        $row = $this->UserModel->checkFbUserAlreadyExists($fbUserId);
        //var_dump($row);
        if(count($row) > 0){

            $sess_array = array(
                'id' => $row[0]->id,
                'userId' => $row[0]->user_id,
                'first_name' => $row[0]->first_name,
                'last_name' => $row[0]->last_name,
                'email' => $row[0]->email_address,
                'country' => $row[0]->country,
                'im_am_in' => $row[0]->im_am_in,
            );
            $this->session->set_userdata('logged_in',$sess_array);
            redirect('User/dashboard', 'refresh');

        }else{
            $result = $this->UserModel->storeCustomer($arrayFBUser);
            $name = $me->getProperty('first_name') . " " . $me->getProperty('last_name');
            $sess_array = array(
                'userId' => $fbUserId,
                'first_name' => $me->getProperty('first_name'),
                'last_name' => $me->getProperty('last_name'),
                'email' => $me->getProperty('email'),
                'country' => null,
                'im_am_in' => null,
            );

            $this->session->set_userdata('logged_in',$sess_array);
            $this->sendEmailForSignUpVerification($me->getProperty('email'),$name,$fbUserId);

            $this->session->set_flashdata('message_suc_acc_up', 'Your account has created Successfully.');
            redirect('user/dashboard');
        }
    }

    function sendEmailForSignUpVerification($cus_email, $cus_name,$userId){


        $this->load->helper('path');
        $this->load->library('email');

        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.googlemail.com';
        $config['smtp_port'] = '465';
        $config['smtp_user'] = 'chathurangahas87@gmail.com';
        $config['smtp_pass'] = 'beenu1988';
        $config['charset'] = 'iso-8859-1'; # Added
        $config['wordwrap'] = TRUE;

        $this->email->initialize($config); # Added


        $this->email->set_newline("\r\n");
        $this->email->set_mailtype("html");

        $this->email->from('info@lankaresidence.com', 'Lanka Residence');
        $subject = "Welcome to Lanka Residence We are Glad You are Here !";
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
//echo $this->email->print_debugger();
        }else{
//Email Failed To Send
//echo $this->email->print_debugger();
        }

    }



    function glogin()
    {
        // Fill CLIENT ID, CLIENT SECRET ID, REDIRECT URI from Google Developer Console
        $client_id = '558384714860-nuqntu7ilad41038n3tai579f847go8r.apps.googleusercontent.com';
        $client_secret = 'hC1RHpl8Hcgi8McEX1IM1dmT';
        $redirect_uri = base_url()."UserAuthentication/gcallback/";

        //Create Client Request to access Google API
        $client = new Google_Client();
        $client->setApplicationName("LankaResidence");
        $client->setClientId($client_id);
        $client->setClientSecret($client_secret);
        $client->setRedirectUri($redirect_uri);
        $client->addScope("email");
        $client->addScope("profile");

        //Send Client Request
        $objOAuthService = new Google_Service_Oauth2($client);

        $authUrl = $client->createAuthUrl();

        header('Location: '.$authUrl);
    }

    function gcallback()
    {
        // Fill CLIENT ID, CLIENT SECRET ID, REDIRECT URI from Google Developer Console
        $client_id = '558384714860-nuqntu7ilad41038n3tai579f847go8r.apps.googleusercontent.com';
        $client_secret = 'hC1RHpl8Hcgi8McEX1IM1dmT';
        $redirect_uri = base_url()."UserAuthentication/gcallback/";

        //Create Client Request to access Google API
        $client = new Google_Client();
        $client->setApplicationName("LankaResidence");
        $client->setClientId($client_id);
        $client->setClientSecret($client_secret);
        $client->setRedirectUri($redirect_uri);
        $client->addScope("email");
        $client->addScope("profile");

        //Send Client Request
        $service = new Google_Service_Oauth2($client);
//var_dump($client->authenticate($_GET['code']));
//        $client->authenticate($_GET['code']);

        if (isset($_GET['code'])) {
            $client->authenticate($_GET['code']);
            $_SESSION['access_token'] = $client->getAccessToken();
            header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
            exit;
        }

        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $client->setAccessToken($_SESSION['access_token']);
        } else {
            $authUrl = $client->createAuthUrl();
        }

        $user = $service->userinfo->get(); //get user info
//var_dump($user->id);

        $arrayGoogleUser = array(
            'user_id' => $user->id,
            'first_name' => $user->given_name,
            'last_name' => $user->family_name,
            'email_address' => $user->email,
            'picture' => $user->picture,
            'access_token' => null,
            'created' => date('Y-m-d H:i:s')
        );

        $row = $this->UserModel->checkFbUserAlreadyExists($user->id);
        //var_dump($row);
        if(count($row) > 0){

            $sess_array = array(
                'id' => $row[0]->id,
                'userId' => $row[0]->user_id,
                'first_name' => $row[0]->first_name,
                'last_name' => $row[0]->last_name,
                'email' => $row[0]->email_address,
                'country' => $row[0]->country,
                'im_am_in' => $row[0]->im_am_in,
            );
            $this->session->set_userdata('logged_in',$sess_array);
            redirect('User/dashboard', 'refresh');

        }else{
            $result = $this->UserModel->storeCustomer($arrayGoogleUser);
            $sess_array = array(
                'userId' => $user->id,
                'first_name' => $user->given_name,
                'last_name' => $user->family_name,
                'email' => $user->email,
                'country' => null,
                'im_am_in' => null,
            );

            $this->session->set_userdata('logged_in',$sess_array);
            $this->sendEmailForSignUpVerification($user->email,$user->name,$user->id);

            $this->session->set_flashdata('message_suc_acc_up', 'Your account has created Successfully.');
            redirect('user/dashboard');
        }
    }
}