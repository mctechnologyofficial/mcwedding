<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name'              => 'User',
            'email'             => 'user@gmail.com',
            'password'          => Hash::make('password'),
            'image'             => NULL,
            'premium_status'    => 0
        ]);

        $owner = User::create([
            'name'              => 'Owner',
            'email'             => 'owner@gmail.com',
            'password'          => Hash::make('password'),
            'image'             => NULL,
            'premium_status'    => NULL
        ]);

        $admin = User::create([
            'name'              => 'Admin',
            'email'             => 'admin@gmail.com',
            'password'          => Hash::make('password'),
            'image'             => NULL,
            'premium_status'    => NULL
        ]);

        $user_role = Role::create(['name'   => 'user']);
        $owner_role = Role::create(['name'   => 'owner']);
        $admin_role = Role::create(['name'   => 'admin']);

        $owner->assignRole('owner');
        $user->assignRole('user');
        $admin->assignRole('admin');
    }
}
