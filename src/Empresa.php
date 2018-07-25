<?php

namespace Leandrofreires\RemessaBradesco;

use Exception;


/**
 * Class Empresa
 * @package Leandrofreires\RemessaBradesco
 */
class Empresa
{
    /**
     * @var
     */
    private $agencia;

    /**
     * @var
     */
    private $agencia_digito;

    /**
     * @var
     */
    private $conta;

    /**
     * @var
     */
    private $conta_digito;

    /**
     * @var
     */
    private $carteira;

    /**
     * @var
     */
    private $razao_social;

    /**
     * @var
     */
    private $codigo_empresa;

    /**
     * @return mixed
     */
    public function getAgencia()
    {
        return $this->agencia;
    }

    /**
     * @param mixed $agencia
     * @return mixed
     * @throws Exception
     */
    public function setAgencia($agencia)
    {
        if (!is_numeric($agencia))
            throw new Exception('O numero da agencia da empresa deve ser um numero valido');
        if (mb_strlen($agencia) > 5)
            throw new Exception('A o numero da agencia da empresa deve ter 5 numeros');
        $this->agencia = str_pad($agencia,5,0,STR_PAD_LEFT);
    }

    /**
     * @return mixed
     */
    public function getAgenciaDigito()
    {
        return $this->agencia_digito;
    }

    /**
     * @param mixed $agencia_digito
     * @return mixed
     * @throws Exception
     */
    public function setAgenciaDigito($agencia_digito)
    {
        if (!is_numeric($agencia_digito))
            throw new Exception('O numero do digito da empresa deve ser um numero valido');
        if (mb_strlen($agencia_digito) !== 1)
            throw new Exception('A o numero do digito da agencia deve ter 1 numero');
        $this->agencia_digito = $agencia_digito;
    }

    /**
     * @return mixed
     */
    public function getConta()
    {
        return $this->conta;
    }

    /**
     * @param mixed $conta
     * @return mixed
     * @throws Exception
     */
    public function setConta($conta)
    {
        if (!is_numeric($conta))
            throw new Exception('O numero da conta da empresa deve ser um numero valido');
        if (mb_strlen($conta) > 7)
            throw new Exception('A o numero da conta da empresa deve ter 7 numeros');
        $this->conta = str_pad($conta,7,0,STR_PAD_LEFT);
    }

    /**
     * @return mixed
     */
    public function getContaDigito()
    {
        return $this->conta_digito;
    }

    /**
     * @param mixed $conta_digito
     * @return Empresa
     * @throws Exception
     */
    public function setContaDigito($conta_digito)
    {
        if (!is_numeric($conta_digito))
            throw new Exception('O numero do digito da conta da empresa deve ser um numero valido');
        if (mb_strlen($conta_digito) !== 1)
            throw new Exception('A o numero do digito da conta da empresa deve ter 7 numeros');
        $this->conta_digito = $conta_digito;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCarteira()
    {
        return $this->carteira;
    }

    /**
     * @param mixed $carteira
     * @return mixed
     * @throws Exception
     */
    public function setCarteira($carteira)
    {
        if (!is_numeric($carteira))
            throw new Exception('O numero da carteira da empresa deve ser um numero valido');
        if (mb_strlen($carteira) > 3)
            throw new Exception('A o numero da carteira da conta da empresa deve ter 3 numeros');
        $carteira = str_pad($carteira,3,0,STR_PAD_LEFT);
        $this->carteira = $carteira;
    }

    /**
     * @return mixed
     */
    public function getRazaoSocial()
    {
        return $this->razao_social;
    }

    /**
     * @param mixed $razao_social
     * @return mixed
     * @throws Exception
     */
    public function setRazaoSocial($razao_social)
    {
        if (!is_string($razao_social))
            throw new Exception('O nome da empresa deve ser um nome valido');
        if (mb_strlen($razao_social) > 30)
            throw new Exception('A o numero da carteira da conta da empresa deve ter 2 numeros');
        $this->razao_social = str_pad($razao_social, 30);
    }

    /**
     * @return mixed
     */
    public function getCodigoEmpresa()
    {
        return $this->codigo_empresa;
    }

    /**
     * @param mixed $codigo_empresa
     * @return mixed
     * @throws Exception
     */
    public function setCodigoEmpresa($codigo_empresa)
    {
        if (!is_numeric($codigo_empresa))
            throw new Exception('O codigo da empresa deve ser um nome valido');
        if (mb_strlen($codigo_empresa) > 20)
            throw new Exception('A o Codigo da  empresa deve ter 20 numeros geralmente e o acessorio escritural');

        $this->codigo_empresa = str_pad($codigo_empresa, 20, 0,STR_PAD_LEFT);
    }

    /**
     * Empresa constructor.
     * @param $agencia
     * @param $agencia_digito
     * @param $conta
     * @param $conta_digito
     * @param $razao_social
     * @param $codigo_empresa
     * @throws Exception
     */
    public function __construct($agencia, $agencia_digito, $conta, $conta_digito, $razao_social, $codigo_empresa, $carteira)
    {
        $this->setAgencia($agencia);
        $this->setAgenciaDigito($agencia_digito);
        $this->setConta($conta);
        $this->setContaDigito($conta_digito);
        $this->setRazaoSocial($razao_social);
        $this->setCodigoEmpresa($codigo_empresa);
        $this->setCarteira($carteira);
    }


}