<?php

class AdminModel extends \yidas\Model{

    protected $table = 'rental_admin';
    protected $primaryKey = 'admin_id';
    const CREATED_AT = 'admin_tgl_created';
    const UPDATED_AT = 'admin_tgl_updated';

}