<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Models\Role
 *
 * @method static Builder|Role newModelQuery()
 * @method static Builder|Role newQuery()
 * @method static Builder|Role onlyTrashed()
 * @method static Builder|Role query()
 * @method static Builder|Role withTrashed()
 * @method static Builder|Role withoutTrashed()
 * @property int $id
 * @property string $nombre Nombre del rol del sistema
 * @property string $abreviatura Abreviatura del rol del sistema
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @method static \Database\Factories\RoleFactory factory(...$parameters)
 * @method static Builder|Role whereAbreviatura($value)
 * @method static Builder|Role whereCreatedAt($value)
 * @method static Builder|Role whereDeletedAt($value)
 * @method static Builder|Role whereId($value)
 * @method static Builder|Role whereNombre($value)
 * @method static Builder|Role whereUpdatedAt($value)
 * @mixin Eloquent
 * @mixin \Eloquent
 */
class Role extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'abreviatura',
    ];
}
