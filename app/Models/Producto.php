<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Models\Producto
 *
 * @method static Builder|Producto newModelQuery()
 * @method static Builder|Producto newQuery()
 * @method static Builder|Producto onlyTrashed()
 * @method static Builder|Producto query()
 * @method static Builder|Producto withTrashed()
 * @method static Builder|Producto withoutTrashed()
 * @property int $id
 * @property string $nombre Nombre del producto
 * @property string $descripcion Descripción del producto
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @method static \Database\Factories\ProductoFactory factory(...$parameters)
 * @method static Builder|Producto whereCreatedAt($value)
 * @method static Builder|Producto whereDeletedAt($value)
 * @method static Builder|Producto whereDescripcion($value)
 * @method static Builder|Producto whereId($value)
 * @method static Builder|Producto whereNombre($value)
 * @method static Builder|Producto whereUpdatedAt($value)
 * @mixin Eloquent
 * @mixin \Eloquent
 */
class Producto extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'descripcion',
    ];
}
