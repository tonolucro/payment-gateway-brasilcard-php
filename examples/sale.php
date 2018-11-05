<?php
require_once __DIR__.'/../vendor/autoload.php';

use \Tonolucro\Payment\Gateway\Brasilcard\Gateway;
use \Tonolucro\Payment\Gateway\Brasilcard\Http\Auth;
use \Tonolucro\Payment\Gateway\Brasilcard\Http\Environment\Production;
use \Tonolucro\Payment\Gateway\Brasilcard\Model\Request\CreditCard;
use \Tonolucro\Payment\Gateway\Brasilcard\Model\Request\Payment;
use \Tonolucro\Payment\Gateway\Brasilcard\Model\Request\Sale;

try{

    $dotenv = new \Dotenv\Dotenv(__DIR__);
    $dotenv->load();
    $merchantId = getenv('merchantId');
    $merchantKey = getenv('merchantKey');

    $manager = new Gateway(
        new Auth($merchantId, $merchantKey),
        new Production()
    );

    $creditCard = (new CreditCard())
        ->setCardNumber('')
        ->setExpirationYear('')
        ->setExpirationMonth('')
        ->setSecurityCode('')
        ->setHolder('');

    $payment = (new Payment())
        ->setCreditCard( $creditCard )
        ->setAmount( 0 )
        ->setInstallments( 1 )
        ->setNSU(time());

    $sale = (new Sale())
        ->setPayment( $payment )
        ->setMerchantOrderId( 0 );

    print_r($sale->jsonSerialize());

    $transaction = $manager->sale()->create( $sale );

    print_r($transaction->jsonSerialize());

}catch (Exception $ex){
    die($ex->getMessage());
}
