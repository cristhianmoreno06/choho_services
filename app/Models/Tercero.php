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
 * App\Models\Tercero
 *
 * @method static Builder|Tercero newModelQuery()
 * @method static Builder|Tercero newQuery()
 * @method static Builder|Tercero onlyTrashed()
 * @method static Builder|Tercero query()
 * @method static Builder|Tercero withTrashed()
 * @method static Builder|Tercero withoutTrashed()
 * @property int $id
 * @property int $nit Número de identificación tributaria del tercero
 * @property string $razon_social Nombre de la compañía del tercero
 * @property string $tipo Tipo de cliente que es el tercero
 * @property string $activo Campo que indica si esta o no activo del tercero
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @method static \Database\Factories\TerceroFactory factory(...$parameters)
 * @method static Builder|Tercero whereActivo($value)
 * @method static Builder|Tercero whereCreatedAt($value)
 * @method static Builder|Tercero whereDeletedAt($value)
 * @method static Builder|Tercero whereId($value)
 * @method static Builder|Tercero whereNit($value)
 * @method static Builder|Tercero whereRazonSocial($value)
 * @method static Builder|Tercero whereTipo($value)
 * @method static Builder|Tercero whereUpdatedAt($value)
 * @mixin Eloquent
 * @mixin \Eloquent
 */
class Tercero extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nit',
        'razon_social',
        'tipo',
        'activo',
    ];

    /**
     * @return BelongsTo
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(Ciudad::class, 'id_ciudad');
    }
}
