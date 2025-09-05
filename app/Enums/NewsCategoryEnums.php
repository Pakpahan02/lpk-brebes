<?php

namespace App\Enums;

enum NewsCategoryEnums: string
{
    case PENGUMUMAN = 'pengumuman';
    case INFORMASI = 'informasi';
    case PENDIDIKAN = 'pendidikan';
    case TEKNOLOGI = 'teknologi';

    public function label(): string
    {
        return match($this) {
            self::PENGUMUMAN => 'Pengumuman',
            self::INFORMASI => 'Informasi',
            self::PENDIDIKAN => 'Pendidikan',
            self::TEKNOLOGI => 'Teknologi',
        };
    }
}
