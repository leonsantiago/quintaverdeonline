<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Frutas'
        ]);
        Category::create([
            'name' => 'Verduras'
        ]);
        Category::create([
            'name' => 'Otros'
        ]);
    }
}
