<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Actividad 2 - Consultas SQL')</title>
    
    <!-- Tailwind CSS -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" 
          integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" 
          crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-gray-100">
    <!-- Header -->
    <header class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white shadow-lg">
        <div class="container mx-auto px-4 py-6">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold">
                        <i class="fas fa-database mr-2"></i>
                        Actividad 2: Consultas SQL en Laravel
                    </h1>
                    <p class="text-blue-100 mt-2">
                        <i class="fas fa-code mr-1"></i>
                        Query Builder & ORM Eloquent
                    </p>
                </div>
                <div class="text-right">
                    <p class="text-sm text-blue-100">
                        <i class="fas fa-user mr-1"></i>
                        Edwin Efraín Juárez Mezquita
                    </p>
                    <p class="text-sm text-blue-100">
                        <i class="fas fa-building mr-1"></i>
                        KODIGO - Full Stack Jr.
                    </p>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-gray-300 mt-12">
        <div class="container mx-auto px-4 py-6 text-center">
            <p>
                <i class="fas fa-copyright mr-1"></i>
                2025 - Actividad 2 Laravel | Desarrollado con 
                <i class="fas fa-heart text-red-500 mx-1"></i>
                por Edwin Juárez
            </p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
