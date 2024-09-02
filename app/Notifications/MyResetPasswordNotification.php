<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;


class MyResetPasswordNotification extends ResetPassword
{

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage())
            ->error()
            ->greeting('Olá!')
            ->line('Clique no botão abaixo para alterar sua senha!')
            ->action( 'Alterar Senha', url(route('password.reset', $this->token, false)))
            ->subject('Alterar senha')
            ->salutation('Obrigado!');
    }

}
