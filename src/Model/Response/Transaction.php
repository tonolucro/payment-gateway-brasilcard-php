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

namespace Tonolucro\Payment\Gateway\Brasilcard\Model\Response;

use Tonolucro\Payment\Gateway\Brasilcard\Model\Model;
use Tonolucro\Payment\Gateway\Brasilcard\Model\Request\Payment;
use Tonolucro\Payment\Gateway\Brasilcard\Service\SaleService;

class Transaction extends Model
{
    /**
     * Transaction constructor.
     * @param array|null $data
     */
    public function __construct(array $data = null)
    {
        parent::__construct($data);

        $this->setSuccess(
            (new SaleService())->transactionSuccess( $this->getReturnCode() )
        );

        return $this;
    }

    /**
     * @var string
     */
    protected $paymentId;
    /**
     * @var string
     */
    protected $authorizationCode;
    /**
     * @var string
     */
    protected $returnCode;
    /**
     * @var string
     */
    protected $returnMessage;
    /**
     * @var string
     */
    protected $status;
    /**
     * @var bool
     */
    protected $success;
    /**
     * @var string
     */
    protected $localTransactionDateTime;
    /**
     * @var Payment
     */
    protected $payment;

    /**
     * @return string
     */
    public function getPaymentId()
    {
        return $this->paymentId;
    }

    /**
     * @param string $paymentId
     * @return $this
     */
    public function setPaymentId($paymentId)
    {
        $this->paymentId = $paymentId;
        return $this;
    }

    /**
     * @return string
     */
    public function getAuthorizationCode()
    {
        return $this->authorizationCode;
    }

    /**
     * @param string $authorizationCode
     * @return $this
     */
    public function setAuthorizationCode($authorizationCode)
    {
        $this->authorizationCode = $authorizationCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getReturnCode()
    {
        return $this->returnCode;
    }

    /**
     * @param string $returnCode
     * @return $this
     */
    public function setReturnCode($returnCode)
    {
        $this->returnCode = $returnCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getReturnMessage()
    {
        return $this->returnMessage;
    }

    /**
     * @param string $returnMessage
     * @return $this
     */
    public function setReturnMessage($returnMessage)
    {
        $this->returnMessage = $returnMessage;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return bool
     */
    public function isSuccess()
    {
        return $this->success;
    }

    /**
     * @param bool $success
     * @return $this
     */
    public function setSuccess($success)
    {
        $this->success = $success;
        return $this;
    }

    /**
     * @return string
     */
    public function getLocalTransactionDateTime()
    {
        return $this->localTransactionDateTime;
    }

    /**
     * @param string $localTransactionDateTime
     * @return $this
     */
    public function setLocalTransactionDateTime($localTransactionDateTime)
    {
        $this->localTransactionDateTime = $localTransactionDateTime;
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
        if( is_array($payment) ){
            $payment = new Payment($payment);
        }
        $this->payment = $payment;
        return $this;
    }

}