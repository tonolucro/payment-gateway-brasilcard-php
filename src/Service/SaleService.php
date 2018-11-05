<?php
namespace Tonolucro\Payment\Gateway\Brasilcard\Service;

class SaleService
{
    /**
     * SaleService constructor.
     * @return $this
     */
    public function __construct()
    {
        return $this;
    }

    /**
     * @param $code
     * @return bool
     */
    public function transactionSuccess($code){
        $item = $this->getCode($code);
        if( is_array($item) ){
            return (bool)$item['success'];
        }
        return false;
    }

    /**
     * @param $code
     * @return mixed|null
     */
    public function getCode($code){
        $codes = $this->getCodes();
        foreach ($codes as $i => $value) {
            if( $value['code'] == $code ){
                return $value;
            }
        }
        return null;
    }
    /**
     * @return array
     */
    public function getCodes(){
        return [
            ['code'=>'000', 'success'=>true, 'message'=>'TRANSAÇÃO EFETUADA COM SUCESSO'],
            ['code'=>'001', 'success'=>false, 'message'=>'TRANSAÇÃO PENDENTE'],
            ['code'=>'002', 'success'=>false, 'message'=>'TRANSAÇÃO JÁ ESTORNADA'],
            ['code'=>'010', 'success'=>false, 'message'=>'MERCHANT_ID DO ESTEBALECIMENTO É INVALIDO'],
            ['code'=>'011', 'success'=>false, 'message'=>'TRANSAÇÃO DE VENDA JÁ EFETUADA'],
            ['code'=>'019', 'success'=>false, 'message'=>'TRANSAÇÃO NÃO LOCALIZADA'],
            ['code'=>'020', 'success'=>false, 'message'=>'O CARTAO É INVÁLIDO'],
            ['code'=>'021', 'success'=>false, 'message'=>'TIPO DO CARTÃO É INVALIDO'],
            ['code'=>'022', 'success'=>false, 'message'=>'O CARTÃO DO CLIENTE É INVÁLIDO'],
            ['code'=>'025', 'success'=>false, 'message'=>'NÚMERO DE PARCELAS MAIOR QUE O PERMITIDO'],
            ['code'=>'029', 'success'=>false, 'message'=>'DIA INVÁLIDO PARA COMPRA'],
            ['code'=>'030', 'success'=>false, 'message'=>'CÓDIGO DO ESTABELECIMENTO INVÁLIDO'],
            ['code'=>'031', 'success'=>false, 'message'=>'CÓDIGO DO ESTABELECIMENTO BLOQUEADO'],
            ['code'=>'032', 'success'=>false, 'message'=>'CÓDIGO DO ESTABELECMENT EM ANALISE'],
            ['code'=>'033', 'success'=>false, 'message'=>'CÓDIGO DO ESTABELECIMENTO SUSPENSO'],
            ['code'=>'035', 'success'=>false, 'message'=>'CÓDIGO DO ESTABELECIMENTO CANCELADO'],
            ['code'=>'036', 'success'=>false, 'message'=>'ESTORNO NÃO PERMITIDO PARA O ESTABELECIMENTO'],
            ['code'=>'037', 'success'=>false, 'message'=>'ESTORNO DA TRANSAÇÃO NÃO PERMITIDO'],
            ['code'=>'038', 'success'=>false, 'message'=>'VENDA ANTECIPADA, NÃO PODE SER ESTORNADA'],
            ['code'=>'050', 'success'=>false, 'message'=>'VALOR INVÁLIDO PARA COMPRA'],
            ['code'=>'053', 'success'=>false, 'message'=>'NÚMERO DE PARCELAS INVÁLIDO'],
            ['code'=>'041', 'success'=>false, 'message'=>'O CARTÃO NÃO ESTA AUTORIZADO PARA PARCELAMENTO'],
            ['code'=>'047', 'success'=>false, 'message'=>'DATA DE EXPRIRAÇÃO DO CARTÃO E INVÁLIDA'],
            ['code'=>'049', 'success'=>false, 'message'=>'CÓDIGO DE VERIFICAÇÃO DO CARTÃO É INVÁLIDO'],
            ['code'=>'055', 'success'=>false, 'message'=>'CÓDIGO DO MUNICÍPIO NÃO AUTORIZADO PARA O CARTÃO'],
            ['code'=>'062', 'success'=>false, 'message'=>'O CARTÃO ESTÁ BLOQUEADO'],
            ['code'=>'063', 'success'=>false, 'message'=>'O CARTÃO ESTÁ INÁTIVO'],
            ['code'=>'064', 'success'=>false, 'message'=>'O CARTÃO ESTÁ CANCELADO'],
            ['code'=>'065', 'success'=>false, 'message'=>'O CARTÃO ESTÁ EM ANALISE'],
            ['code'=>'066', 'success'=>false, 'message'=>'O CARTÃO DO TITULAR ESTÁ BLOQUEADO'],
            ['code'=>'067', 'success'=>false, 'message'=>'O CARTÃO FOI EXTRAVIADO'],
            ['code'=>'068', 'success'=>false, 'message'=>'O SALDO DO CARTÃO É INSUFICIENTE'],
            ['code'=>'069', 'success'=>false, 'message'=>'CARTÃO DO TITULAR INVÁLIDO'],
            ['code'=>'070', 'success'=>false, 'message'=>'ESTABELECIMENTO NÃO AUTORIZADO PARA COMPRA'],
            ['code'=>'071', 'success'=>false, 'message'=>'ESTABELECIMENTO BLOQUEADO PARA O TIPO DO CARTÃO'],
            ['code'=>'074', 'success'=>false, 'message'=>'O CLIENTE ESTÁ BLOQUEADO'],
            ['code'=>'075', 'success'=>false, 'message'=>'O CLIENTE ESTÁ EM ANALISE'],
            ['code'=>'076', 'success'=>false, 'message'=>'O CLIENTE ESTÁ INÁTIVO'],
            ['code'=>'077', 'success'=>false, 'message'=>'O CLIENTE ESTA CANCELADO'],
            ['code'=>'078', 'success'=>false, 'message'=>'CLIENTE EM SINISTRO'],
            ['code'=>'090', 'success'=>false, 'message'=>'ERRO GRAVE, CONTATE A TI DA BRASILCARD'],
            ['code'=>'095', 'success'=>false, 'message'=>'NÚMERO DE PARCELAS É INVÁLIDA'],
            ['code'=>'500', 'success'=>false, 'message'=>'ERRO NÃO TRATADO'],
            ['code'=>'964', 'success'=>false, 'message'=>'QUANTIDADE DE CHAVES INVÁLIDA'],
            ['code'=>'965', 'success'=>false, 'message'=>'FALTANDO PARÂMETROS'],
            ['code'=>'966', 'success'=>false, 'message'=>'FORMATO DO DADO INVÁLIDO'],
            ['code'=>'967', 'success'=>false, 'message'=>'FALTANDO PARÂMETROS DO CABEÇALHO'],
            ['code'=>'968', 'success'=>false, 'message'=>'MERCHANT_KEY É INVÁLIDO'],
            ['code'=>'969', 'success'=>false, 'message'=>'MERCHANT_ID É INVÁLIDO'],
        ];
    }
}