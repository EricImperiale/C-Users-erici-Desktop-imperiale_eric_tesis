<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $type_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyType query()
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyType whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PropertyType extends Model
{
    //use HasFactory;

    protected $primaryKey = 'type_id';
}
