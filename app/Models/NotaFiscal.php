<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaFiscal extends Model
{
    use HasFactory;
    protected $table = 'notas_fiscais';
    protected $fillable = [
        'numero', 'valor', 'data_emissao', 'cnpj_remetente', 'nome_remetente',
        'cnpj_transportador', 'nome_transportador', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
