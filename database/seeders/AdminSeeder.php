<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Admin;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::create([
        	'name' => 'admin',
        	'email' => 'admin@gmail.com',
        	'password' => bcrypt('12345678')
        ]);

        $user = User::create([
        	'name' => 'user',
            'phone' => '01723112212',
        	'email' => 'user@gmail.com',
        	'password' => bcrypt('12345678')
        ]);
    }
}
