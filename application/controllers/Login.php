<?php

use Ctct\ConstantContact;
use Ctct\Exceptions\CtctException;

defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'application/helpers/Authenticate.php';

class Login extends CI_Controller
{

    use Authenticate;

    protected $cc;

    function __construct()
    {
        parent::__construct();
        $this->load->library('email');
        $this->load->library('session');
        // Load facebook library
        $this->load->library('facebook');
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('Login_model');
        $this->load->model('user_model');
    }

    public function login_service_provider()
    {
        if ($this->checkLogin()) {
            redirect('/');
        }
        $data['title'] = 'Service Provider access';
        $data['error'] = isset($_SESSION['error']) ? $_SESSION['error'] : null;
        $data['success'] = isset($_SESSION['success']) ? $_SESSION['success'] : null;
        $_SESSION['fb_user_type'] = 1;
        $data['facebook_login_url'] = $this->facebook->login_url();
        $data['google_login_url'] = 'https://accounts.google.com/o/oauth2/v2/auth?scope=' . urlencode('https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email') . '&redirect_uri=' . urlencode(base_url() . GOOGLE_CLIENT_REDIRECT_URL) . '&response_type=code&client_id=' . GOOGLE_CLIENT_ID . '&access_type=online&state=1';
        $this->template->load('layout', 'login/login_service_provider', $data);
    }

    public function login_consumer() {
        if ($this->checkLogin()) {
            redirect('/');
        }
        $data['title'] = 'Consumer access';
        $data['error'] = isset($_SESSION['error']) ? $_SESSION['error'] : null;
        $data['success'] = isset($_SESSION['success']) ? $_SESSION['success'] : null;
        $_SESSION['fb_user_type'] = 2;
        $data['facebook_login_url'] = $this->facebook->login_url();
        $data['google_login_url'] = 'https://accounts.google.com/o/oauth2/v2/auth?scope=' . urlencode('https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email') . '&redirect_uri=' . urlencode(base_url() . GOOGLE_CLIENT_REDIRECT_URL) . '&response_type=code&client_id=' . GOOGLE_CLIENT_ID . '&access_type=online&state=2';
        $this->template->load('layout', 'login/login_consumer', $data);
    }

    public function signup_consumer()
    {
        if ($this->checkLogin()) {
            redirect('/');
        }
        $data['title'] = 'Create a consumer account';
        $this->template->load('layout', 'login/signup_consumer', $data);
    }

    public function signup_service_provider()
    {
        if ($this->checkLogin()) {
            redirect('/');
        }
        $data['title'] = 'Create a service provider account';
        $this->template->load('layout', 'login/signup_service_provider', $data);
    }

    public function signup_store()
    {
        $this->load->library('uuid');
        $token = $this->uuid->v4();
        $data = array(
            'firstName' => $this->input->post('first_name'),
            'lastName' => $this->input->post('last_name'),
            '180creditUserType' => $this->input->post('user_type'),
            'userEmail' => $this->input->post('email'),
            'active' => 1,
            'userStatus' => 1,
            'userPassword' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            // 'verificationToken' => $token
        );

        $data = $this->db->insert('users', $data);

        $condition = "userEmail =" . "'" . $this->input->post('email') . "'";
        $user_details = (array)$this->Login_model->getDataByCondition('users', $condition, true);

        $linkToken = base_url() . 'verify/' . $user_details['verificationToken'];
        $html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                <html xmlns="http://www.w3.org/1999/xhtml">
                <head>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
                </head>
                <body>
                Hello ' . $this->input->post('first_name') . ',<br><br>  
                Please click the link below to verify your email address.<br>  
                <a href="' . $linkToken . '">' . $linkToken . '</a>.
                <br>
                <br>
                Thank you,<br> 180Credit.com 
                </body>
                </html>';

        $mail_status = $this->SendVerifyMail("donotreply@180credit.com", $this->input->post('email'), "Welcome to your 180Credit account", $html);

        if ($this->input->post('keep_login')) {
            $this->session->set_flashdata('success', 'An verification mail has been sent to your mail, please verify your account.');
        } else {
            $this->session->set_flashdata('success', 'An verification mail has been sent to your mail, please verify your account.');
        }
        if ($this->input->post('user_type') == "1") {
            redirect('/login/login_service_provider');
        } else {
            if (isset($_POST['redirection_url'])) {
                redirect($_POST['redirection_url']);
            } else {
                redirect('/login/login_consumer');
            }
        }
    }

    function SendVerifyMail($from, $email, $subject, $message, $attach = '', $filename = '')
    {
        $data = array(
            'from' => $from,
            'to' => $email,
            'subject' => $subject,
            'html' => $message,
        );

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://api.mailgun.net/v3/m.180credit.com/messages');
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_USERPWD, "api:" . MAIL_API);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

        $result = curl_exec($curl);
        curl_close($curl);
        // print_r($result);
        // exit;
        return true;
    }

    public function logout()
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }

        $this->session->set_flashdata('success', 'You are logout successfully.');
        redirect('/login/success_screen');
    }

    public function login_post()
    {
        $condition = "userEmail =" . "'" . $this->input->post('email') . "'";
        $result = (array)$this->Login_model->getDataByCondition('users', $condition, true);
        if (!isset($result['userPassword']) && isset($result['userEmail'])) {
            $this->session->set_flashdata('error', 'User is not registered');
            if (isset($_POST['redirection_url'])) {
                redirect($_POST['redirection_url']);
            } else {
                redirect('/consumer/login');
            }
        }
        if (isset($result['userPassword']) && password_verify($this->input->post('password'), $result['userPassword']) && $result['isEmailVerified'] == 1) {
            if (isset($result['180creditUserType']) && $result['180creditUserType'] == $this->input->post('180creditUserType') || isset($_POST['redirection_url'])) {
                $this->session->set_userdata('user', $result);
                $this->session->set_flashdata('success', 'You are login successfully.');
                if (isset($_POST['redirection_url'])) {
                    redirect($_POST['redirection_url']);
                } else {
                    redirect('/my-account');
                }
            } else {
                if ($this->input->post('180creditUserType') == 1) {
                    $this->session->set_flashdata('error', 'You have registered as consumer, Please login as consumer.');
                    redirect('/service-provider/login');
                } else {
                    $this->session->set_flashdata('error', 'You have registered as service provider, Please login as service provider.');
                    redirect('/consumer/login');
                }
            }
        } else {
            if ($this->input->post('180creditUserType') == 1) {
                if (isset($result['isEmailVerified']) && $result['isEmailVerified'] == 0) {
                    $this->session->set_flashdata('error', 'Please verify your email address');
                    redirect('/service-provider/login');
                } else {
                    $this->session->set_flashdata('error', 'Email and password mismatch.');
                    redirect('/service-provider/login');
                }
            } else {
                if (isset($result['isEmailVerified']) && $result['isEmailVerified'] == 0) {
                    $this->session->set_flashdata('error', 'Please verify your email address');
                    if (isset($_POST['redirection_url'])) {
                        redirect($_POST['redirection_url']);
                    } else {
                        redirect('/consumer/login');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Email and password mismatch.');
                    if (isset($_POST['redirection_url'])) {
                        redirect($_POST['redirection_url']);
                    } else {
                        redirect('/consumer/login');
                    }
                }
            }
        }
    }

    public function success_screen()
    {
        $data['title'] = 'Success';
        $data['msg'] = isset($_SESSION['success']) ? $_SESSION['success'] : '';
        $this->template->load('layout', 'login/success_screen', $data);
    }

    public function user_exists()
    {
        $condition = "userEmail =" . "'" . $this->input->post('email') . "'";
        $userId = $this->input->post('userId');
        if (isset($userId)) {
            $condition .= ' and userId <>' . $userId;
        }
        $result = (array)$this->Login_model->getDataByCondition('users', $condition, true);

        if (empty($result)) {
            echo "true";
        } else {
            echo "false";
        }
    }

    public function facebook_login_callback()
    {
        $userDetails = array();
        $state = $_SESSION['fb_user_type'];
        unset($_SESSION['fb_user_type']);
        // Check if user is logged in
        if ($this->facebook->is_authenticated()) {
            // Get user facebook profile details
            $fbUser = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,picture.width(800).height(800)');

            // Preparing data for database insertion
            $userDetails['id'] = !empty($fbUser['id']) ? $fbUser['id'] : '';
            $userDetails['first_name'] = !empty($fbUser['first_name']) ? $fbUser['first_name'] : '';
            $userDetails['last_name'] = !empty($fbUser['last_name']) ? $fbUser['last_name'] : '';
            $userDetails['email'] = !empty($fbUser['email']) ? $fbUser['email'] : '';
            $userDetails['picture'] = !empty($fbUser['picture']['data']['url']) ? $fbUser['picture']['data']['url'] : '';
            if (isset($userDetails['email'])) {
                $condition = "userEmail =" . "'" . $userDetails['email'] . "'";
                $user = (array)$this->Login_model->getDataByCondition('users', $condition, true);
                if (!empty($user)) {
                    $data = array('facebookId' => $userDetails['id'], 'isEmailVerified' => 1);
                    $this->db->where('userId', $user['userId']);
                    $this->db->update('users', $data);
                    $userDetailsToStore = array(
                        'firstName' => $userDetails['first_name'],
                        'lastName' => $userDetails['last_name'],
                        '180creditUserType' => $state,
                        'userEmail' => $userDetails['email']
                    );
                    $this->addOrUpdateCCData($userDetailsToStore);
                    $condition = "userEmail =" . "'" . $userDetails['email'] . "'";
                    $user = (array)$this->Login_model->getDataByCondition('users', $condition, true);
                } else {
                    $path = 'assets/profile_images';
                    $fileName = $path . '/' . time() . '.jpg';
                    file_put_contents(FCPATH . $fileName, file_get_contents($userDetails['picture']));
                    chmod(FCPATH . $fileName, 0777);
                    $data = array(
                        'firstName' => $userDetails['first_name'],
                        'lastName' => $userDetails['last_name'],
                        '180creditUserType' => $state,
                        'userEmail' => $userDetails['email'],
                        'profile_image' => $fileName,
                        'active' => 1,
                        'facebookId' => $userDetails['id'],
                        'userStatus' => 1,
                        'userPassword' => '',
                        'isEmailVerified' => 1
                    );
                    $this->db->insert('users', $data);
                    $this->addOrUpdateCCData($data);
                    $condition = "userEmail =" . "'" . $userDetails['email'] . "'";
                    $user = (array)$this->Login_model->getDataByCondition('users', $condition, true);
                }
                $this->session->set_userdata('user', $user);
                $this->session->set_flashdata('success', 'You are login successfully.');
                redirect('/my-account');
            }
        }
    }

    public function google_login_callback()
    {
        try {
            $code = $this->input->get('code');
            $state = $this->input->get('state');
            $client_id = GOOGLE_CLIENT_ID;
            $redirect_uri = base_url() . GOOGLE_CLIENT_REDIRECT_URL;
            $client_secret = GOOGLE_CLIENT_SECRET;
            $accessToken = $this->GetAccessToken($client_id, $redirect_uri, $client_secret, $code);
            $userDetails = $this->GetUserProfileInfo($accessToken['access_token']);
            if (isset($userDetails['email'])) {
                $condition = "userEmail =" . "'" . $userDetails['email'] . "'";
                $user = (array)$this->Login_model->getDataByCondition('users', $condition, true);
                $name = explode(' ', $userDetails['name']);
                if (!empty($user)) {
                    $data = array('googleId' => $userDetails['id'], 'isEmailVerified' => 1);
                    $this->db->where('userId', $user['userId']);
                    $this->db->update('users', $data);
                    $userData = array(
                        'firstName' => isset($name[0]) ? $name[0] : '',
                        'lastName' => isset($name[1]) ? $name[1] : '',
                        '180creditUserType' => $state,
                        'userEmail' => $userDetails['email']
                    );
                    $condition = "userEmail =" . "'" . $userDetails['email'] . "'";
                    $user = (array)$this->Login_model->getDataByCondition('users', $condition, true);
                    $this->addOrUpdateCCData($userData);
                } else {
                    $path = 'assets/profile_images';
                    $fileName = $path . '/' . time() . '.' . pathinfo($userDetails['picture'])['extension'];
                    file_put_contents(FCPATH . $fileName, file_get_contents($userDetails['picture']));
                    chmod(FCPATH . $fileName, 0777);
                    $data = array(
                        'firstName' => isset($name[0]) ? $name[0] : '',
                        'lastName' => isset($name[1]) ? $name[1] : '',
                        '180creditUserType' => $state,
                        'userEmail' => $userDetails['email'],
                        'profile_image' => $fileName,
                        'active' => 1,
                        'googleId' => $userDetails['id'],
                        'userStatus' => 1,
                        'userPassword' => '',
                        'isEmailVerified' => 1
                    );
                    $this->db->insert('users', $data);
                    $this->addOrUpdateCCData($data);
                    $condition = "userEmail =" . "'" . $userDetails['email'] . "'";
                    $user = (array)$this->Login_model->getDataByCondition('users', $condition, true);
                }
                $this->session->set_userdata('user', $user);
                $this->session->set_flashdata('success', 'You are login successfully.');
                redirect('/my-account');
            }
        } catch (Exception $e) {

        }
    }


    private function addOrUpdateCCData($userData){
        $this->cc = new ConstantContact(CONSTANT_CONTACT_APIKEY);
        try {
            // check to see if a contact with the email address already exists in the account
            $response = $this->cc->contactService->getContacts(CONSTANT_CONTACT_ACCESS_TOKEN, array("email" => $userData['userEmail']));
            if(isset($userData['180creditUserType']) && $userData['180creditUserType']==1){
                $listType = $this->cc->listService->getList(CONSTANT_CONTACT_ACCESS_TOKEN,CONSTANT_CONTACT_PROVIDER_LIST);
            }else{
                $listType = $this->cc->listService->getList(CONSTANT_CONTACT_ACCESS_TOKEN,CONSTANT_CONTACT_CONSUMER_LIST);
            }
            // create a new contact if one does not exist
            if (empty($response->results)) {
                $contact = new \Ctct\Components\Contacts\Contact();
                $contact->addEmail($userData['userEmail']);
                $contact->lists[]=$listType;
                $contact->first_name = $userData['firstName'];
                $contact->last_name = $userData['lastName'];
                $contact->status = 'ACTIVE';
                $returnContact = $this->cc->contactService->addContact(CONSTANT_CONTACT_ACCESS_TOKEN, $contact);
            } else {
                $contact = $response->results[0];
                if ($contact instanceof \Ctct\Components\Contacts\Contact) {
//                    $contact->lists[]=$listType;
                    $contact->first_name = $userData['firstName'];
                    $contact->last_name = $userData['lastName'];
                    $contact->status = 'ACTIVE';
                    $returnContact = $this->cc->contactService->updateContact(CONSTANT_CONTACT_ACCESS_TOKEN, $contact);
                } else {
                    $e = new CtctException();
                    $e->setErrors(array("type", "Contact type not returned"));
                    throw $e;
                }
            }
        } catch (CtctException $ex) {
        }
    }

    private function GetAccessToken($client_id, $redirect_uri, $client_secret, $code)
    {
        $url = 'https://www.googleapis.com/oauth2/v4/token';

        $curlPost = 'client_id=' . $client_id . '&redirect_uri=' . $redirect_uri . '&client_secret=' . $client_secret . '&code=' . $code . '&grant_type=authorization_code';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
        $data = json_decode(curl_exec($ch), true);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($http_code != 200)
            throw new Exception('Error : Failed to receieve access token');

        return $data;
    }

    private function GetUserProfileInfo($access_token)
    {
        $url = 'https://www.googleapis.com/oauth2/v2/userinfo?fields=name,email,gender,id,picture,verified_email';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $access_token));
        $data = json_decode(curl_exec($ch), true);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($http_code != 200)
            throw new Exception('Error : Failed to get user information');

        return $data;
    }

    public function verify_user_email()
    {
        $link = $_SERVER['PHP_SELF'];
        $link_array = explode('/', $link);
        $verification_token = end($link_array);

        if ($verification_token != '') {
            $condition = "verificationToken =" . "'" . $verification_token . "'";
            $user = (array)$this->Login_model->getDataByCondition('users', $condition, true);

            if (!empty($user)) {
                $this->user_model->Edit($user['userId'], array('verificationToken' => '', 'isEmailVerified' => 1));
                $this->session->set_flashdata('success', 'Email verification successfully');
                if (isset($user['180creditUserType']) && $user['180creditUserType'] == "1") {
                    $this->addOrUpdateCCData($user);
                    redirect('/login/login_service_provider');
                } else {
                    $this->addOrUpdateCCData($user);
                    redirect('/login/login_consumer');
                }
            } else {
                $this->session->set_flashdata('error', 'Verification token is expired.');
                redirect('/consumer/login');
            }
        } else {
            $this->session->set_flashdata('error', 'Please enter valid verification token.');
            redirect('/consumer/login');
        }
    }

}
