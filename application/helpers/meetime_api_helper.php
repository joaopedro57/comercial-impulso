<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function meetime_lead( $data ){
	$url = "https://api.meetime.com.br/v2/prospections/cadence/6989/lead?token=bKizSuBFGSpWqlubkLs-hQ6RYziRmNJb1wJm0dBkDmo";

	$ch = curl_init();
	curl_setopt( $ch, CURLOPT_URL, $url );
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

	curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json') );
	curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, 'POST' );
	curl_setopt( $ch, CURLOPT_POSTFIELDS, $data );

	$output = curl_exec( $ch );
	$info = curl_getinfo( $ch );
	curl_close( $ch );

	return json_decode( $output, true );
}

function soNumero($str) {
    return preg_replace("/[^0-9]/", "", $str);
}

function pipedrive_person( $data ){
	$url = "https://api.pipedrive.com/v1/persons?api_token=30b28f0f7c3a1c8d22c75bd60774c9428b8371f6";

	$ch = curl_init();
	curl_setopt( $ch, CURLOPT_URL, $url );
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

	curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json') );
	curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, 'POST' );
	curl_setopt( $ch, CURLOPT_POSTFIELDS, $data );

	$output = curl_exec( $ch );
	$info = curl_getinfo( $ch );
	curl_close( $ch );

	return json_decode( $output, true );
}

function pipedrive_org( $data ){
	$url = "https://api.pipedrive.com/v1/organizations?api_token=30b28f0f7c3a1c8d22c75bd60774c9428b8371f6";

	$ch = curl_init();
	curl_setopt( $ch, CURLOPT_URL, $url );
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

	curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json') );
	curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, 'POST' );
	curl_setopt( $ch, CURLOPT_POSTFIELDS, $data );

	$output = curl_exec( $ch );
	$info = curl_getinfo( $ch );
	curl_close( $ch );

	return json_decode( $output, true );
}

function pipedrive_deal( $data ){
	$url = "https://api.pipedrive.com/v1/deals?api_token=30b28f0f7c3a1c8d22c75bd60774c9428b8371f6";

	$ch = curl_init();
	curl_setopt( $ch, CURLOPT_URL, $url );
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

	curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json') );
	curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, 'POST' );
	curl_setopt( $ch, CURLOPT_POSTFIELDS, $data );

	$output = curl_exec( $ch );
	$info = curl_getinfo( $ch );
	curl_close( $ch );

	return json_decode( $output, true );
}

function pipedrive_note( $data ){
	$url = "https://api.pipedrive.com/v1/notes?api_token=30b28f0f7c3a1c8d22c75bd60774c9428b8371f6";

	$ch = curl_init();
	curl_setopt( $ch, CURLOPT_URL, $url );
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

	curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json') );
	curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, 'POST' );
	curl_setopt( $ch, CURLOPT_POSTFIELDS, $data );

	$output = curl_exec( $ch );
	$info = curl_getinfo( $ch );
	curl_close( $ch );

	return json_decode( $output, true );
}
function slack_mensagem($dados)
{
	$url = "https://slack.com/api/chat.postMessage?token=xoxp-261732318791-899597451744-1108889184273-f5484c28db117fe2221e1f490a1e9b30";

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,0);
	curl_setopt($ch, CURLOPT_TIMEOUT, 900);
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($dados));
	curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/x-www-form-urlencoded"));

	$output = curl_exec($ch);
	$info = curl_getinfo($ch);
	$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	curl_close($ch);

	return json_decode( $output, true );

}
function get_info_cnpj( $cnpj ) {
	$url = "http://ws.hubdodesenvolvedor.com.br/v2/cnpj/?cnpj=". $cnpj ."&token=" . TOKEN_HUB_DEV;
	$ch = curl_init();
	curl_setopt( $ch, CURLOPT_URL, $url );
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

	if( ENVIRONMENT != 'production' ){
		curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, FALSE );
	}

	curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json') );
	$output = curl_exec( $ch );
	$info = curl_getinfo( $ch );
	curl_close( $ch );

	$data = json_decode( $output, true );
	if( $data['return'] == 'OK' ){
		return $data['result'];
	}else{
		return FALSE;
	}
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
