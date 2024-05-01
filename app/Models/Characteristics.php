<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $characteristic_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristics newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristics newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristics query()
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristics whereCharacteristicId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristics whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristics whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Characteristics whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Characteristics extends Model
{
    use HasFactory;
}
