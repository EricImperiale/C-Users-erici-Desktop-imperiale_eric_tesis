<?php

namespace App\Http\Requests\Owners;

use App\Rules\ValidateDniTinMatch;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class EditRequest extends FormRequest
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
        $userId = $this->input('id');

        return [
            'name' => 'required',
            'surname' => 'required',
            'id' => 'required', 'numeric', 'min_digits:8', 'max_digits:8',
            'tin' => ['required', 'numeric', 'min_digits:11', 'max_digits:11', new ValidateDniTinMatch],
            'date_of_birth' => 'required|date|before_or_equal:' . now()->format('d-m-Y'),
            'email' => [
                'required',
                Rule::unique('owners')->ignore($userId)
            ],
            'country_phone_code_id' => 'required|numeric',
            'area_code' => 'required|numeric|max_digits:4',
            'mobile_phone' => 'required|max_digits:8,unique:owners',
            'address' => 'required',
            'city' => 'required',
            'province' => 'required',
            'country' => 'required',
            'zip_code' => 'required|numeric',
        ];
    }

    /**
     * @return string[] Mensaje de Validación para el Usuario.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'El campo nombre es obligatorio.',

            'surname.required' => 'El campo apellido es obligatorio.',

            'id.required' => 'El DNI es obligatorio.',
            'id.numeric' => 'El DNI debe ser numérico y no contener caracteres especiales.',
            'id.unique' => 'Ya existe un/a propietario/a con ese DNI.',

            'id.min_digits' => 'El DNI debe tener exactamente :min dígitos.',
            'id.max_digits' => 'El DNI debe tener exactamente :max dígitos.',

            'tin.required' => 'El CUIT o CUIL es obligatorio.',
            'tin.numeric' => 'El CUIT o CUIL debe ser numérico y no contener caracteres especiales.',
            'tin.min_digits' => 'El CUIT o CUIL debe tener exactamente :min dígitos.',
            'tin.max_digits' => 'El CUIT o CUIL debe tener exactamente :max dígitos.',

            'date_of_birth.required' => 'El campo fecha de nacimiento es obligatorio.',
            'date_of_birth.date' => 'El campo fecha de nacimiento debe ser una fecha válida.',
            'date_of_birth.before_or_equal' => 'El campo fecha de nacimiento debe ser una fecha válida.',

            'email.required' => 'El campo email es obligatorio.',
            'email.email' => 'El campo email debe ser una dirección de correo electrónico válida.',
            'email.rfc' => 'El campo email contiene caracteres no permitidos.',
            'email.dns' => 'El campo email contiene caracteres no permitidos.',
            'email.unique' => 'Ya existe un/a propietario/a con ese email.',

            'country_phone_code_id.required' => 'El código del país es obligatorio.',
            'country_phone_code_id.required_with' => 'El código del país es obligatorio.',

            'area_code.required' => 'El código de área es obligatorio.',
            'area_code.numeric' => 'El código de área debe ser un número.',
            'area_code.max_digits' => 'El código de área no debe tener más de cuatro dígitos.',

            'mobile_phone.required' => 'El campo número de teléfono es obligatorio.',
            'mobile_phone.unique' => 'Ya existe un/a propietario/a con ese número de teléfono.',
            'mobile_phone.max_digits' => 'El número de teléfono no debe tener más ocho dígitos.',

            'address.required' => 'El campo dirección es obligatorio.',

            'city.required' => 'El campo ciudad es obligatorio.',

            'zip_code.required' => 'El código postal es obligatorio.',

            'province.required' => 'El campo provincia es obligatorio.',

            'country.required' => 'El campo país es obligatorio.',
        ];
    }
}
