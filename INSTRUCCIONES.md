# ⚡ Guía Rápida de Configuración

## 🚀 Pasos para poner en marcha el proyecto

### 1. Iniciar XAMPP
- Abrir el panel de control de XAMPP
- Iniciar **Apache** y **MySQL**

### 2. Crear Base de Datos

**Usando phpMyAdmin (MÁS FÁCIL):**
1. Abrir navegador en: `http://localhost/phpmyadmin`
2. Clic en "Nueva" en el panel izquierdo
3. Nombre de la base de datos: `kodigo_actividad2`
4. Cotejamiento: `utf8mb4_unicode_ci`
5. Clic en "Crear"

### 3. Ejecutar Migraciones y Seeders

Abrir terminal en la carpeta del proyecto:
```bash
cd C:\xampp\htdocs\Ejercicios\actividad2-kodigo
php artisan migrate:fresh --seed
```

Deberías ver un mensaje similar a:
```
Migration table created successfully.
Migrating: 2025_11_11_221956_create_usuarios_table
Migrated:  2025_11_11_221956_create_usuarios_table
Migrating: 2025_11_11_222132_create_pedidos_table
Migrated:  2025_11_11_222132_create_pedidos_table
Seeding: UsuarioSeeder
Seeded:  UsuarioSeeder
Seeding: PedidoSeeder
Seeded:  PedidoSeeder
```

### 4. Iniciar Servidor

```bash
php artisan serve
```

### 5. Abrir en Navegador

```
http://localhost:8000
```

## ✅ ¡Listo!

Deberías ver una página con:
- Header azul con información del proyecto
- 10 secciones de consultas
- Cada consulta mostrando resultados de Query Builder y Eloquent ORM
- Diseño profesional con Tailwind CSS

## 🔧 Si algo falla...

### Problema: "Database kodigo_actividad2 does not exist"
- Volver al paso 2 y crear la base de datos

### Problema: "SQLSTATE[HY000] [1045] Access denied"
- Verificar que MySQL esté ejecutándose en XAMPP
- Verificar el archivo `.env` que tenga:
  ```
  DB_USERNAME=root
  DB_PASSWORD=
  ```

### Problema: No se ven los estilos
```bash
npm run dev
```

---

**¿Todo funcionó? ¡Genial! 🎉**

Ahora puedes explorar las consultas y ver cómo Query Builder y Eloquent ORM funcionan en paralelo.
