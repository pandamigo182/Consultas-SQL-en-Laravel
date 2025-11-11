# Actividad 2: Consultas SQL en Laravel

## 📋 Información del Proyecto

- **Creador:** Edwin Efraín Juárez Mezquita
- **Organización:** KODIGO
- **Proyecto:** Entrega de Proyecto Educativo (Full Stack Jr.)
- **Framework:** Laravel 8.x (Compatible con PHP 7.4.33)
- **Base de Datos:** MySQL

## 🎯 Objetivo

Demostrar el dominio de **Query Builder** y **ORM Eloquent** para realizar consultas SQL en Laravel, implementando cada una de las 10 consultas requeridas usando ambos métodos.

## 📁 Estructura del Proyecto

```
actividad2-kodigo/
├── app/
│   ├── Http/Controllers/
│   │   └── ConsultaController.php    # Controlador con las 10 consultas
│   └── Models/
│       ├── Usuario.php                # Modelo Usuario con relaciones
│       └── Pedido.php                 # Modelo Pedido con relaciones
├── database/
│   ├── migrations/
│   │   ├── *_create_usuarios_table.php
│   │   └── *_create_pedidos_table.php
│   └── seeders/
│       ├── UsuarioSeeder.php          # Datos de prueba para usuarios
│       ├── PedidoSeeder.php           # Datos de prueba para pedidos
│       └── DatabaseSeeder.php
├── resources/
│   ├── css/
│   │   └── app.css                    # Tailwind CSS
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php          # Layout principal
│       └── consultas/
│           └── index.blade.php        # Vista de consultas
├── routes/
│   └── web.php                        # Rutas de la aplicación
└── public/
    ├── css/
    │   └── app.css                    # CSS compilado
    └── js/
        └── app.js                     # JS compilado
```

## 🚀 Instalación y Configuración

### Requisitos Previos

- PHP 7.4.33 (incluido en XAMPP)
- Composer
- Node.js y NPM
- MySQL (incluido en XAMPP)

### Pasos de Instalación

1. **Clonar o ubicar el proyecto**
   ```bash
   cd C:\xampp\htdocs\Ejercicios\actividad2-kodigo
   ```

2. **Instalar dependencias de PHP**
   ```bash
   composer install
   ```

3. **Instalar dependencias de Node.js**
   ```bash
   npm install
   ```

4. **Configurar variables de entorno**
   - El archivo `.env` ya está configurado
   - Verificar que la configuración de base de datos sea correcta:
     ```
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=kodigo_actividad2
     DB_USERNAME=root
     DB_PASSWORD=
     ```

5. **Crear la base de datos**
   
   **Usando phpMyAdmin (Recomendado para XAMPP):**
   - Abrir http://localhost/phpmyadmin
   - Crear nueva base de datos llamada `kodigo_actividad2`
   - Cotejamiento: `utf8mb4_unicode_ci`

6. **Ejecutar migraciones y seeders**
   ```bash
   php artisan migrate:fresh --seed
   ```
   
   Esto creará las tablas `usuarios` y `pedidos` y las poblará con datos de prueba.

7. **Compilar assets (CSS y JS)**
   ```bash
   npm run dev
   ```

8. **Iniciar servidor de desarrollo**
   ```bash
   php artisan serve
   ```

9. **Abrir en navegador**
   ```
   http://localhost:8000
   ```

## 🗄️ Esquema de Base de Datos

### Tabla: usuarios
| Campo    | Tipo         | Descripción                |
|----------|--------------|----------------------------|
| id       | BIGINT (PK)  | ID único del usuario       |
| nombre   | VARCHAR(255) | Nombre completo            |
| correo   | VARCHAR(255) | Correo electrónico (único) |
| telefono | VARCHAR(15)  | Número de teléfono         |
| created_at | TIMESTAMP  | Fecha de creación          |
| updated_at | TIMESTAMP  | Fecha de actualización     |

### Tabla: pedidos
| Campo      | Tipo         | Descripción                |
|------------|--------------|----------------------------|
| id         | BIGINT (PK)  | ID único del pedido        |
| producto   | VARCHAR(255) | Nombre del producto        |
| cantidad   | INTEGER      | Cantidad de productos      |
| total      | DECIMAL(8,2) | Total del pedido           |
| id_usuario | BIGINT (FK)  | ID del usuario (relación)  |
| created_at | TIMESTAMP    | Fecha de creación          |
| updated_at | TIMESTAMP    | Fecha de actualización     |

## 📊 Consultas Implementadas

Cada consulta está implementada con **Query Builder** y **Eloquent ORM**:

1. ✅ **Insertar 5 registros** - Implementado vía Seeders
2. ✅ **Pedidos del usuario con ID 2** - WHERE con filtro
3. ✅ **Pedidos con información de usuarios** - JOIN / Eager Loading
4. ✅ **Pedidos con total entre $100 y $250** - WHERE BETWEEN
5. ✅ **Usuarios con nombre que empieza con "R"** - WHERE LIKE
6. ✅ **Contar pedidos del usuario ID 5** - COUNT
7. ✅ **Pedidos ordenados por total DESC** - ORDER BY descendente
8. ✅ **Suma total de todos los pedidos** - SUM agregada
9. ✅ **Pedido más económico** - ORDER BY ASC + FIRST
10. ✅ **Pedidos agrupados por usuario** - JOIN + ORDER BY

## 🎨 Tecnologías Utilizadas

- **Backend:**
  - Laravel 8.x
  - PHP 7.4.33
  - MySQL

- **Frontend:**
  - Blade Templates
  - Tailwind CSS 2.x
  - FontAwesome 6.5.2

- **Build Tools:**
  - Laravel Mix
  - Webpack
  - PostCSS

## 📝 Comandos Útiles

```bash
# Ver rutas
php artisan route:list

# Limpiar caché
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Recompilar assets en modo desarrollo
npm run dev

# Compilar assets para producción
npm run production

# Recrear base de datos y seeders
php artisan migrate:fresh --seed

# Ver lista de migraciones
php artisan migrate:status
```

## 🔍 Verificación del Funcionamiento

Después de la instalación, verifica que:

1. ✅ La base de datos `kodigo_actividad2` existe
2. ✅ Las tablas `usuarios` y `pedidos` están creadas
3. ✅ Hay al menos 15 usuarios en la tabla usuarios
4. ✅ Hay al menos 20 pedidos en la tabla pedidos
5. ✅ El servidor Laravel está corriendo en `http://localhost:8000`
6. ✅ La vista muestra las 10 consultas correctamente

## 🐛 Solución de Problemas

### Error: "Access denied for user 'root'@'localhost'"

**Solución:**
1. Verificar que MySQL de XAMPP esté ejecutándose
2. Verificar la contraseña en `.env` (por defecto está vacía en XAMPP)
3. Crear la base de datos usando phpMyAdmin

### Error: "Class 'App\Models\Usuario' not found"

**Solución:**
```bash
composer dump-autoload
php artisan config:clear
```

### Error: Los estilos de Tailwind no se aplican

**Solución:**
```bash
npm run dev
php artisan cache:clear
php artisan view:clear
```

### Error: "Base table or view not found"

**Solución:**
```bash
php artisan migrate:fresh --seed
```

## 👨‍💻 Autor

**Edwin Efraín Juárez Mezquita**
- Bootcamp: KODIGO - Full Stack Jr.
- Proyecto: Actividad 2 - Consultas SQL en Laravel
- Fecha: Noviembre 2025

## 📄 Licencia

Este proyecto es parte de un ejercicio educativo para KODIGO.

---

**¡Gracias por revisar este proyecto! 🚀**
