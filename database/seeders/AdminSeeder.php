<?php

class AdminSeeder extends Seeder{

    public function run(){
        $this->load->model('Admin/AdminModel');

        $salt = getenv('APP_SALT');
        $pass_salt = "123456789+$salt";

        $admin = new AdminModel();
        $admin->admin_id = \Ramsey\Uuid\Uuid::uuid4();
        $admin->admin_nama = 'Reza Akbar';
        $admin->admin_email = 'rzak.dev@proton.me';
        $admin->admin_password = password_hash($pass_salt, PASSWORD_DEFAULT);
        $admin->admin_phone = '81805467977';
        $admin->admin_alamat = 'Denpasar';
        $admin->admin_gender = 'l';
        $admin->admin_tgl_lahir = '1996-11-23';
        $admin->is_admin = true;
        $admin->save();
    }

}