<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Message extends Migration
{
    public function up()
    {
    $this->forge->addField([
        'id'=> [
            'type' => 'INT',
            'constraint' => 11,
            'unsigned' => true,
            'auto_increment' => true,
            'null' => false,
        ],

        'id_sender' => [
            'type' => 'INT',
            'constraint' => 11,
            'unsigned' => true,
            ],

        'id_receiver' => [
            'type' => 'INT',
            'constraint' => 11,
            'unsigned' => true,
        ],

        'content' => [
            'type' => 'TEXT',
            'null' => true,
            'default' => null,
        ],

        'id_travel' => [
            'type' => 'INT',
            'constraint' => 11,
            'unsigned' => true,
        ],

        'created_at' => [
            'type' => 'DATETIME',
            'null' => true,
            'default' => null,
        ],

        'updated_at' => [
            'type' => 'DATETIME',
            'null' => true,
            'default' => null,
        ],

        'deleted_at' => [
            'type' => 'DATETIME',
            'null' => true,
            'default' => null,
        ],
    ]);

    $this->forge->addKey('id', true);
    $this->forge->addForeignKey('id_sender', 'user', 'id');
    $this->forge->addForeignKey('id_receiver', 'user', 'id');
    $this->forge->addForeignKey('id_travel', 'travel', 'id');
    $this->forge->createTable('message');
    }

    public function down()
    {
        $this->forge->dropTable('message');
    }
}
