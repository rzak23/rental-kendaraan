<?php

class DashboardController extends CI_Controller{

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $data = [
            'title' => 'Dashboard',
            'page' => 'dashboard/home'
        ];
        $this->load->view('layout/dashboard_layout', $data);
    }
}