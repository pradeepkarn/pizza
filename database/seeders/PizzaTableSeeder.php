<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PizzaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sample pizza data
        $pizzas = [
            [
                'id' => 1,
                'type' => 'Farmhouse',
                'image' => 'farmhouse.jpg',
                'listed_by' => 1,
                'created_at' => gmdate('Y-m-d H:i:s'),
                'updated_at' => null,
            ],
            [
                'id' => 2,
                'type' => 'Margarita',
                'image' => 'margarita.jpg', // Replace with the correct image filename
                'listed_by' => 1,
                'created_at' => gmdate('Y-m-d H:i:s'),
                'updated_at' => null,
            ],
            [
                'id' => 3,
                'type' => 'Peppy Paneer',
                'image' => 'peppy_paneer.jpg', // Replace with the correct image filename
                'listed_by' => 1,
                'created_at' => gmdate('Y-m-d H:i:s'),
                'updated_at' => null,
            ],
            // Add more pizzas as needed
        ];

        // Insert the data into the 'pizzas' table
        DB::table('pizzas')->insert($pizzas);
    }
}
