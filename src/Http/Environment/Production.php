<?php
namespace Tonolucro\Payment\Gateway\Brasilcard\Http\Environment;

class Production implements EnvironmentInterface
{
    const ID = "production";
    const BASE_URI = 'https://www.brasilcard.com.br/docker/ecommerce/';

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