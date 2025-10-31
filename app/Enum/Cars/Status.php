<?php

namespace App\Enum\Cars;

enum Status :int {
    case NOT_SET = 0;
    case ACTIVE = 1;
    case SOLD = 2;
    case NOT_AVAILABLE = 3;
    case IN_STOCK = 4;

    public function text()
    {
        return match($this) {
            self::NOT_SET => 'Не задано',
            self::ACTIVE => 'Активно',
            self::SOLD => 'Продано',
            self::NOT_AVAILABLE => 'Нет в наличии',
            self::IN_STOCK => 'На складе',

        };
    }
}

