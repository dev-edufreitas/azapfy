<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Cnpj;

class NotaFiscalFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'numero' => 'required|string|size:9|unique:notas_fiscais',
            'valor' => 'required|numeric|min:0.01',
            'data_emissao' => ['required', 'before_or_equal:' .date('Y-m-d')],
            'cnpj_remetente' => ['required', 'string', new Cnpj],
            'nome_remetente' => 'required|string|max:100',
            'cnpj_transportador' => ['required', 'string', new Cnpj],
            'nome_transportador' => 'required|string|max:100',
        ];
    }
}

