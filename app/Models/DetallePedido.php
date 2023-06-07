<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\DetallePedido
 *
 * @method static \Illuminate\Database\Eloquent\Builder|DetallePedido newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DetallePedido newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DetallePedido onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|DetallePedido query()
 * @method static \Illuminate\Database\Eloquent\Builder|DetallePedido withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|DetallePedido withoutTrashed()
 * @property int $id
 * @property string $prefijo Prefijo del pedido
 * @property int $num_pedido Número del pedido
 * @property int $perfil Perfil del pedido
 * @property int $familia Familia del pedido
 * @property string $grupo Familia del pedido
 * @property string $subgrupo Familia del pedido
 * @property int $id_producto Id del producto
 * @property int $subtotal Subtotal del pedido
 * @property int $iva Iva del pedido
 * @property int $total Total del pedido
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Database\Factories\DetallePedidoFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|DetallePedido whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetallePedido whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetallePedido whereFamilia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetallePedido whereGrupo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetallePedido whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetallePedido whereIdProducto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetallePedido whereIva($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetallePedido whereNumPedido($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetallePedido wherePerfil($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetallePedido wherePrefijo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetallePedido whereSubgrupo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetallePedido whereSubtotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetallePedido whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetallePedido whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DetallePedido extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'prefijo',
        'num_pedido',
        'perfil',
        'familia',
        'grupo',
        'subgrupo',
        'subtotal',
        'iva',
        'total',
    ];
}
