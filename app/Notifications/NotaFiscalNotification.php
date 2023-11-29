<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;


class NotaFiscalNotification extends Notification implements ShouldQueue
{
    use Queueable;
    private $detalhesNotaFiscal;

    public function __construct($detalhesNotaFiscal)
    {
        $this->detalhesNotaFiscal = $detalhesNotaFiscal;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Sua Nota Fiscal Eletrônica')
            ->greeting('Olá!')
            ->line('Aqui estão os detalhes da sua Nota Fiscal Eletrônica:')
            ->line('Número: ' . $this->detalhesNotaFiscal['numero'])
            ->line('Valor: R$ ' . $this->detalhesNotaFiscal['valor'])
            ->action('Ver Nota Fiscal', url('/notas-fiscais/' . $this->detalhesNotaFiscal['id']))
            ->line('Obrigado por usar nosso serviço!');
    }
}
