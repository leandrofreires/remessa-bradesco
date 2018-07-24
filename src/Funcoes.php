<?php
namespace Leandrofreires\RemessaBradesco;

use Exception;

abstract class Funcoes
{
    /**
     * metodo para montar uma string com espa�os em branco
     * @param $string
     * @param $tamanho
     * @param string $posicao
     * @return string|boolean
     * @throws Exception
     */
    public function montarBranco($string, $tamanho, $posicao = 'left')
    {
        //contanto tamanho da string
        $qtd_value = (int) mb_strlen($string);

        //verificando se existem numeros
        if ($tamanho > 0) {
            $result = '';
            $qtd_zeros = $tamanho - $qtd_value;

            for ($i = 0; $i < $qtd_zeros; $i++) {
                $result .= ' ';
            }

            //verificando posi��o dos zeros
            if ($posicao == 'left') {
                $result = $result . $string;
            } elseif ($posicao == 'right') {
                $result = $string . $result;
            }

            return $result;
        } else {
            throw new Exception('Error - tamanho da quantidade de espacos nao specificado.');
        }
    }

    /**
     * Preenche com zeros a esqueda da string
     * @param $string
     * @param $tamanho
     * @return string
     */
    public function addZeros($string, $tamanho, $posicao = 'left')
    {
        //contanto tamanho da string
        $qtd_value = (int) mb_strlen($string);

        //verificando se existem numeros
        if ($tamanho > 0 && $qtd_value <= $tamanho) {

            $result = '';
            $qtd_zeros = $tamanho - $qtd_value;

            for ($i = 0; $i < $qtd_zeros; $i++) {
                $result .= '0';
            }

            //verificando posicaoo dos zeros
            if ($posicao == 'left') {
                $result = $result . $string;
            } elseif ($posicao == 'right') {
                $result = $string . $result;
            }

            return $result;
        } else {
            return false;
        }
    }

    /**
     * validando linha
     * @param  $string
     * @return string
     * @throws Exception
     */
    public function validaLinha($string)
    {
        if ($this->validaTamanhoCampo($string, 400)) {
            return $string;
        }
        throw new Exception('Erro Validacao do tamanha da linha :'.$string);
    }

    /**
     * metodo para remover acentos
     * @param string $string = 'ÁÍÓÚÉÄÏÖÜËÀÌÒÙÈÃÕÂÎÔÛÊáíóúéäïöüëàìòùèãõâîôûêÇç';
     * @return string
     */
    public function removeAcentos($string)
    {
        $string =  preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT', $string ));
        $string = preg_replace('/[^a-z0-9]\s/i', '', $string);
        return $string;
    }

    /**
     * valida o tamanho do campo
     * @param $string
     * @param $tamanho
     * @return boolean
     */
    public function validaTamanhoCampo($string, $tamanho)
    {
        $length = (int) mb_strlen($string);

        if ($length !== $tamanho) {
            return false;
        }

        return true;
    }

    /**
     * metodo para remover forma��o de moedas: pontos e virgulas
     * @param $valor
     * @return mixed
     * @throws Exception
     */
    public function removeFormatacaoMoeda($valor)
    {
        if (!is_numeric($valor))
            throw new Exception('Error - O valor ' . $valor . ' nao eh um numero.');

        $valor = str_replace(".", "", $valor);

        $valor = str_replace(",", "", $valor);

        return $valor;
    }

    /**
     * metodo para validar o CPF
     * @param string $cpf
     * @return boolean
     */
    public function validaCPF($cpf)
    {

        if (strlen($cpf) < 14)
            return false;
        $cpf = preg_replace('/[^0-9]+/','',intval($cpf));
        print_r($cpf);
        if ($cpf =='')
            return false;
        $digitoA = 0;
        $digitoB = 0;

        for($i=0, $x=10 ; $i<=8; $i++, $x--)
        {
            $digitoA += $cpf[$i] * $x;
        }
        for($i=0, $x=11 ; $i<=9; $i++, $x--)
        {
            if(str_repeat($i,11)==$cpf)
            {
                return false;
            }
            $digitoB += $cpf[$i] * $x;

        }
        $somaA = (($digitoA%11) < 2) ? 0 : 11-($digitoA%11);
        $somaB = (($digitoB%11) < 2) ? 0 : 11-($digitoB%11);
        if($somaA != $cpf[9] || $somaB != $cpf[10])
        {
            return false;
        }else
        {
            return true;
        }
    }

    /**
     * retorna o digito verificador do nosso numero com o numero da carteira
     * @param $nosso_numero
     * @return mixed
     */
    public function digitoVerificadorNossoNumero($nosso_numero)
    {
        //die($nosso_numero);
        $modulo = self::modulo11($nosso_numero, 7);

        //die(print_r($modulo));

        $digito = 11 - $modulo['resto'];

        if ($digito == 10) {
            $dv = "P";
        } elseif ($digito == 11) {
            $dv = 0;
        } else {
            $dv = $digito;
        }

        return $dv;
    }

    /**
     * calculo do modulo 11 do digito veirificador
     * @param $num
     * @param $base
     * @return mixed
     */
    public static function modulo11($num, $base = 9)
    {
        $fator = 2;
        $soma = 0;
        // Separacao dos numeros.
        for ($i = mb_strlen($num); $i > 0; $i--) {
            //  Pega cada numero isoladamente.
            $numeros[$i] = substr($num, $i - 1, 1);
            //  Efetua multiplicacao do numero pelo falor.
            $parcial[$i] = $numeros[$i] * $fator;
            //  Soma dos digitos.
            $soma += $parcial[$i];
            if ($fator == $base) {
                //  Restaura fator de multiplicacao para 2.
                $fator = 1;
            }
            $fator++;
        }

        $result = array(
            'digito' => ($soma * 10) % 11,
            // Remainder.
            'resto' => $soma % 11,
        );
        if ($result['digito'] == 10) {
            $result['digito'] = 0;
        }
        return $result;
    }

    /**
     * metodo para resumir o texto
     * ESSA NÃO É UMA FORMA IDEAL
     * @param $string
     * @param $tamanho
     * @return string
     */
    public function resumeTexto($string, $tamanho)
    {
        return substr($string, 0, $tamanho);
    }

    abstract public function montaLinha();
}
