<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Ajo (cabeza)',
            'category_id' => 2,
            'unit' => 'unidad',
            'price' => 60,
            'active' => 1,
        ]);

        Product::create([
            'name' => 'Arandano (bandeja)',
            'category_id' => 1,
            'unit' => 'unidad',
            'price' => 150,
            'active' => 1,
        ]);

        Product::create([
            'name' => 'Brócoli (tallo)',
            'category_id' => 2,
            'unit' => 'unidad',
            'price' => 60,
            'active' => 1,
        ]);

        Product::create([
            'name' => 'Dulce artesanal (1 kg)',
            'category_id' => 3,
            'unit' => 'unidad',
            'price' => 400,
            'active' => 1,
        ]);

        Product::create([
            'name' => 'Mango',
            'category_id' => 1,
            'unit' => 'unidad',
            'price' => 100,
            'active' => 1,
        ]);

        Product::create([
            'name' => 'Kiwi',
            'category_id' => 1,
            'unit' => 'kg',
            'price' => 170,
            'active' => 1,
        ]);

        Product::create([
            'name' => 'Cebolla morada',
            'category_id' => 2,
            'unit' => 'kg',
            'price' => 60,
            'active' => 1,
        ]);

        Product::create([
            'name' => 'Ciruela',
            'category_id' => 1,
            'unit' => 'kg',
            'price' => 120,
            'active' => 1,
        ]);

    }
}
