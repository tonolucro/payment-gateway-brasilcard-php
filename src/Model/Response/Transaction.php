<?php
namespace Tonolucro\Payment\Gateway\Brasilcard\Model\Response;

use Tonolucro\Payment\Gateway\Brasilcard\Model\Model;

class Transaction extends Model
{
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
    public function getSuccess()
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

}