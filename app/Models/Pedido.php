<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla asociada al modelo
     *
     * @var string
     */
    protected $table = 'pedidos';

    /**
     * Atributos que son asignables en masa
     *
     * @var array
     */
    protected $fillable = [
        'producto',
        'cantidad',
        'total',
        'id_usuario',
    ];

    /**
     * Relación: Un pedido pertenece a un usuario
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }
}
