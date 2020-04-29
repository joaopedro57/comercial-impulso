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
