<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Item extends Migration
{
    public function up()
    {
        $this->forge->addField([
        'id'=> [
         'type'=>'INT',
        'constraint'=>11,
        'auto_increment'=>true,
        'unsigned'=>true,
        ],

        'title'=> [
            'type'=>'VARCHAR',
            'constraint'=>255,
            'null'=>false,
            'unique'=>true,
        ],

        'price'=> [
            'type'=>'float',
            'constraint'=>11,
            'null'=>false,
        ],
            'quantity'=> [
                'type'=>'INT',
                'constraint'=>11,
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
        $this->forge->createTable('item');

    }

    public function down()
    {
        $this->forge->dropTable('item');
    }
}
