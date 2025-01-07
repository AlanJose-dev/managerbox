<?php

namespace App\Enums\Enums\Models;

enum StockMovementTypeEnum: string
{
    case CHECK_IN = 'check_in'; // Entrada no estoque.

    case CHECK_OUT = 'check_out'; // Saída do estoque.
}
