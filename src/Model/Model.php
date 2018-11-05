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

namespace Tonolucro\Payment\Gateway\Brasilcard\Model;

use ForceUTF8\Encoding;

abstract class Model implements \JsonSerializable
{
    /**
     * Entity constructor.
     */
    public function __construct(array $data=null)
    {
        if( is_array($data) ){
            foreach ($data as $key => $value) {
                $this->__set($key, $value);
            }
        }
        return $this;
    }

    /**
     * @param mixed $name
     * @param mixed $value
     * @return void
     */
    public function __set($name, $value)
    {
        $aux = explode("_", $name);
        $nameMethod = "";
        for ($i = 0; $i < count($aux); $i++){
            $nameMethod = $nameMethod."".ucfirst( $aux[$i] );
        }
        $setMethod = 'set' . $nameMethod;
        if (method_exists($this, $setMethod)) {
            $this->$setMethod($value);
        } else {
            if(property_exists($this, $name)){
                $this->$name = $value;
            }
        }
    }

    /**
     * @return array|mixed
     * @throws \Exception
     */
    function jsonSerialize()
    {
        $getter_names = get_class_methods(get_class($this));
        $gettable_attributes = array();
        foreach ($getter_names as $key => $value) {
            if(preg_match('/^get/', $value)) {

                $k = substr($value, 3, strlen($value));
                $item = $this->$value();

                if( is_object($item) ){
                    if( method_exists($item, 'jsonSerialize') ){
                        $item = $item->jsonSerialize();
                    }
                }
                $gettable_attributes[$k] = Encoding::fixUTF8($item);
            }
        }
        return $gettable_attributes;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function __toString()
    {
        return \json_encode($this->jsonSerialize());
    }

    /**
     * @param $form
     * @return array
     */
    public function arrayEncodeUtf8($form){
        if( is_array( $form ) ){
            foreach ($form as $key => $value) {
                if( is_array( $value )){
                    foreach ($value as $key2 => $value2) {
                        $value[$key2] = is_string($value2)?Encoding::fixUTF8($value2):$value2;
                    }
                    $form[$key] = $value;
                }else{
                    $form[$key] = is_string($value)?Encoding::fixUTF8($value):$value;
                }
            }
        }
        return $form;
    }
}