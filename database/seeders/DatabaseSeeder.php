<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Datos;
use App\Models\Images;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
       // Storage::deleteDirectory('prueba');
        Storage::makeDirectory('prueba');

        $this->call(RoleSeeder::class);
         
         \App\Models\User::factory()->create([
             'name' => 'Luis Benavides',
             'email' => 'aux.soportepdv@supergirosnarino.co',
             'password' => bcrypt('987654321')
         ])->assignRole('Admin');

        \App\Models\User::factory(5999)->create();
    
         Datos::factory(6000)->create();
         Images::factory(6000)->create(); 
    }
}
