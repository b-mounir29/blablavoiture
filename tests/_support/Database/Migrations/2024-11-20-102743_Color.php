<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class color extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'=> [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],

            'name'=> [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
                ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('color');
    }

    public function down()
    {
        $this->forge->dropTable('color');
    }
}
