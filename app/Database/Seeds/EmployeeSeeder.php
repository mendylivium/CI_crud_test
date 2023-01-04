<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    public function run()
    {
        //
        $this->db->table('employees')->insert([
            'name' => 'Rommel Mendiola',
            'code' => 'G-000001',
            'department' => 'Programming',
            'position' => 'PHP Developer',
            'status' => 'Active'
        ]);
    }
}
