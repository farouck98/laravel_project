<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {

        DB::table('role_user')->truncate();

        $admin =User::create([
            'pseudo' => 'admin',
            'email' => 'latoundjifarouck@gmail.com',
            'password' => Hash::make('harisson'),
            'birthdate' => '1998-05-23'
        ]);


        $adminRole = Role::where('name', 'administrateur')->first();

        $admin->roles()->attach($adminRole);

    }
}
