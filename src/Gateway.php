<?php
namespace Tonolucro\Payment\Gateway\Brasilcard;


use Tonolucro\Payment\Gateway\Brasilcard\Http\Auth;
use Tonolucro\Payment\Gateway\Brasilcard\Http\Client;
use Tonolucro\Payment\Gateway\Brasilcard\Http\Environment\EnvironmentInterface;
use Tonolucro\Payment\Gateway\Brasilcard\Http\Environment\Production;
use Tonolucro\Payment\Gateway\Brasilcard\Resource\SaleResource;

class Gateway
{
    /**
     * @var Auth
     */
    protected $auth;
    /**
     * @var EnvironmentInterface
     */
    protected $environment;
    /**
     * @var Client
     */
    protected $client = null;
    /**
     * @var SaleResource
     */
    protected $sale = null;

    /**
     * Merchant constructor.
     * @param Auth $auth
     * @param EnvironmentInterface $environment
     * @return $this
     */
    public function __construct(Auth $auth, EnvironmentInterface $environment = null)
    {
        $this->auth = $auth;
        $this->environment = $environment==null?new Production():$environment;
        return $this;
    }

    /**
     * @return Client
     */
    private function getClient(){
        if($this->client == null){
            $this->client = new Client($this->auth, $this->environment);
        }
        return $this->client;
    }

    /**
     * @return SaleResource
     */
    public function sale(){
        if( $this->sale == null ){
            $this->sale = new SaleResource( $this->getClient() );
        }
        return $this->sale;
    }
}