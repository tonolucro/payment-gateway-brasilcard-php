<?php
require_once __DIR__.'/../vendor/autoload.php';

use \Tonolucro\Payment\Gateway\Brasilcard\Gateway;
use \Tonolucro\Payment\Gateway\Brasilcard\Http\Auth;
use \Tonolucro\Payment\Gateway\Brasilcard\Http\Environment\Production;
use \Tonolucro\Payment\Gateway\Brasilcard\Model\Request\CreditCard;
use \Tonolucro\Payment\Gateway\Brasilcard\Model\Request\Payment;
use \Tonolucro\Payment\Gateway\Brasilcard\Model\Request\Sale;

try{

    /**
     *
     */
    $dotenv = new \Dotenv\Dotenv(__DIR__); $dotenv->load();

    $merchantId = getenv('merchantId');
    $merchantKey = getenv('merchantKey');
    $cardNumber = getenv('cardNumber');
    $expirationYear = getenv('expirationYear');
    $expirationMonth = getenv('expirationMonth');
    $securityCode = getenv('securityCode');
    $holder = getenv('holder');

    $manager = new Gateway(
        new Auth($merchantId, $merchantKey),
        new Production()
    );

    $creditCard = (new CreditCard())
        ->setCardNumber($cardNumber)
        ->setExpirationYear($expirationYear)
        ->setExpirationMonth($expirationMonth)
        ->setSecurityCode($securityCode)
        ->setHolder($holder);

    $payment = (new Payment())
        ->setCreditCard( $creditCard )
        ->setAmount( 1.23 )
        ->setInstallments( 1 )
        ->setNSU(time());

    $sale = (new Sale())
        ->setPayment( $payment )
        ->setMerchantOrderId( 12345678 );

    print_r($sale->jsonSerialize());

    $transaction = $manager->sale()->create( $sale );

    print_r($transaction->jsonSerialize());

}catch (Exception $ex){
    die($ex->getMessage());
}
