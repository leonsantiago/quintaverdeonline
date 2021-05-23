<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::create([
          'name' => 'Santiago',
          'lastname' => 'Leon',
          'phone' => 3876857860,
          'address' => 'Angel Figueroa 1107'
      ]);

        User::create([
            'name' => 'Constanza',
            'lastname' => 'Michel',
            'phone' => 3875879551,
            'address' => 'Pio Leon 265'
        ]);

        User::create([
            'name' => 'Mario',
            'lastname' => 'Ale',
            'phone' => 3877855985,
            'address' => 'Iruya 38, El Tipal'
        ]);
    }
}
