<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\RawSql;
use CodeIgniter\Database\Migration;

class Employee extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'code' => ['type'  => 'TEXT'],
            'name' => ['type'  => 'TEXT'],
            'department' => ['type'  => 'TEXT'],
            'position' => ['type'  => 'TEXT'],
            'hired_date' => ['type'  => 'DATETIME','default' => new RawSql('CURRENT_TIMESTAMP'),],
            'status' => ['type' => 'ENUM', 'constraint' => ['Active','Inactive','Resigned']]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('employees');
    }

    public function down()
    {
        //
        $this->forge->dropTable('employees');
    }
}
