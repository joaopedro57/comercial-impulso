<?php
/* CORS Joy!!! */
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Length');
header('Access-Control-Expose-Headers: Content-Length');
header('Timing-Allow-Origin: *');

  /* anything.. really... */
header('Content-Type: text/json;');
header('X-Powered-By: peanut-butter');

defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH.'libraries/REST_Controller.php');

class Api_controller extends REST_Controller {
	public function __construct()
	{
          parent::__construct();
          $this->load->helper('meetime_api');
          $this->load->model('Meetime_models');
    }


	public function cadastrar_lead_post()
	{
		$dados = $this->post();

		$firstName = explode(" ", $dados['dataForm']['2']['value']);
		$phone = soNumero($dados['dataForm']['4']['value']);

		$array = array(
			'firstName' => $firstName['0'],
			'name' => $dados['dataForm']['2']['value'],
			'email' => $dados['dataForm']['5']['value'],
			'company' => $dados['dataForm']['3']['value'],
			'phones' => array( array(
				'label' => "Escritório",
				'phone' => "+55".$phone,
				'lastUsage' => "2019-05-16T20:00:00Z")));

		/*$array = array(
			'firstName' => $dados['firstName'],
			'name' => $dados['name'],
			'email' => $dados['email'],
			'company' => $dados['company'],
			'phones' => array( array(
				'label' => "Escritório",
				'phone' => $dados['phones']['0']['phone'],
				'lastUsage' => "2019-05-16T20:00:00Z"))); */

		$meetime = json_encode($array);
 		$enviar = meetime_lead($meetime);
 		$salvar = array(
 			'nome' => $array['name'],
 			'email' => $array['email'],
 			'empresa' => $array['company'],
 			'telefone' => $array['phones'][0]['phone'],
 			'id_meetime' => $enviar['id']);

 		$this->Meetime_models->salvar_lead($salvar);

		return $enviar;
	}

	public function pipedrive_post()
	{
		$dados = $this->post();

		$phone = soNumero($dados['dataForm']['4']['value']);

		$person = array(
			'name' => $dados['dataForm']['2']['value'],
			'email' => $dados['dataForm']['5']['value'],
			'owner_id' => 11375206,
			'phone' => $phone);

		$criar_pessoa = pipedrive_person(json_encode($person));

		$org = array(
			'name' => $dados['dataForm']['3']['value'],
			'owner_id' => 11375206);

		$criar_org = pipedrive_org(json_encode($org));

		$deal = array(
			'title' => 'Inbound - '.$dados['dataForm']['3']['value'],
			'user_id' => 11375206,
			'person_id' => $criar_pessoa['data']['id'],
			'org_id' => $criar_org['data']['id'],
			'stage_id' => 1);

		$criar_deal = pipedrive_deal(json_encode($deal));

		return $criar_deal;
	}
}
