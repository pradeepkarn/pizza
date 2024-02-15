<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ToppingTableSeeder extends Seeder
{
     /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sample topping data
        $toppings = [
            [
                'name' => 'extra cheese',
                'price' => '150.00',
                'created_at' => gmdate('Y-m-d H:i:s'),
                'updated_at' => null,
                'size' => 'small',
            ],
            [
                'name' => 'jalapenos',
                'price' => '191.00',
                'created_at' => gmdate('Y-m-d H:i:s'),
                'updated_at' => null,
                'size' => 'small',
            ],
            [
                'name' => 'sweet corns',
                'price' => '190.00',
                'created_at' => gmdate('Y-m-d H:i:s'),
                'updated_at' => null,
                'size' => 'small',
            ],
            [
                'name' => 'extra veggies',
                'price' => '160.00',
                'created_at' => gmdate('Y-m-d H:i:s'),
                'updated_at' => null,
                'size' => 'small',
            ],
            [
                'name' => 'extra cheese',
                'price' => '160.00',
                'created_at' => gmdate('Y-m-d H:i:s'),
                'updated_at' => null,
                'size' => 'medium',
            ],
            [
                'name' => 'jalapenos',
                'price' => '205.00',
                'created_at' => gmdate('Y-m-d H:i:s'),
                'updated_at' => null,
                'size' => 'medium',
            ],
            [
                'name' => 'sweet corns',
                'price' => '200.00',
                'created_at' => gmdate('Y-m-d H:i:s'),
                'updated_at' => null,
                'size' => 'medium',
            ],
            [
                'name' => 'extra veggies',
                'price' => '175.00',
                'created_at' => gmdate('Y-m-d H:i:s'),
                'updated_at' => null,
                'size' => 'medium',
            ],
            [
                'name' => 'extra cheese',
                'price' => '175.00',
                'created_at' => gmdate('Y-m-d H:i:s'),
                'updated_at' => null,
                'size' => 'large',
            ],
            [
                'name' => 'jalapenos',
                'price' => '220.00',
                'created_at' => gmdate('Y-m-d H:i:s'),
                'updated_at' => null,
                'size' => 'large',
            ],
            [
                'name' => 'sweet corns',
                'price' => '210.00',
                'created_at' => gmdate('Y-m-d H:i:s'),
                'updated_at' => null,
                'size' => 'large',
            ],
            [
                'name' => 'extra veggies',
                'price' => '180.00',
                'created_at' => gmdate('Y-m-d H:i:s'),
                'updated_at' => null,
                'size' => 'large',
            ],
        ];
        DB::table('toppings')->insert($toppings);
    }
}
