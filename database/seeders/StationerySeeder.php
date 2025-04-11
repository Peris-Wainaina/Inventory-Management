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
        Stationery::create([
            'item_name' => 'Pens',
            'quantity' => 100,
        ]); 
        Stationery::create([
            'item_name' => 'Photocopying Papers',
            'quantity' => 200,
        ]); 
        Stationery::create([
            'item_name' => 'Paper Clips',
            'quantity' => 150,
        ]); 
        Stationery::create([
            'item_name' => 'Staple Pins',
            'quantity' => 200,
        ]);
        Stationery::create([
            'item_name' => 'Note books',
            'quantity' => 500,
        ]);
        Stationery::create([
            'item_name' => 'Box Files',
            'quantity' => 350,
        ]);
        Stationery::create([
            'item_name' => 'Spring Files',
            'quantity' => 350,
        ]);
        Stationery::create([
            'item_name' => 'Glue Stick',
            'quantity' => 100,
        ]);
        Stationery::create([
            'item_name' => 'White Out',
            'quantity' => 100,
        ]);
        Stationery::create([
            'item_name' => 'Envelopes',
            'quantity' => 500,
        ]);
        Stationery::create([
            'item_name' => 'Loose Leaf Pad',
            'quantity' => 100,
        ]);
        Stationery::create([
            'item_name' => 'Pencils',
            'quantity' => 100,
        ]);
    }
    }
    

