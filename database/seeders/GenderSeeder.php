<?php

namespace Database\Seeders;

use App\Models\Genderlist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Genderlist::updateorcreate([
           'gender' => 'Male'
       ]);
        Genderlist::updateorcreate([
            'gender' => 'Female'
        ]);
        Genderlist::updateorcreate([
            'gender' => 'Unknown'
        ]);
    }
}
