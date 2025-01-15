<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class city extends Migration
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

            'zip_code'=> [
                'type'=>'INT',
                'constraint'=>'5',
                'unsigned'=>true,
                'null'=>false,
            ],

            'label'=>[
                'type'=>'VARCHAR',
                'constraint'=>'255',
                'null'=>false,
            ],

            'department_name'=> [
                'type'=>'VARCHAR',
                'constraint'=>'100',
                'null'=>false,
            ],

            'department_number'=> [
                'type'=>'VARCHAR',
                'constraint'=>'100',
                'null'=>false,
            ],

            'region_name'=> [
                'type'=>'VARCHAR',
                'constraint'=>'255',
                'null'=>false,
            ]
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('city');
    }


    public function down()
    {
        $this->forge->dropTable('city');
    }
}
