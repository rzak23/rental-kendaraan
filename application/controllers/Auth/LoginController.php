<?php

use Firebase\JWT\JWT;
use PascalDeVink\ShortUuid\ShortUuid;
use Ramsey\Uuid\Uuid;

class LoginController extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Admin/AdminModel');
    }

    public function index(){
        $this->load->library('form_validation');

        // set rules
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('pass', 'Password', 'trim|required|min_length[6]');

        if(!$this->form_validation->run()){
            $data = [
                'title' => 'Login',
                'page' => 'auth/login'
            ];
            $this->load->view('layout/auth_layout', $data);
        }else{
            self::login_act();
        }
    }

    private function login_act(){
        $short = new ShortUuid();
        $mail = request()->input('email');
        $pass = request()->input('pass');
        $salt = getenv('APP_SALT');

        $admin = AdminModel::findOne(['admin_email' => $mail]);
        if(isset($admin)){
            $pass_salt = "$pass+$salt";
            if(!password_verify($pass_salt, $admin->admin_password)){
                alert_error('Password salah!');
                redirect('login');
            }else{
                $key = getenv('APP_KEY');
                $payload = [
                    'iat' => time(),
                    'iss' => base_url(),
                    'accId' => $short->encode(Uuid::fromString($admin->admin_id))
                ];
                $token = JWT::encode($payload, $key, 'HS256');
                // set session
                $this->session->set_userdata('token', $token);
                redirect('dashboard');
            }
        }else{
            alert_error('User tidak terdaftar');
            redirect('login');
        }
    }

    public function keluar_app(){
        $this->session->unset_userdata('token');
        redirect('login');
    }

}