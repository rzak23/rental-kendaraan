<?php

function auth(){
    ci()->load->library('Auth');

    static $auth;
    if(!$auth){
        $auth = new Auth();
    }

    return $auth;
}