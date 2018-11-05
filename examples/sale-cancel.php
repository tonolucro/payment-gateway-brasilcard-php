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
     * Transação
     */
    /*$transaction = $manager->sale()->cancelOrderId( 123456789 );
    var_dump($transaction);*/

    $transaction = $manager->sale()->cancelPaymentId( '79f15ba5-c62e-bf38-e053-a601a8c0a352' );
    var_dump($transaction);

    $transaction = $manager->sale()->getOrderId( 1234567891 );
    print_r($transaction->jsonSerialize());

}catch (Exception $ex){
    die($ex->getMessage());
}
