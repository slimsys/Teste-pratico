<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Auth\Notifications\VerifyEmail;

class CustomVerifyEmail extends VerifyEmail
{
    use Queueable;
    public $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user = '')
    {
        $this->user = $user ?: Auth::user();
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->greeting('Olá')
                    ->subject('Verifique seu e-mail')
                    ->line('Por favor, clique no link abaixo para finalizar seu cadastro.')
                    ->action('Clique aqui', $this->verificationUrl($notifiable))
                    ->line('Obrigado!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
