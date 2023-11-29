<?php

namespace App\Policies;

use App\Models\NotaFiscal;
use App\Models\User;

class NotaFiscalPolicy
{
    public function view(User $user, NotaFiscal $notaFiscal)
    {
        return $user->id === $notaFiscal->user_id;
    }

    public function update(User $user, NotaFiscal $notaFiscal)
    {
        return $user->id === $notaFiscal->user_id;
    }

    public function delete(User $user, NotaFiscal $notaFiscal)
    {
        return $user->id === $notaFiscal->user_id;
    }
}