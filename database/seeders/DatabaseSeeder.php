<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * 
     * Ejecuta los seeders en orden:
     * 1. UsuarioSeeder (primero, ya que Pedidos depende de Usuarios)
     * 2. PedidoSeeder
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsuarioSeeder::class,
            PedidoSeeder::class,
        ]);
    }
}
