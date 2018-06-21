<?php
namespace Leandrofreires\RemessaBradesco;

use Exception;

class DetalhesOpcionais extends Funcoes
{
    //001 a 001 Tipo Registro tamanho 001
    private $tiporegistro = '2';

    //002 a 081 Mensagem tamanho 080
    private $mensagem1 ;

    //082 a 161 Mensagem tamanho 080
    private $mensagem2 ;

    //162 a 241 Mensagem tamanho 080
    private $mensagem3 ;

    //242 a 321 Mensagem tamanho 080
    private $mensagem4 ;

    //322 a 327 Data limite para concessão de Desconto 2  tamanho 006
    private $dataLimiteDesconto2;

    //328 a 340 Valor Desconto 2  tamanho 013
    private $valorDesconto2;

    //341 a 346 Data limite para concessão de Desconto 3  tamanho 006
    private $dataLimiteDesconto3;

    //347 a 359 Valor Desconto 3  tamanho 013
    private $valorDesconto3;

    //360 a 366 reserva tamanho 007
    private $reserva;

    //367 a 369 carteira tamanho 3 Nº da Carteira
    private $carteira;

    //370 a 374 agencia tamanho 5 Código da Agência Beneficiário
    private $agencia;

    //375 a 381 Conta Corrente tamanho 7 Nº da Conta Corrente
    private $contaCorrente;

    //382 a 382  Dígito C/C
    private $digitoCC;

    //383 a 393 Nosso numero tamanho 11
    private $nossoNumero;

    //394 a 394 digito nosso numero tamanho 1
    private $dacNossoNumero;

    //395 a 400 Nº Seqüencial de Registro tamanho 6
    private $numeroSequenciaRegistro;

    /**
     * @return int
     */
    public function getTiporegistro()
    {
        return $this->tiporegistro;
    }

    /**
     * @return mixed
     */
    public function getMensagem1()
    {
        return $this->mensagem1;
    }

    /**
     * @param mixed $mensagem1
     * @throws \Exception
     */
    public function setMensagem1($mensagem1)
    {
        if (!is_string($mensagem1))
            throw new Exception('A mensagem 1 tem de ser passada como string');
        if (mb_strlen($mensagem1) > 80)
            throw new Exception('Tamanho da mensagem 1 excede os 80 caracteres');
        $this->mensagem1 = $this->montarBranco($mensagem1,80);
    }

    /**
     * @return mixed
     */
    public function getMensagem2()
    {
        return $this->mensagem2;
    }

    /**
     * @param mixed $mensagem2
     * @throws \Exception
     */
    public function setMensagem2($mensagem2)
    {
        if (!is_string($mensagem2))
            throw new Exception('A mensagem 2 tem de ser passada como string');
        if (mb_strlen($mensagem2) > 80)
            throw new Exception('Tamanho da mensagem 2 excede os 80 caracteres');
        $this->mensagem2 = $this->montarBranco($mensagem2,80);
    }

    /**
     * @return mixed
     */
    public function getMensagem3()
    {
        return $this->mensagem3;
    }

    /**
     * @param mixed $mensagem3
     * @throws \Exception
     */
    public function setMensagem3($mensagem3)
    {
        if (!is_string($mensagem3))
            throw new Exception('A mensagem 3 tem de ser passada como string');
        if (mb_strlen($mensagem3) > 80)
            throw new Exception('Tamanho da mensagem 3 excede os 80 caracteres');
        $this->mensagem3 = $this->montarBranco($mensagem3,80);
    }

    /**
     * @return mixed
     */
    public function getMensagem4()
    {
        return $this->mensagem4;
    }

    /**
     * @param mixed $mensagem4
     * @throws \Exception
     */
    public function setMensagem4($mensagem4)
    {
        if (!is_string($mensagem4))
            throw new Exception('A mensagem tem de ser passada como string');
        if (mb_strlen($mensagem4) > 80)
            throw new Exception('Tamanho da mensagem 4 excede os 80 caracteres');
        $this->mensagem4 = $this->montarBranco($mensagem4,80);
    }

    /**
     * @return mixed
     */
    public function getDataLimiteDesconto2()
    {
        return $this->dataLimiteDesconto2;
    }

    /**
     * @param mixed $dataLimiteDesconto2
     * @throws \Exception
     */
    public function setDataLimiteDesconto2($dataLimiteDesconto2)
    {
        if (!is_numeric($dataLimiteDesconto2))
            throw new Exception('Data limite para segundo desconto invalida');
        if(!$this->validaTamanhoCampo($dataLimiteDesconto2,6))
            throw new Exception('Data limite para segundo desconto ano tem 6 caracteres');
        $this->dataLimiteDesconto2 = $dataLimiteDesconto2;
    }

    /**
     * @return mixed
     */
    public function getValorDesconto2()
    {
        return $this->valorDesconto2;
    }

    /**
     * @param mixed $valorDesconto2
     * @throws \Exception
     */
    public function setValorDesconto2($valorDesconto2)
    {
        if (!is_numeric($valorDesconto2))
            throw new Exception('Valor desconto deve ser um numero');
        $valorDesconto2 = $this->addZeros($this->removeFormatacaoMoeda($valorDesconto2),13);
        if (!$this->validaTamanhoCampo($valorDesconto2,13))
            throw new Exception('Valor desconto invalido');

        $this->valorDesconto2 = $valorDesconto2;
    }

    /**
     * @return mixed
     */
    public function getDataLimiteDesconto3()
    {
        return $this->dataLimiteDesconto3;
    }

    /**
     * @param mixed $dataLimiteDesconto3
     * @throws \Exception
     */
    public function setDataLimiteDesconto3($dataLimiteDesconto3)
    {
        if (!is_numeric($dataLimiteDesconto3))
            throw new Exception('Data limite para segundo desconto invalida');

        if (!$this->validaTamanhoCampo($dataLimiteDesconto3,6))
            throw new Exception('Data limite para segundo desconto nao possui 6 caracteres');

        $this->dataLimiteDesconto3 = $dataLimiteDesconto3;
    }

    /**
     * @return mixed
     */
    public function getValorDesconto3()
    {
        return $this->valorDesconto3;
    }

    /**
     * @param mixed $valorDesconto3
     * @throws \Exception
     */
    public function setValorDesconto3($valorDesconto3)
    {
        if (!is_numeric($valorDesconto3))
            throw new Exception('Valor desconto deve ser um numero');
        $valorDesconto3 = $this->addZeros($this->removeFormatacaoMoeda($valorDesconto3),13);
        if (!$this->validaTamanhoCampo($valorDesconto3,13))
            throw new Exception('Valor desconto invalido');
        $this->valorDesconto3 = $valorDesconto3;
    }

    /**
     * @return mixed
     * @throws Exception
     */
    public function getReserva()
    {
        return $this->reserva = $this->montarBranco('',7);
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
     * @throws \Exception
     */

    public function setCarteira($carteira)
    {
        if (!is_numeric($carteira))
            throw new Exception('Carteira tem de ser numerico');
        $carteira = $this->addZeros($carteira, 3);

        if (!$this->validaTamanhoCampo($carteira, 3))
            throw new Exception('Tamanho carteira invalida');

        $this->carteira = $carteira;
    }

    /**
     * @return mixed
     */
    public function getAgencia()
    {
        return $this->agencia;
    }

    /**
     * @param mixed $agencia
     * @throws \Exception
     */
    public function setAgencia($agencia)
    {
        if (!is_numeric($agencia))
            throw new Exception('agencia tem de ser numerico');
        $agencia = $this->addZeros($agencia, 5);

        if (!$this->validaTamanhoCampo($agencia, 5))
            throw new Exception('Tamanho agencia invalida');
        $this->agencia = $agencia;
    }

    /**
     * @return mixed
     */
    public function getContaCorrente()
    {
        return $this->contaCorrente;
    }

    /**
     * @param mixed $contaCorrente
     * @throws \Exception
     */
    public function setContaCorrente($contaCorrente)
    {
        if (!is_numeric($contaCorrente))
            throw new Exception('contaCorrente tem de ser numerico');
        $contaCorrente = $this->addZeros($contaCorrente, 7);

        if (!$this->validaTamanhoCampo($contaCorrente, 7))
            throw new Exception('Tamanho contaCorrente invalida');
        $this->contaCorrente = $contaCorrente;
    }

    /**
     * @return mixed
     */
    public function getDigitoCC()
    {
        return $this->digitoCC;
    }

    /**
     * @param mixed $digitoCC
     * @throws \Exception
     */
    public function setDigitoCC($digitoCC)
    {
        if (!$this->validaTamanhoCampo($digitoCC, 1) )
            throw new Exception('digitoCC tem de ser numerico');
        $this->digitoCC = $digitoCC;
    }

    /**
     * @return mixed
     */
    public function getNossoNumero()
    {
        return $this->nossoNumero;
    }

    /**
     * @param mixed $nossoNumero
     * @throws \Exception
     */
    public function setNossoNumero($nossoNumero)
    {
        if (!is_numeric($nossoNumero))
            throw new Exception('Nosso Numero deve ser um numero inteiro');
        $nossoNumero = $this->addZeros($nossoNumero,11);

        if (!$this->validaTamanhoCampo($nossoNumero,11))
            throw new Exception('Tamanho do campo nosso numero invalido');
        $this->nossoNumero = $nossoNumero;
        $this->setDacNossoNumero($this->digitoVerificadorNossoNumero($this->getCarteira() . $this->getNossoNumero()));
    }

    /**
     * @return mixed
     */
    public function getDacNossoNumero()
    {
        return $this->dacNossoNumero;
    }

    /**
     * @param $dacNossoNumero
     * @throws \Exception
     */
    public function setDacNossoNumero($dacNossoNumero)
    {
        if (!$this->validaTamanhoCampo($dacNossoNumero,1))
            throw new Exception('Tamanho do campo digito nosso numero invalido');
        $this->dacNossoNumero = $dacNossoNumero;
    }

    /**
     * @return mixed
     */
    public function getNumeroSequenciaRegistro()
    {
        return $this->numeroSequenciaRegistro;
    }

    /**
     * @param mixed $numeroSequenciaRegistro
     * @throws \Exception
     */
    public function setNumeroSequencialRegistro($numeroSequenciaRegistro)
    {
        if (!is_numeric($numeroSequenciaRegistro))
            throw new Exception('Sequencia deve ser um numero inteiro');
        $numeroSequenciaRegistro = $this->addZeros($numeroSequenciaRegistro,6);

        if (!$this->validaTamanhoCampo($numeroSequenciaRegistro,6))
            throw new Exception('Tamanho do campo sequencial registro invalido');
        $this->numeroSequenciaRegistro = $numeroSequenciaRegistro;
    }

    /**
     * @return mixed
     * @throws Exception
     */
    public function montaLinha()
    {
        $linha = $this->getTiporegistro().
            $this->getMensagem1().
            $this->getMensagem2().
            $this->getMensagem3().
            $this->getMensagem4().
            $this->getDataLimiteDesconto2().
            $this->getValorDesconto2().
            $this->getDataLimiteDesconto3().
            $this->getValorDesconto3().
            $this->getReserva().
            $this->getCarteira().
            $this->getAgencia().
            $this->getContaCorrente().
            $this->getDigitoCC().
            $this->getNossoNumero().
            $this->getDacNossoNumero().
            $this->getNumeroSequenciaRegistro();
        return $this->validaLinha($linha);
    }
}