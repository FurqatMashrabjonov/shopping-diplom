<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        Product::factory(1000)->create();
         \App\Models\User::factory()->create([
             'name' => 'Admin',
             'email' => 'admin@mail.ru',
             'password' => Hash::make('admin12345')
         ]);
    }
}
