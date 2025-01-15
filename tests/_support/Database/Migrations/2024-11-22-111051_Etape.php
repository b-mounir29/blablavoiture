<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class etape extends Migration
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

            'id_travel' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],

            'order' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],

            'id_city_departure' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],

            'adress_departure' => [
                'type' => 'TEXT',
                'null' => true,
            ],

            'date_departure' => [
                'type' => 'DATE',
                'null' => false,
                ],

            'nb_seat' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_travel', 'travel', 'id');
        $this->forge->addForeignKey('id_city_departure', 'city', 'id');
        $this->forge->createTable('etape');
    }

    public function down()
    {
        $this->forge->dropTable('etape');
    }
}
