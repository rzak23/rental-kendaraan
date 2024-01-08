<?php

use Luthier\MiddlewareInterface;

class AuthMiddleware implements MiddlewareInterface {

    public function run($args){
        ci()->load->library('Token');

        $token = ci()->session->userdata('token');
        $checker = new Token();
        $validated = $checker->cek_token($token);
        if(!$validated){
            alert_error('Silahkan login terlebih dahulu');
            redirect('login');
        }
    }

}