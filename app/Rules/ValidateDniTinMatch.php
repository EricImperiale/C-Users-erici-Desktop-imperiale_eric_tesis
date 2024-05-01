<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidateDniTinMatch implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $dni = preg_replace('/[^0-9]/', '', request()->input('id'));
        $tin = preg_replace('/[^0-9]/', '', $value);

        $tin = substr($tin, 2, strlen($dni));

        if ($tin !== $dni) {
            $fail('El DNI y el CUIT deben ser iguales.');
        }
    }
}
