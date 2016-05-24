<?php
namespace Hmarinjr\RemessaBradesco;

class HeaderLabel extends Funcoes implements IFuncoes
{
    //001 - 001 - 1 -  N CONSTANTE
    private $identificacao_registro = 0;

    //002 - 002 - 1 - N CONSTANTE
    private $identificacao_arquivo_remessa = 1;

    //003 - 009 - 7 - A CONSTANTE
    private $literal_remessa = 'REMESSA';

    //010 - 011 - 2 - N CONSTANTE
    private $codigo_servico = '01';

    //012 - 026 - 15 - A CONSTANTE - COMPLETAR COM ESPAÇOS EM BRANCO A DIREITA
    private $literal_servico = 'COBRANCA';

    //027 - 046 - 20 - N COMPLETAR COM ZEROS A ESQUERDA
    private $codigo_empresa = '';     //<---- verificar observações

    //047 - 076 - 30 - A - COMPLETAR COM ESPAÇOS EM BRANCO A DIREITA
    private $nome_empresa = '';

    //077 - 079 - 3 - N CONSTANTE
    private $numero_bradesco_compensacao = 237;

    //080 - 094 - 15 - A CONSTANTE - COMPLETAR COM ESPAÇOES EM BRANCO A DIREITA
    private $nome_banco = 'Bradesco';

    //095 - 100 - 6 - N
    private $data_gravacao = '';     //<---- verificar observações

    //101 - 108 - 8 - A
    //CAMPO EM BRANCO COM 8 POSIÇÕES
    //109 - 110 - 2 - A
    private $identificacao_sistema = 'MX';

    //111 - 117 - 7 - N  - COMPLETAR COM ZEROS A ESQUERDA - DEVE SER AUTOINCREMENTADA +1 - VALOR UNICO PARA CADA NOVO ARQUIVO
    private $numero_sequencial_remessa = '';

    //118 - 394 - 277 - A
    //CAMPO EM BRANCO COM 277 POSIÇÕES
    //395 - 400 - 6 - N CONSTANTE
    private $numero_sequencial_registro = '000001';

    /**
     * @return the $codigo_empresa
     */
    public function getCodigo_empresa()
    {
        return $this->codigo_empresa;
    }

    /**
     * @return the $nome_empresa
     */
    public function getNome_empresa()
    {
        return $this->nome_empresa;
    }

    /**
     * @return the $data_gravacao
     */
    public function getData_gravacao()
    {
        //verifica se a variavel esta vazia, se sim poe a data atual como default
        if (empty($this->data_gravacao)) {
            $this->setData_gravacao(date('dmy'));
        }

        return $this->data_gravacao;
    }

    /**
     * @return the $numero_sequencial_remessa
     */
    public function getNumero_sequencial_remessa()
    {
        return $this->numero_sequencial_remessa;
    }

    /**
     * @param string $codigo_empresa
     */
    public function setCodigo_empresa($codigo_empresa)
    {
        if (!is_numeric($codigo_empresa)) {
            throw new Exception('Error - Não é um numero');
        }

        $this->codigo_empresa = $this->add_zeros($codigo_empresa, 20);
    }

    /**
     * @param string $nome_empresa
     */
    public function setNome_empresa($nome_empresa)
    {
        $length = (int) strlen($nome_empresa);

        if ($length <= 0 || $length > 30) {
            throw new Exception('Error - Tamanho de texto invalido, para o nome da empresa.');
        }

        $this->nome_empresa = $this->montar_branco($nome_empresa, 30, 'right');
    }

    /**
     * @param string $data_gravacao
     */
    public function setData_gravacao($data_gravacao)
    {
        if (!is_numeric($data_gravacao)) {
            throw new Exception('Error - O campo data de gravação não é um numero.');
        }

        $this->data_gravacao = $data_gravacao;
    }

    /**
     * @param string $numero_sequencial_remessa
     */
    public function setNumero_sequencial_remessa($numero_sequencial_remessa)
    {
        //verificando se � um numero
        if (!is_numeric($numero_sequencial_remessa)) {
            throw new Exception('Error - O campo numero sequencial remessa não é um numero.');
        }

        //completando a string com zeros
        $numero_sequencial_remessa = $this->add_zeros($numero_sequencial_remessa, 7);
        if (!$this->valid_tamanho_campo($numero_sequencial_remessa, 7)) {
            throw new Exception('Error - Tamanho de texto invalido, para o campo numero sequencial remessa.');
        }

        $this->numero_sequencial_remessa = $numero_sequencial_remessa;
    }

    /* (non-PHPdoc)
     * @see IFuncoes::montar_linha()
     */

    public function montar_linha()
    {

        //motando linha do cabe�alho da remessa
        $linha = $this->identificacao_registro .
            $this->identificacao_arquivo_remessa .
            $this->literal_remessa .
            $this->codigo_servico .
            $this->literal_servico .
            $this->montar_branco('', 7) .
            $this->getCodigo_empresa() .
            $this->getNome_empresa() .
            $this->numero_bradesco_compensacao .
            $this->nome_banco .
            $this->montar_branco('', 7) .
            $this->getData_gravacao() .
            $this->montar_branco('', 8) .
            $this->identificacao_sistema .
            $this->getNumero_sequencial_remessa() .
            $this->montar_branco('', 277) .
            $this->numero_sequencial_registro;

        return $this->valid_linha($linha);
    }

}
