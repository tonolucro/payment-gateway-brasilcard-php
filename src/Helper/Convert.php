<?php
/**
 * This file is part of Tonolucro\Payment\Gateway\Brasilcard
 *
 * @copyright Copyright (c) Tonolucro <https://www.tonolucro.com>
 * @link https://github.com/tonolucro/payment-gateway-brasilcard-php
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tonolucro\Payment\Gateway\Brasilcard\Helper;

class Convert
{
    /**
     * @param float $floatValue
     * @return string|int
     */
    public static function valueAmount($floatValue){
        return number_format($floatValue, 2, '', '');
    }
}