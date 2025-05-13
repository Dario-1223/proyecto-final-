<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Iván',
            'last_name' => 'Urbano',
            'email' => 'IvanUrbano@gmail.com',
            'password' => '12345678',
            'telefono' => '3214567878',
            'direccion' => 'Génova',
            'rol' => 'ganadero'
        ]);

        User::create([
            'name' => 'yeison',
            'last_name' => 'sanchez',
            'email' => 'yeisonsanchez@gmail.com',
            'password' => '87654321',
            'telefono' => '312414174',
            'direccion' => 'Tambo',
            'rol' => 'gestor'
        ]);

        User::create([
            'name' => 'Mateo',
            'last_name' => 'Rivera',
            'email' => 'MateoRivera@gmail.com',
            'password' => '14252352',
            'telefono' => '3134152352',
            'direccion' => 'Popayan',
            'rol' => 'administrador'
        ]);
    }
}
