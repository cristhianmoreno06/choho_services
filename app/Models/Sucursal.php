<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Sucursal
 *
 * @method static Builder|Sucursal newModelQuery()
 * @method static Builder|Sucursal newQuery()
 * @method static Builder|Sucursal onlyTrashed()
 * @method static Builder|Sucursal query()
 * @method static Builder|Sucursal withTrashed()
 * @method static Builder|Sucursal withoutTrashed()
 * @method static \Database\Factories\SucursalFactory factory(...$parameters)
 * @mixin Eloquent
 * @property int $id
 * @property int $nit Número de identificación tributaria de la sucursal
 * @property string $telefono Número de teléfono de la sucursal
 * @property string $direccion Dirección de la sucursal
 * @property int $id_ciudad Id de la Ciudad donde se encuentra la sucursal
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static Builder|Sucursal whereCreatedAt($value)
 * @method static Builder|Sucursal whereDeletedAt($value)
 * @method static Builder|Sucursal whereDireccion($value)
 * @method static Builder|Sucursal whereId($value)
 * @method static Builder|Sucursal whereIdCiudad($value)
 * @method static Builder|Sucursal whereNit($value)
 * @method static Builder|Sucursal whereTelefono($value)
 * @method static Builder|Sucursal whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Sucursal extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'sucursales';

    protected $fillable = [
        'nit',
        'telefono',
        'direccion',
    ];
}
