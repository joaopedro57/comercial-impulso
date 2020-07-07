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

			$salvar = array(
	 			'nome' => $array['name'],
	 			'email' => $array['email'],
	 			'empresa' => $array['company'],
	 			'telefone' => $array['phones'][0]['phone']);

	 		$this->Meetime_models->salvar_lead($salvar);

			$meetime = json_encode($array);
	 		$enviar = meetime_lead($meetime);

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

	public function pipedrive_agile_post()
	{
		$dados = $this->post();

		$firstName = explode(" ", $dados['dataForm']['2']['value']);

		$array = array(
			'firstName' => $firstName['0'],
			'name' => $dados['dataForm']['2']['value'],
			'email' => $dados['dataForm']['3']['value'],
			'company' => "Página Agile - ".$firstName['0'],
			'phones' => array( array(
				'label' => "Escritório",
				'phone' => "+55",
				'lastUsage' => "2019-05-16T20:00:00Z")));

		$salvar = array(
	 		'nome' => $array['name'],
	 		'email' => $array['email']);

	 	$this->Meetime_models->salvar_lead($salvar);

		$meetime = json_encode($array);
	 	$enviar = meetime_lead($meetime);

		return $enviar;
	}

	public function cnpj_post()
	{
		$dados = $this->Meetime_models->cnpjs();
		foreach ($dados as $value) {
			$receita = get_info_cnpj($value['cnpj']);
			if ($receita) {
				$cnpj = array(
					'cnpj' => $value['cnpj'],
					'abertura' => date_format(date_create(str_replace("/", "-", $receita['abertura'])),"Y-m-d"),
					'nome' => $receita['nome'],
					'atividade_principal' => $receita['atividade_principal']['text'],
					'atividade_principal_code' => $receita['atividade_principal']['code'],
					'atividade_principal_resume' => mercado_ibge($receita['atividade_principal']['code']),
					'atividade_secundario' => $receita['atividades_secundarias'][0]['text'],
					'atividade_secundario_code' => $receita['atividades_secundarias'][0]['code'],
					'atividade_secundario_resume' => mercado_ibge($receita['atividades_secundarias'][0]['code']),
					'natureza_juridica' => $receita['natureza_juridica'],
					'capital_social' => $receita['capital_social']
				);
				$this->Meetime_models->insert_cnpj($cnpj);
			}
			sleep('10');
		}
	}
}
