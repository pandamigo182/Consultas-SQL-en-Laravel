@extends('layouts.app')

@section('title', 'Consultas SQL - Actividad 2')

@section('content')
<div class="max-w-7xl mx-auto">
    
    <!-- Introducción -->
    <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-3">
            <i class="fas fa-info-circle text-blue-600 mr-2"></i>
            Información del Proyecto
        </h2>
        <p class="text-gray-600 mb-3">
            Este proyecto implementa 10 consultas SQL diferentes usando dos enfoques:
        </p>
        <div class="grid md:grid-cols-2 gap-4">
            <div class="bg-blue-50 border-l-4 border-blue-500 p-4">
                <h3 class="font-bold text-blue-800 mb-2">
                    <i class="fas fa-wrench mr-2"></i>Query Builder
                </h3>
                <p class="text-sm text-gray-700">
                    Usa la facade DB de Laravel para construir consultas SQL de forma programática.
                </p>
            </div>
            <div class="bg-green-50 border-l-4 border-green-500 p-4">
                <h3 class="font-bold text-green-800 mb-2">
                    <i class="fas fa-cube mr-2"></i>Eloquent ORM
                </h3>
                <p class="text-sm text-gray-700">
                    Utiliza modelos Eloquent para interactuar con la base de datos de forma orientada a objetos.
                </p>
            </div>
        </div>
    </div>

    <!-- CONSULTA 2 -->
    <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-3 border-b-2 border-blue-500 pb-2">
            <i class="fas fa-search text-blue-600 mr-2"></i>
            Consulta 2: Pedidos del Usuario ID 2
        </h2>
        <p class="text-gray-600 mb-4">
            Obtener todos los pedidos realizados por el usuario con ID 2.
        </p>

        <!-- Tabs -->
        <div class="grid md:grid-cols-2 gap-6">
            <!-- Query Builder -->
            <div>
                <h3 class="text-lg font-semibold text-blue-700 mb-3 flex items-center">
                    <i class="fas fa-wrench mr-2"></i>
                    Query Builder
                </h3>
                @if($q2_qb->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 text-sm">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                                    <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Producto</th>
                                    <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Cantidad</th>
                                    <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Total</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($q2_qb as $pedido)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-3 py-2 whitespace-nowrap">{{ $pedido->id }}</td>
                                    <td class="px-3 py-2">{{ $pedido->producto }}</td>
                                    <td class="px-3 py-2">{{ $pedido->cantidad }}</td>
                                    <td class="px-3 py-2 font-semibold text-green-600">${{ number_format($pedido->total, 2) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-gray-500 italic">No hay pedidos para mostrar.</p>
                @endif
            </div>

            <!-- Eloquent ORM -->
            <div>
                <h3 class="text-lg font-semibold text-green-700 mb-3 flex items-center">
                    <i class="fas fa-cube mr-2"></i>
                    Eloquent ORM
                </h3>
                @if($q2_orm->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 text-sm">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                                    <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Producto</th>
                                    <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Cantidad</th>
                                    <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Total</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($q2_orm as $pedido)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-3 py-2 whitespace-nowrap">{{ $pedido->id }}</td>
                                    <td class="px-3 py-2">{{ $pedido->producto }}</td>
                                    <td class="px-3 py-2">{{ $pedido->cantidad }}</td>
                                    <td class="px-3 py-2 font-semibold text-green-600">${{ number_format($pedido->total, 2) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-gray-500 italic">No hay pedidos para mostrar.</p>
                @endif
            </div>
        </div>
    </div>

    <!-- CONSULTA 3 -->
    <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-3 border-b-2 border-purple-500 pb-2">
            <i class="fas fa-users text-purple-600 mr-2"></i>
            Consulta 3: Pedidos con Información de Usuarios
        </h2>
        <p class="text-gray-600 mb-4">
            Obtener todos los pedidos con la información detallada del usuario asociado.
        </p>

        <div class="grid md:grid-cols-2 gap-6">
            <!-- Query Builder -->
            <div>
                <h3 class="text-lg font-semibold text-blue-700 mb-3 flex items-center">
                    <i class="fas fa-wrench mr-2"></i>
                    Query Builder (JOIN)
                </h3>
                @if($q3_qb->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 text-xs">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-2 py-2 text-left text-xs font-medium text-gray-500 uppercase">Producto</th>
                                    <th class="px-2 py-2 text-left text-xs font-medium text-gray-500 uppercase">Total</th>
                                    <th class="px-2 py-2 text-left text-xs font-medium text-gray-500 uppercase">Usuario</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($q3_qb as $pedido)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-2 py-2">{{ Str::limit($pedido->producto, 25) }}</td>
                                    <td class="px-2 py-2 font-semibold text-green-600">${{ number_format($pedido->total, 2) }}</td>
                                    <td class="px-2 py-2">{{ $pedido->nombre }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <p class="text-sm text-gray-500 mt-2">Total de registros: {{ $q3_qb->count() }}</p>
                @else
                    <p class="text-gray-500 italic">No hay datos para mostrar.</p>
                @endif
            </div>

            <!-- Eloquent ORM -->
            <div>
                <h3 class="text-lg font-semibold text-green-700 mb-3 flex items-center">
                    <i class="fas fa-cube mr-2"></i>
                    Eloquent ORM (with)
                </h3>
                @if($q3_orm->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 text-xs">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-2 py-2 text-left text-xs font-medium text-gray-500 uppercase">Producto</th>
                                    <th class="px-2 py-2 text-left text-xs font-medium text-gray-500 uppercase">Total</th>
                                    <th class="px-2 py-2 text-left text-xs font-medium text-gray-500 uppercase">Usuario</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($q3_orm as $pedido)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-2 py-2">{{ Str::limit($pedido->producto, 25) }}</td>
                                    <td class="px-2 py-2 font-semibold text-green-600">${{ number_format($pedido->total, 2) }}</td>
                                    <td class="px-2 py-2">{{ $pedido->usuario->nombre }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <p class="text-sm text-gray-500 mt-2">Total de registros: {{ $q3_orm->count() }}</p>
                @else
                    <p class="text-gray-500 italic">No hay datos para mostrar.</p>
                @endif
            </div>
        </div>
    </div>

    <!-- CONSULTA 4 -->
    <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-3 border-b-2 border-yellow-500 pb-2">
            <i class="fas fa-filter text-yellow-600 mr-2"></i>
            Consulta 4: Pedidos con Total entre $100 y $250
        </h2>
        <p class="text-gray-600 mb-4">
            Filtrar pedidos cuyo monto total esté entre $100.00 y $250.00.
        </p>

        <div class="grid md:grid-cols-2 gap-6">
            <!-- Query Builder -->
            <div>
                <h3 class="text-lg font-semibold text-blue-700 mb-3 flex items-center">
                    <i class="fas fa-wrench mr-2"></i>
                    Query Builder
                </h3>
                @if($q4_qb->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 text-sm">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Producto</th>
                                    <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Cantidad</th>
                                    <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Total</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($q4_qb as $pedido)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-3 py-2">{{ $pedido->producto }}</td>
                                    <td class="px-3 py-2">{{ $pedido->cantidad }}</td>
                                    <td class="px-3 py-2">
                                        <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            ${{ number_format($pedido->total, 2) }}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <p class="text-sm text-gray-500 mt-2">Total encontrados: {{ $q4_qb->count() }}</p>
                @else
                    <p class="text-gray-500 italic">No hay pedidos en este rango.</p>
                @endif
            </div>

            <!-- Eloquent ORM -->
            <div>
                <h3 class="text-lg font-semibold text-green-700 mb-3 flex items-center">
                    <i class="fas fa-cube mr-2"></i>
                    Eloquent ORM
                </h3>
                @if($q4_orm->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 text-sm">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Producto</th>
                                    <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Cantidad</th>
                                    <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Total</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($q4_orm as $pedido)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-3 py-2">{{ $pedido->producto }}</td>
                                    <td class="px-3 py-2">{{ $pedido->cantidad }}</td>
                                    <td class="px-3 py-2">
                                        <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            ${{ number_format($pedido->total, 2) }}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <p class="text-sm text-gray-500 mt-2">Total encontrados: {{ $q4_orm->count() }}</p>
                @else
                    <p class="text-gray-500 italic">No hay pedidos en este rango.</p>
                @endif
            </div>
        </div>
    </div>

    <!-- CONSULTA 5 -->
    <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-3 border-b-2 border-red-500 pb-2">
            <i class="fas fa-user-tag text-red-600 mr-2"></i>
            Consulta 5: Usuarios con Nombre que Empieza con "R"
        </h2>
        <p class="text-gray-600 mb-4">
            Buscar todos los usuarios cuyos nombres comienzan con la letra "R".
        </p>

        <div class="grid md:grid-cols-2 gap-6">
            <!-- Query Builder -->
            <div>
                <h3 class="text-lg font-semibold text-blue-700 mb-3 flex items-center">
                    <i class="fas fa-wrench mr-2"></i>
                    Query Builder
                </h3>
                @if($q5_qb->count() > 0)
                    <div class="space-y-2">
                        @foreach($q5_qb as $usuario)
                        <div class="bg-red-50 border-l-4 border-red-500 p-3 hover:shadow-md transition">
                            <h4 class="font-bold text-red-800">
                                <i class="fas fa-user mr-2"></i>
                                {{ $usuario->nombre }}
                            </h4>
                            <p class="text-sm text-gray-600">
                                <i class="fas fa-envelope mr-1"></i>
                                {{ $usuario->correo }}
                            </p>
                            <p class="text-sm text-gray-600">
                                <i class="fas fa-phone mr-1"></i>
                                {{ $usuario->telefono ?? 'N/A' }}
                            </p>
                        </div>
                        @endforeach
                    </div>
                    <p class="text-sm text-gray-500 mt-2">Total encontrados: {{ $q5_qb->count() }}</p>
                @else
                    <p class="text-gray-500 italic">No hay usuarios con nombre que empiece con "R".</p>
                @endif
            </div>

            <!-- Eloquent ORM -->
            <div>
                <h3 class="text-lg font-semibold text-green-700 mb-3 flex items-center">
                    <i class="fas fa-cube mr-2"></i>
                    Eloquent ORM
                </h3>
                @if($q5_orm->count() > 0)
                    <div class="space-y-2">
                        @foreach($q5_orm as $usuario)
                        <div class="bg-red-50 border-l-4 border-red-500 p-3 hover:shadow-md transition">
                            <h4 class="font-bold text-red-800">
                                <i class="fas fa-user mr-2"></i>
                                {{ $usuario->nombre }}
                            </h4>
                            <p class="text-sm text-gray-600">
                                <i class="fas fa-envelope mr-1"></i>
                                {{ $usuario->correo }}
                            </p>
                            <p class="text-sm text-gray-600">
                                <i class="fas fa-phone mr-1"></i>
                                {{ $usuario->telefono ?? 'N/A' }}
                            </p>
                        </div>
                        @endforeach
                    </div>
                    <p class="text-sm text-gray-500 mt-2">Total encontrados: {{ $q5_orm->count() }}</p>
                @else
                    <p class="text-gray-500 italic">No hay usuarios con nombre que empiece con "R".</p>
                @endif
            </div>
        </div>
    </div>

    <!-- CONSULTA 6 -->
    <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-3 border-b-2 border-indigo-500 pb-2">
            <i class="fas fa-calculator text-indigo-600 mr-2"></i>
            Consulta 6: Cantidad de Pedidos del Usuario ID 5
        </h2>
        <p class="text-gray-600 mb-4">
            Contar el número total de pedidos realizados por el usuario con ID 5.
        </p>

        <div class="grid md:grid-cols-2 gap-6">
            <!-- Query Builder -->
            <div>
                <h3 class="text-lg font-semibold text-blue-700 mb-3 flex items-center">
                    <i class="fas fa-wrench mr-2"></i>
                    Query Builder
                </h3>
                <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-900 p-6 rounded-lg shadow-md">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm uppercase tracking-wide font-semibold">Total de Pedidos</p>
                            <p class="text-5xl font-bold mt-2">{{ $q6_qb }}</p>
                        </div>
                        <div class="text-6xl opacity-25">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Eloquent ORM -->
            <div>
                <h3 class="text-lg font-semibold text-green-700 mb-3 flex items-center">
                    <i class="fas fa-cube mr-2"></i>
                    Eloquent ORM
                </h3>
                <div class="bg-green-100 border-l-4 border-green-500 text-green-900 p-6 rounded-lg shadow-md">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm uppercase tracking-wide font-semibold">Total de Pedidos</p>
                            <p class="text-5xl font-bold mt-2">{{ $q6_orm }}</p>
                        </div>
                        <div class="text-6xl opacity-25">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CONSULTA 7 -->
    <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-3 border-b-2 border-pink-500 pb-2">
            <i class="fas fa-sort-amount-down text-pink-600 mr-2"></i>
            Consulta 7: Pedidos Ordenados por Total (Mayor a Menor)
        </h2>
        <p class="text-gray-600 mb-4">
            Obtener pedidos con información de usuarios, ordenados por el total descendente.
        </p>

        <div class="grid md:grid-cols-2 gap-6">
            <!-- Query Builder -->
            <div>
                <h3 class="text-lg font-semibold text-blue-700 mb-3 flex items-center">
                    <i class="fas fa-wrench mr-2"></i>
                    Query Builder
                </h3>
                @if($q7_qb->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 text-xs">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-2 py-2 text-left text-xs font-medium text-gray-500 uppercase">Producto</th>
                                    <th class="px-2 py-2 text-left text-xs font-medium text-gray-500 uppercase">Usuario</th>
                                    <th class="px-2 py-2 text-left text-xs font-medium text-gray-500 uppercase">Total</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($q7_qb->take(10) as $pedido)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-2 py-2">{{ Str::limit($pedido->producto, 20) }}</td>
                                    <td class="px-2 py-2">{{ Str::limit($pedido->nombre, 20) }}</td>
                                    <td class="px-2 py-2">
                                        <span class="px-2 py-1 inline-flex text-xs leading-4 font-semibold rounded-full bg-pink-100 text-pink-800">
                                            ${{ number_format($pedido->total, 2) }}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <p class="text-xs text-gray-500 mt-2">Mostrando los primeros 10 de {{ $q7_qb->count() }} registros</p>
                @else
                    <p class="text-gray-500 italic">No hay datos.</p>
                @endif
            </div>

            <!-- Eloquent ORM -->
            <div>
                <h3 class="text-lg font-semibold text-green-700 mb-3 flex items-center">
                    <i class="fas fa-cube mr-2"></i>
                    Eloquent ORM
                </h3>
                @if($q7_orm->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 text-xs">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-2 py-2 text-left text-xs font-medium text-gray-500 uppercase">Producto</th>
                                    <th class="px-2 py-2 text-left text-xs font-medium text-gray-500 uppercase">Usuario</th>
                                    <th class="px-2 py-2 text-left text-xs font-medium text-gray-500 uppercase">Total</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($q7_orm->take(10) as $pedido)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-2 py-2">{{ Str::limit($pedido->producto, 20) }}</td>
                                    <td class="px-2 py-2">{{ Str::limit($pedido->usuario->nombre, 20) }}</td>
                                    <td class="px-2 py-2">
                                        <span class="px-2 py-1 inline-flex text-xs leading-4 font-semibold rounded-full bg-pink-100 text-pink-800">
                                            ${{ number_format($pedido->total, 2) }}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <p class="text-xs text-gray-500 mt-2">Mostrando los primeros 10 de {{ $q7_orm->count() }} registros</p>
                @else
                    <p class="text-gray-500 italic">No hay datos.</p>
                @endif
            </div>
        </div>
    </div>

    <!-- CONSULTA 8 -->
    <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-3 border-b-2 border-teal-500 pb-2">
            <i class="fas fa-dollar-sign text-teal-600 mr-2"></i>
            Consulta 8: Suma Total de Todos los Pedidos
        </h2>
        <p class="text-gray-600 mb-4">
            Calcular la suma total de todos los montos de pedidos en la base de datos.
        </p>

        <div class="grid md:grid-cols-2 gap-6">
            <!-- Query Builder -->
            <div>
                <h3 class="text-lg font-semibold text-blue-700 mb-3 flex items-center">
                    <i class="fas fa-wrench mr-2"></i>
                    Query Builder
                </h3>
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white p-8 rounded-lg shadow-xl">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm uppercase tracking-wide font-semibold opacity-90">Suma Total</p>
                            <p class="text-6xl font-bold mt-3">${{ number_format($q8_qb, 2) }}</p>
                        </div>
                        <div class="text-7xl opacity-25">
                            <i class="fas fa-coins"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Eloquent ORM -->
            <div>
                <h3 class="text-lg font-semibold text-green-700 mb-3 flex items-center">
                    <i class="fas fa-cube mr-2"></i>
                    Eloquent ORM
                </h3>
                <div class="bg-gradient-to-r from-green-500 to-green-600 text-white p-8 rounded-lg shadow-xl">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm uppercase tracking-wide font-semibold opacity-90">Suma Total</p>
                            <p class="text-6xl font-bold mt-3">${{ number_format($q8_orm, 2) }}</p>
                        </div>
                        <div class="text-7xl opacity-25">
                            <i class="fas fa-coins"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CONSULTA 9 -->
    <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-3 border-b-2 border-orange-500 pb-2">
            <i class="fas fa-arrow-down text-orange-600 mr-2"></i>
            Consulta 9: Pedido Más Económico
        </h2>
        <p class="text-gray-600 mb-4">
            Encontrar el pedido con el total más bajo e incluir información del usuario.
        </p>

        <div class="grid md:grid-cols-2 gap-6">
            <!-- Query Builder -->
            <div>
                <h3 class="text-lg font-semibold text-blue-700 mb-3 flex items-center">
                    <i class="fas fa-wrench mr-2"></i>
                    Query Builder
                </h3>
                @if($q9_qb)
                    <div class="bg-orange-50 border-2 border-orange-500 rounded-lg p-5 shadow-md">
                        <div class="flex items-start justify-between mb-3">
                            <div class="flex-1">
                                <h4 class="font-bold text-lg text-orange-800 mb-2">
                                    <i class="fas fa-box mr-2"></i>
                                    {{ $q9_qb->producto }}
                                </h4>
                                <p class="text-gray-700 mb-1">
                                    <i class="fas fa-user mr-2"></i>
                                    <strong>Cliente:</strong> {{ $q9_qb->nombre }}
                                </p>
                                <p class="text-gray-700 mb-1">
                                    <i class="fas fa-sort-numeric-up mr-2"></i>
                                    <strong>Cantidad:</strong> {{ $q9_qb->cantidad }}
                                </p>
                            </div>
                            <div class="text-right">
                                <p class="text-3xl font-bold text-orange-600">
                                    ${{ number_format($q9_qb->total, 2) }}
                                </p>
                                <span class="text-xs bg-orange-200 text-orange-800 px-2 py-1 rounded-full mt-1 inline-block">
                                    Más barato
                                </span>
                            </div>
                        </div>
                    </div>
                @else
                    <p class="text-gray-500 italic">No hay pedidos.</p>
                @endif
            </div>

            <!-- Eloquent ORM -->
            <div>
                <h3 class="text-lg font-semibold text-green-700 mb-3 flex items-center">
                    <i class="fas fa-cube mr-2"></i>
                    Eloquent ORM
                </h3>
                @if($q9_orm)
                    <div class="bg-orange-50 border-2 border-orange-500 rounded-lg p-5 shadow-md">
                        <div class="flex items-start justify-between mb-3">
                            <div class="flex-1">
                                <h4 class="font-bold text-lg text-orange-800 mb-2">
                                    <i class="fas fa-box mr-2"></i>
                                    {{ $q9_orm->producto }}
                                </h4>
                                <p class="text-gray-700 mb-1">
                                    <i class="fas fa-user mr-2"></i>
                                    <strong>Cliente:</strong> {{ $q9_orm->usuario->nombre }}
                                </p>
                                <p class="text-gray-700 mb-1">
                                    <i class="fas fa-sort-numeric-up mr-2"></i>
                                    <strong>Cantidad:</strong> {{ $q9_orm->cantidad }}
                                </p>
                            </div>
                            <div class="text-right">
                                <p class="text-3xl font-bold text-orange-600">
                                    ${{ number_format($q9_orm->total, 2) }}
                                </p>
                                <span class="text-xs bg-orange-200 text-orange-800 px-2 py-1 rounded-full mt-1 inline-block">
                                    Más barato
                                </span>
                            </div>
                        </div>
                    </div>
                @else
                    <p class="text-gray-500 italic">No hay pedidos.</p>
                @endif
            </div>
        </div>
    </div>

    <!-- CONSULTA 10 -->
    <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-3 border-b-2 border-cyan-500 pb-2">
            <i class="fas fa-layer-group text-cyan-600 mr-2"></i>
            Consulta 10: Pedidos Agrupados por Usuario
        </h2>
        <p class="text-gray-600 mb-4">
            Mostrar producto, cantidad y total de cada pedido, ordenados por usuario.
        </p>

        <div class="grid md:grid-cols-2 gap-6">
            <!-- Query Builder -->
            <div>
                <h3 class="text-lg font-semibold text-blue-700 mb-3 flex items-center">
                    <i class="fas fa-wrench mr-2"></i>
                    Query Builder
                </h3>
                @if($q10_qb->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 text-xs">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-2 py-2 text-left text-xs font-medium text-gray-500 uppercase">Usuario</th>
                                    <th class="px-2 py-2 text-left text-xs font-medium text-gray-500 uppercase">Producto</th>
                                    <th class="px-2 py-2 text-left text-xs font-medium text-gray-500 uppercase">Cant.</th>
                                    <th class="px-2 py-2 text-left text-xs font-medium text-gray-500 uppercase">Total</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($q10_qb->take(15) as $pedido)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-2 py-2">
                                        <span class="text-xs bg-cyan-100 text-cyan-800 px-2 py-1 rounded">
                                            {{ Str::limit($pedido->nombre_usuario, 15) }}
                                        </span>
                                    </td>
                                    <td class="px-2 py-2">{{ Str::limit($pedido->producto, 20) }}</td>
                                    <td class="px-2 py-2">{{ $pedido->cantidad }}</td>
                                    <td class="px-2 py-2 font-semibold text-green-600">${{ number_format($pedido->total, 2) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <p class="text-xs text-gray-500 mt-2">Mostrando los primeros 15 de {{ $q10_qb->count() }} registros</p>
                @else
                    <p class="text-gray-500 italic">No hay datos.</p>
                @endif
            </div>

            <!-- Eloquent ORM -->
            <div>
                <h3 class="text-lg font-semibold text-green-700 mb-3 flex items-center">
                    <i class="fas fa-cube mr-2"></i>
                    Eloquent ORM
                </h3>
                @if($q10_orm->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 text-xs">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-2 py-2 text-left text-xs font-medium text-gray-500 uppercase">Usuario</th>
                                    <th class="px-2 py-2 text-left text-xs font-medium text-gray-500 uppercase">Producto</th>
                                    <th class="px-2 py-2 text-left text-xs font-medium text-gray-500 uppercase">Cant.</th>
                                    <th class="px-2 py-2 text-left text-xs font-medium text-gray-500 uppercase">Total</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($q10_orm->take(15) as $pedido)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-2 py-2">
                                        <span class="text-xs bg-cyan-100 text-cyan-800 px-2 py-1 rounded">
                                            {{ Str::limit($pedido->usuario->nombre, 15) }}
                                        </span>
                                    </td>
                                    <td class="px-2 py-2">{{ Str::limit($pedido->producto, 20) }}</td>
                                    <td class="px-2 py-2">{{ $pedido->cantidad }}</td>
                                    <td class="px-2 py-2 font-semibold text-green-600">${{ number_format($pedido->total, 2) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <p class="text-xs text-gray-500 mt-2">Mostrando los primeros 15 de {{ $q10_orm->count() }} registros</p>
                @else
                    <p class="text-gray-500 italic">No hay datos.</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Resumen Final -->
    <div class="bg-gradient-to-r from-purple-600 to-indigo-600 rounded-lg shadow-lg p-8 text-white">
        <h2 class="text-3xl font-bold mb-4">
            <i class="fas fa-check-circle mr-2"></i>
            ¡Proyecto Completado!
        </h2>
        <p class="text-purple-100 mb-4">
            Se han ejecutado exitosamente las 10 consultas SQL usando Query Builder y Eloquent ORM.
        </p>
        <div class="grid md:grid-cols-3 gap-4 mt-6">
            <div class="bg-white bg-opacity-20 rounded-lg p-4 backdrop-blur-sm">
                <p class="text-4xl font-bold">10</p>
                <p class="text-sm">Consultas Implementadas</p>
            </div>
            <div class="bg-white bg-opacity-20 rounded-lg p-4 backdrop-blur-sm">
                <p class="text-4xl font-bold">2</p>
                <p class="text-sm">Métodos por Consulta</p>
            </div>
            <div class="bg-white bg-opacity-20 rounded-lg p-4 backdrop-blur-sm">
                <p class="text-4xl font-bold">100%</p>
                <p class="text-sm">Documentado</p>
            </div>
        </div>
    </div>

</div>
@endsection
