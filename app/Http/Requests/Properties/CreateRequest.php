<?php

namespace App\Http\Requests\Property;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // TODO: Habría que validar que las propiedades no se repitan.
        // Teniendo en cuenta el tipo de propiedad.
        return [
            'type_id' => [
                'required',
                'numeric',
                'exists:property_types',
            ],
            'owner_id' => [
                'required',
                'numeric',
                //'exists:owners',
            ],
            'full_address' => [
                'required',
            ],
            'neighborhood' => [
                'required',
            ],
            'zip_code' => [
                'required',
            ],
            'rooms' => [
                'nullable',
                'numeric',
            ],
            'bathrooms' => [
                'nullable',
                'numeric',
            ],
            'bedrooms' => [
                'nullable',
                'numeric',
            ],
            'garages' => [
                'nullable',
                'numeric',
            ],
            'covered_area' => [
                'nullable',
                'numeric',
            ],
            'total_area' => [
                'nullable',
                'numeric',
            ],
            'floor' => [
                'nullable',
                'numeric',
            ],
            /*
                ^: Coincide con el inicio de la cadena.
                \d+: Coincide con uno o más dígitos. \d es una clase de caracteres que coincide con cualquier dígito del 0 al 9. El cuantificador + indica que debe haber uno o más dígitos.
                [a-zA-Z]: Coincide con una letra, ya sea minúscula o mayúscula. [a-zA-Z] es una clase de caracteres que coincide con cualquier letra del alfabeto inglés, tanto minúscula como mayúscula.
                $: Coincide con el final de la cadena.
            */
            'apartment' => [
                'nullable',
                'required_with:floor',
                'numeric',
            ],
            'status_id' => [
                'required',
                'numeric',
                'exists:property_statuses',
            ],
            'rent_price' => [
                'required',
                'numeric',
            ],
            'currency_id' => [
                'required_with:rent_price',
                'numeric',
            ],
            'expenses' => [
                'nullable',
                'numeric',
                'required_with:floor,department',
            ],
            'description' => [
                'nullable',
                'max:255',
            ],
            'utility_id' => [
                'required',
                'exists:utilities',
            ],
            'amenity_id' => [
                'nullable',
                'exists:amenities',
            ],
            'room_id' => [
                'required',
                'exists:rooms',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'type_id.required' => 'El tipo de propiedad es obligatorio.',
            'type_id.numeric' => 'El tipo de propiedad debe ser un valor numérico.',
            'type_id.exists' => 'El tipo de propiedad seleccionado no es válido.',

            'owner_id.required' => 'El propietario es obligatorio.',
            'owner_id.numeric' => 'El propietario debe ser un valor numérico.',

            'full_address.required' => 'La dirección completa es obligatoria.',

            'neighborhood.required' => 'El barrio es obligatorio.',

            'zip_code.required' => 'El código postal es obligatorio.',

            'rooms.numeric' => 'La cantidad de habitaciones debe ser un valor numérico.',

            'bathrooms.numeric' => 'La cantidad de baños debe ser un valor numérico.',

            'bedrooms.numeric' => 'La cantidad de dormitorios debe ser un valor numérico.',

            'garages.numeric' => 'La cantidad de cocheras debe ser un valor numérico.',

            'covered_area.required' => 'El área cubierta es obligatoria.',
            'covered_area.numeric' => 'El área cubierta debe ser un valor numérico.',

            'total_area.required' => 'El área total es obligatoria.',
            'total_area.numeric' => 'El área total debe ser un valor numérico.',

            'floor.numeric' => 'El piso debe ser un valor numérico.',

            'apartment.required_with' => 'El número de departamento es obligatorio cuando se especifica el piso.',
            'apartment.numeric' => 'El número de departamento debe ser un valor numérico.',

            'status_id.required' => 'El estado de la propiedad es obligatorio.',
            'status_id.numeric' => 'El estado de la propiedad debe ser un valor numérico.',
            'status_id.exists' => 'El estado de la propiedad seleccionado no es válido.',

            'rent_price.required' => 'El precio de alquiler es obligatorio.',
            'rent_price.numeric' => 'El precio de alquiler debe ser un valor numérico.',

            'currency_id.required_with' => 'La moneda es obligatoria cuando se especifica el precio de alquiler.',
            'currency_id.numeric' => 'La moneda debe ser un valor numérico.',

            'expenses.numeric' => 'Los gastos deben ser un valor numérico cuando se especifica el piso y el departamento.',
            'expenses.required_with' => 'Los gastos son obligatorios cuando se especifica el piso y el departamento.',

            'description.max' => 'La descripción no puede tener más de 255 caracteres.',

            'utility_id.required' => 'Tenés que seleccionar algún servicio.',
            'utility_id.exists' => 'El servicio seleccionado no es válido.',

            'amenity_id.exists' => 'El servicio seleccionado no es válido.',

            'room_id.required' => 'El tipo de habitación es obligatorio.',
            'room_id.exists' => 'El tipo de habitación seleccionado no es válido.',
        ];
    }
}
