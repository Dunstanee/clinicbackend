<?php

namespace Database\Seeders;

use App\Models\Services;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Services::updateorcreate([
            'service' => 'outpatient'
        ],[
            'cost' => 100.00
        ]);
        Services::updateorcreate([
            'service' => 'intpatient'
        ],[
            'cost' => 500.00
        ]);
    }
}
