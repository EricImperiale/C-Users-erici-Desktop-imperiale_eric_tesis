<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * 
 *
 * @property int $guarantor_id
 * @property string $name
 * @property string $surname
 * @property int $id
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
 * @method static \Illuminate\Database\Eloquent\Builder|Guarantor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Guarantor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Guarantor query()
 * @method static \Illuminate\Database\Eloquent\Builder|Guarantor whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guarantor whereAreaCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guarantor whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guarantor whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guarantor whereCountryPhoneCodeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guarantor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guarantor whereDateOfBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guarantor whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guarantor whereGuarantorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guarantor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guarantor whereMobilePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guarantor whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guarantor whereProvince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guarantor whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guarantor whereTin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guarantor whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guarantor whereZipCode($value)
 * @property-read \App\Models\CountryPhoneCode $countryPhoneCode
 * @mixin \Eloquent
 */
class Guarantor extends Model
{
    //use HasFactory;

    protected $primaryKey = 'guarantor_id';

    protected $fillable = [
        'guarantor_id',
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

    // TODO: FIJARSE QUE SI TENGA CONTRATOS!!!!!!!
}
