<?php
namespace Tonolucro\Payment\Gateway\Brasilcard\Resource;

use Tonolucro\Payment\Gateway\Brasilcard\Helper\Exception\InvalidArgumentException;
use Tonolucro\Payment\Gateway\Brasilcard\Helper\Validator;
use Tonolucro\Payment\Gateway\Brasilcard\Model\Request\Sale;
use Tonolucro\Payment\Gateway\Brasilcard\Model\Response\Transaction;

class SaleResource extends Resource
{

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


}