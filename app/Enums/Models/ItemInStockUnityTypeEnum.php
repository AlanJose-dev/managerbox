<?php

namespace App\Enums\Models;


enum ItemInStockUnityTypeEnum: string
{
    case UN = 'unity'; // Unidade.

    case PK = 'package'; // Pacote.

    case CX = 'box'; // Caixa.

    case KG = 'kilogram'; // Quilograma.

    case G = 'gram'; // Grama.

    case TON = 'tonne'; // Tonelada.

    case L = 'liter'; // Litro.

    case ML = 'mililiter'; // Mililitro.

    case M3 = 'cubic_meter'; // Metro Cúbico.

    case M = 'meter'; // Metro.

    case CM = 'centimeter'; // Centímetro.

    case MM = 'milimeter'; // Milímetro.

    case PAR = 'pair'; // Par.

    case DZ = 'dozen'; // Dúzia.

    case RL = 'roll'; // Rolo.

    case LT = 'lot'; // Lote.

}
