<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::create([
            'user_id' => 1,
            'payment_type' => 'efectivo',
            'total' => 500,
        ]);

        Order::create([
            'user_id' => 2,
            'payment_type' => 'efectivo',
            'total' => 500,
        ]);

        Order::create([
            'user_id' => 3,
            'payment_type' => 'efectivo',
            'total' => 500,
        ]);
    }
}
