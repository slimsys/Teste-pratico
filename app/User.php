<?php

namespace App;

use App\Notifications\MyResetPasswordNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use SoftDeletes;
    const ROLE_USER = 1;
    const ROLE_ADMIN = 2;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role','phone', 'cpf'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Enviando notificação de recuperação de senha.
     * @param string $token
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new MyResetPasswordNotification($token));
    }

    public function vehicles() {
        return $this->hasMany('App\Vehicle', 'proprietario', 'id');
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new \App\Notifications\CustomVerifyEmail(\Auth::user()));
    }
}
