<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'SMALLINT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name'       => [
                'type'       => 'VARCHAR',
                'constraint' => 220,
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',

            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => date('Y-m-d H:i:s')
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => date('Y-m-d H:i:s')
            ],
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('users', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('users', TRUE);
    }
}
