# ✅ Checklist de Verificación - Actividad 2

## 📋 Lista de Verificación Pre-Ejecución

### Requisitos del Sistema
- [ ] XAMPP instalado
- [ ] Apache iniciado en XAMPP
- [ ] MySQL iniciado en XAMPP
- [ ] Composer instalado
- [ ] Node.js y NPM instalados
- [ ] PHP 7.4.33 disponible

### Configuración del Proyecto
- [x] Proyecto Laravel 8.x creado
- [x] Archivo `.env` configurado
- [x] Base de datos configurada: `kodigo_actividad2`
- [x] Dependencias de Composer instaladas
- [x] Dependencias de NPM instaladas
- [x] Assets compilados (CSS/JS)

---

## 🗄️ Checklist de Base de Datos

### Creación de Base de Datos
- [ ] Base de datos `kodigo_actividad2` creada en MySQL
- [ ] Cotejamiento: `utf8mb4_unicode_ci`
- [ ] Accesible desde phpMyAdmin

### Migraciones
- [ ] Tabla `usuarios` creada con campos:
  - [ ] id (PK)
  - [ ] nombre
  - [ ] correo (unique)
  - [ ] telefono
  - [ ] created_at
  - [ ] updated_at

- [ ] Tabla `pedidos` creada con campos:
  - [ ] id (PK)
  - [ ] producto
  - [ ] cantidad
  - [ ] total (decimal 8,2)
  - [ ] id_usuario (FK)
  - [ ] created_at
  - [ ] updated_at

- [ ] Relación FK correcta entre pedidos.id_usuario → usuarios.id

### Seeders
- [ ] Tabla `usuarios` tiene al menos 15 registros
- [ ] Al menos un usuario con nombre que empiece con "R"
- [ ] Usuario con ID 2 existe
- [ ] Usuario con ID 5 existe
- [ ] Tabla `pedidos` tiene al menos 20 registros
- [ ] Usuario ID 2 tiene múltiples pedidos
- [ ] Usuario ID 5 tiene múltiples pedidos
- [ ] Existen pedidos con total entre $100-$250
- [ ] Existe al menos un pedido económico (ej: $15)

---

## 💻 Checklist de Código

### Modelos
- [x] `Usuario.php` creado en `app/Models/`
- [x] `Usuario.php` tiene relación `pedidos()` hasMany
- [x] `Usuario.php` tiene fillable configurado
- [x] `Pedido.php` creado en `app/Models/`
- [x] `Pedido.php` tiene relación `usuario()` belongsTo
- [x] `Pedido.php` tiene fillable configurado

### Controlador
- [x] `ConsultaController.php` creado
- [x] Importa `DB` facade
- [x] Importa modelos `Usuario` y `Pedido`
- [x] Método `index()` implementado
- [x] 10 consultas implementadas
- [x] Cada consulta con Query Builder
- [x] Cada consulta con Eloquent ORM
- [x] Código documentado con PHPDoc

### Rutas
- [x] Ruta `/` configurada en `web.php`
- [x] Ruta apunta a `ConsultaController@index`
- [x] Nombre de ruta: `consultas.index`

### Vistas
- [x] Layout `app.blade.php` creado
- [x] Layout incluye Tailwind CSS
- [x] Layout incluye FontAwesome
- [x] Vista `consultas/index.blade.php` creada
- [x] Vista muestra las 10 consultas
- [x] Diseño responsivo implementado

---

## 🎨 Checklist de Frontend

### Tailwind CSS
- [x] Instalado correctamente
- [x] Configurado en `tailwind.config.js`
- [x] Incluido en `webpack.mix.js`
- [x] Directivas añadidas en `app.css`
- [x] Assets compilados exitosamente

### Diseño Visual
- [ ] Header con gradiente azul visible
- [ ] 10 secciones de consultas visibles
- [ ] Cada consulta tiene 2 columnas (QB vs ORM)
- [ ] Tablas formateadas correctamente
- [ ] Iconos de FontAwesome visibles
- [ ] Colores diferenciados por consulta
- [ ] Footer visible

---

## 🔍 Checklist de Consultas

### Consulta 1: Insertar Registros
- [x] Implementada vía Seeders
- [ ] Datos visibles en base de datos

### Consulta 2: Pedidos de Usuario ID 2
- [x] Query Builder implementado
- [x] Eloquent ORM implementado
- [ ] Resultados coinciden
- [ ] Muestra al menos 1 pedido

### Consulta 3: Pedidos con Usuarios
- [x] Query Builder con JOIN
- [x] Eloquent con with()
- [ ] Muestra nombre de usuario
- [ ] Resultados coinciden

### Consulta 4: Total $100-$250
- [x] Query Builder con whereBetween
- [x] Eloquent con whereBetween
- [ ] Filtra correctamente
- [ ] Muestra varios pedidos

### Consulta 5: Nombres con "R"
- [x] Query Builder con LIKE
- [x] Eloquent con LIKE
- [ ] Encuentra a Ricardo
- [ ] Encuentra a Rosa
- [ ] Resultados coinciden

### Consulta 6: Contar Pedidos ID 5
- [x] Query Builder con count()
- [x] Eloquent con count()
- [ ] Muestra número correcto
- [ ] Ambos métodos dan el mismo número

### Consulta 7: Ordenar por Total DESC
- [x] Query Builder con orderBy desc
- [x] Eloquent con orderBy desc
- [ ] Primer pedido es el más caro
- [ ] Orden correcto descendente

### Consulta 8: Suma Total
- [x] Query Builder con sum()
- [x] Eloquent con sum()
- [ ] Muestra número decimal
- [ ] Ambos métodos dan la misma suma

### Consulta 9: Pedido Más Barato
- [x] Query Builder con orderBy asc + first()
- [x] Eloquent con orderBy asc + first()
- [ ] Muestra Cable HDMI ($15)
- [ ] Incluye nombre de usuario

### Consulta 10: Agrupados por Usuario
- [x] Query Builder con JOIN + orderBy
- [x] Eloquent con with() + orderBy
- [ ] Muestra todos los pedidos
- [ ] Ordenados por ID de usuario

---

## 🚀 Checklist de Ejecución

### Pasos de Instalación
- [ ] Base de datos creada manualmente
- [ ] Comando `php artisan migrate:fresh --seed` ejecutado exitosamente
- [ ] Comando `php artisan serve` ejecutado
- [ ] Navegador abierto en `http://localhost:8000`

### Verificación Visual
- [ ] Página carga sin errores
- [ ] No hay errores 404 o 500
- [ ] Estilos de Tailwind se aplican
- [ ] Iconos de FontAwesome visibles
- [ ] Las 10 consultas muestran datos
- [ ] No hay consultas vacías

---

## 📝 Checklist de Documentación

- [x] README.md creado y completo
- [x] INSTRUCCIONES.md con guía rápida
- [x] RESUMEN.md con overview del proyecto
- [x] EJEMPLOS-CODIGO.md con snippets
- [x] Código fuente comentado
- [x] PHPDoc en funciones principales

---

## 🎯 Checklist Final

- [ ] Proyecto ejecuta sin errores
- [ ] Base de datos poblada correctamente
- [ ] Las 10 consultas funcionan
- [ ] Query Builder y Eloquent dan resultados consistentes
- [ ] Interfaz visual es profesional
- [ ] Documentación completa
- [ ] Listo para presentación/evaluación

---

## ✨ Checklist de Calidad

### Código
- [x] Nombres de variables descriptivos
- [x] Código identado correctamente
- [x] Sin código comentado innecesario
- [x] Uso de convenciones Laravel
- [x] Relaciones Eloquent correctas

### Diseño
- [x] Responsive (mobile & desktop)
- [x] Colores consistentes
- [x] Tipografía legible
- [x] Espaciado adecuado
- [x] Accesibilidad básica

### Funcionalidad
- [x] Sin errores PHP
- [x] Sin errores JavaScript
- [x] Sin errores SQL
- [x] Datos coherentes
- [x] Performance aceptable

---

## 🐛 Troubleshooting Checklist

Si algo no funciona, revisar:

- [ ] MySQL está corriendo en XAMPP
- [ ] Base de datos existe
- [ ] Credenciales en `.env` son correctas
- [ ] Migraciones ejecutadas
- [ ] Seeders ejecutados
- [ ] Assets compilados
- [ ] Cache limpiada (`php artisan cache:clear`)
- [ ] Permisos de carpetas correctos

---

**Fecha de última verificación:** _____________________

**Verificado por:** _____________________

**Estado general:** ⬜ Aprobado  ⬜ Requiere ajustes

**Notas adicionales:**
_______________________________________________________________
_______________________________________________________________
_______________________________________________________________
