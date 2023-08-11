<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'=>'Admin',
            'email'=>'thortask@gmail.com',
            'password'=>Hash::make('Admin@123'),
            'email_verified_at'=>Carbon::now()
        ]);
        $user->assignRole('admin');
    }
}
