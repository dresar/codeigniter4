<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTestimonialsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'client_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'client_position' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'client_company' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'client_image' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'testimonial' => [
                'type' => 'TEXT',
            ],
            'rating' => [
                'type'       => 'INT',
                'constraint' => 1,
                'default'    => 5,
            ],
            'status' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'default'    => 'published',
            ],
            'featured' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 0,
            ],
            'order' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 0,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('testimonials');
    }

    public function down()
    {
        $this->forge->dropTable('testimonials');
    }
}

