<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Roles::updateorcreate([
            'name' => 'patient'
        ]);
        Roles::updateorcreate([
            'name' => 'receptionist'
        ]);
        Roles::updateorcreate([
            'name' => 'doctor'
        ]);
    }
}
