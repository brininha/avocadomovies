<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Cpf implements Rule
{
    public function passes($attribute, $value)
    {
        return $this->validateCpf($value);
    }

    public function message()
    {
        return 'O :attribute deve ser um CPF válido.';
    }

    private function validateCpf($cpf)
    {
        // Remover caracteres especiais
        $cpf = preg_replace('/\D/', '', $cpf);
        
        // Verifica se o CPF tem 11 dígitos
        if (strlen($cpf) != 11) {
            return false;
        }

        // Verificação de CPF com dígitos repetidos
        if (preg_match('/^(\d)\1{10}$/', $cpf)) {
            return false;
        }

        // Validação dos dígitos verificadores
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) { 
                return false;
            }
        }
        return true;
    }
}
