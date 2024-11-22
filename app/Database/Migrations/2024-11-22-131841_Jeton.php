<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class jeton extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],

            'id_reservation' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],

            'total_jeton' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],

            'created_at' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_reservation', 'reservation', 'id');
        $this->forge->createTable('jeton');
    }

    public function down()
    {
        $this->forge->dropTable('jeton');
    }
}
