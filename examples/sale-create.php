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

require_once __DIR__.'/../vendor/autoload.php';

use \Tonolucro\Payment\Gateway\Brasilcard\Gateway;
use \Tonolucro\Payment\Gateway\Brasilcard\Http\Auth;
use \Tonolucro\Payment\Gateway\Brasilcard\Http\Environment\Production;
use \Tonolucro\Payment\Gateway\Brasilcard\Model\Request\CreditCard;
use \Tonolucro\Payment\Gateway\Brasilcard\Model\Request\Payment;
use \Tonolucro\Payment\Gateway\Brasilcard\Model\Request\Sale;

try{

    /**
     * Chaves e informações privadas
     */
    $dotenv = new \Dotenv\Dotenv(__DIR__); $dotenv->load();

    $merchantId = getenv('merchantId');
    $merchantKey = getenv('merchantKey');
    $cardNumber = getenv('cardNumber');
    $expirationYear = getenv('expirationYear');
    $expirationMonth = getenv('expirationMonth');
    $securityCode = getenv('securityCode');
    $holder = getenv('holder');


    /**
     * Instância do manager do Gatway
     */
    $manager = new Gateway(
        new Auth($merchantId, $merchantKey),
        new Production()
    );

    /**
     * Informações da venda
     */
    $creditCard = (new CreditCard())
        ->setCardNumber($cardNumber)
        ->setExpirationYear($expirationYear)
        ->setExpirationMonth($expirationMonth)
        ->setSecurityCode($securityCode)
        ->setHolder($holder);

    $payment = (new Payment())
        ->setCreditCard( $creditCard )
        ->setAmount( 1.25 )
        ->setInstallments( 1 )
        ->setNSU(time());

    $sale = (new Sale())
        ->setPayment( $payment )
        ->setMerchantOrderId( 1234567891 );

    /**
     * Transação
     */
    $transaction = $manager->sale()->create( $sale );

    /**
     * Resultado
     */
    print_r($transaction->jsonSerialize());

    if( $transaction->isSuccess() ){
        die("OK");
    }else{
        throw new Exception("Oh my good!");
    }

}catch (Exception $ex){
    die($ex->getMessage());
}
