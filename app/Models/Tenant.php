<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * 
 *
 * @property int $tenant_id
 * @property-read string $name
 * @property-read string $surname
 * @property string $id
 * @property string $tin
 * @property string $email
 * @property string $address
 * @property string $province
 * @property string $city
 * @property string $country
 * @property int $zip_code
 * @property int $area_code
 * @property string $mobile_phone
 * @property string|null $date_of_birth
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $country_phone_code_id
 * @property-read \App\Models\CountryPhoneCode $countryPhoneCode
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereAreaCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereCountryPhoneCodeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereDateOfBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereMobilePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereProvince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereTin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereZipCode($value)
 * @mixin \Eloquent
 */
class Tenant extends Model
{
    //use HasFactory;

    protected $primaryKey = 'tenant_id';

    protected $fillable = [
        'tenant_id',
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
}
