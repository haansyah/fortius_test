<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadmin = User::create([
            'name'              => 'Superadmin',
            'email'             => 'superadmin@gmail.com',
            'password'          => bcrypt('P4ssw0rd*123'),
            'email_verified_at' => date('Y-m-d H:i')
        ]);
        $superadmin->assignRole('superadmin');

        $admin = User::create([
            'name'              => 'Admin',
            'email'             => 'admin@gmail.com',
            'password'          => bcrypt('P4ssw0rd*123'),
            'email_verified_at' => date('Y-m-d H:i')
        ]);
        $admin->assignRole('admin');

        $writer = User::create([
            'name'              => 'Writer',
            'email'             => 'writer@gmail.com',
            'password'          => bcrypt('password'),
            'email_verified_at' => date('Y-m-d H:i')
        ]);
        $writer->assignRole('writer');
    }
}
