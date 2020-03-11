<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function asset() 
{
      return base_url().'assets/';
}
function cnpj_receita($cnpj)
{
	$url = "https://www.receitaws.com.br/v1/cnpj/".$cnpj;
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	
	$output = curl_exec($ch);
	$info = curl_getinfo($ch);
	curl_close($ch);
	
	return json_decode($output, 1);	
}

function pipedrive_get_user($id)
{
	$url = "https://api.pipedrive.com/v1/users/".$id."?api_token=" . PIPEDRIVE_TOKEN;
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	
	$output = curl_exec($ch);
	$info = curl_getinfo($ch);
	curl_close($ch);
	
	return json_decode($output, 1);	
}

function pipedrive_get_stage($stage_id)
{
	$url = "https://api.pipedrive.com/v1/stages/{$stage_id}?api_token=" . PIPEDRIVE_TOKEN;
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	
	$output = curl_exec($ch);
	$info = curl_getinfo($ch);
	curl_close($ch);
	
	return json_decode($output, 1);	
}

function gestao_api()
{
	$url = "https://system.solides.com/pt-br/api/v1/profiler";
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	
	$output = curl_exec($ch);
	$info = curl_getinfo($ch);
	curl_close($ch);
	
	return json_decode($output, 1);	
}

function get_note($id)
{
	$url = "https://api.pipedrive.com/v1/notes/{$id}?api_token=".PIPEDRIVE_TOKEN;

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	
	$output = curl_exec($ch);
	$info = curl_getinfo($ch);
	curl_close($ch);
	
	return json_decode($output, 1);
}
function pipedrive_get_usuario($user_id = FALSE)
{
	if($user_id){
		$url = "https://api.pipedrive.com/v1/users/{$user_id}?api_token=" . PIPEDRIVE_TOKEN;
	}
	else{
		$url = "https://api.pipedrive.com/v1/users?api_token=" . PIPEDRIVE_TOKEN;	
	}

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	$output = curl_exec($ch);
	$info = curl_getinfo($ch);
	curl_close($ch);

	return json_decode($output, 1);
}

function pipedrive_find_usuario($nome)
{
	$url = "https://api.pipedrive.com/v1/users/find?term=$nome&api_token=" . PIPEDRIVE_TOKEN;	
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	$output = curl_exec($ch);
	$info = curl_getinfo($ch);
	curl_close($ch);

	return json_decode($output, 1);
}

function pipedrive_get_deal_updates($deal_id)
{
	$url = "https://api.pipedrive.com/v1/deals/{$deal_id}/flow?start=0&api_token=" . PIPEDRIVE_TOKEN;

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	$output = curl_exec($ch);
	$info = curl_getinfo($ch);
	curl_close($ch);

	return json_decode($output, 1);
}
function pipedrive_get_deal($deal_id)
{
	$url = "https://api.pipedrive.com/v1/deals/{$deal_id}?api_token=" . PIPEDRIVE_TOKEN;

	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	$output = curl_exec($ch);
	$info = curl_getinfo($ch);
	curl_close($ch);

	return json_decode($output, 1);
}
function pipedrive_get_person($person_id)
{
	$url = "https://api.pipedrive.com/v1/persons/{$person_id}?api_token=" . PIPEDRIVE_TOKEN;
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	$output = curl_exec($ch);
	$info = curl_getinfo($ch);
	curl_close($ch);

	return json_decode($output, 1);
}

function pipedrive_find_person($person_email)
{
	$url = "https://api.pipedrive.com/v1/persons/find?term=$person_email&start=0&search_by_email=1&api_token=" . PIPEDRIVE_TOKEN;

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	$output = curl_exec($ch);
	$info = curl_getinfo($ch);
	curl_close($ch);

	return json_decode($output, 1);
}



function pipedrive_deals_of_person($person_id)
{
	$url = "https://api.pipedrive.com/v1/persons/$person_id/deals?start=0&status=open&api_token=" . PIPEDRIVE_TOKEN;

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	$output = curl_exec($ch);
	$info = curl_getinfo($ch);
	curl_close($ch);

	return json_decode($output, 1);
}

function pipedrive_add_person($dados)
{
	$url = "https://api.pipedrive.com/v1/persons?api_token=" . PIPEDRIVE_TOKEN;
	
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

function pipedrive_update_person($person_id, $json)
{
	
	$json = json_encode($json);
	$url = "https://api.pipedrive.com/v1/persons/$person_id?api_token=" . PIPEDRIVE_TOKEN;
		
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($json)));
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
	curl_setopt($ch, CURLOPT_POSTFIELDS,$json);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	
	$response  = curl_exec($ch);
	$output = curl_exec($ch);
	$info = curl_getinfo($ch);
	curl_close($ch);

	$data = json_decode($output, 1);
	$data['curl_info'] = $info;
	return $data;
}

function pipedrive_add_deal($dados)
{
	$url = "https://api.pipedrive.com/v1/deals?api_token=" . PIPEDRIVE_TOKEN;
	
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

function pipedrive_get_organization($org_id)
{
	$url = "https://api.pipedrive.com/v1/organizations/{$org_id}?api_token=" . PIPEDRIVE_TOKEN;

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	$output = curl_exec($ch);
	$info = curl_getinfo($ch);
	curl_close($ch);

	return json_decode($output, 1);
}

function pipedrive_add_organization($dados)
{
	$url = "https://api.pipedrive.com/v1/organizations?api_token=" . PIPEDRIVE_TOKEN;
	
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

function pipedrive_get_deal_products($deal_id)
{
	$url = "https://api.pipedrive.com/v1/deals/{$deal_id}/products?start=0&api_token=" . PIPEDRIVE_TOKEN;

 	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	$output = curl_exec($ch);
	$info = curl_getinfo($ch);
	curl_close($ch);

	return json_decode($output, 1);

	
}

function pipedrive_get_product($product_id)
{
	$url = "https://api.pipedrive.com/v1/products/{$product_id}?api_token=" . PIPEDRIVE_TOKEN;

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	$output = curl_exec($ch);
	$info = curl_getinfo($ch);
	curl_close($ch);

	return json_decode($output, 1);
}

function pipedrive_get_produto_deal($deal_id)
{
	$url = "https://api.pipedrive.com/v1/deals/{$deal_id}/products?start=0&include_product_data=0&api_token=" . PIPEDRIVE_TOKEN;

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	$output = curl_exec($ch);
	$info = curl_getinfo($ch);
	curl_close($ch);

	return json_decode($output, 1);
}

function pipedrive_get_org_field($field_id)
{
	$url = "https://api.pipedrive.com/v1/organizationFields/{$field_id}?api_token=" . PIPEDRIVE_TOKEN;
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	$output = curl_exec($ch);
	$info = curl_getinfo($ch);
	curl_close($ch);

	return json_decode($output, 1);
}


function pipedrive_gel_all_deal_fiel()
{
	$url = "https://api.pipedrive.com/v1/dealFields?api_token=" . PIPEDRIVE_TOKEN;

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	$output = curl_exec($ch);
	$info = curl_getinfo($ch);
	curl_close($ch);

	return json_decode($output, 1);

}

function pipedrive_get_deal_field($field_id)
{
	$url = "https://api.pipedrive.com/v1/dealFields/{$field_id}?api_token=" . PIPEDRIVE_TOKEN;
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	$output = curl_exec($ch);
	$info = curl_getinfo($ch);
	curl_close($ch);

	return json_decode($output, 1);
}

function pipedrive_attach_file($deal_id, $file, $note_id = FALSE)
{
	set_time_limit(0);
	$url = "https://api.pipedrive.com/v1/files?api_token=" . PIPEDRIVE_TOKEN;
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,0); 
	curl_setopt($ch, CURLOPT_TIMEOUT, 900);
	curl_setopt($ch, CURLOPT_POSTFIELDS, array(
      'file' => "@$file",
      'deal_id' => $deal_id
    ));
	curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: multipart/form-data",
	                                           ));

	$output = curl_exec($ch);
	$info = curl_getinfo($ch);
	curl_close($ch);

	$data = json_decode($output, 1);
	$data['curl_info'] = $info;
	return $data;
}

function pipedrive_add_note($deal_id, $note)
{
	$url = "https://api.pipedrive.com/v1/notes?api_token=" . PIPEDRIVE_TOKEN;
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_POSTFIELDS, array(      
      'deal_id' => $deal_id,
      'content' => $note
    ));

	$output = curl_exec($ch);
	$info = curl_getinfo($ch);
	curl_close($ch);

	$data = json_decode($output, 1);
	$data['curl_info'] = $info;
	return $data;
}

function pipedrive_get_formas_pg()
{
	$formas = pipedrive_get_deal_field(12484)['data']['options'];
	foreach ($formas as $forma ) {
		$opts[$forma['id']] = $forma['label'];
	}

	return $opts;
}

function pipedrive_get_uf($cid_id)
{
	$cidades = pipedrive_get_org_field(4021)[data][options]; //id do campo de UF no pipedrive
	$UF = "NA";
	foreach ($cidades as $cidade){
		if($cidade["id"] == $cid_id){
			$UF = $cidade['label'];
			break;
		}
	}
	return $UF;
}

function pipedrive_get_field_value($option_id, $field_id)
{	
	$opts = pipedrive_get_deal_field($field_id)[data][options]; 	
	$opcoes_id = explode(",", $option_id);
	$val = array();
	foreach ($opts as $opt){
		if(in_array($opt['id'], $opcoes_id)){
			$val[] = $opt['label'];
			if(count($opcoes_id) == 1){
				break;
			}
		}
	}
	return implode(",",$val);
}

function pipedrive_get_stage_deals($stage_id, $qte_deals = 100)
{
	$start = 0;
	$limit_pagination = 500;
	$more_itens = TRUE;
	$dados = array();

	if($qte_deals < $limit_pagination){
		$limit_pagination = $qte_deals;
	}

	while($more_itens){

		$url = "https://api.pipedrive.com/v1/stages/$stage_id/deals?everyone=1&start=$start&limit=$limit_pagination&api_token=" . PIPEDRIVE_TOKEN;
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		$output = curl_exec($ch);
		$info = curl_getinfo($ch);
		curl_close($ch);

		$resp_array = json_decode($output, 1);

		$dados = array_merge($dados, $resp_array['data']);		
		$more_itens = $resp_array['additional_data']['pagination']['more_items_in_collection'];	
		$start = isset($resp_array['additional_data']['pagination']['next_start']) ? $resp_array['additional_data']['pagination']['next_start'] : 0;
				
	}
	
	return $dados;
}

function pipedrive_get_ligacoes_usuario($vendedor_id, $data_ini, $data_fim)
{
	$start = 0;
	$limit_pagination = 500;
	$more_itens = TRUE;
	$dados = array();

	while($more_itens){

		$url = "https://api.pipedrive.com/v1/activities?user_id=$vendedor_id&start=$start&limit=$limit_pagination&start_date=$data_ini&end_date=$data_fim&done=1&api_token=" . PIPEDRIVE_TOKEN;
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		$output = curl_exec($ch);
		$info = curl_getinfo($ch);
		curl_close($ch);

		$resp_array = json_decode($output, 1);
		if(isset($resp_array['data'])){
			$dados = array_merge($dados, $resp_array['data']);					
		}				
		$more_itens = $resp_array['additional_data']['pagination']['more_items_in_collection'];	
		$start = isset($resp_array['additional_data']['pagination']['next_start']) ? $resp_array['additional_data']['pagination']['next_start'] : 0;
	}
	
	$ligacoes = array();
	foreach ($dados as $ativ) {
		if (strpos($ativ['type'], 'ligar') !== false){
			$ligacoes[] = $ativ;
		}
	}
	
	return $ligacoes;
}

function pipedrive_update_deal($deal_id, $json)
{
	$json = json_encode($json);
	$url = "https://api.pipedrive.com/v1/deals/$deal_id?api_token=" . PIPEDRIVE_TOKEN;
		
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($json)));
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
	curl_setopt($ch, CURLOPT_POSTFIELDS,$json);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	
	$response  = curl_exec($ch);
	$output = curl_exec($ch);
	$info = curl_getinfo($ch);
	curl_close($ch);

	$data = json_decode($output, 1);
	$data['curl_info'] = $info;
	return $data;
}

function pipedrive_update_organization($deal_id, $json)
{
	$org_id = pipedrive_get_deal($deal_id)['data']['org_id']['value'];

	$json = json_encode($json);
	$url = "https://api.pipedrive.com/v1/organizations/$org_id?api_token=" . PIPEDRIVE_TOKEN;
		
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($json)));
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
	curl_setopt($ch, CURLOPT_POSTFIELDS,$json);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	
	$response  = curl_exec($ch);
	$output = curl_exec($ch);
	$info = curl_getinfo($ch);
	curl_close($ch);

	$data = json_decode($output, 1);
	$data['curl_info'] = $info;
	return $data;
}

function pipedrive_get_atividades_deal($deal_id)
{
	$url = "https://api.pipedrive.com/v1/deals/$deal_id/activities?start=0&api_token=" . PIPEDRIVE_TOKEN;

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	$output = curl_exec($ch);
	$info = curl_getinfo($ch);
	curl_close($ch);

	return json_decode($output, 1);
}


function pipedrive_get_forma_pgto_id($forma_pgto)
{
	switch ($forma_pgto) {
		case 'boleto':
			return 157;
		
		case 'cartao_credito':
			return 159;
		
		case 'cheque':
			return 162;

		case 'deposito':
			return 164;

		case 'internet_banking':
			return 166;

		case 'transferencia':
			return 167;
	}
}
function sanitizeString($string) {

    // matriz de entrada
    $what = array( 'ä','ã','à','á','â','ê','ë','è','é','ï','ì','í','ö','õ','ò','ó','ô','ü','ù','ú','û','À','Á','É','Í','Ó','Ú','ñ','Ñ','ç','Ç','-','(',')',',',';',':','|','!','"','#','$','%','&','/','=','?','~','^','>','<','ª','º' );

    // matriz de saída
    $by   = array( 'a','a','a','a','a','e','e','e','e','i','i','i','o','o','o','o','o','u','u','u','u','A','A','E','I','O','U','n','n','c','C','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_' );

    // devolver a string
    return str_replace($what, $by, $string);
}

function teste_arthur(){
			$url = "https://importacao-dados.appspot.com/Rest_hub/recebe_show";

			$ch = curl_init();
			curl_setopt( $ch, CURLOPT_URL, $url );
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
			curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json') );

			$output = curl_exec( $ch );
			$info = curl_getinfo( $ch );
			curl_close( $ch );
			
			return json_decode( $output, true );
}