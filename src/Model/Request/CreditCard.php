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

namespace Tonolucro\Payment\Gateway\Brasilcard\Model\Request;

use Tonolucro\Payment\Gateway\Brasilcard\Model\Model;

class CreditCard extends Model
{
    /**
     * @var string
     */
    protected $cardNumber;
    /**
     * @var string
     */
    protected $holder;
    /**
     * @var int
     */
    protected $expirationYear;
    /**
     * @var int
     */
    protected $expirationMonth;
    /**
     * @var int
     */
    protected $securityCode;

    /**
     * @return string
     */
    public function getCardNumber()
    {
        return $this->cardNumber;
    }

    /**
     * @param string $cardNumber
     * @return $this
     */
    public function setCardNumber($cardNumber)
    {
        $this->cardNumber = $cardNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getHolder()
    {
        return $this->holder;
    }

    /**
     * @param string $holder
     * @return $this
     */
    public function setHolder($holder)
    {
        $this->holder = $holder;
        return $this;
    }

    /**
     * @return int
     */
    public function getExpirationYear()
    {
        return $this->expirationYear;
    }

    /**
     * @param int $expirationYear
     * @return $this
     */
    public function setExpirationYear($expirationYear)
    {
        $this->expirationYear = $expirationYear;
        return $this;
    }

    /**
     * @return int
     */
    public function getExpirationMonth()
    {
        return $this->expirationMonth;
    }

    /**
     * @param int $expirationMonth
     * @return $this
     */
    public function setExpirationMonth($expirationMonth)
    {
        $this->expirationMonth = $expirationMonth;
        return $this;
    }

    /**
     * @return int
     */
    public function getSecurityCode()
    {
        return $this->securityCode;
    }

    /**
     * @param int $securityCode
     * @return $this
     */
    public function setSecurityCode($securityCode)
    {
        $this->securityCode = $securityCode;
        return $this;
    }
}