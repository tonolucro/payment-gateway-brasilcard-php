<?php
namespace Tonolucro\Payment\Gateway\Brasilcard\Http\Environment;

class Production implements EnvironmentInterface
{
    const ID = "production";
    const BASE_URI = 'http://servicos.brasilcard.com/Transacao/ApiEcommerce/v1/';

    /**
     * @return string
     */
    function getId()
    {
        return self::ID;
    }

    /**
     * @return string
     */
    function getApiUri()
    {
        return self::BASE_URI;
    }
}