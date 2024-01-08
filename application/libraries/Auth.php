<?php

use PascalDeVink\ShortUuid\ShortUuid;

class Auth{

    private bool $is_login = false;
    private bool $is_admin = false;
    private string $mail = '';
    private string $nama = '';
    private string $id = '';

    public function set_auth(string $acc_id){
        ci()->load->model('Admin/AdminModel');

        $short = new ShortUuid();
        $key = $short->decode($acc_id);
        $admin = AdminModel::findOne(['admin_id' => $key]);
        if(isset($admin)){
            $this->is_login = true;
            $this->is_admin = $admin->is_admin;
            $this->nama = $admin->admin_nama;
            $this->mail = $admin->admin_email;
            $this->id = $admin->admin_id;
        }
    }

    public function id(): string
    {
        return $this->id;
    }

    public function nama(): string
    {
        return $this->nama;
    }

    public function email(): string
    {
        return $this->mail;
    }

    public function is_admin(): bool
    {
        return $this->is_admin;
    }

    public function is_login(): bool
    {
        return $this->is_login;
    }

}