<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;
use Faker\Factory as Faker;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * Crea al menos 10 usuarios de prueba.
     * Asegura que al menos un usuario tenga nombre comenzando con "R" (Consulta 5)
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('es_ES');

        // Usuario 1 - Nombre específico con "R" para la consulta 5
        Usuario::create([
            'nombre' => 'Ricardo Gómez',
            'correo' => 'ricardo.gomez@example.com',
            'telefono' => $faker->phoneNumber,
        ]);

        // Usuario 2 - Tendrá varios pedidos (Consulta 2)
        Usuario::create([
            'nombre' => $faker->name,
            'correo' => 'usuario2@example.com',
            'telefono' => $faker->phoneNumber,
        ]);

        // Usuario 3
        Usuario::create([
            'nombre' => $faker->name,
            'correo' => $faker->unique()->safeEmail,
            'telefono' => $faker->phoneNumber,
        ]);

        // Usuario 4
        Usuario::create([
            'nombre' => $faker->name,
            'correo' => $faker->unique()->safeEmail,
            'telefono' => $faker->phoneNumber,
        ]);

        // Usuario 5 - Tendrá pedidos para contar (Consulta 6)
        Usuario::create([
            'nombre' => $faker->name,
            'correo' => 'usuario5@example.com',
            'telefono' => $faker->phoneNumber,
        ]);

        // Usuario 6 - Otro con "R"
        Usuario::create([
            'nombre' => 'Rosa María Torres',
            'correo' => 'rosa.torres@example.com',
            'telefono' => $faker->phoneNumber,
        ]);

        // Usuarios 7-15 (9 usuarios más aleatorios)
        for ($i = 7; $i <= 15; $i++) {
            Usuario::create([
                'nombre' => $faker->name,
                'correo' => $faker->unique()->safeEmail,
                'telefono' => $faker->phoneNumber,
            ]);
        }
    }
}
