<?php

namespace App\Enums\Models;

enum StockMovementTypeEnum: string
{
    case CHECKIN = 'check_in';

    case CHECKOUT = 'check_out';
}
