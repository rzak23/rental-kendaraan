<?php
/**
 * Migration: create_table_rental_admin
 *
 * Created by: Cli for CodeIgniter <https://github.com/kenjis/codeigniter-cli>
 * Created on: 2024/01/08 10:24:10
 */
class Migration_create_table_rental_admin extends CI_Migration {

	public function up()
	{
        $fields = [
            'admin_id' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false
            ],
            'admin_nama' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ],
            'admin_email' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false
            ],
            'admin_password' => [
                'type' => 'VARCHAR',
                'constraint' => 256,
                'null' => false
            ],
            'admin_phone' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => false
            ],
            'admin_alamat' => [
                'type' => 'TEXT',
                'null' => false
            ],
            'admin_gender' => [
                'type' => 'VARCHAR',
                'constraint' => 1,
                'null' => false
            ],
            'admin_tgl_lahir' => [
                'type' => 'DATE',
                'null' => false
            ],
            'is_admin' => [
                'type' => 'BOOLEAN',
                'default' => false
            ],
            'admin_tgl_created' => [
                'type' => 'TIMESTAMP',
                'null' => false
            ],
            'admin_tgl_updated' => [
                'type' => 'TIMESTAMP',
                'null' => false
            ]
        ];

        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('admin_id', true);
        $this->dbforge->create_table('rental_admin');
	}

	public function down()
	{
        $this->dbforge->drop_table('rental_admin');
	}

}
