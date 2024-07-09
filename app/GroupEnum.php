<?php declare(strict_types=1);

namespace App;

enum GroupEnum: string
{
    case ADMIN = 'ADMIN';
    case DIRECTOR = 'DIRECTOR';
    case MANAGER = 'MANAGER';
    case SELLER = 'SELLER';

    public function label(): string
    {
        return match ($this) {
            self::ADMIN => __('Admin'),
            self::DIRECTOR => __('Diretor'),
            self::MANAGER => __('Gerente'),
            self::SELLER => __('Vendedor'),
        };
    }
}
