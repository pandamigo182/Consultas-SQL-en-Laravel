<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Usuario;
use App\Models\Pedido;

/**
 * Controlador de Consultas para Actividad 2
 * 
 * Este controlador implementa las 10 consultas SQL solicitadas,
 * cada una usando dos métodos:
 * 1. Query Builder (usando DB facade)
 * 2. Eloquent ORM (usando modelos)
 * 
 * @author Edwin Efraín Juárez Mezquita
 * @package App\Http\Controllers
 */
class ConsultaController extends Controller
{
    /**
     * Muestra todas las consultas en una vista única
     * 
     * Ejecuta las 10 consultas usando Query Builder y Eloquent ORM,
     * y pasa todos los resultados a la vista para su visualización.
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // ===================================================================
        // CONSULTA 1: Insertar 5 registros
        // ===================================================================
        // Nota: Esta consulta se ejecutó mediante Seeders (migrate:fresh --seed)
        // No es necesario código adicional aquí.

        // ===================================================================
        // CONSULTA 2: Pedidos del usuario con ID 2
        // ===================================================================
        /**
         * Obtener todos los pedidos realizados por el usuario con ID 2
         * 
         * Query Builder: Usa la tabla 'pedidos' con filtro WHERE
         * Eloquent ORM: Usa el modelo Pedido con método where()
         */
        $q2_qb = DB::table('pedidos')
            ->where('id_usuario', 2)
            ->get();

        $q2_orm = Pedido::where('id_usuario', 2)->get();

        // ===================================================================
        // CONSULTA 3: Pedidos con información detallada de usuarios
        // ===================================================================
        /**
         * Obtener todos los pedidos con la información del usuario asociado
         * 
         * Query Builder: JOIN entre tablas pedidos y usuarios
         * Eloquent ORM: Eager loading usando with('usuario')
         */
        $q3_qb = DB::table('pedidos')
            ->join('usuarios', 'pedidos.id_usuario', '=', 'usuarios.id')
            ->select('pedidos.*', 'usuarios.nombre', 'usuarios.correo', 'usuarios.telefono')
            ->get();

        $q3_orm = Pedido::with('usuario')->get();

        // ===================================================================
        // CONSULTA 4: Pedidos con total entre $100 y $250
        // ===================================================================
        /**
         * Filtrar pedidos cuyo total esté en el rango de 100 a 250
         * 
         * Query Builder: whereBetween en tabla pedidos
         * Eloquent ORM: whereBetween en modelo Pedido
         */
        $q4_qb = DB::table('pedidos')
            ->whereBetween('total', [100, 250])
            ->get();

        $q4_orm = Pedido::whereBetween('total', [100, 250])->get();

        // ===================================================================
        // CONSULTA 5: Usuarios cuyo nombre empieza con "R"
        // ===================================================================
        /**
         * Buscar usuarios cuyos nombres comienzan con la letra "R"
         * 
         * Query Builder: WHERE con operador LIKE
         * Eloquent ORM: where() con operador LIKE
         */
        $q5_qb = DB::table('usuarios')
            ->where('nombre', 'LIKE', 'R%')
            ->get();

        $q5_orm = Usuario::where('nombre', 'LIKE', 'R%')->get();

        // ===================================================================
        // CONSULTA 6: Contar pedidos del usuario con ID 5
        // ===================================================================
        /**
         * Contar el número total de pedidos del usuario ID 5
         * 
         * Query Builder: count() en tabla pedidos filtrada
         * Eloquent ORM: count() en modelo Pedido filtrado
         */
        $q6_qb = DB::table('pedidos')
            ->where('id_usuario', 5)
            ->count();

        $q6_orm = Pedido::where('id_usuario', 5)->count();

        // ===================================================================
        // CONSULTA 7: Pedidos con usuarios, ordenados por total DESC
        // ===================================================================
        /**
         * Obtener pedidos con información de usuarios ordenados por total descendente
         * 
         * Query Builder: JOIN + ORDER BY total DESC
         * Eloquent ORM: with() + orderBy()
         */
        $q7_qb = DB::table('pedidos')
            ->join('usuarios', 'pedidos.id_usuario', '=', 'usuarios.id')
            ->select('pedidos.*', 'usuarios.nombre', 'usuarios.correo')
            ->orderBy('pedidos.total', 'desc')
            ->get();

        $q7_orm = Pedido::with('usuario')
            ->orderBy('total', 'desc')
            ->get();

        // ===================================================================
        // CONSULTA 8: Suma total del campo "total" en pedidos
        // ===================================================================
        /**
         * Calcular la suma de todos los totales de pedidos
         * 
         * Query Builder: sum() en campo total
         * Eloquent ORM: sum() en campo total
         */
        $q8_qb = DB::table('pedidos')->sum('total');

        $q8_orm = Pedido::sum('total');

        // ===================================================================
        // CONSULTA 9: Pedido más económico con nombre de usuario
        // ===================================================================
        /**
         * Encontrar el pedido con el total más bajo e incluir datos del usuario
         * 
         * Query Builder: JOIN + ORDER BY total ASC + LIMIT 1 (first())
         * Eloquent ORM: with() + orderBy() + first()
         */
        $q9_qb = DB::table('pedidos')
            ->join('usuarios', 'pedidos.id_usuario', '=', 'usuarios.id')
            ->select('pedidos.*', 'usuarios.nombre', 'usuarios.correo')
            ->orderBy('pedidos.total', 'asc')
            ->first();

        $q9_orm = Pedido::with('usuario')
            ->orderBy('total', 'asc')
            ->first();

        // ===================================================================
        // CONSULTA 10: Producto, cantidad y total agrupados por usuario
        // ===================================================================
        /**
         * Obtener producto, cantidad y total de cada pedido, ordenados por usuario
         * 
         * Interpretación: Mostrar todos los pedidos con información del usuario,
         * ordenados por ID de usuario para facilitar la agrupación visual
         * 
         * Query Builder: JOIN + SELECT específico + ORDER BY id_usuario
         * Eloquent ORM: with() + select() + orderBy()
         */
        $q10_qb = DB::table('pedidos')
            ->join('usuarios', 'pedidos.id_usuario', '=', 'usuarios.id')
            ->select(
                'pedidos.producto',
                'pedidos.cantidad',
                'pedidos.total',
                'usuarios.id as usuario_id',
                'usuarios.nombre as nombre_usuario'
            )
            ->orderBy('usuarios.id')
            ->get();

        $q10_orm = Pedido::with('usuario')
            ->select('producto', 'cantidad', 'total', 'id_usuario')
            ->orderBy('id_usuario')
            ->get();

        // ===================================================================
        // Pasar todos los resultados a la vista
        // ===================================================================
        return view('consultas.index', compact(
            'q2_orm', 'q2_qb',
            'q3_orm', 'q3_qb',
            'q4_orm', 'q4_qb',
            'q5_orm', 'q5_qb',
            'q6_orm', 'q6_qb',
            'q7_orm', 'q7_qb',
            'q8_orm', 'q8_qb',
            'q9_orm', 'q9_qb',
            'q10_orm', 'q10_qb'
        ));
    }
}
