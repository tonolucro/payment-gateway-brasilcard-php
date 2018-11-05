<?php
namespace Tonolucro\Payment\Gateway\Brasilcard\Model\Request;

use Tonolucro\Payment\Gateway\Brasilcard\Model\Model;

class Sale extends Model
{
    /**
     * @var string
     */
    protected $merchantOrderId;
    /**
     * @var Payment
     */
    protected $payment;

    /**
     * @return string
     */
    public function getMerchantOrderId()
    {
        return $this->merchantOrderId;
    }

    /**
     * @param string $merchantOrderId
     * @return $this
     */
    public function setMerchantOrderId($merchantOrderId)
    {
        $this->merchantOrderId = $merchantOrderId;
        return $this;
    }

    /**
     * @return Payment
     */
    public function getPayment()
    {
        return $this->payment;
    }

    /**
     * @param Payment $payment
     * @return $this
     */
    public function setPayment($payment)
    {
        $this->payment = $payment;
        return $this;
    }

}