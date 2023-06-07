<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Models\Departamento
 *
 * @method static Builder|Departamento newModelQuery()
 * @method static Builder|Departamento newQuery()
 * @method static Builder|Departamento onlyTrashed()
 * @method static Builder|Departamento query()
 * @method static Builder|Departamento withTrashed()
 * @method static Builder|Departamento withoutTrashed()
 * @property int $id
 * @property string $nombre Nombre del departamento de colombia
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @method static Builder|Departamento whereCreatedAt($value)
 * @method static Builder|Departamento whereDeletedAt($value)
 * @method static Builder|Departamento whereId($value)
 * @method static Builder|Departamento whereNombre($value)
 * @method static Builder|Departamento whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Departamento extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nombre',
    ];

    /**
     * @return HasMany
     */
    public function city(): HasMany
    {
        return $this->hasMany(Ciudad::class, 'id_departamento', 'id');
    }
}
