<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $amenity_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Amenities newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Amenities newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Amenities query()
 * @method static \Illuminate\Database\Eloquent\Builder|Amenities whereAmenityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Amenities whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Amenities whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Amenities whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Amenities extends Model
{
    use HasFactory;
}
