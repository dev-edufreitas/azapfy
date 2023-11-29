<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Cnpj implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $cnpj = preg_replace('/[^0-9]/', '', $value);

        if (strlen($cnpj) != 14) {
            return false;
        }

        if (preg_match('/(\d)\1{13}/', $cnpj)) {
            return false;
        }
        $soma = 0;
        for ($i = 0; $i < 12; $i++) {
            $soma += intval($cnpj[$i]) * (5 - $i);
        }
        $resto = $soma % 11;
        $digito1 = ($resto < 2) ? 0 : 11 - $resto;


        $soma = 0;
        for ($i = 0; $i < 13; $i++) {
            $soma += intval($cnpj[$i]) * (6 - $i);
        }
        $resto = $soma % 11;
        $digito2 = ($resto < 2) ? 0 : 11 - $resto;

        return true;
    }

    public function message()
    {
        return 'O CNPJ informado é inválido.';
    }
}
