<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $country_phone_code_id
 * @property string $country_phone_code
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CountryPhoneCode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CountryPhoneCode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CountryPhoneCode query()
 * @method static \Illuminate\Database\Eloquent\Builder|CountryPhoneCode whereCountryPhoneCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryPhoneCode whereCountryPhoneCodeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryPhoneCode whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryPhoneCode whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryPhoneCode whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CountryPhoneCode extends Model
{
    //use HasFactory;

    protected $primaryKey = 'country_phone_code_id';
}
