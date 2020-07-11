<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Lang;


class MyResetPassword extends Notification
{
    use Queueable;

    /**
     * The password reset token.
     *
     * @var string
     */
    public $token;

    /**
     * The callback that should be used to create the reset password URL.
     *
     * @var \Closure|null
     */
    public static $createUrlCallback;

    /**
     * The callback that should be used to build the mail message.
     *
     * @var \Closure|null
     */
    public static $toMailCallback;

    /**
     * Create a notification instance.
     *
     * @param  string  $token
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's channels.
     *
     * @param  mixed  $notifiable
     * @return array|string
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
      if (static::$toMailCallback) {
          return call_user_func(static::$toMailCallback, $notifiable, $this->token);
      }

      if (static::$createUrlCallback) {
          $url = call_user_func(static::$createUrlCallback, $notifiable, $this->token);
      } else {
          $url = url(route('password.reset', [
              'token' => $this->token,
              'email' => $notifiable->getEmailForPasswordReset(),
          ], false));
      }
      return (new MailMessage)
          ->subject(Lang::get('Restablecer contraseña'))
          ->line(Lang::get('Estás recibiendo este email porque se ha solicitado un cambio de contraseña para tu cuenta.'))
          ->action(Lang::get('Restablecer contraseña'), $url)
          ->line(Lang::get('Este enlace para restablecer la contraseña caduca en :count minutos.', ['count' => config('auth.passwords.'.config('auth.defaults.passwords').'.expire')]))
          ->line(Lang::get('Si no has solicitado un cambio de contraseña, puedes ignorar o eliminar este e-mail.'))
          ->salutation(Lang::get('Saludos, Beyond'));
    }

    /**
     * Set a callback that should be used when creating the reset password button URL.
     *
     * @param  \Closure  $callback
     * @return void
     */
    public static function createUrlUsing($callback)
    {
        static::$createUrlCallback = $callback;
    }

    /**
     * Set a callback that should be used when building the notification mail message.
     *
     * @param  \Closure  $callback
     * @return void
     */
    public static function toMailUsing($callback)
    {
        static::$toMailCallback = $callback;
    }
  }
