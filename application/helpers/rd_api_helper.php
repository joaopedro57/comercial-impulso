<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function rd_verificacao($code) {

	$url = "https://api.rd.services/auth/token";

	$dados = ["client_id" => RD_CLIENT_ID ,"client_secret" => RD_SECRET, "code" => $code];
	
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
	return $data;
}

function att_token($token){

	$url = "https://api.rd.services/auth/token";

	$dados = ["client_id" => RD_CLIENT_ID ,"client_secret" => RD_SECRET, "refresh_token" => $token];
	
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
	return $data;
}
function dados_lead($idRd, $token)
{
	$url = "https://api.rd.services/platform/contacts/".$idRd;


	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded',
												'Authorization: Bearer '.$token));


	$output = curl_exec($ch);
	$info = curl_getinfo($ch);
	curl_close($ch);

	$data = json_decode($output, 1);
	$data['curl_info'] = $info;
	return $data;
}

function gestao_profiler()
{
	$url = "https://system.solides.com/pt-br/api/v1/profiler";


	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
												'Authorization: Token token=0ac88b6518318c087243473a6f0abc43e6678a9a7bf82aee54ab'));


	$output = curl_exec($ch);
	$info = curl_getinfo($ch);
	curl_close($ch);

	$data = json_decode($output, 1);
	$data['curl_info'] = $info;
	return $data;
}

function dados_lead_email($emailRd, $token)
{
	$url = "https://api.rd.services/platform/contacts/email:".$emailRd;

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded',
												'Authorization: Bearer '.$token));


	$output = curl_exec($ch);
	$info = curl_getinfo($ch);
	curl_close($ch);

	$data = json_decode($output, 1);
	$data['curl_info'] = $info;
	return $data;
}

function criar_lead_rd($dados, $token)
{
	$url = "https://api.rd.services/platform/events";

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($dados) );
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
												'Authorization: Bearer '.$token));
    
	$output = curl_exec($ch);
	$info = curl_getinfo($ch);
	curl_close($ch);
	
	$data = json_decode($output, 1);
	$data['curl_info'] = $info;
	return $data;
}

function criar_lead_rd_2($uuid,$dados, $token)
{
	$url = "https://api.rd.services/platform/contacts/".$uuid;

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($dados) );
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
												'Authorization: Bearer '.$token));
    
	$output = curl_exec($ch);
	$info = curl_getinfo($ch);
	curl_close($ch);
	
	$data = json_decode($output, 1);
	$data['curl_info'] = $info;
	return $data;
}
