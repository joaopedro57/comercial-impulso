<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

defined('BASEPATH') OR exit('No direct script access allowed');

class Request_show extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Shows_model');//model de controle dos shows
		$this->load->helper('pipedrive_api_helper');//API Pipedrive
		$this->load->model('Comercial_model');
		$this->load->model('Hubspot_Model');
	}

	public function show_post()
	{
		$json = file_get_contents("php://input");
		$request = json_decode($json,1);
		$dados = array('json' => $json);
		$this->Shows_model->salvar_json($dados);
		if ($request['current']['type'] == 'demonstrao_agendada') {


			$closer =  pipedrive_find_usuario(rawurlencode($request['current']['owner_name']));

			$dados = array(
				'pipe_id' => $request['current']['deal_id'],
				'atividade_id' => $request['current']['id'],
				'qualificador' => $request['current']['created_by_user_id'],
				'data_agendamento' => $request['current']['add_time'],
				'closer' => $closer['data']['0']['id']);

			$this->Shows_model->salvar_agendamentos($dados);

			if ($closer['data']['0']['id'] != $request['current']['created_by_user_id']) {

				$checar_recebiveis = $this->Shows_model->checar_recebiveis($closer['data']['0']['id']);
			}
		}

		elseif ($request['current']['type'] == 'reunio_realizada') {
			$closer =  pipedrive_find_usuario(rawurlencode($request['current']['owner_name']));

			$dados = array(
				'pipe_id' => $request['current']['deal_id'],
				'atividade_id' => $request['current']['id'],
				'qualificador' => $request['current']['created_by_user_id'],
				'data_shows' => $request['current']['add_time'],
				'closer' => $closer['data']['0']['id']);
			$this->Shows_model->salvar_shows($dados);

			if ($closer['data']['0']['id'] == $request['current']['created_by_user_id']) {
				$agendamentos_proprios = $this->Shows_model->_agendamentos_proprios($closer);
			}
		}
	}

	public function arthur_teste()
	{
		$dados = $this->Hubspot_Model->get_infos_tv();

		foreach ($dados['ranking'] as $key => $value) {
			if ($value['grupo'] == 7) {
				$grupo7[] = array(
					'nome' => $value['nome'],
					'posicao' => $value['ranking']);
			}
			elseif ($value['grupo'] == 5) {
				$grupo5[] = array(
					'nome' => $value['nome'],
					'posicao' => $value['ranking']);
			}
			elseif ($value['grupo'] == 3) {
				$grupo3[] = array(
					'nome' => $value['nome'],
					'posicao' => $value['ranking']);
			}
		}

		$grupo_prioridade7 = array();
		$grupo_prioridade5 = array();
		$grupo_prioridade3 = array();

		foreach ($dados['prioridade'] as $key => $value) {
			if ($value['grupo'] == 7) {
				$grupo_prioridade7[] = array(
					'nome' => $value['nome']);
			}
			elseif ($value['grupo'] == 5) {
				$grupo_prioridade5[] = array(
					'nome' => $value['nome']);
			}
			elseif ($value['grupo'] == 3) {
				$grupo_prioridade3[] = array(
					'nome' => $value['nome']);
			}
		}

		if ($grupo_prioridade7) {
			$prioridade_7 = array($grupo_prioridade7[0]);
		}
		else {
			$prioridade_7 = array(NULL);
		}

		if ($grupo_prioridade5) {
			$prioridade_5 = array($grupo_prioridade5[0]);
		}
		else {
			$prioridade_5 = array(NULL);
		}
		if ($grupo_prioridade3) {
			$prioridade_3 = array($grupo_prioridade3[0]);
		}
		else {
			$prioridade_3 = array(NULL);
		}

		$prioridade = array(
			'prioridade_7' => $prioridade_7,
			'prioridade_5' => $prioridade_5,
			'prioridade_3' => $prioridade_3);
		$posicoes = array(
			'grupo_7' => $grupo7,
			'grupo_5' => $grupo5,
			'grupo_3' => $grupo3);

		$json = array(
			'prioridade' => $prioridade,
			'tabela' => $posicoes);

		print_r(json_encode($json));exit;

	}

}


