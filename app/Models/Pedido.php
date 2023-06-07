<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Models\Pedido
 *
 * @method static Builder|Pedido newModelQuery()
 * @method static Builder|Pedido newQuery()
 * @method static Builder|Pedido onlyTrashed()
 * @method static Builder|Pedido query()
 * @method static Builder|Pedido withTrashed()
 * @method static Builder|Pedido withoutTrashed()
 * @property int $id
 * @property Carbon $fecha_pedido Fecha en la cual se realizo el pedido
 * @property string $prefijo Prefijo del pedido
 * @property int $num_pedido Número del pedido
 * @property int $nit Número de identificación tributaria para el pedido
 * @property string $razon_social Nombre de la compañía para el pedido
 * @property string $vendedor Nombre del vendedor que hizo pedido
 * @property int $id_ciudad Id de la Ciudad donde se encuentra la sucursal
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @method static \Database\Factories\PedidoFactory factory(...$parameters)
 * @method static Builder|Pedido whereCreatedAt($value)
 * @method static Builder|Pedido whereDeletedAt($value)
 * @method static Builder|Pedido whereFechaPedido($value)
 * @method static Builder|Pedido whereId($value)
 * @method static Builder|Pedido whereIdCiudad($value)
 * @method static Builder|Pedido whereNit($value)
 * @method static Builder|Pedido whereNumPedido($value)
 * @method static Builder|Pedido wherePrefijo($value)
 * @method static Builder|Pedido whereRazonSocial($value)
 * @method static Builder|Pedido whereUpdatedAt($value)
 * @method static Builder|Pedido whereVendedor($value)
 * @mixin Eloquent
 * @mixin \Eloquent
 */
class Pedido extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'fecha_pedido',
        'prefijo',
        'num_pedido',
        'nit',
        'razon_social',
        'vendedor',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'fecha_pedido' => 'datetime',
    ];

    /**
     * @return BelongsTo
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(Ciudad::class, 'id_ciudad');
    }
}
