<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class reservation extends Migration
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

            'id_user' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false,
            ],

            'id_travel' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],

            // etape depart et arrival correspond à l'id de la table etape
            'id_etape_departure' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],

            'id_etape_end' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],

            'nb_seat' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],

            'created_at' => [
                'type' => 'DATETIME',
                'null' => false,
            ],

        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_user', 'user', 'id');
        $this->forge->addForeignKey('id_travel', 'travel', 'id');
        $this->forge->addForeignKey('id_etape_departure', 'etape', 'id');
        $this->forge->addForeignKey('id_etape_end', 'etape', 'id');
        $this->forge->createTable('reservation');
    }

    public function down()
    {
        $this->forge->dropTable('reservation');
    }
}
