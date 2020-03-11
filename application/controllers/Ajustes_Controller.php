<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajustes_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Comercial_model');
		$this->load->helper('pipedrive_api');
		$this->load->model('Pipedrive_updates_model');
		$this->load->model('Financeiro_model');
		$this->load->helper('att');

	}

	public function coletar_dados()
	{
		$cnpj = $this->Pipedrive_updates_model->coletarCNPJ();

		foreach ($cnpj as $value) {
			$cnpj_cl = limpaCPF_CNPJ($value['CNPJ']);
			$validador = validar_cnpj($cnpj_cl);

			if ($validador == 1) {
				$dados = cnpj_receita($cnpj_cl);

				$code = array(
					'cnpj' => $cnpj_cl,
					'texto' => $dados['atividade_principal'][0]['text'],
					'code' => $dados['atividade_principal'][0]['code']);

				$insert = $this->Pipedrive_updates_model->salvarCNAE($code);
				sleep(10);

				print_r($insert);
				print_r($cnpj_cl);
				echo "\n";
			}

		}
		exit;

	}


	public function get_inadimplentes()
	{
		$data = $this->input->post();

		$dados['clientes'] = $this->Financeiro_model->inadimplente();

		echo $this->load->view('templates/clientes_inadimplentes',$dados,TRUE);
	}

	public function get_contas()
	{
		$id = $this->input->post();

		$data = $this->Comercial_model->result_contas_pipe($id['id']);

		$index = 0;

		foreach ($data as $value) {

			$previsao = $this->Comercial_model->result_previsao($value['id']);

			if (isset($previsao['0']['previsao'])) {
				$data['contas'][$index] = array(
				'id' => $value['id'],
				'title' => $value['title'],
				'value' => $value['value'],
				'quant_colaboradores' => $value['quant_colaboradores'],
				'data_diagnostico' => $value['data_diagnostico'],
				'stage_8' => $value['stage_8'],
				'previsao' => $previsao['0']['previsao'], );
			} else {
				$data['contas'][$index] = $value;
			}


			$index ++;
		}

		echo $this->load->view('templates/contato_view', $data, TRUE);
	}


	public function result_cliente()
	{
		$id = $this->input->post();
		$cliente = $this->Comercial_model->cliente_id($id['id']);

		echo json_encode($cliente['0']);
	}

	public function get_clientes_pagos()
	{
		$dados = $this->input->post();
		$paramentros = array(
			'email' => $dados['id'],
			'data_ini' => date_format(date_create($dados['data_ini']),'Y-m-d'),
			'data_fim' => date_format(date_create($dados['data_fim']),'Y-m-d'));

		$data['dados'] = $this->Comercial_model->get_comissoes_por_produto($paramentros);
		$data['dados']['0']['valor_total'] = 0;
		if (isset($data['dados']['0']['VALOR_MENSALIDADE'])) {
			foreach ($data['dados'] as $value) {
				$data['dados']['0']['valor_total'] = $data['dados']['0']['valor_total'] + $value['VALOR_MENSALIDADE'];
			}
		}

		echo $this->load->view('templates/financeiro_contas', $data, TRUE);
	}

	public function sdr_meta()
	{
		ini_set('memory_limit', '-1');
		set_time_limit (0);

		$dados = $this->input->post();
		foreach ($dados['dataForm'] as $value ) {
			$id = explode("/", $value['name']); //separa o mês do id
				if (isset($value)) {
					$meta = array(
						'user_id' => $id['0'],
						'meses' => $id['1'],
						'meta' => $value['value']);
					$this->Pipedrive_updates_model->atualizarMeta($meta);//salva a meta no banco
				}
		}
		return TRUE;
	}

	public function meta_geral()
	{
		ini_set('memory_limit', '-1');
		set_time_limit (0);

		$dados = $this->input->post();
		foreach ($dados['dataForm'] as $value ) {
				$meta = array(
					'user_id' => "1",
					'meses' => $value['name'],
					'meta' => $value['value']);
					$this->Pipedrive_updates_model->atualizarMeta($meta);//salva a meta no banco
		}

		return TRUE;
	}
}


