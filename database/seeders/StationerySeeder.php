<?php

namespace Database\Seeders;

use App\Models\Stationery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StationerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Stationery::factory()-> count(20)->create(); 
    }
}
