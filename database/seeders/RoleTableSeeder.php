<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        //Crée les rôles
        Role::create(['name' => 'administrateur']);
        Role::create(['name' => 'utilisateur']);

    }
}
