<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CuilRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $suma = 0;
        $patron = "5432765432";

        if (substr($value, 0, 2) == 20 || substr($value, 0, 2) == 23 || substr($value, 0, 2) == 24 || substr($value, 0, 2) == 27) {
            $final = substr($value, 10, 1);

            for ($i = 0; $i <= 9; $i++) {
                try {
                    $suma += strval(substr($patron, $i, 1)) * strval(substr($value, $i, 1));
                } catch (Exception $e) {
                    $fail('El :attribute ingresado no es válido.');
                }
            }
            $modulo = $suma % 11;
            $digito_verificador = 11 - $modulo;

            if ($digito_verificador == 11) {
                $digito_verificador = 0;
            } else if ($digito_verificador == 10) {
                $digito_verificador = 9;
            }

            if (!$digito_verificador == $final) {
                $fail('El :attribute ingresado no es válido.');
            }
        } else {
            // $errcuil = "Error Cuil comienzo erroneo";
            $fail('El :attribute ingresado no es válido.');
        }
    }

}