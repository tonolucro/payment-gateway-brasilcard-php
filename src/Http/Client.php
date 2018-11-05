<?php
namespace Tonolucro\Payment\Gateway\Brasilcard\Http;

use GuzzleHttp\Handler\CurlHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\RequestOptions;
use Tonolucro\Payment\Gateway\Brasilcard\Http\Environment\EnvironmentInterface;

class Client
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
     * @var \GuzzleHttp\Client
     */
    protected $adapter = null;

    /**
     * @return \GuzzleHttp\Client
     */
    public function getAdapter(){
        if( $this->adapter == null ){
            $this->adapter = new \GuzzleHttp\Client([
                'base_uri' => $this->environment->getApiUri(),
                'handler' => HandlerStack::create( new CurlHandler() )
            ]);
        }
        return $this->adapter;
    }

    /**
     * Client constructor.
     * @param Auth $auth
     * @param EnvironmentInterface $environment
     */
    public function __construct(Auth $auth, EnvironmentInterface $environment)
    {
        $this->auth = $auth;
        $this->environment = $environment;
        return $this;
    }

    protected function getHeaders(){
        return [
            'Accept'     => 'application/json',
            'MerchantId'      => $this->auth->getMerchantId(),
            'MerchantKey'      => $this->auth->getMerchantKey(),
        ];
    }

    /**
     * @param string $uri
     * @param array $query
     * @return array
     * @throws \Exception
     */
    public function get($uri, array $query = []){
        try {

            $response =  $this->getAdapter()->get(
                $this->environment->getApiUri().$uri,
                [
                    RequestOptions::HEADERS => $this->getHeaders(),
                    RequestOptions::QUERY => $query,
                    RequestOptions::DEBUG => false
                ]
            );

            if($response->getReasonPhrase()=="OK"){
                return json_decode($response->getBody()->getContents(), true);
            }

            throw new \Exception("");

        }catch (\Exception $exception){
            throw $exception;
        }
    }

    /**
     * @param $uri
     * @param array $body
     * @return mixed
     * @throws \Exception
     */
    public function put($uri, array $body){
        try {
            $response =  $this->getAdapter()->put(
                $this->environment->getApiUri().$uri,
                [
                    RequestOptions::HEADERS => $this->getHeaders(),
                    RequestOptions::JSON => $body,
                    RequestOptions::DEBUG => false
                ]
            );

            if($response->getReasonPhrase()=="OK"){
                return json_decode($response->getBody()->getContents(), true);
            }

            throw new \Exception("");

        }catch (\Exception $exception){
            throw $exception;
        }
    }

    /**
     * @param $uri
     * @param array $body
     * @return mixed
     * @throws \Exception
     */
    public function post($uri, array $body){
        try {
            $response =  $this->getAdapter()->post(
                $this->environment->getApiUri().$uri,
                [
                    RequestOptions::HEADERS => $this->getHeaders(),
                    RequestOptions::JSON => $body,
                    RequestOptions::DEBUG => true
                ]
            );

            if($response->getReasonPhrase()=="OK"){
                return json_decode($response->getBody()->getContents(), true);
            }

            throw new \Exception("");

        }catch (\Exception $exception){
            throw $exception;
        }
    }

}