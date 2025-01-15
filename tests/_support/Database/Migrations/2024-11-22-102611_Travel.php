<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class travel extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'=> [
                'type'=>'INT',
                'constraint'=>11,
                'unsigned'=>true,
                'auto_increment'=>true
            ],

            'id_user'=> [
                'type'=>'INT',
                'constraint'=>11,
                'unsigned'=>true,
                'null'=>true,
            ],

            'id_car'=> [
                'type'=>'INT',
                'constraint'=>11,
                'unsigned'=>true,
            ],

            'nb_seat' => [
                'type'=>'INT',
                'constraint'=>11,
                'unsigned'=>true,
                'null'=>true,
                ],

            'comment' => [
                'type'=>'TEXT',
                'null'=>true,
                ],

            'created_at' => [
                'type'=>'DATETIME',
                'null'=>false,
            ],

            'updated_at' => [
                'type'=>'DATETIME',
                'null'=>true,
                ],

            'deleted_at' => [
                'type'=>'DATETIME',
                'null'=>true,
            ],

        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_user','user','id');
        $this->forge->addForeignKey('id_car','car','id');
        $this->forge->createTable('travel');

    }

    public function down()
    {
        $this->forge->dropTable('travel');
    }
}
