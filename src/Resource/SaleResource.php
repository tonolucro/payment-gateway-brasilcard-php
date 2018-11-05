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

namespace Tonolucro\Payment\Gateway\Brasilcard\Resource;

use Tonolucro\Payment\Gateway\Brasilcard\Model\Request\Sale;
use Tonolucro\Payment\Gateway\Brasilcard\Model\Response\Transaction;

class SaleResource extends Resource
{

    /**
     * @param $merchantOrderId
     * @return Transaction
     * @throws \Exception
     */
    public function getOrderId($merchantOrderId){
        return $this->get(sprintf(
            'Sale/%s/MerchantOrderId',
            $merchantOrderId
        ));
    }

    /**
     * @param $paymentId
     * @return Transaction
     * @throws \Exception
     */
    public function getPaymentId($paymentId){
        return $this->get(sprintf(
            'Sale/%s/PaymentId',
            $paymentId
        ));
    }

    /**
     * @param $uri
     * @return Transaction
     * @throws \Exception
     */
    private function get($uri){
        try
        {
            $result = $this->getClient()->get($uri);

            return new Transaction($result);

        }catch (\Exception $exception){
            throw $exception;
        }
    }

    /**
     * @param Sale $sale
     * @return Transaction
     * @throws \Exception
     */
    public function create(Sale $sale){
        try
        {
            $result = $this->getClient()->post('Sale',
                $sale->jsonSerialize()
            );

            return new Transaction($result['Payment']);

        }catch (\Exception $exception){
            throw $exception;
        }
    }

    /**
     * @param $merchantOrderId
     * @return bool
     * @throws \Exception
     */
    public function cancelOrderId($merchantOrderId){
        return $this->cancel(['MerchantOrderId'=>$merchantOrderId]);
    }

    /**
     * @param $paymentId
     * @return bool
     * @throws \Exception
     */
    public function cancelPaymentId($paymentId){
        return $this->cancel(['PaymentId'=>$paymentId]);
    }

    /**
     * @param array $body
     * @return bool
     * @throws \Exception
     */
    protected function cancel(array $body){
        try
        {
            $result = $this->getClient()->put('Sale',
                $body
            );

            return true;

        }catch (\Exception $exception){
            throw $exception;
        }
    }

}