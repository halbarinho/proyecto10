<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class DniNieValidationRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
        if (!$this->isValidNif($value) && !$this->isValidNie($value)) {
            $fail('The :atributte no es válido.');
        }
    }

    public function isValidNif(?string $value): bool
    {
        if ($value) {
            $regEx = '/^[0-9]{8}[A-Z]$/i';

            $letters = 'TRWAGMYFPDXBNJZSQVHLCKE';

            $value = strtoupper($value);

            if (preg_match($regEx, $value)) {
                return $letters[substr($value, 0, 8) % 23] == $value[8];
            }
        }

        return false;
    }

    public function isValidNie(?string $value): bool
    {
        if ($value) {
            $regEx = '/^[KLMXYZ][0-9]{7}[A-Z]$/i';
            $letters = 'TRWAGMYFPDXBNJZSQVHLCKE';

            $value = strtoupper($value);

            if (preg_match($regEx, $value)) {
                $replaced = str_replace(['X', 'Y', 'Z'], [0, 1, 2], $value);

                return $letters[substr($replaced, 0, 8) % 23] == $value[8];
            }
        }

        return false;
    }

    // public function passes($attribute, $value)
    // {

    //     $value = str_replace(" ", "", $value);

    //     //DNI
    //     if (preg_match('/^[0-9]{8}[A-Za-z]$/', $value)) {
    //         $dniNumbers = substr($value, 0, 8);
    //         $dniLetter = substr($value, -1);

    //         $expectedLetter = 'TRWAGMYFPDXBNJZSQVHLCKE';
    //         $index = $dniNumbers % 23;

    //         return strtoupper($expectedLetter[$index]) === $dniLetter;
    //     }

    //     //NIE
    //     if (preg_match('/^[XYZ][0-9]{7}[A-Za-z]$/', $value)) {
    //         $nieLetter = substr($value, 0, 1);
    //         $nieNumbers = substr($value, 1, 7);

    //         $nieLetterNumber = ['X' => 0, 'Y' => 1, 'Z' => 2];
    //         $nieLetterValue = $nieLetterNumber[$nieLetter];

    //         $expectedLetter = 'TRWAGMYFPDXBNJZSQVHLCKE';
    //         $index = ($nieLetterValue * 10) + $nieNumbers % 23;

    //         return strtoupper($expectedLetter[$index]) === substr($value, -1);
    //     }

    //     return false;
    // }

    // /**
    //  * Get the validation error message.
    //  *
    //  * @return string
    //  */
    // public function message()
    // {
    //     return 'El valor :attribute no es un DNI o NIE válido.';
    // }
}
