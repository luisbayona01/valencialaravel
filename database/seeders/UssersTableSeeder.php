<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
class UssersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      User::create([
            'nombres' => 'luis',
            'apellidos' => 'bayona',
            'email' => 'lgbayona1988@gmail.com',
            'password' =>  bcrypt('12345678'),
            'idrol' => 1,
            
        ])->assignRole('administrador');
    

    User::create([
            'nombres' => 'admin',
            'apellidos' => 'admnin',
            'email' => 'admin@grupoetra.com',
            'password' =>  bcrypt('12345678'),
            'idrol' => 1,
            
        ])->assignRole('administrador');

   User::create([
            'nombres' => 'John',
            'apellidos' => 'Tejada',
            'email' => 'jmtejada.interandina@grupoetra.com',
            'password' =>  bcrypt('12345678'),
            'idrol' => 1,
            
        ])->assignRole('administrador');
   

     //jmtejada.interandina@grupoetra.com
    }
}
