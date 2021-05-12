<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTable([
            'categories',
            'products',
        ]);

        $this->call(CategoriesSeeder::class);
        $this->call(ProductsSeeder::class);


    }
    protected function truncateTable(array $tables){

        Schema::enableForeignKeyConstraints();
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        foreach ($tables as $table){
            DB::table($table)->truncate();
        }

        Schema::disableForeignKeyConstraints();
    }
}
