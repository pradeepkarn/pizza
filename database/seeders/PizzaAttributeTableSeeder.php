<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PizzaAttributeTableSeeder extends Seeder
{
     /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // please make sure you have correct pizza id
        $pizzaAttributes = [
            [
                'pizza_id' => 1,
                'size' => 'small',
                'price' => '466.00',
                'created_at' => gmdate('Y-m-d H:i:s'),
                'updated_at' => null,
            ],
            [
                'pizza_id' => 1,
                'size' => 'medium',
                'price' => '720.00',
                'created_at' => gmdate('Y-m-d H:i:s'),
                'updated_at' => null,
            ],
            [
                'pizza_id' => 1,
                'size' => 'large',
                'price' => '821.00',
                'created_at' => gmdate('Y-m-d H:i:s'),
                'updated_at' => null,
            ],
            [
                'pizza_id' => 2,
                'size' => 'small',
                'price' => '321.00',
                'created_at' => gmdate('Y-m-d H:i:s'),
                'updated_at' => null,
            ],
            [
                'pizza_id' => 2,
                'size' => 'medium',
                'price' => '650.00',
                'created_at' => gmdate('Y-m-d H:i:s'),
                'updated_at' => null,
            ],
            [
                'pizza_id' => 2,
                'size' => 'large',
                'price' => '723.00',
                'created_at' => gmdate('Y-m-d H:i:s'),
                'updated_at' => null,
            ],
            [
                'pizza_id' => 3,
                'size' => 'small',
                'price' => '430.00',
                'created_at' => gmdate('Y-m-d H:i:s'),
                'updated_at' => null,
            ],
            [
                'pizza_id' => 3,
                'size' => 'medium',
                'price' => '520.00',
                'created_at' => gmdate('Y-m-d H:i:s'),
                'updated_at' => null,
            ],
            [
                'pizza_id' => 3,
                'size' => 'large',
                'price' => '670.00',
                'created_at' => gmdate('Y-m-d H:i:s'),
                'updated_at' => null,
            ],
            
        ];

        
        DB::table('pizza_attributes')->insert($pizzaAttributes);
    }
}
