<?php
namespace Leandrofreires\RemessaBradesco;

use Exception;

class Detalhes extends Funcoes
{
    
    private $identificacaoRegistro = 1;

    
    private $agenciaDebito;

    
    private $digitoDebito;

    
    private $razaoContaCorrente;

    
    private $contaCorrente;

    
    private $digitoContaCorrente;

    
    private $identificacaoEmpresaBenificiarioBanco;

    
    private $numeroControleParticipante;

    
    private $codigoBancoDebitoCompensacao;

    
    private $campoMulta;

    
    private $percentualMulta;

    
    private $identificacaoTituloBanco;

    
    private $digitoAutoConsferenciaBancaria;

    
    private $descontoBonificacaoDia;

    
    private $condicaoEmissaoPapeletaCobranca = 2; 

    
    private $identDebitoAutomatico = 'N'; 

    
    
    
    private $indicadorRateioCredito;

    
    private $enderecamentoAvisoDebito = '0'; 

    
    
    
    private $identificacaoOcorrencia = '01'; 

    
    private $numeroDocumento;

    
    private $dataVencimentoTitulo;

    
    private $valorTitulo; 

    
    private $bancoEncarregadoCobranca = "000";

    
    private $agenciaDepositaria = "00000";

    
    private $especieTitulo = '01'; 

    
    private $identificacao = "N";

    
    private $dataEmissaoTitulo;

    
    private $instrucao1 = '00'; 

    
    private $instrucao2 = '00'; 

    
    private $valoCobradoDiaAtraso; 

    
    private $dataLimiteDesconto; 

    
    private $valorDesconto;

    
    private $valorIOF;

    
    private $valorAbatimentoConcedidoCancelado;

    
    private $identificacaoTipoIncricaoPagador; 

    
    private $numeroInscricaoPagador; 

    
    private $nomePagador;

    
    private $enderecoPagador;

    
    private $primeiraMensagem;

    
    private $cep;

    
    private $sufixoCep;

    
    private $sacadorSegundaMensagem; 

    
    private $numeroSequencialRegistro;

    
    private $carteira;

    /**
     * @return mixed mixed $cateira
     */
    public function getCarteira()
    {
        return $this->carteira;
    }

    /**
     * @return mixed $agencia_debito
     */
    public function getAgenciaDebito()
    {
        return $this->agenciaDebito;
    }

    /**
     * @return mixed $digito_debito_debito
     */
    public function getDigitoDebito()
    {
        return $this->digitoDebito;
    }

    /**
     * @return mixed
     */
    public function getRazaoContaCorrente()
    {
        return $this->razaoContaCorrente;
    }

    /**
     * @return mixed $conta_corrente
     */
    public function getContaCorrente()
    {
        return $this->contaCorrente;
    }

    /**
     * @return mixed $digito_conta_corrente
     */
    public function getDigitoContaCorrente()
    {
        return $this->digitoContaCorrente;
    }

    /**
     * @return mixed $identificacao_empresa_benificiario_banco
     */
    public function getIdentificacaoEmpresaBenificiarioBanco()
    {
        /*
         * montando numero de identificacao da empresa
         * exemplo: 0|009|01800|0018399|7
         */
        $identificacao_empresa_benificiario_banco = '0' .
            $this->getCarteira() .
            $this->getAgenciaDebito() .
            $this->getContaCorrente() .
            $this->getDigitoContaCorrente();
        $this->identificacaoEmpresaBenificiarioBanco = $identificacao_empresa_benificiario_banco;

        return $this->identificacaoEmpresaBenificiarioBanco;
    }

    /**
     * @return mixed $numero_controle_participante
     */
    public function getNumeroControleParticipante()
    {
        return $this->numeroControleParticipante;
    }

    /**
     * @return mixed $codigo_banco_debito_compensacao
     */
    public function getCodigoBancoDebitoCompensacao()
    {
        return $this->codigoBancoDebitoCompensacao;
    }

    /**
     * @return mixed $campo_multa
     */
    public function getCampoMulta()
    {
        return $this->campoMulta;
    }

    /**
     * @return mixed $percentual_multa
     */
    public function getPercentualMulta()
    {
        return $this->percentualMulta;
    }

    /**
     * @return mixed $identificacao_titulo_banco
     */
    public function getIdentificacaoTituloBanco()
    {
        return $this->identificacaoTituloBanco;
    }

    /**
     * @return mixed $digito_auto_consferencia_bancaria
     */
    public function getDigitoAutoConsferenciaBancaria()
    {
        return $this->digitoVerificadorNossoNumero($this->getCarteira() . $this->getIdentificacaoTituloBanco());
    }

    /**
     * @return mixed $desconto_bonificacao_dia
     */
    public function getDescontoBonificacaoDia()
    {
        return $this->descontoBonificacaoDia;
    }

    /**
     * @return mixed $indicador_rateio_credito
     */
    public function getIndicadorRateioCredito()
    {
        return $this->indicadorRateioCredito;
    }

    /**
     * @return int
     */
    public function getIdentificacaoRegistro()
    {
        return $this->identificacaoRegistro;
    }

    /**
     * @return string
     */
    public function getCondicaoEmissaoPapeletaCobranca()
    {
        return $this->condicaoEmissaoPapeletaCobranca;
    }

    /**
     * @return string
     */
    public function getIdentDebitoAutomatico()
    {
        return $this->identDebitoAutomatico;
    }

    /**
     * @return string
     */
    public function getEnderecamentoAvisoDebito()
    {
        return $this->enderecamentoAvisoDebito;
    }

    /**
     * @return int
     */
    public function getIdentificacaoOcorrencia()
    {
        return $this->identificacaoOcorrencia;
    }

    /**
     * @return int
     */
    public function getNumeroDocumento()
    {
        return $this->numeroDocumento;
    }

    /**
     * @return string ddmmyy
     */
    public function getDataVencimentoTitulo()
    {
        return $this->dataVencimentoTitulo;
    }

    /**
     * @return float
     */
    public function getValorTitulo()
    {
        return $this->valorTitulo;
    }

    /**
     * @return int
     */
    public function getBancoEncarregadoCobranca()
    {
        return $this->bancoEncarregadoCobranca;
    }

    /**
     * @return int
     */
    public function getAgenciaDepositaria()
    {
        return $this->agenciaDepositaria;
    }

    /**
     * @return int
     */
    public function getEspecieTitulo()
    {
        return $this->especieTitulo;
    }

    /**
     * @return string
     */
    public function getIdentificacao()
    {
        return $this->identificacao;
    }

    /**
     * @return string ddmmyy
     */
    public function getDataEmissaoTitulo()
    {
        return $this->dataEmissaoTitulo;
    }

    /**
     * @return string
     */
    public function getInstrucao1()
    {
        return $this->instrucao1;
    }

    /**
     * @return string
     */
    public function getInstrucao2()
    {
        return $this->instrucao2;
    }

    /**
     * @return float
     */
    public function getValoCobradoDiaAtraso()
    {
        return $this->valoCobradoDiaAtraso;
    }

    /**
     * @return string ddmmyy
     */
    public function getDataLimiteDesconto()
    {
        return $this->dataLimiteDesconto;
    }

    /**
     * @return float
     */
    public function getValorDesconto()
    {
        return $this->valorDesconto;
    }

    /**
     * @return float
     */
    public function getValorIOF()
    {
        return $this->valorIOF;
    }

    /**
     * @return float
     */
    public function getValorAbatimentoConcedidoCancelado()
    {
        return $this->valorAbatimentoConcedidoCancelado;
    }

    /**
     * @return int
     */
    public function getIdentificacaoTipoIncricaoPagador()
    {
        return $this->identificacaoTipoIncricaoPagador;
    }

    /**
     * @return int
     */
    public function getNumeroInscricaoPagador()
    {
        return $this->numeroInscricaoPagador;
    }

    /**
     * @return string
     */
    public function getNomePagador()
    {
        return $this->nomePagador;
    }

    /**
     * @return string
     */
    public function getEnderecoPagador()
    {
        return $this->enderecoPagador;
    }

    /**
     * @return string
     */
    public function getPrimeiraMensagem()
    {
        return $this->primeiraMensagem;
    }

    /**
     * @return int
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * @return int
     */
    public function getSufixoCep()
    {
        return $this->sufixoCep;
    }

    /**
     * @return string
     */
    public function getSacadorSegundaMensagem()
    {
        return $this->sacadorSegundaMensagem;
    }

    /**
     * @return int
     */
    public function getNumeroSequencialRegistro()
    {
        return $this->numeroSequencialRegistro;
    }

    /**
     * @param $agencia_debito
     * @throws Exception
     */
    public function setAgenciaDebito($agencia_debito)
    {
        if (!is_numeric($agencia_debito))
            throw new Exception('Error: O campo Agencia_debito não é um numero.');

        if (mb_strlen($agencia_debito) > 5)
            throw new Exception('Agencia nao pode ser maior que 5');

        $agencia_debito = $this->addZeros($agencia_debito, 5);

        if (!$this->validaTamanhoCampo($agencia_debito, 5))
            throw new Exception('A quantidade dos digito do numero da agencia excedido.');

        $this->agenciaDebito = $agencia_debito;
    }

    /**
     * @param $digito_debito_debito
     * @throws Exception
     */
    public function setDigitoDebito($digito_debito_debito)
    {
        if (!is_string($digito_debito_debito))
            throw new Exception('Error: O campo Digito Agencia debito não é um tipo alfanumerico.');
        $digito_debito_debito = $this->montarBranco($digito_debito_debito,1);
        if (!$this->validaTamanhoCampo($digito_debito_debito, 1))
            throw new Exception('Error: Quantidade de digitos para o campo Digito Agencia Debito invalidos.');

        $this->digitoDebito = $digito_debito_debito;
    }

    /**
     * @param $razao_conta_corrente
     * @throws Exception
     */
    public function setRazaoContaCorrente($razao_conta_corrente)
    {
        if (!is_numeric($razao_conta_corrente))
            throw new Exception('Error: O campo Razão Conta Corrente não é um numero.');
        $razao_conta_corrente = $this->addZeros($razao_conta_corrente,5);
        if (!mb_strlen($razao_conta_corrente) <= 5)
            throw new Exception('O campo Razão Conta Corrente excede 5 caracteres');

        $razao_conta_corrente = $this->addZeros($razao_conta_corrente, 5);

        if (!$this->validaTamanhoCampo($razao_conta_corrente, 5))
            throw new Exception('Error: Quantidade de caracteres do campo Razão Conta Corrente invalidos.');

        $this->razaoContaCorrente = $razao_conta_corrente;
    }

    /**
     * @param $conta_corrente
     * @throws Exception
     */
    public function setContaCorrente($conta_corrente)
    {
        if (!is_numeric($conta_corrente))
            throw new Exception('Error: O campo Conta Corrente não é um numero.');

        if (mb_strlen($conta_corrente) > 7)
            throw new Exception('O campo Conta Corrente não pode ser maior que 7 caracteres');
        $conta_corrente = $this->addZeros($conta_corrente, 7);

        if (!$this->validaTamanhoCampo($conta_corrente, 7))
            throw new Exception('Error: Quantidade d ecaracteres do campo Conta Corrente invalidos.');
        $this->contaCorrente = $conta_corrente;
    }

    /**
     * @param $digito_conta_corrente
     * @throws Exception
     */
    public function setDigitoContaCorrente($digito_conta_corrente)
    {
        
        if (!is_string($digito_conta_corrente))
            throw new Exception('Error: O campo Digito Conta Corrente não é um campo alfanumerico.');
        $digito_conta_corrente = $this->montarBranco($digito_conta_corrente,1);
        if (!$this->validaTamanhoCampo($digito_conta_corrente, 1))
            throw new Exception('Error: Quantidade de caracteres do campo Digito Conta Conrrente.');
        $this->digitoContaCorrente = $digito_conta_corrente;
    }

    /**
     * semelhante ao numero do documento - pode ser uma chave unica de identificação de cada boleto da remessa
     * @param $numero_controle_participante
     * @throws Exception
     */
    public function setNumeroControleParticipante($numero_controle_participante)
    {
        if (!is_numeric($numero_controle_participante))
            throw new Exception('Error: O campo Numero Controle Participante não é um numero.');
            
        $numero_controle_participante = $this->addZeros($numero_controle_participante, 25);
            
        if (!$this->validaTamanhoCampo($numero_controle_participante, 25))
            throw new Exception('Error: Quantidade de caracteres do campo Numero Controle Participante invalidos.');

        $this->numeroControleParticipante = $numero_controle_participante;
    }

    /**
     * se existir debito automatico para o beneficiario, dever� ser passado como parametro TRUE
     * @param  $codigo_banco_debito_compensacao
     */
    public function setCodigoBancoDebitoCompensacao($codigo_banco_debito_compensacao = false)
    {
        $this->codigoBancoDebitoCompensacao = '000';
        if (!$codigo_banco_debito_compensacao == false)
            $this->codigoBancoDebitoCompensacao = '237';
    }

    /**
     * habilita o campo para receber a porcentagem de multas por atraso de pagamento
     * @param $campo_multa
     */
    public function setCampoMulta($campo_multa = true)
    {
        $this->campoMulta = 2;
        if (!$campo_multa == true)
            $this->campoMulta = '0';
    }

    /**
     * @param $percentual_multa
     * @throws Exception
     */
    public function setPercentualMulta($percentual_multa)
    {
        $this->percentualMulta = '0000';
        if ($this->getCampoMulta()) {
            if (!is_numeric($percentual_multa))
                throw new Exception('Error: O campo Percentual Multa não é um numero.');

            if (mb_strlen($percentual_multa) > 4)
                throw new Exception('Error: O campo Percentual Multa tem que ter no maximo 4 caracteres.');

            $percentual_multa = $this->addZeros($percentual_multa, 4);

            if (!$this->validaTamanhoCampo($percentual_multa, 4))
                throw new Exception('Error: Quantidade de caracteres do campo Percentual Multa invalidos.');
            $this->percentualMulta = $percentual_multa;
        }

    }

    /**
     * campo de NOSSO NUMERO, identificador unico para cada boleto gerado
     * @param $identificacao_titulo_banco
     * @throws Exception
     */
    public function setIdentificacaoTituloBanco($identificacao_titulo_banco)
    {
        
        if (!is_numeric($identificacao_titulo_banco))
            throw new Exception('Error: O campo Identificação Titulo Banco não é um numero.');

        if (mb_strlen($identificacao_titulo_banco) > 11)
            throw new Exception('Error: Quantidade de caracteres do campo Identificação Titulo Banco invalidos.');

        $identificacao_titulo_banco = $this->addZeros($identificacao_titulo_banco, 11);

        if (!$this->validaTamanhoCampo($identificacao_titulo_banco, 11))
            throw new Exception('Error: Quantidade de caracteres do campo Identificação Titulo Banco invalidos.');

        $this->identificacaoTituloBanco = $identificacao_titulo_banco;

        $this->digitoAutoConsferenciaBancaria = $this->digitoVerificadorNossoNumero($this->getCarteira() . $identificacao_titulo_banco);

    }

    /**
     * valor de bonifica��o por dia
     * @param $desconto_bonificacao_dia
     * @throws Exception
     */
    public function setDescontoBonificacaoDia($desconto_bonificacao_dia)
    {
        
        if (!is_numeric($desconto_bonificacao_dia))
            throw new Exception('Error: O campo Desconto Bonificação Dia  não é um numero.');

        $desconto_bonificacao_dia = $this->addZeros($desconto_bonificacao_dia, 10);
            
        if (!$this->validaTamanhoCampo($desconto_bonificacao_dia, 10))
            throw new Exception('Error: Quantidade de caracteres do campo Desconto Bonificação Dia invalidos');

        $this->descontoBonificacaoDia = $desconto_bonificacao_dia;

    }

    /**
     * @param string $indicador_rateio_credito
     */
    public function setIndicadorRateioCredito($indicador_rateio_credito)
    {
        $this->indicadorRateioCredito = ' ';
        if ($indicador_rateio_credito)
            $this->indicadorRateioCredito = 'R';
    }

    /**
     * @param  $numero_documento
     * @throws Exception
     */
    public function setNumeroDocumento($numero_documento)
    {
        if (!ctype_alnum($numero_documento))
            throw new Exception('Error: O campo Numero Documento não é alfanumerico.');
            
        $numero_documento = $this->addZeros($numero_documento, 10);

        if (!$this->validaTamanhoCampo($numero_documento, 10))
            throw new Exception('Error: Quantidade de caracteres do campo Numero Documento invalidos.');

        $this->numeroDocumento = $numero_documento;
    }

    /**
     * @param $data_vencimento_titulo
     * @throws Exception
     */
    public function setDataVencimentoTitulo($data_vencimento_titulo)
    {
        if (!is_numeric($data_vencimento_titulo))
            throw new Exception('Error: O campo Data Vencimento Titulo não é um numero.');

        $data_vencimento_titulo = $this->addZeros($data_vencimento_titulo, 6);
            
        if (!$this->validaTamanhoCampo($data_vencimento_titulo, 6))
            throw new Exception('Error: Quantidade de caracteres do campo Data Vencimento Titulo invalidos.');
        $this->dataVencimentoTitulo = $data_vencimento_titulo;
    }

    /**
     * @param $valor_titulo
     * @throws Exception
     */
    public function setValorTitulo($valor_titulo)
    {
        if (!is_numeric($valor_titulo))
            throw new Exception('Error: O campo Valor Titulo não é um numero.');

        $valor_titulo = $this->addZeros($this->removeFormatacaoMoeda($valor_titulo), 13);

        if (!$this->validaTamanhoCampo($valor_titulo, 13))
            throw new Exception('Error: Quantidade de caracteres do campo Valor Titulo invalidos.');

        $this->valorTitulo = $valor_titulo;
    }

    /**
     * @param $data_emissao_titulo
     * @throws Exception
     */
    public function setDataEmissaoTitulo($data_emissao_titulo)
    {
        if (!is_numeric($data_emissao_titulo))
            throw new Exception('Error: O campo Data Emissao Titulo não é um numero.');
            
        $data_emissao_titulo = $this->addZeros($data_emissao_titulo, 6);
            
        if (!$this->validaTamanhoCampo($data_emissao_titulo, 6))
            throw new Exception('Error: Quantidade de caracteres do campo Data Emiss�o Titulo invalidos.');

        $this->dataEmissaoTitulo = $data_emissao_titulo;
    }

    /**
     * @param $valor_cobrado_dia_atraso
     * @throws Exception
     */
    public function setValoCobradoDiaAtraso($valor_cobrado_dia_atraso)
    {
        if (!is_numeric($valor_cobrado_dia_atraso))
            throw new Exception('Error: O campo Valor Cobrado Dia Atraso não é um numero.');
            
        $valor_cobrado_dia_atraso = $this->addZeros($this->removeFormatacaoMoeda($valor_cobrado_dia_atraso), 13);
            
        if (!$this->validaTamanhoCampo($valor_cobrado_dia_atraso, 13))
            throw new Exception('Error: Quantidade de caracteres do campo Valor Cobrado Dia Atraso invalidos.');

        $this->valoCobradoDiaAtraso = $valor_cobrado_dia_atraso;
    }

    /**
     * @param mixed $data_limite_desconto
     * @throws Exception
     */
    public function setDataLimiteDesconto($data_limite_desconto)
    {
        
        if (!is_numeric($data_limite_desconto))
            throw new Exception('Error: O campo Data Limite Desconto não é um numero.');

        if (!$this->validaTamanhoCampo($data_limite_desconto, 6))
            throw new Exception('Error: Quantidade de caracteres do campo Data Limite Desconto invalidos.');

        $this->dataLimiteDesconto = $data_limite_desconto;
    }

    /**
     * @param $valor_desconto
     * @throws Exception
     */
    public function setValorDesconto($valor_desconto)
    {
        if (!is_numeric($valor_desconto))
            throw new Exception('Error: O campo Valor Desconto não é um numero.');

        $valor_desconto = $this->addZeros($this->removeFormatacaoMoeda($valor_desconto), 13);

        if (!$this->validaTamanhoCampo($valor_desconto, 13))
            throw new Exception('Error: Quantidade de caracteres do campo Valor Desconto invalidos.');

        $this->valorDesconto = $valor_desconto;
    }

    /**
     * @param  $valor_iof
     * @throws Exception
     */
    public function setValorIOF($valor_iof = 0)
    {
        if (!is_numeric($valor_iof))
            throw new Exception('Error: O campo Valor IOF não é um numero.');
            
        $valor_iof = $this->addZeros($this->removeFormatacaoMoeda($valor_iof), 13);

        if (!$this->validaTamanhoCampo($valor_iof, 13))
            throw new Exception('Error: Quantidade de caracteres do campo Valor IOF invalidos.');

        $this->valorIOF = $valor_iof;
    }

    /**
     * @param $valor_abatimento_concedido_cancelado
     * @throws Exception
     */
    public function setValorAbatimentoConcedidoCancelado($valor_abatimento_concedido_cancelado = 0)
    {
        
        if (!is_numeric($valor_abatimento_concedido_cancelado))
            throw new Exception('Error: O campo Valor Abatimento Concedido Cancelado não é um numero.');
            
        $valor_abatimento_concedido_cancelado = $this->addZeros($this->removeFormatacaoMoeda(
            $valor_abatimento_concedido_cancelado), 13);

        if (!$this->validaTamanhoCampo($valor_abatimento_concedido_cancelado, 13))
            throw new Exception('Error: Quantidade de caracteres do campo Valor Concedido Cancelado invalidos.');

        $this->valorAbatimentoConcedidoCancelado = $valor_abatimento_concedido_cancelado;
    }

    /**
     * @param $identificacao_tipo_incricao_pagador
     * @throws Exception
     */
    public function setIdentificacaoTipoIncricaoPagador($identificacao_tipo_incricao_pagador)
    {
        if ($identificacao_tipo_incricao_pagador == 'CPF') {

            $this->identificacaoTipoIncricaoPagador = '01';
        } elseif ($identificacao_tipo_incricao_pagador == 'CNPJ') {

            $this->identificacaoTipoIncricaoPagador = '02';
        } elseif ($identificacao_tipo_incricao_pagador == 'PIS') {

            $this->identificacaoTipoIncricaoPagador = '03';
        } elseif ($identificacao_tipo_incricao_pagador == 'NAO_TEM') {

            $this->identificacaoTipoIncricaoPagador = '98';
        } elseif ($identificacao_tipo_incricao_pagador == 'OUTROS') {

            $this->identificacaoTipoIncricaoPagador = '99';
        } else {
            throw new Exception('Error - Valor do tipo de pagador esta incorreto.');
        }
    }

    /**
     * @param $numero_inscricao_pagador
     * @throws Exception
     */
    public function setNumeroInscricaoPagador($numero_inscricao_pagador)
    {
        if (!is_numeric($numero_inscricao_pagador))
            throw new Exception('Error -  O campo Numero Inscrição Pagador não é um numero.');

        switch ($this->getIdentificacaoTipoIncricaoPagador()):
            case '01':
                if (!$this->validaTamanhoCampo($numero_inscricao_pagador, 11))
                    throw new Exception('Error -  CPF do campo Numero Inscrição Pagador Invalido.');
                $numero_inscricao_pagador = '000' . $numero_inscricao_pagador;
                $this->numeroInscricaoPagador = $numero_inscricao_pagador;
                break;
            case '02':
                if (!$this->validaTamanhoCampo($numero_inscricao_pagador, 14))
                    throw new Exception('Error -  CNPJ do campo Numero Inscrição Pagador Invalido.');
                $this->numeroInscricaoPagador = $numero_inscricao_pagador;
                break;
        endswitch;
    }

    /**
     * @param  $nome_pagador
     * @throws Exception
     */
    public function setNomePagador($nome_pagador)
    {
        if (mb_strlen($nome_pagador) > 40)
            throw new Exception('Nome do pagador e muito grande');
        
        $nome_pagador = $this->montarBranco($nome_pagador, 40, 'right');
        
        if (!$this->validaTamanhoCampo($nome_pagador, 40))
            throw new Exception('Error - Nome do pagador invalido, excedido o tamanho maximo de 40 caracteres.');

        $this->nomePagador = $nome_pagador;
    }

    /**
     * @param  $endereco_pagador
     * @throws Exception
     */
    public function setEnderecoPagador($endereco_pagador)
    {
        
        if (mb_strlen($endereco_pagador) < 40 )
            $endereco_pagador = $this->montarBranco($endereco_pagador, 40, 'right');
        if (mb_strlen($endereco_pagador) > 40 )
            $endereco_pagador = $this->resumeTexto($endereco_pagador, 39);


        if (!$this->validaTamanhoCampo($endereco_pagador, 40))
            throw new Exception('Error - Endereço do pagador invalido, excedido o tamanho maximo de 40 caracteres.');

        $this->enderecoPagador = $endereco_pagador;
    }

    /**
     * @param $primeira_mensagem
     * @throws Exception
     */
    public function setPrimeiraMensagem($primeira_mensagem)
    {
        if (mb_strlen($primeira_mensagem) > 12)
            throw new Exception('Error - Primeira mensagem invalida, excedido o tamanho maximo de 12 caracteres.');

        $primeira_mensagem = $this->montarBranco($primeira_mensagem, 12, 'right');

        if (!$this->validaTamanhoCampo($primeira_mensagem, 12))
            throw new Exception('Error - Primeira mensagem invalida, excedido o tamanho maximo de 12 caracteres.');
        $this->primeiraMensagem = $primeira_mensagem;
    }

    /**
     * @param $cep
     * @throws Exception
     */
    public function setCep($cep)
    {
        if (!is_numeric($cep))
            throw new Exception('Error - O campos CEP não é um numero.');

        if (!$this->validaTamanhoCampo($cep, 5))
            throw new Exception('Error - Quantidade de caracteres do compo CEP invalidos.');
        $this->cep = $cep;
    }

    /**
     * @param $sufixo_cep
     * @throws Exception
     */
    public function setSufixoCep($sufixo_cep)
    {
        if (!is_numeric($sufixo_cep))
            throw new Exception('Error - O campos Sufixo CEP não é um numero.');
            
        if (!$this->validaTamanhoCampo($sufixo_cep, 3))
            throw new Exception('Error - Quantidade de caracteres do campo Sufixo invalidos.');

        $this->sufixoCep = $sufixo_cep;
    }

    /**
     * N�o utilizar as express�es 'taxa banc�ria' ou 'tarifa banc�ria' nos boletos de
     * cobran�a, pois essa tarifa refere-se � negociada pelo Banco com seu cliente
     * benefici�rio. Orienta��o da FEBRABAN (Comunicado FB-170/2005).
     *
     * @param $sacador_segunda_mensagem
     * @throws Exception
     */
    public function setSacadorSegundaMensagem($sacador_segunda_mensagem)
    {
        if (!mb_strlen($sacador_segunda_mensagem) <= 60 )
            $sacador_segunda_mensagem = $this->resumeTexto($sacador_segunda_mensagem,60);
        
        $sacador_segunda_mensagem = $this->montarBranco($sacador_segunda_mensagem, 60);

        if (!$this->validaTamanhoCampo($sacador_segunda_mensagem, 60))
            throw new Exception('Error - Dados da segunda mensagem estão invalidos.');

        $this->sacadorSegundaMensagem = $sacador_segunda_mensagem;

    }

    /**
     * @param $numero_sequencial_registro
     * @throws Exception
     */
    public function setNumeroSequencialRegistro($numero_sequencial_registro)
    {
        if (mb_strlen($numero_sequencial_registro) > 6)
            throw new Exception('Error - O campos Numero Sequencial Registro tem que ter no maximo 6 caracteres');
        if (!is_numeric($numero_sequencial_registro))
            throw new Exception('Error - O campos Numero Sequencial Registro não é um numero.');
            
        $numero_sequencial_registro = $this->addZeros($numero_sequencial_registro, 6);

        if (!$this->validaTamanhoCampo($numero_sequencial_registro, 6))
            throw new Exception('Error - Quantidade de caracteres do campo Numero Sequencial Registro invalidos.');

        $this->numeroSequencialRegistro = $numero_sequencial_registro;

    }

    /**
     * @param $carteira
     * @throws Exception
     */
    public function setCarteira($carteira)
    {
        if (mb_strlen($carteira) > 3)
            throw new Exception('Error - O campos Carteira não por ser maior que 3.');
        if (!is_numeric($carteira))
            throw new Exception('Error - O campos Carteira não é um numero.');
        $carteira = $this->addZeros($carteira, 3);
        if (!$this->validaTamanhoCampo($carteira, 3))
            throw new Exception('Error - Quantidade de caracteres do campo Carteira estão invalidos.');

        $this->carteira = $carteira;
    }

    /**(non-PHPdoc)
     * Medotos para gerar a linha dos detalhes dos boletos que seram gerados
     * @see IFuncoes::montar_linha()
     * @throws Exception
     */

    public function montaLinha()
    {
         $linha = $this->getIdentificacaoRegistro() . 
            
            $this->addZeros('', 5) .
            $this->montarBranco('', 1) .
            $this->addZeros('', 5) .
            $this->addZeros('', 7) .
            $this->montarBranco('', 1) .
            
            $this->getIdentificacaoEmpresaBenificiarioBanco() .
            $this->montarBranco('', 25) .
            $this->getCodigoBancoDebitoCompensacao() .
            $this->getCampoMulta() .
            $this->getPercentualMulta() .
            $this->getIdentificacaoTituloBanco() .
            $this->getDigitoAutoConsferenciaBancaria() .
            $this->getDescontoBonificacaoDia() .
            $this->getCondicaoEmissaoPapeletaCobranca() . 
            $this->getIdentDebitoAutomatico() .
            $this->montarBranco('', 10) . 
            $this->getIndicadorRateioCredito() .
            $this->getEnderecamentoAvisoDebito() . 
            $this->montarBranco('', 2) . 
            $this->getIdentificacaoOcorrencia() . 
            $this->getNumeroDocumento() .
            $this->getDataVencimentoTitulo() .
            $this->getValorTitulo() .
            $this->getBancoEncarregadoCobranca() . 
            $this->getAgenciaDepositaria() . 
            $this->getEspecieTitulo() . 
            $this->getIdentificacao() . 
            $this->getDataEmissaoTitulo() .
            $this->getInstrucao1() . 
            $this->getInstrucao2() . 
            $this->getValoCobradoDiaAtraso() .
            $this->getDataLimiteDesconto() .
            $this->getValorDesconto() .
            $this->getValorIOF() .
            $this->getValorAbatimentoConcedidoCancelado() .
            $this->getIdentificacaoTipoIncricaoPagador() .
            $this->getNumeroInscricaoPagador() .
            $this->getNomePagador() .
            $this->getEnderecoPagador() .
            $this->getPrimeiraMensagem() .
            $this->getCep() .
            $this->getSufixoCep() .
            $this->getSacadorSegundaMensagem() .
            $this->getNumeroSequencialRegistro();

        return $this->validaLinha($linha);
    }
}
