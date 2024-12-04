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


        $this->forge->addForeignKey('id_card', 'media', 'entity_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_license', 'media', 'entity_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_avatar', 'media', 'entity_id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        // si j'ai besoin de  supprimer les clés étrangères

        $this->forge->dropForeignKey('media', 'media_id_card_foreign');
        $this->forge->dropForeignKey('media', 'media_id_license_foreign');
        $this->forge->dropForeignKey('media', 'media_id_avatar_foreign');

        // si j'ai besoin de  supprimer les colonnes

        $this->forge->dropColumn('media', 'id_card');
        $this->forge->dropColumn('media', 'id_license');
        $this->forge->dropColumn('media', 'id_avatar');
    }
}