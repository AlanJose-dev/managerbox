<?php

namespace App\Enums\Models;

enum ItemInStockUnityTypeEnum: string
{
    /**
     * Unidade.
     */
    case UN = 'unity';

    /**
     * Unidade.
     */
    case PK = 'package';

    /**
     * Caixa.
     */
    case CX = 'box';

    /**
     * Quilograma.
     */
    case KG = 'kilogram';

    /**
     * Grama.
     */
    case G = 'gram';

    /**
     * Tonelada.
     */
    case TON = 'tonne';

    /**
     * Litro.
     */
    case L = 'liter';

    /**
     * Mililitro.
     */
    case ML = 'mililiter';

    /**
     * Metro cúbico.
     */
    case M3 = 'cubic_meter';

    /**
     * Metro.
     */
    case M = 'meter';

    /**
     * Centímetro.
     */
    case CM = 'centimeter';

    /**
     * Milímetro.
     */
    case MM = 'milimeter';

    /**
     * Par.
     */
    case PAR = 'pair';

    /**
     * Dúzia
     */
    case DZ = 'dozen';

    /**
     * Rolo.
     */
    case RL = 'roll';

    /**
     * Lote.
     */
    case LT = 'lot';
}
