<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class car extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'=> [
                'type'=>'INT',
                'constraint'=>11,
                'unsigned'=>true,
                'auto_increment'=>true,
            ],


            'id_user'=> [
                'type'=>'INT',
                'constraint'=>11,
                'unsigned'=>true,
                'null'=>false,
            ],

            'id_modelcar'=> [
                'type'=>'INT',
                'constraint'=>11,
                'unsigned'=>true,
                'null'=>false,
            ],

            'id_color'=> [
                'type'=>'INT',
                'constraint'=>11,
                'unsigned'=>true,
                'null'=>false,
            ],

            'created_at' => [
                'type'       => 'DATETIME',
                'null'       => false,
            ],
            'updated_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
            'deleted_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_user','user','id');
        $this->forge->addForeignKey('id_modelcar','modelcar','id');
        $this->forge->addForeignKey('id_color','color','id');
        $this->forge->createTable('car');
    }

    public function down()
    {
        $this->forge->dropTable('car');
    }
}