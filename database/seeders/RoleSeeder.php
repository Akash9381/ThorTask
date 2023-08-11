<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Role::create(['name' => 'admin','guard_name' =>'web']);
        \App\Models\Role::create(['name' => 'user','guard_name' =>'web']);
        \App\Models\Role::create(['name' => 'company','guard_name' =>'web']);
    }
}
