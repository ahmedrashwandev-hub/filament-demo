<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class EmailSettings extends Settings
{
    public string $mail_host;
    public int $mail_port;
    public string $mail_username;
    public string $mail_password;
    public string $mail_from;

    public static function group(): string
    {
        return 'email';
    }
}
