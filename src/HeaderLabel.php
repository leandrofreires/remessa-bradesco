<?php
namespace Hmarinjr\RemessaBradesco;

class HeaderLabel extends Funcoes
{
    //001 - 001 - 1 -  N CONSTANTE
    private $identificacaoRegistro = 0;

    //002 - 002 - 1 - N CONSTANTE
    private $identificacaoArquivoRemessa = 1;

    //003 - 009 - 7 - A CONSTANTE
    private $literalRemessa = 'REMESSA';

    //010 - 011 - 2 - N CONSTANTE
    private $codigoServico = '01';

    //012 - 026 - 15 - A CONSTANTE - COMPLETAR COM ESPAÇOS EM BRANCO A DIREITA
    private $literalServico = 'COBRANCA';

    //027 - 046 - 20 - N COMPLETAR COM ZEROS A ESQUERDA
    private $codigoEmpresa = '';     //<---- verificar observações

    //047 - 076 - 30 - A - COMPLETAR COM ESPAÇOS EM BRANCO A DIREITA
    private $nomeEmpresa = '';

    //077 - 079 - 3 - N CONSTANTE
    private $numeroBradescoCompensacao = 237;

    //080 - 094 - 15 - A CONSTANTE - COMPLETAR COM ESPAÇOES EM BRANCO A DIREITA
    private $nomeBanco = 'Bradesco';

    //095 - 100 - 6 - N
    private $dataGravacao = '';     //<---- verificar observações

    //101 - 108 - 8 - A
    //CAMPO EM BRANCO COM 8 POSIÇÕES
    //109 - 110 - 2 - A
    private $identificacaoSistema = 'MX';

    //111 - 117 - 7 - N
    private $numeroSequencialRemessa = '';

    //118 - 394 - 277 - A
    //CAMPO EM BRANCO COM 277 POSIÇÕES
    //395 - 400 - 6 - N CONSTANTE
    private $numeroSequencialRegistro = '000001';

    /**
     * @return the $codigo_empresa
     */
    public function getCodigoEmpresa()
    {
        return $this->codigoEmpresa;
    }

    /**
     * @return the $nome_empresa
     */
    public function getNomeEmpresa()
    {
        return $this->nomeEmpresa;
    }

    /**
     * @return the $data_gravacao
     */
    public function getDataGravacao()
    {
        //verifica se a variavel esta vazia, se sim poe a data atual como default
        if (empty($this->dataGravacao)) {
            $this->setDataGravacao(date('dmy'));
        }

        return $this->dataGravacao;
    }

    /**
     * @return the $numero_sequencial_remessa
     */
    public function getNumeroSequencialRemessa()
    {
        return $this->numeroSequencialRemessa;
    }

    /**
     * @param string $codigo_empresa
     */
    public function setCodigoEmpresa($codigo_empresa)
    {
        if (!is_numeric($codigo_empresa)) {
            throw new Exception('Error - Não é um numero');
        }

        $this->codigoEmpresa = $this->addZeros($codigo_empresa, 20);
    }

    /**
     * @param string $nome_empresa
     */
    public function setNomeEmpresa($nome_empresa)
    {
        $length = (int) strlen($nome_empresa);

        if ($length <= 0 || $length > 30) {
            throw new Exception('Error - Tamanho de texto invalido, para o nome da empresa.');
        }

        $this->nomeEmpresa = $this->montarBranco($nome_empresa, 30, 'right');
    }

    /**
     * @param string $data_gravacao
     */
    public function setDataGravacao($data_gravacao)
    {
        if (!is_numeric($data_gravacao)) {
            throw new Exception('Error - O campo data de gravação não é um numero.');
        }

        $this->dataGravacao = $data_gravacao;
    }

    /**
     * @param string $numero_sequencial_remessa
     */
    public function setNumeroSequencialRemessa($numero_sequencial_remessa)
    {
        //verificando se � um numero
        if (!is_numeric($numero_sequencial_remessa)) {
            throw new Exception('Error - O campo numero sequencial remessa não é um numero.');
        }

        //completando a string com zeros
        $numero_sequencial_remessa = $this->addZeros($numero_sequencial_remessa, 7);
        if (!$this->validaTamanhoCampo($numero_sequencial_remessa, 7)) {
            throw new Exception('Error - Tamanho de texto invalido, para o campo numero sequencial remessa.');
        }

        $this->numeroSequencialRemessa = $numero_sequencial_remessa;
    }

    public function montaLinha()
    {

        //motando linha do cabe�alho da remessa
        $linha = $this->identificacaoRegistro .
            $this->identificacaoArquivoRemessa .
            $this->literalRemessa .
            $this->codigoServico .
            $this->literalServico .
            $this->montarBranco('', 7) .
            $this->getCodigoEmpresa() .
            $this->getNomeEmpresa() .
            $this->numeroBradescoCompensacao .
            $this->nomeBanco .
            $this->montarBranco('', 7) .
            $this->getDataGravacao() .
            $this->montarBranco('', 8) .
            $this->identificacaoSistema .
            $this->getNumeroSequencialRemessa() .
            $this->montarBranco('', 277) .
            $this->numeroSequencialRegistro;

        return $this->validaLinha($linha);
    }
}
