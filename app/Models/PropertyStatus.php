<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $status_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyStatus whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyStatus whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PropertyStatus extends Model
{
    //use HasFactory;

    protected $primaryKey = 'status_id';
}
