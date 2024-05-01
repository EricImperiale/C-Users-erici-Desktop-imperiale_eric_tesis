<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * 
 *
 * @property int $owner_id
 * @property string $name
 * @property string $last_name
 * @property string $id
 * @property string $tin
 * @property string $email
 * @property string $address
 * @property string $province
 * @property string $city
 * @property int $zip_code
 * @property string $country
 * @property string $phone_number
 * @property string|null $alternative_mobile_phone
 * @property string|null $date_of_birth
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Owner newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Owner newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Owner query()
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereAlternativeMobilePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereDateOfBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereOwnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereProvince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereTin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereZipCode($value)
 * @property string|null $alternative_phone_number
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereAlternativePhoneNumber($value)
 * @property-read string $surname
 * @property string $mobile_phone
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereMobilePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereSurname($value)
 * @property int $area_code
 * @property int $country_phone_code_id
 * @property-read \App\Models\CountryPhoneCode $countryPhoneCode
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereAreaCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereCountryPhoneCodeId($value)
 * @property-read \App\Models\Property|null $properties
 * @mixin \Eloquent
 */
class Owner extends Model
{
    //use HasFactory;

    protected $primaryKey = 'owner_id';

    protected $fillable = [
        'owner_id',
        'name',
        'surname',
        'id',
        'tin',
        'email',
        'address',
        'province',
        'city',
        'zip_code',
        'country',
        'comments',
        'area_code',
        'mobile_phone',
        'date_of_birth',
        'country_phone_code_id',
    ];

    /**
     * Mutadores.
     */
    public function name(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                return ucfirst(strtolower($value));
            },
        );
    }

    public function surname(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                return ucfirst(strtolower($value));
            },
        );
    }

    public function id(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                $cleanedId = preg_replace('/[^0-9]/', '', $value);

                return number_format(
                    $cleanedId,
                    '0',
                    '.',
                    '.'
                );
            },
            set: fn ($value) => preg_replace('/[^0-9]/', '', $value),
        );
    }

    public function tin(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                $cleanedTin = preg_replace('/[^0-9]/', '', $value);

                return
                    substr($cleanedTin, 0, 2) . '-' .
                    substr($cleanedTin, 2, 8) . '-' .
                    substr($cleanedTin, 10);
            },
            set: fn ($value) => preg_replace('/[^0-9]/', '', $value),
        );
    }

    public function mobilePhone(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                /*
                    ^: Que no sea un número
                    [0-9]: Busca del 0 al 9
                */
                $cleanedMobilePhone = preg_replace('/[^0-9]/', '', $value);

                $areaCode = substr($cleanedMobilePhone, 0, 3);

                if (strlen($areaCode) > 2)
                {
                    return preg_replace('/(\d{3})(\d{4})(\d{4})/', '($1) $2-$3', $cleanedMobilePhone);
                }
            },
            set: fn ($value) => preg_replace('/[^0-9]/', '', $value),
        );
    }

    /**
     * Relaciones.
     */
    public function countryPhoneCode(): BelongsTo
    {
        return $this->belongsTo(
            CountryPhoneCode::class,
            'country_phone_code_id',
            'country_phone_code_id',
        );
    }

    public function properties(): BelongsTo
    {
        return $this->belongsTo(
            Property::class,
            'owner_id',
            'owner_id',
        );
    }
}
