<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 1fruta, 2verdura 3otro
     * @return void
     */
    public function run()
    {
      $products = array(
        [ 'category_id' => 2, 'name' => 'Arveja', 'unit' => 'kg', 'price' => 100.0, 'active' => true, 'description' => null],
        [ 'category_id' => 2, 'name' => 'Acelga', 'unit' => 'unidad', 'price' => 100.0, 'active' => true, 'description' => null],
        [ 'category_id' => 2, 'name' => 'Achicoria', 'unit' => 'unidad', 'price' => 50.0, 'active' => true, 'description' => null],
        [ 'category_id' => 2, 'name' => 'Ajo', 'unit' => 'unidad', 'price' => 40.0, 'active' => true, 'description' => null],
        [ 'category_id' => 2, 'name' => 'Albahaca', 'unit' => 'unidad', 'price' => 100.0, 'active' => true, 'description' => null],
        [ 'category_id' => 1, 'name' => 'Ananá', 'unit' => 'unidad', 'price' => 100.0, 'active' => true, 'description' => null],
        [ 'category_id' => 2, 'name' => 'Apio', 'unit' => 'unidad', 'price' => 40.0, 'active' => true, 'Por atado', 'description' => null],
        [ 'category_id' => 1, 'name' => 'Arandanos sueltos', 'unit' => 'kg', 'price' => 350.0, 'active' => true, 'description' => null],
        [ 'category_id' => 1, 'name' => 'Arandanos cubeta', 'unit' => 'unidad', 'price' => 80.0, 'active' => true, 'description' => null],
        [ 'category_id' => 3, 'name' => 'Bandeja de ensalada', 'unit' => 'unidad', 'price' => 80.0, 'active' => true, 'description' => null],
        [ 'category_id' => 3, 'name' => 'Bandeja para sopa', 'unit' => 'unidad', 'price' => 80.0, 'active' => true, 'description' => null],
        [ 'category_id' => 1, 'name' => 'Banana Ecuatoriana', 'unit' => 'kg', 'price' => 200.0, 'active' => true, 'description' => null],
        [ 'category_id' => 2, 'name' => 'Batata Blanca', 'unit' => 'kg', 'price' => 50.0, 'active' => true, 'description' => null],
        [ 'category_id' => 2, 'name' => 'Batata Morada', 'unit' => 'kg', 'price' => 50.0, 'active' => true, 'description' => null],
        [ 'category_id' => 2, 'name' => 'Berenjena', 'unit' => 'kg', 'price' => 100.0, 'active' => true, 'description' => null],
        [ 'category_id' => 2, 'name' => 'Brocoli', 'unit' => 'unidad', 'price' => 100.0, 'active' => true, 'description' => null],
        [ 'category_id' => 2, 'name' => 'Brote de Alfa', 'unit' => 'unidad', 'price' => 80.0, 'active' => true, 'description' => null],
        [ 'category_id' => 2, 'name' => 'Brote de Soja', 'unit' => 'unidad', 'price' => 80.0, 'active' => true, 'description' => null],
        [ 'category_id' => 2, 'name' => 'Cebolla', 'unit' => 'kg', 'price' => 60.0, 'active' => true, 'description' => null],
        [ 'category_id' => 2, 'name' => 'Cebolla de Verdeo', 'unit' => 'unidad', 'price' => 30.0, 'active' => true, 'description' => null],
        [ 'category_id' => 2, 'name' => 'Cebolla morada', 'unit' => 'kg', 'price' => 80.0, 'active' => true, 'description' => null],
        [ 'category_id' => 2, 'name' => 'Chaucha', 'unit' => 'kg', 'price' => 300.0, 'active' => true, 'description' => null],
        [ 'category_id' => 2, 'name' => 'Champignon / Portobello', 'unit' => 'unidad', 'price' => 300.0, 'active' => true, 'description' => null],
        [ 'category_id' => 2, 'name' => 'Choclo', 'unit' => 'unidad', 'price' => 40.0, 'active' => true, 'description' => null],
        [ 'category_id' => 2, 'name' => 'Cilantro', 'unit' => 'unidad', 'price' => 50.0, 'active' => true, 'description' => null],
        [ 'category_id' => 2, 'name' => 'Coliflor', 'unit' => 'unidad', 'price' => 250.0, 'active' => true, 'description' => null],
        [ 'category_id' => 2, 'name' => 'Esparrago', 'unit' => 'unidad', 'price' => 200.0, 'active' => true, 'description' => null],
        [ 'category_id' => 2, 'name' => 'Espinaca', 'unit' => 'unidad', 'price' => 120.0, 'active' => true, 'description' => null],
        [ 'category_id' => 1, 'name' => 'Frutilla', 'unit' => 'kg', 'price' => 0.0, 'active' => true, 'description' => null],
        [ 'category_id' => 1, 'name' => 'Frutilla Cubeta', 'unit' => 'unidad', 'price' => 0.0, 'active' => false, 'description' => null],
        [ 'category_id' => 3, 'name' => 'Huevo por bandeja', 'unit' => 'unidad', 'price' => 260.0, 'active' => true, 'description' => null],
        [ 'category_id' => 3, 'name' => 'Huevo por unidad', 'unit' => 'unidad', 'price' => 10.0, 'active' => true, 'description' => null],
        [ 'category_id' => 2, 'name' => 'Jengibre en bandeja', 'unit' => 'unidad', 'price' => 50.0, 'active' => true, 'description' => null],
        [ 'category_id' => 1, 'name' => 'Kiwi', 'unit' => 'unidad', 'price' => 40.0, 'active' => true, 'description' => null],
        [ 'category_id' => 2, 'name' => 'Lecchuga crespa', 'unit' => 'unidad', 'price' => 50.0, 'active' => true, 'description' => null],
        [ 'category_id' => 2, 'name' => 'Lechuga mantecosa', 'unit' => 'unidad', 'price' => 50.0, 'active' => true, 'description' => null],
        [ 'category_id' => 2, 'name' => 'Lechuca repollada', 'unit' => 'unidad', 'price' => 50.0, 'active' => true, 'description' => null],
        [ 'category_id' => 2, 'name' => 'Lechuga hidroponica', 'unit' => 'unidad', 'price' => 100.0, 'active' => true, 'description' => null],
        [ 'category_id' => 1, 'name' => 'Limón', 'unit' => 'kg', 'price' => 50.0, 'active' => true, 'description' => null],
        [ 'category_id' => 1, 'name' => 'Mango', 'unit' => 'unidad', 'price' => 0.0, 'active' => false, 'description' => null],
        [ 'category_id' => 1, 'name' => 'Mandarina', 'unit' => 'kg', 'price' => 80.0, 'active' => true, 'description' => null],
        [ 'category_id' => 1, 'name' => 'Manzana roja', 'unit' => 'kg', 'price' => 200.0, 'active' => true, 'description' => null],
        [ 'category_id' => 1, 'name' => 'Manzana verde', 'unit' => 'kg', 'price' => 200.0, 'active' => true, 'description' => null],
        [ 'category_id' => 1, 'name' => 'Melón brasilero', 'unit' => 'unidad', 'price' => 250.0, 'active' => true, 'description' => null],
        [ 'category_id' => 1, 'name' => 'Menta', 'unit' => 'unidad', 'price' => 50.0, 'active' => true, 'description' => null],
        [ 'category_id' => 1, 'name' => 'Naranja criolla', 'unit' => 'kg', 'price' => 80.0, 'active' => true, 'description' => null],
        [ 'category_id' => 1, 'name' => 'Naranja de ombligo', 'unit' => 'kg', 'price' => 80.0, 'active' => true, 'description' => null],
        [ 'category_id' => 1, 'name' => 'Naranja tanjarina', 'unit' => 'kg', 'price' => 80.0, 'active' => true, 'description' => null],
        [ 'category_id' => 2, 'name' => 'Palta Hass', 'unit' => 'kg', 'price' => 400.0, 'active' => true, 'description' => null],
        [ 'category_id' => 2, 'name' => 'Papa', 'unit' => 'kg', 'price' => 40.0, 'active' => true, 'description' => null],
        [ 'category_id' => 2, 'name' => 'Pepino', 'unit' => 'kg', 'price' => 80.0, 'active' => true, 'description' => null],
        [ 'category_id' => 2, 'name' => 'Papines', 'unit' => 'unidad', 'price' => 0.0, 'active' => false, 'description' => null],
        [ 'category_id' => 1, 'name' => 'Pera', 'unit' => 'kg', 'price' => 180.0, 'active' => true, 'description' => null],
        [ 'category_id' => 2, 'name' => 'Perejil', 'unit' => 'unidad', 'price' => 0.0, 'active' => true, 'description' => null],
        [ 'category_id' => 2, 'name' => 'Pimiento rojo', 'unit' => 'kg', 'price' => 250.0, 'active' => true, 'description' => null],
        [ 'category_id' => 2, 'name' => 'Pimiento verde', 'unit' => 'kg', 'price' => 160.0, 'active' => true, 'description' => null],
        [ 'category_id' => 1, 'name' => 'Pomelo', 'unit' => 'unidad', 'price' => 30.0, 'active' => true, 'description' => null],
        [ 'category_id' => 2, 'name' => 'Puerro', 'unit' => 'unidad', 'price' => 60.0, 'active' => true, 'description' => null],
        [ 'category_id' => 2, 'name' => 'Rabanito', 'unit' => 'unidad', 'price' => 80.0, 'active' => true, 'description' => null],
        [ 'category_id' => 2, 'name' => 'Remolacha', 'unit' => 'unidad', 'price' => 120.0, 'active' => true, 'description' => null],
        [ 'category_id' => 2, 'name' => 'Repollo morado', 'unit' => 'unidad', 'price' => 100.0, 'active' => true, 'description' => null],
        [ 'category_id' => 2, 'name' => 'Repollo blanco', 'unit' => 'unidad', 'price' => 100.0, 'active' => true, 'description' => null],
        [ 'category_id' => 2, 'name' => 'Rucula', 'unit' => 'kg', 'price' => 50.0, 'active' => true, 'description' => null],
        [ 'category_id' => 1, 'name' => 'Sandía', 'unit' => 'kg', 'price' => 70.0, 'active' => true, 'description' => null],
        [ 'category_id' => 2, 'name' => 'Tomate Cherry', 'unit' => 'kg', 'price' => 300.0, 'active' => true, 'description' => null],
        [ 'category_id' => 2, 'name' => 'Tomate perita', 'unit' => 'kg', 'price' => 180.0, 'active' => true, 'description' => null],
        [ 'category_id' => 2, 'name' => 'Tomate redondo', 'unit' => 'kg', 'price' => 180.0, 'active' => true, 'description' => null],
        [ 'category_id' => 2, 'name' => 'Zanahoria', 'unit' => 'kg', 'price' => 50.0, 'active' => true, 'description' => null],
        [ 'category_id' => 2, 'name' => 'Zapallito Verde', 'unit' => 'kg', 'price' => 0.0, 'active' => true, 'description' => null],
        [ 'category_id' => 2, 'name' => 'Zapallo Brasilero', 'unit' => 'kg', 'price' => 120.0, 'active' => true, 'description' => null],
        [ 'category_id' => 2, 'name' => 'Zapallo Coreano', 'unit' => 'kg', 'price' => 100.0, 'active' => true, 'description' => null],
        [ 'category_id' => 2, 'name' => 'Zapallito Plomo', 'unit' => 'kg', 'price' => 80.0, 'active' => true, 'description' => null],
        [ 'category_id' => 2, 'name' => 'Zapallito Zuccini', 'unit' => 'kg', 'price' => 100.0, 'active' => true, 'description' => null],
      );

      foreach ($products as $product) {
        DB::table('products')->insert([
          'category_id' => $product['category_id'],
          'name' => $product['name'],
          'unit' => $product['unit'],
          'price' => $product['price'],
          'active' => $product['active'],
          'description' => $product['description']
        ]);
      };
    }
}
