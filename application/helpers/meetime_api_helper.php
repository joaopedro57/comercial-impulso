<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function meetime_lead( $data ){
	$url = "https://api.meetime.com.br/v1/flow/cadences/6489/leads?token=PLsN__Bij73TNqPHiZnHTPRCx6mweY3-UYIHiBMTZ8E";

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
