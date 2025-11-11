# 💻 Ejemplos de Código - Consultas SQL

Este documento muestra ejemplos de cada una de las 10 consultas implementadas.

---

## Consulta 1: Insertar 5 Registros

### ✅ Implementado mediante Seeders

**UsuarioSeeder.php:**
```php
Usuario::create([
    'nombre' => 'Ricardo Gómez',
    'correo' => 'ricardo.gomez@example.com',
    'telefono' => '555-0001',
]);
```

**PedidoSeeder.php:**
```php
Pedido::create([
    'producto' => 'Laptop Dell XPS 15',
    'cantidad' => 1,
    'total' => 199.99,
    'id_usuario' => 2,
]);
```

---

## Consulta 2: Pedidos del Usuario con ID 2

### Query Builder
```php
$pedidos = DB::table('pedidos')
    ->where('id_usuario', 2)
    ->get();
```

### Eloquent ORM
```php
$pedidos = Pedido::where('id_usuario', 2)->get();
```

**Resultado esperado:** Todos los pedidos del usuario con ID 2

---

## Consulta 3: Pedidos con Información de Usuarios

### Query Builder (JOIN)
```php
$pedidos = DB::table('pedidos')
    ->join('usuarios', 'pedidos.id_usuario', '=', 'usuarios.id')
    ->select('pedidos.*', 'usuarios.nombre', 'usuarios.correo', 'usuarios.telefono')
    ->get();
```

### Eloquent ORM (Eager Loading)
```php
$pedidos = Pedido::with('usuario')->get();

// En la vista se accede así:
foreach ($pedidos as $pedido) {
    echo $pedido->usuario->nombre;
}
```

**Resultado esperado:** Lista de pedidos con datos completos del usuario

---

## Consulta 4: Pedidos con Total entre $100 y $250

### Query Builder
```php
$pedidos = DB::table('pedidos')
    ->whereBetween('total', [100, 250])
    ->get();
```

### Eloquent ORM
```php
$pedidos = Pedido::whereBetween('total', [100, 250])->get();
```

**Resultado esperado:** Pedidos con total >= 100 AND total <= 250

---

## Consulta 5: Usuarios con Nombre que Empieza con "R"

### Query Builder
```php
$usuarios = DB::table('usuarios')
    ->where('nombre', 'LIKE', 'R%')
    ->get();
```

### Eloquent ORM
```php
$usuarios = Usuario::where('nombre', 'LIKE', 'R%')->get();
```

**Resultado esperado:** Ricardo Gómez, Rosa María Torres

---

## Consulta 6: Contar Pedidos del Usuario ID 5

### Query Builder
```php
$cantidad = DB::table('pedidos')
    ->where('id_usuario', 5)
    ->count();
```

### Eloquent ORM
```php
$cantidad = Pedido::where('id_usuario', 5)->count();
```

**Resultado esperado:** Número entero (ej: 3)

---

## Consulta 7: Pedidos Ordenados por Total (Mayor a Menor)

### Query Builder
```php
$pedidos = DB::table('pedidos')
    ->join('usuarios', 'pedidos.id_usuario', '=', 'usuarios.id')
    ->select('pedidos.*', 'usuarios.nombre', 'usuarios.correo')
    ->orderBy('pedidos.total', 'desc')
    ->get();
```

### Eloquent ORM
```php
$pedidos = Pedido::with('usuario')
    ->orderBy('total', 'desc')
    ->get();
```

**Resultado esperado:** Pedidos del más caro al más barato

---

## Consulta 8: Suma Total de Todos los Pedidos

### Query Builder
```php
$sumaTotal = DB::table('pedidos')->sum('total');
```

### Eloquent ORM
```php
$sumaTotal = Pedido::sum('total');
```

**Resultado esperado:** Número decimal (ej: 3247.21)

---

## Consulta 9: Pedido Más Económico

### Query Builder
```php
$pedidoBarato = DB::table('pedidos')
    ->join('usuarios', 'pedidos.id_usuario', '=', 'usuarios.id')
    ->select('pedidos.*', 'usuarios.nombre', 'usuarios.correo')
    ->orderBy('pedidos.total', 'asc')
    ->first();
```

### Eloquent ORM
```php
$pedidoBarato = Pedido::with('usuario')
    ->orderBy('total', 'asc')
    ->first();
```

**Resultado esperado:** Un solo pedido (Cable HDMI - $15.00)

---

## Consulta 10: Pedidos Agrupados por Usuario

### Query Builder
```php
$pedidos = DB::table('pedidos')
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
```

### Eloquent ORM
```php
$pedidos = Pedido::with('usuario')
    ->select('producto', 'cantidad', 'total', 'id_usuario')
    ->orderBy('id_usuario')
    ->get();
```

**Resultado esperado:** Todos los pedidos ordenados por ID de usuario

---

## 📚 Métodos Utilizados

### Query Builder (DB Facade)
- `table()` - Seleccionar tabla
- `where()` - Filtro WHERE simple
- `whereBetween()` - Rango de valores
- `join()` - JOIN entre tablas
- `select()` - Seleccionar columnas específicas
- `orderBy()` - Ordenar resultados
- `get()` - Obtener todos los resultados
- `first()` - Obtener primer resultado
- `count()` - Contar registros
- `sum()` - Sumar valores

### Eloquent ORM
- `where()` - Filtro WHERE
- `whereBetween()` - Rango de valores
- `with()` - Eager loading (relaciones)
- `select()` - Seleccionar columnas
- `orderBy()` - Ordenar resultados
- `get()` - Obtener colección
- `first()` - Obtener modelo
- `count()` - Contar registros
- `sum()` - Sumar valores

---

## 🔗 Relaciones en Modelos

### Usuario.php
```php
public function pedidos()
{
    return $this->hasMany(Pedido::class, 'id_usuario');
}
```

### Pedido.php
```php
public function usuario()
{
    return $this->belongsTo(Usuario::class, 'id_usuario');
}
```

---

## 💡 Diferencias Clave

### Query Builder
- ✅ Más cercano a SQL puro
- ✅ Mayor control sobre la consulta
- ✅ Útil para consultas complejas
- ❌ Devuelve objetos stdClass
- ❌ No tiene acceso a relaciones del modelo

### Eloquent ORM
- ✅ Sintaxis más limpia y legible
- ✅ Devuelve instancias del modelo
- ✅ Acceso fácil a relaciones
- ✅ Incluye timestamps automáticos
- ❌ Puede ser más lento en queries muy complejas

---

**Ambos métodos son válidos y la elección depende del contexto y preferencias del desarrollador.**
