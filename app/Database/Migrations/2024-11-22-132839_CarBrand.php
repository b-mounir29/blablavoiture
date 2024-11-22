<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class carbrand extends Migration
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

            'name' => [
                'type'=>'VARCHAR',
                'constraint'=>'100',
            ],

        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('CarBrand');
    }

    public function down()
    {
        $this->forge->dropTable('CarBrand');

    }
}
