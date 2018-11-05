<?php
namespace Tonolucro\Payment\Gateway\Brasilcard\Resource;

use Tonolucro\Payment\Gateway\Brasilcard\Http\Client;

abstract class Resource
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * Resource constructor.
     * @param Client $client
     * @return $this
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
        return $this;
    }

    /**
     * @return Client
     */
    public function getClient()
    {
        return $this->client;
    }

}