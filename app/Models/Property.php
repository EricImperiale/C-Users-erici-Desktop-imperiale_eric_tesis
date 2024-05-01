<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 *
 *
 * @property int $property_id
 * @property string $full_address
 * @property int $rooms
 * @property int $bedrooms
 * @property int $bathrooms
 * @property int|null $garages
 * @property int $covered_area
 * @property int $total_area
 * @property string $rent_price
 * @property string|null $expenses
 * @property string|null $description
 * @property int|null $floor
 * @property string|null $department
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $type_id
 * @property int $currency_id
 * @property-read \App\Models\PropertyType $propertyType
 * @method static \Illuminate\Database\Eloquent\Builder|Property newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Property newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Property query()
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereBathrooms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereBedrooms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereCoveredArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereDepartment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereExpenses($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereFloor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereFullAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereGarages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property wherePropertyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereRentPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereRooms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereTotalArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereUpdatedAt($value)
 * @property string $neighborhood
 * @property int $zip_code
 * @property int|null $age
 * @property int $status_id
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereNeighborhood($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereZipCode($value)
 * @property int $owner_id
 * @property-read \App\Models\Owner $owners
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereOwnerId($value)
 * @property-read \App\Models\CurrencyType $propertyCurrency
 * @property-read \App\Models\PropertyStatus $propertyStatus
 * @property int $is_professional_use
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereIsProfessionalUse($value)
 * @property string $address
 * @property string $province
 * @property string $city
 * @property int $is_brand_new
 * @property float|null $latitude
 * @property float|null $longitude
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereIsBrandNew($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereProvince($value)
 * @mixin \Eloquent
 */
class Property extends Model
{
    //use HasFactory;

    protected $primaryKey = 'property_id';

    protected $fillable = [
        'property_id',
        'full_address',
        'neighborhood',
        'zip_code',
        'rooms',
        'bedrooms',
        'bathrooms',
        'garages',
        'covered_area',
        'total_area',
        'age',
        'rent_price',
        'expenses',
        'description',
        'floor',
        'department',
        'type_id',
        'currency_id',
        'status_id',
    ];

    /**
     * Mutadores.
     */
    public function rentPrice(): Attribute
    {
        return Attribute::make(
          get: function ($value) {
            $cleanedRentPrice = preg_replace('/[^0-9]/', '', $value);

            return number_format(
                $cleanedRentPrice,
                '2',
                ',',
                '.',
            );
          },
          set: fn ($value) => preg_replace('/[^0-9]/', '', $value),
        );
    }

    public function expenses(): Attribute
    {
        return Attribute::make(
          get: function ($value) {
            $cleanedRentPrice = preg_replace('/[^0-9]/', '', $value);

            return number_format(
                $cleanedRentPrice,
                '2',
                ',',
                '.',
            );
          },
          set: fn ($value) => preg_replace('/[^0-9]/', '', $value),
        );
    }

    /**
     * Relaciones.
     */
    public function propertyType(): BelongsTo
    {
        return $this->belongsTo(
            PropertyType::class,
            'type_id',
            'type_id',
        );
    }

    public function propertyCurrency(): BelongsTo
    {
        return $this->belongsTo(
            CurrencyType::class,
            'currency_id',
            'currency_id',
        );
    }

    public function propertyStatus(): BelongsTo
    {
        return $this->belongsTo(
            PropertyStatus::class,
            'status_id',
            'status_id',
        );
    }

    // TODO: Quizá cambiar a BelongsToMany.
    public function owners(): BelongsTo
    {
        return $this->belongsTo(
            Owner::class,
            'owner_id',
            'owner_id',
        );
    }
}
