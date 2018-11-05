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

namespace Tonolucro\Payment\Gateway\Brasilcard\Http;

class Auth
{
    /**
     * @var string
     */
    protected $merchantId;
    /**
     * @var string
     */
    protected $merchantKey;

    /**
     * Auth constructor.
     * @param string $merchantId
     * @param string $merchantKey
     * @return $this
     */
    public function __construct($merchantId, $merchantKey)
    {
        $this->merchantId = $merchantId;
        $this->merchantKey = $merchantKey;
        return $this;
    }

    /**
     * @return string
     */
    public function getMerchantId()
    {
        return $this->merchantId;
    }

    /**
     * @param string $merchantId
     * @return $this
     */
    public function setMerchantId($merchantId)
    {
        $this->merchantId = $merchantId;
        return $this;
    }

    /**
     * @return string
     */
    public function getMerchantKey()
    {
        return $this->merchantKey;
    }

    /**
     * @param string $merchantKey
     * @return $this
     */
    public function setMerchantKey($merchantKey)
    {
        $this->merchantKey = $merchantKey;
        return $this;
    }
}