<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//helper com funções uteis para as regras de negocio
function uf($estado)
{
	switch ($estado) {
				
				case "AC" :	$uf = "Acre";					
				break;
				case "AL" :	$uf = "Alagoas";				
				break;
				case "AM" :	$uf = "Amazonas";				
				break;
				case "AP" :	$uf = "Amapá";				
				break;
				case "BA" :	$uf = "Bahia";				
				break;
				case "CE" :	$uf = "Ceará";				
				break;
				case "DF" :	$uf = "Distrito Federal";		
				break;
				case "ES" :	$uf = "Espírito Santo";		
				break;
				case "GO" :	$uf = "Goiás";					
				break;
				case "MA" :	$uf = "Maranhão";				
				break;
				case "MG" :	$uf = "Minas Gerais";			
				break;
				case "MS" :	$uf = "Mato Grosso do Sul";	
				break;
				case "MT" :	$uf = "Mato Grosso";			
				break;
				case "PA" :	$uf = "Pará";					
				break;
				case "PB" :	$uf = "Paraíba";				
				break;
				case "PE" :	$uf = "Pernambuco";			
				break;
				case "PI" :	$uf = "Piauí";					
				break;
				case "PR" :	$uf = "Paraná";				
				break;
				case "RJ" :	$uf = "Rio de Janeiro";		
				break;
				case "RN" :	$uf = "Rio Grande do Norte";	
				break;
				case "RO" :	$uf = "Rondônia";				
				break;
				case "RR" :	$uf = "Roraima";				
				break;
				case "RS" :	$uf = "Rio Grande do Sul";		
				break;
				case "SC" :	$uf = "Santa Catarina";		
				break;
				case "SE" :	$uf = "Sergipe";				
				break;
				case "SP" :	$uf = "São Paulo";				
				break;
				case "TO" :	$uf = "Tocantíns";				
				break;
			}

		return $uf;
}

function produto($produto)
{
	$categoria = explode(" ", $produto);
			
			if ($categoria['2'] == "Assessment") {
				$produto_div = "Assessment";	
			}
			elseif ($categoria['2'] == "Basic") {
				$produto_div = "Profiler Gestão Basic";
			}
			elseif ($categoria['3'] == "Recruiter") {
				$produto_div = "Recruiter";
			}
			elseif ($categoria['3'] == "Multipresa") {
				$produto_div = "Multipresa";
			}
			elseif ($categoria['1'] == "API") {
				$produto_div = "API";
			}
			elseif ($categoria['0'] == "White") {
				$produto_div = "White Label ";
			}
			else {
				$produto_div = "Profiler Gestão";
			}
	return $produto_div;
}

function mercado_ibge($mercado)
{

		$code = explode(".", $mercado);
			
			if ($code['0'] >= 01 && $code['0'] <= 03 ) {
				$mercado = "AGRICULTURA, PECUÁRIA, PRODUÇÃO FLORESTAL, PESCA E AQÜICULTURA";
			}
			elseif ($code['0'] >= 10 && $code['0'] <= 33) {
				$mercado = "INDÚSTRIAS DE TRANSFORMAÇÃO";
			}
			elseif ($code['0'] == 35) {
				$mercado = "ELETRICIDADE E GÁS";
			}
			elseif ($code['0'] >= 36 && $code['0'] <= 39) {
				$mercado = "ÁGUA, ESGOTO, ATIVIDADES DE GESTÃO DE RESÍDUOS E DESCONTAMINAÇÃO";
			}
			elseif ($code['0'] >= 41 && $code['0'] <= 43) {
				$mercado = "CONSTRUÇÃO";
			}
			elseif ($code['0'] >= 45 && $code['0'] <= 47) {
				$mercado = "COMÉRCIO; REPARAÇÃO DE VEÍCULOS AUTOMOTORES E MOTOCICLETAS";
			}
			elseif ($code['0'] >= 49 && $code['0'] <= 53) {
				$mercado = "TRANSPORTE, ARMAZENAGEM E CORREIO";
			}
			elseif ($code['0'] >= 55 && $code['0'] <= 56) {
				$mercado = "ALOJAMENTO E ALIMENTAÇÃO";
			}
			elseif ($code['0'] >= 58 && $code['0'] <= 63) {
				$mercado = "INFORMAÇÃO E COMUNICAÇÃO";
			}
			elseif ($code['0'] >= 64 && $code['0'] <= 66) {
				$mercado = "ATIVIDADES FINANCEIRAS, DE SEGUROS E SERVIÇOS RELACIONADOS";
			}
			elseif ($code['0'] == 68) {
				$mercado = "ATIVIDADES IMOBILIÁRIAS";
			}
			elseif ($code['0'] >= 69 && $code['0'] <= 75) {
				$mercado = "ATIVIDADES PROFISSIONAIS, CIENTÍFICAS E TÉCNICAS";
			}
			elseif ($code['0'] >= 77 && $code['0'] <= 82) {
				$mercado = "ATIVIDADES ADMINISTRATIVAS E SERVIÇOS COMPLEMENTARES";
			}
			elseif ($code['0'] == 84) {
				$mercado = "ADMINISTRAÇÃO PÚBLICA, DEFESA E SEGURIDADE SOCIAL";
			}
			elseif ($code['0'] == 85) {
				$mercado = "EDUCAÇÃO";
			}
			elseif ($code['0'] >= 86 && $code['0'] <= 88) {
				$mercado = "SAÚDE HUMANA E SERVIÇOS SOCIAIS";
			}
			elseif ($code['0'] >= 90 && $code['0'] <= 93) {
				$mercado = "ARTES, CULTURA, ESPORTE E RECREAÇÃO";
			}
			elseif ($code['0'] >= 94 && $code['0'] <= 96) {
				$mercado = "OUTRAS ATIVIDADES DE SERVIÇOS";
			}
			elseif ($code['0'] == 97) {
				$mercado = "SERVIÇOS DOMÉSTICOS";
			}
			elseif ($code['0'] == 99) {
				$mercado = "ORGANISMOS INTERNACIONAIS E OUTRAS INSTITUIÇÕES EXTRATERRITORIAIS";
			}
		return $mercado;
}

function limpaCPF_CNPJ($valor)
{
 $valor = trim($valor);
 $valor = str_replace(".", "", $valor);
 $valor = str_replace(",", "", $valor);
 $valor = str_replace("-", "", $valor);
 $valor = str_replace("/", "", $valor);
 return $valor;
}
function validar_cnpj($cnpj)
{
	$cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);

	// Valida tamanho
	if (strlen($cnpj) != 14)
		return false;

	// Verifica se todos os digitos são iguais
	if (preg_match('/(\d)\1{13}/', $cnpj))
		return false;

	// Valida primeiro dígito verificador
	for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++)
	{
		$soma += $cnpj{$i} * $j;
		$j = ($j == 2) ? 9 : $j - 1;
	}

	$resto = $soma % 11;

	if ($cnpj{12} != ($resto < 2 ? 0 : 11 - $resto))
		return false;

	// Valida segundo dígito verificador
	for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++)
	{
		$soma += $cnpj{$i} * $j;
		$j = ($j == 2) ? 9 : $j - 1;
	}

	$resto = $soma % 11;

	return $cnpj{13} == ($resto < 2 ? 0 : 11 - $resto);
}

function codigo_knae($codigo)
{
	$codigo = trim($codigo);
	$codigo = str_replace(".", "", $codigo);
	$codigo = explode("-", $codigo);
	$codigo = $codigo['0']."-".$codigo['1']."/".$codigo['2'];
	return $codigo;
}

function url_exists($url) {

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    return $code; // verifica se recebe "status OK"
}

function get_uf($uf)
{
	if ($uf == 46) {
		$uf = "AC";
		return $uf;
	}
	elseif ($uf == 47) {
		$uf = "AL";
		return $uf;
	}
	elseif ($uf == 48) {
		$uf = "AP";
		return $uf;
	}
	elseif ($uf == 49) {
		$uf = "AM";
		return $uf;
	}
	elseif ($uf == 50) {
		$uf = "BA";
		return $uf;
	}
	elseif ($uf == 51) {
		$uf = "CE";
		return $uf;
	}
	elseif ($uf == 52) {
		$uf = "DF";
		return $uf;
	}
	elseif ($uf == 53) {
		$uf = "ES";
		return $uf;
	}
	elseif ($uf == 54) {
		$uf = "GO";
		return $uf;
	}
	elseif ($uf == 55) {
		$uf = "MA";
		return $uf;
	}
	elseif ($uf == 56) {
		$uf = "MT";
		return $uf;
	}
	elseif ($uf == 57) {
		$uf = "MS";
		return $uf;
	}
	elseif ($uf == 58) {
		$uf = "MG";
		return $uf;
	}
	elseif ($uf == 59) {
		$uf = "PR";
		return $uf;
	}
	elseif ($uf == 60) {
		$uf = "PB";
		return $uf;
	}
	elseif ($uf == 61) {
		$uf = "PA";
		return $uf;
	}
	elseif ($uf == 62) {
		$uf = "PE";
		return $uf;
	}
	elseif ($uf == 63) {
		$uf = "PI";
		return $uf;
	}
	elseif ($uf == 64) {
		$uf = "RJ";
		return $uf;
	}
	elseif ($uf == 65) {
		$uf = "RN";
		return $uf;
	}
	elseif ($uf == 66) {
		$uf = "RS";
		return $uf;
	}
	elseif ($uf == 67) {
		$uf = "RO";
		return $uf;
	}
	elseif ($uf == 68) {
		$uf = "PR";
		return $uf;
	}
	elseif ($uf == 69) {
		$uf = "SC";
		return $uf;
	}
	elseif ($uf == 70) {
		$uf = "SE";
		return $uf;
	}
	elseif ($uf == 71) {
		$uf = "SP";
		return $uf;
	}
	elseif ($uf == 72) {
		$uf = "TO";
		return $uf;
	}
}

