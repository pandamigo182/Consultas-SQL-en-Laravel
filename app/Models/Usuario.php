<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla asociada al modelo
     *
     * @var string
     */
    protected $table = 'usuarios';

    /**
     * Atributos que son asignables en masa
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'correo',
        'telefono',
    ];

    /**
     * Relación: Un usuario tiene muchos pedidos
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'id_usuario');
    }
}
