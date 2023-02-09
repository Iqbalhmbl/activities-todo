<?php

namespace Database\Seeders;

use App\Models\User;
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
        $admin = User::create([
            'first_name' => 'Hi Admin',
            'middle_name' => '',
            'last_name' => '',
            'gender' => 'Male',
            'role_name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345678'),
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'first_name' => 'Hi User',
            'middle_name' => '',
            'last_name' => '',
            'gender' => 'Female',
            'role_name' => 'user',
            'email' => 'user@user.com',
            'password' => bcrypt('12345678'),
        ]);

        $user->assignRole('user');
    }
}
