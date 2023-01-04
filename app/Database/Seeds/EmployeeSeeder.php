<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    public function run()
    {
        //
        $dummy_fnames = ["Alice","Bob","Charlie","Dave","Eve","Frank","Grace","Heather","Ivan","Jill"];
        $dummy_lnames = ["Smith","Johnson","Williams","Jones","Brown","Davis","Miller","Wilson","Moore","Taylor"];
        $dummy_dnames = ["Product Development","Marketing","Sales","Customer Support","Human Resources","Finance","Legal","Operations","Research and Development","IT"];
        $dummy_pnames = ["Director","Manager","Supervisor","Lead Developer","Senior Developer","Junior Developer","QA Engineer","Technical Writer","Technical Support Engineer","Customer Support Representative"];

        for($i = 0; $i < 20; $i++) {
        $this->db->table('employees')->insert([
            'name' =>  $dummy_fnames[rand(0, count($dummy_fnames)-1)] . ' ' . $dummy_lnames[rand(0, count($dummy_lnames)-1)],
            'department' => $dummy_dnames[rand(0, count($dummy_dnames)-1)],
            'position' => $dummy_pnames[rand(0, count($dummy_pnames)-1)],
            'status' => 'Active'
        ]);
        }
    }
}
