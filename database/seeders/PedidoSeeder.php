<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pedido;

class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * Crea al menos 15 pedidos de prueba con los siguientes requisitos:
     * - Usuario ID 2 tiene varios pedidos (Consulta 2)
     * - Usuario ID 5 tiene pedidos (Consulta 6)
     * - Varios pedidos con totales entre $100-$250 (Consulta 4)
     * - Al menos un pedido económico, ej. $15 (Consulta 9)
     *
     * @return void
     */
    public function run()
    {
        $productos = [
            'Laptop Dell XPS 15',
            'Mouse Logitech MX Master',
            'Teclado Mecánico Corsair',
            'Monitor Samsung 27"',
            'Auriculares Sony WH-1000XM4',
            'Webcam Logitech C920',
            'SSD Samsung 1TB',
            'RAM Corsair 16GB',
            'Silla Gamer DXRacer',
            'Micrófono Blue Yeti',
            'Hub USB-C',
            'Cable HDMI',
            'Mouse Pad',
            'Soporte para Laptop',
            'Adaptador USB',
        ];

        // Pedidos para Usuario ID 2 (Consulta 2)
        Pedido::create([
            'producto' => 'Laptop Dell XPS 15',
            'cantidad' => 1,
            'total' => 199.99,
            'id_usuario' => 2,
        ]);

        Pedido::create([
            'producto' => 'Mouse Logitech MX Master',
            'cantidad' => 2,
            'total' => 150.00,
            'id_usuario' => 2,
        ]);

        Pedido::create([
            'producto' => 'Teclado Mecánico Corsair',
            'cantidad' => 1,
            'total' => 120.50,
            'id_usuario' => 2,
        ]);

        // Pedidos para Usuario ID 5 (Consulta 6)
        Pedido::create([
            'producto' => 'Monitor Samsung 27"',
            'cantidad' => 1,
            'total' => 225.00,
            'id_usuario' => 5,
        ]);

        Pedido::create([
            'producto' => 'Auriculares Sony WH-1000XM4',
            'cantidad' => 1,
            'total' => 180.00,
            'id_usuario' => 5,
        ]);

        Pedido::create([
            'producto' => 'Webcam Logitech C920',
            'cantidad' => 3,
            'total' => 135.75,
            'id_usuario' => 5,
        ]);

        // Pedido económico para Usuario ID 1 (Consulta 9 - pedido más barato)
        Pedido::create([
            'producto' => 'Cable HDMI',
            'cantidad' => 1,
            'total' => 15.00,
            'id_usuario' => 1,
        ]);

        // Pedidos adicionales con totales entre $100-$250 (Consulta 4)
        Pedido::create([
            'producto' => 'SSD Samsung 1TB',
            'cantidad' => 1,
            'total' => 189.99,
            'id_usuario' => 3,
        ]);

        Pedido::create([
            'producto' => 'RAM Corsair 16GB',
            'cantidad' => 2,
            'total' => 210.00,
            'id_usuario' => 4,
        ]);

        Pedido::create([
            'producto' => 'Silla Gamer DXRacer',
            'cantidad' => 1,
            'total' => 245.50,
            'id_usuario' => 6,
        ]);

        // Más pedidos variados
        Pedido::create([
            'producto' => 'Micrófono Blue Yeti',
            'cantidad' => 1,
            'total' => 99.99,
            'id_usuario' => 7,
        ]);

        Pedido::create([
            'producto' => 'Hub USB-C',
            'cantidad' => 2,
            'total' => 165.00,
            'id_usuario' => 8,
        ]);

        Pedido::create([
            'producto' => 'Mouse Pad',
            'cantidad' => 5,
            'total' => 75.00,
            'id_usuario' => 1,
        ]);

        Pedido::create([
            'producto' => 'Soporte para Laptop',
            'cantidad' => 1,
            'total' => 45.99,
            'id_usuario' => 9,
        ]);

        Pedido::create([
            'producto' => 'Adaptador USB',
            'cantidad' => 3,
            'total' => 30.00,
            'id_usuario' => 10,
        ]);

        // Pedidos adicionales con totales en el rango objetivo
        Pedido::create([
            'producto' => 'Teclado Mecánico Corsair',
            'cantidad' => 2,
            'total' => 240.00,
            'id_usuario' => 11,
        ]);

        Pedido::create([
            'producto' => 'Webcam Logitech C920',
            'cantidad' => 1,
            'total' => 115.50,
            'id_usuario' => 12,
        ]);

        Pedido::create([
            'producto' => 'Auriculares Sony WH-1000XM4',
            'cantidad' => 1,
            'total' => 175.99,
            'id_usuario' => 13,
        ]);

        Pedido::create([
            'producto' => 'Monitor Samsung 27"',
            'cantidad' => 1,
            'total' => 205.00,
            'id_usuario' => 14,
        ]);

        Pedido::create([
            'producto' => 'Laptop Dell XPS 15',
            'cantidad' => 1,
            'total' => 249.99,
            'id_usuario' => 15,
        ]);
    }
}
