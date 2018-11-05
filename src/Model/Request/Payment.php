<?php
namespace Tonolucro\Payment\Gateway\Brasilcard\Model\Request;

use Tonolucro\Payment\Gateway\Brasilcard\Model\Model;

class Payment extends Model
{
    /**
     * @var float
     */
    protected $amount;
    /**
     * @var int
     */
    protected $installments;
    /**
     * @var string
     */
    protected $NSU;
    /**
     * @var CreditCard
     */
    protected $creditCard;

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @return int
     */
    public function getInstallments()
    {
        return $this->installments;
    }

    /**
     * @param int $installments
     * @return $this
     */
    public function setInstallments($installments)
    {
        $this->installments = $installments;
        return $this;
    }

    /**
     * @return string
     */
    public function getNSU()
    {
        return $this->NSU;
    }

    /**
     * @param string $NSU
     * @return $this
     */
    public function setNSU($NSU)
    {
        $this->NSU = $NSU;
        return $this;
    }

    /**
     * @return CreditCard
     */
    public function getCreditCard()
    {
        return $this->creditCard;
    }

    /**
     * @param CreditCard $creditCard
     * @return $this
     */
    public function setCreditCard($creditCard)
    {
        $this->creditCard = $creditCard;
        return $this;
    }

}