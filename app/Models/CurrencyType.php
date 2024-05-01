<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $currency_id
 * @property string $name
 * @property string $alpha3
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CurrencyType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CurrencyType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CurrencyType query()
 * @method static \Illuminate\Database\Eloquent\Builder|CurrencyType whereAlpha3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CurrencyType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CurrencyType whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CurrencyType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CurrencyType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CurrencyType extends Model
{
    use HasFactory;
}
