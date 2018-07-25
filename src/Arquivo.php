<?php
namespace Leandrofreires\RemessaBradesco;
use Exception;


/**
 * Class Arquivo
 * @package Leandrofreires\RemessaBradesco
 */
class Arquivo
{

    /**
     * @var
     */
    private $header_label;

    /**
     * @var
     */
    private $filename;

    /**
     * @var
     */
    private $trailler;

    /**
     *
     */
    const QUEBRA_LINHA = "\r\n";

    /**
     * @var array
     */
    private $detalhes = array();

    /**
     * @var
     */
    private $empresa;


    /**
     * @return mixed
     */
    public function getFilename()
    {
        return $this->filename;
    }


    /**
     * @param $filename
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;
    }


    /**
     * @return array
     */
    public function getDetalhes()
    {
        return $this->detalhes;
    }


    /**
     * @param $detalhes
     */
    public function setDetalhes($detalhes)
    {
        $this->detalhes[] = $detalhes;
    }


    /**
     * @return mixed
     */
    public function getHeaderLabel()
    {
        return $this->header_label;
    }


    /**
     * @return mixed
     */
    public function getTrailler()
    {
        return $this->trailler;
    }


    /**
     * @param $header_label
     */
    public function setHeaderLabel($header_label)
    {
        $this->header_label = $header_label;
    }


    /**
     * @param $trailler
     */
    public function setTrailler($trailler)
    {
        $this->trailler = $trailler;
    }


    /**
     * @param $boleto
     * @throws Exception
     */
    public function addBoleto($boleto)
    {
        //preenchendo dados dos detalhes
        $detalhes = new Detalhes();

        $detalhes->setEmpresa($this->getEmpresa());

        //informações da conta
        $detalhes->setAgenciaDebitoCliente($boleto['agencia']);
        $detalhes->setDigitoDebitoCliente($boleto['agencia_dv']);
        $detalhes->setContaCorrenteCliente($boleto['conta']);
        $detalhes->setDigitoContaCorrenteCliente($boleto['conta_dv']);
        $detalhes->setCarteira($this->getEmpresa()->getCarteira());
        $detalhes->setRazaoContaCorrenteCliente($boleto['razao_conta_cc_cliente']);

        //informações do boleto
        $detalhes->setCodigoBancoDebitoCompensacao($boleto['habilitar_debito_compensacao']);
        $detalhes->setIdentificacaoTituloBanco($boleto['nosso_numero']);
        $detalhes->setDescontoBonificacaoDia($boleto['desconto_dia']);
        $detalhes->setIndicadorRateioCredito($boleto['rateio']);
        $detalhes->setNumeroDocumento($boleto['numero_documento']);
        $detalhes->setDataVencimentoTitulo($boleto['vencimento']);
        $detalhes->setValorTitulo($boleto['valor']);
        $detalhes->setDataEmissaoTitulo($boleto['data_emissao_titulo']);

        //taxas do boleto
        $detalhes->setCampoMulta($boleto['habilitar_multa']);
        $detalhes->setPercentualMulta($boleto['percentual_multa']);
        $detalhes->setValoCobradoDiaAtraso($boleto['valor_dia_atraso']);
        $detalhes->setDataLimiteDesconto($boleto['data_limite_desconto']);
        $detalhes->setValorDesconto($boleto['valor_desconto']);
        $detalhes->setValorIOF($boleto['valor_iof']);
        $detalhes->setValorAbatimentoConcedidoCancelado($boleto['valor_abatimento_concedido']);

        //informações do pagador
        $detalhes->setIdentificacaoTipoIncricaoPagador($boleto['tipo_inscricao_pagador']);
        $detalhes->setNumeroInscricaoPagador($boleto['numero_inscricao']);
        $detalhes->setNomePagador($boleto['nome_pagador']);
        $detalhes->setEnderecoPagador($boleto['endereco_pagador']);
        $detalhes->setPrimeiraMensagem($boleto['primeira_mensagem']);
        $detalhes->setCep($boleto['cep_pagador']);
        $detalhes->setSufixoCep($boleto['sufixo_cep_pagador']);
        $detalhes->setSacadorSegundaMensagem($boleto['sacador_segunda_mensagem']);

        //adicionando boleto
        $this->setDetalhes($detalhes);
    }


    /**
     * @param $boleto
     * @param $config
     * @throws Exception
     */
    public function addBoletoOpcional($boleto, $config)
    {
        $registro = new DetalhesOpcionais();
        $registro->setMensagem1($boleto['mensagem1']);
        $registro->setMensagem2($boleto['mensagem2']);
        $registro->setMensagem3($boleto['mensagem3']);
        $registro->setMensagem4($boleto['mensagem4']);
        $registro->setDataLimiteDesconto2($boleto['data_desconto_2']);
        $registro->setValorDesconto2($boleto['valor_desconto_2']);
        $registro->setDataLimiteDesconto3($boleto['data_desconto_3']);
        $registro->setValorDesconto3($boleto['valor_desconto_3']);
        $registro->setCarteira($config['carteira']);
        $registro->setAgencia($config['agencia']);
        $registro->setContaCorrente($config['conta']);
        $registro->setDigitoCC($config['conta_dv']);
        $registro->setNossoNumero($boleto['nosso_numero']);
        $this->setDetalhes($registro);
    }


    /**
     * @param $dados
     * @throws Exception
     */
    public function config($config)
    {
        $this->empresa = new Empresa($config['agencia'],$config['agencia_dv'],$config['conta'], $config['conta_dv'],$config['razao_social'],$config['codigo_empresa'], $config['carteira']);
        $cabecalho = new HeaderLabel();
        $cabecalho->setCodigoEmpresa($this->getEmpresa()->getCodigoEmpresa());
        $cabecalho->setNomeEmpresa($this->getEmpresa()->getRazaoSocial());
        $cabecalho->setNumeroSequencialRemessa($config['numero_remessa']);
        $cabecalho->setDataGravacao(date('dmy'));
        $this->setHeaderLabel($cabecalho);
    }


    /**
     * @return string
     * @throws Exception
     */
    public function getText()
    {
        //Montando texto
        $dados = $this->getHeaderLabel()->montaLinha() . self::QUEBRA_LINHA;
        //montando linhas dos boletos
        $numero_sequencial = 2;
        foreach ($this->getDetalhes() as $detalhe) {
            $detalhe->setNumeroSequencialRegistro($numero_sequencial++);
            $dados .= $detalhe->montaLinha() . self::QUEBRA_LINHA;
        }
        //montando rodap�
        $trailler = new Trailler();
        $trailler->setNumeroSequencialRegsitro($numero_sequencial++);
        $this->setTrailler($trailler);
        $dados .= $this->getTrailler()->montaLinha();

        return $dados;
    }

    /**
     * @return mixed
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }



    /**
     * @throws Exception
     */
    public function save()
    {
        $text = $this->getText();
        //die($text);
        //atribuindo um nome do arquivo
        if ($this->getFilename() == '') {
            $this->setFilename('CB' . date('dm') . 'A1');
        }

        file_put_contents($this->getFilename() . '.REM', $text);
    }


    /**
     * @return int
     */
    public function countDetalhes()
    {
        return count($this->detalhes);
    }
}
