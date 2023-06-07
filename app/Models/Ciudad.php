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
 * App\Models\Ciudad
 *
 * @method static Builder|Ciudad newModelQuery()
 * @method static Builder|Ciudad newQuery()
 * @method static Builder|Ciudad onlyTrashed()
 * @method static Builder|Ciudad query()
 * @method static Builder|Ciudad withTrashed()
 * @method static Builder|Ciudad withoutTrashed()
 * @mixin Eloquent
 * @property int $id
 * @property string $nombre Nombre de la ciudad de colombia
 * @property int $id_departamento Id del departamento de colombia
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @method static Builder|Ciudad whereCreatedAt($value)
 * @method static Builder|Ciudad whereDeletedAt($value)
 * @method static Builder|Ciudad whereId($value)
 * @method static Builder|Ciudad whereIdDepartamento($value)
 * @method static Builder|Ciudad whereNombre($value)
 * @method static Builder|Ciudad whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Ciudad extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ciudades';

    protected $fillable = [
        'nombre',
    ];

    /**
     * @return BelongsTo
     */
    public function department(): BelongsTo
    {
        return $this->belongsTo(Departamento::class, 'id_departamento');
    }
}
