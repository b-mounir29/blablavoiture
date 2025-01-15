<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterTableUser extends Migration
{
    public function up()
    {

        $this->forge->addColumn('user', [
            'family_name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false,
            ],

            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => 11,
                'null' => true,
            ],


            'cagnotte'=> [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0,
                'null' => false,
            ],

        ]);


    }

    public function down()
    {

        // si j'ai besoin de  supprimer les colonnes

        $this->forge->dropColumn('user', 'family_name');
        $this->forge->dropColumn('user', 'phone');
        $this->forge->dropColumn('user', 'cagnotte');
    }
}