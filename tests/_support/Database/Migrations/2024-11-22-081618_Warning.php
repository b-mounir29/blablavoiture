<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class warning extends Migration
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

            'entity_id'=> [
                'type'=>'INT',
                'constraint'=>11,
                'unsigned'=>true,
                'null'=>true,
            ],


            'entity_type'=> [
                'type'=>'ENUM',
                'constraint'=>["user","travel","reservation","comment","message"],
                'default'=>'user',
            ],

            'id_sender' => [
                'type'=>'INT',
                'constraint'=>11,
                'unsigned'=>true,
                'null'=>true,
            ],


            'id_moderator' => [
                'type'=>'INT',
                'constraint'=>11,
                'unsigned'=>true,
                'null'=>true,
            ],

            'content' => [
                'type'=>'TEXT',
                'null'=>false,
            ],

            'priority' => [
                'type'=> 'ENUM',
                'constraint'=>['low','medium','high'],
                'default'=>'low',
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
        $this->forge->addForeignKey('id_sender','user','id');
        $this->forge->addForeignKey('id_moderator','user','id');
        $this->forge->createTable('warning');
    }

    public function down()
    {
        $this->forge->dropTable("warning");
    }
}
