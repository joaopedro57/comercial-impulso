<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function google_get(){
	
	$url = "https://sheets.googleapis.com/v4/spreadsheets/".PLANILHA_FARMER_ID."/values/Contas%20Trabalhadas!A3%3AM3?valueRenderOption=FORMATTED_VALUE&key=" . GOOGLE_API_KEY;
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	$output = curl_exec($ch);
	$info = curl_getinfo($ch);
	curl_close($ch);

	return json_decode($output, 1);
}

function google_input_roda($dados) {

	$url = "https://sheets.googleapis.com/v4/spreadsheets/".PLANILHA_RODA_INDICACAO."/values/P%C3%A1gina1!1%3A1000:append?includeValuesInResponse=false&insertDataOption=INSERT_ROWS&responseDateTimeRenderOption=FORMATTED_STRING&responseValueRenderOption=FORMATTED_VALUE&valueInputOption=USER_ENTERED&key=".API_GOOGLE_KEY;

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($dados) );
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

	$output = curl_exec($ch);
	$info = curl_getinfo($ch);
	curl_close($ch);

	$data = json_decode($output, 1);
	$data['curl_info'] = $info;
	//print_r($data);exit;
	return $data;
}

function verificacao_google() {
	$url = "https://accounts.google.com/o/oauth2/v2/auth?scope=https://www.googleapis.com/auth/spreadsheets&access_type=offline&include_granted_scopes=true&state=state_parameter_passthrough_value&redirect_uri=http://comercial.solides.adm.br/index.php/Roda_Indicacao&response_type=code&client_id=832740055940-qpc9f821afal8rhutp7f901a0psc80gu.apps.googleusercontent.com";

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	$output = curl_exec($ch);
	$info = curl_getinfo($ch);
	curl_close($ch);

	return json_decode($output, 1);
}

