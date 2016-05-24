<?php
namespace Hmarinjr\RemessaBradesco;

class Trailler extends Funcoes
{

    //001 - 001 - 1 - N CONSTANTE
    private $identificacaoRegistro = 9;
    //002 - 394 - 393 - A
    //CAMPO EM BRANCO COM 393 POSIÇÕES
    //395 - 400 - 6 - N
    private $numeroSequencialRegistro = ''; //ultima numero do sequencial dado pelo gerador

    /**
     * @return the $numero_sequencial_regsitro
     */

    public function getNumeroSequencialRegsitro()
    {
        return $this->numeroSequencialRegistro;
    }

    /**
     * @param string $numero_sequencial_regsitro
     */
    public function setNumeroSequencialRegsitro($numero_sequencial_regsitro)
    {
        if (is_numeric($numero_sequencial_regsitro)) {
            $numero_sequencial_regsitro = $this->add_zeros($numero_sequencial_regsitro, 6);

            if ($this->valid_tamanho_campo($numero_sequencial_regsitro, 6)) {
                $this->numeroSequencialRegistro = $numero_sequencial_regsitro;
            } else {
                throw new Exception('Error - Numero do sequencial invalido.');
            }
        } else {
            throw new Exception('Error - Numero do sequencial invalido.');
        }
    }

    /* (non-PHPdoc)
     * @see IFuncoes::montar_linha()
     */

    public function montaLinha()
    {
        // TODO Auto-generated method stub
        $linha = $this->identificacaoRegistro .
            $this->montar_branco('', 393) .
            $this->getNumeroSequencialRegsitro();

        return $this->valid_linha($linha);
    }

}
