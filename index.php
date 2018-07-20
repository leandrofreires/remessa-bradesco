<?php
namespace Leandrofreires;

include('vendor/autoload.php');



use Leandrofreires\RemessaBradesco\Arquivo;

//configuracoes
$config['codigo_empresa'] = '4730443'; //acessorio escritural
$config['razao_social'] = 'Uniao Estudantil';
$config['numero_remessa'] = '000003';
$config['data_gravacao'] = '270618';
$config['carteira'] = '09';
$config['agencia'] 						= '1610';
$config['agencia_dv'] 					= '0';
$config['conta'] 						= '1665';
$config['conta_dv'] 					= '9';
//boleto
$boleto['agencia'] 						= '1610';
$boleto['agencia_dv'] 					= '0';
$boleto['conta'] 						= '1665';
$boleto['conta_dv'] 					= '9';
$boleto['razao_conta_cc_cliente'] = '0';

$boleto['carteira'] 					= '9';
$boleto['habilitar_debito_compensacao'] = false;
$boleto['habilitar_multa'] 				= true;
$boleto['percentual_multa'] 			= '2';
$boleto['nosso_numero'] 				= '51359';
$boleto['nosso_numero_dv'] 				= '0';
$boleto['desconto_dia']	 				= '0';
$boleto['rateio'] 						= false;
$boleto['numero_documento'] 			= '51359';
$boleto['vencimento'] 					= '250718';
$boleto['valor'] 						= '266.50';
$boleto['data_emissao_titulo'] 			= '270618';
$boleto['valor_dia_atraso'] 			= '0.074';
$boleto['data_limite_desconto'] 		= '070718';
$boleto['valor_desconto'] 				= '33.97';
$boleto['valor_iof'] 					= '0';
$boleto['valor_abatimento_concedido'] 	= '0';
$boleto['tipo_inscricao_pagador'] 		= 'CPF';
$boleto['numero_inscricao'] 			= '40630201854';
$boleto['nome_pagador'] 				= 'Leandro Freire da Silva';
$boleto['endereco_pagador'] 			= 'Av. Rui Barbosa 408 Centro, Itanhaem-SP';
$boleto['primeira_mensagem'] 			= '';
$boleto['cep_pagador'] 					= '11740';
$boleto['sufixo_cep_pagador'] 			= '000';
$boleto['sacador_segunda_mensagem'] 	= '';

$boleto['mensagem1']                    = 'Desconto de 15% até dia 7; 10% até dia 15; 7% até o dia 20;';
$boleto['mensagem2']                    = 'Após vencimento, cobrar juros de mora de 0.033% ao dia 1% ao mês e multa de 2%';
$boleto['mensagem3']                    = 'Após vencimento, protestamento automatico em 30 dias';
$boleto['mensagem4']                    = 'Após vencimento, sujeito a envio ao SPC/SERASA';
$boleto['data_desconto_2']              = '150718';
$boleto['valor_desconto_2']             = '22.65';
$boleto['data_desconto_3']              = '200718';
$boleto['valor_desconto_3']             = '15.85';

$remessa = new Arquivo();

$remessa->config($config);
$remessa->addBoleto($boleto);
$remessa->addBoletoOpcional($boleto,$config);
$dir = __DIR__.'/CB'.date('dm').'A1';
$remessa->setFilename($dir);
$remessa->save();

