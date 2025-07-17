<?php

namespace App\Models;

// Используйте интерфейс MustVerifyEmail, если нужно проверять электронную почту
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Атрибуты, которые можно массово заполнять.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',       // Имя пользователя
        'email',      // Электронная почта
        'password',   // Пароль
    ];

    /**
     * Атрибуты, которые должны быть скрыты при сериализации (например, при выводе в JSON).
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',          // Пароль пользователя
        'remember_token',    // Токен для запоминания входа
    ];

    /**
     * Получить атрибуты, которые должны быть приведены к определённым типам.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime', // Дата подтверждения электронной почты
            'password' => 'hashed',          // Хешировать пароль при сохранении
        ];
    }
}