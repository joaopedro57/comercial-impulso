<?php   
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_tracker extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Treacker_model');
		$this->load->helper('app');
		
	} 

	public function index()
	{
		ini_set('memory_limit', '-1');
		set_time_limit (0);

		$post = $this->input->post();

		if ($post) {
			$empresa = $post['empresa'];

			$data1 = date_create($this->input->post("start"));
			$data2 = date_create($this->input->post("end")); 

			$data = array(
				'data_ini' => date_format($data1, 'Y-m-d'),
				'data_fim' => date_format($data2, 'Y-m-d'));
			$status = $post['status'];
			$ranking = $post['ranking'];
		}
		else {
			$empresa = 7;
			$data = array(
				'data_ini' => '2019-10-01',
				'data_fim' => '2019-10-31');
		
			$status = 'concluida';

			$ranking = 'DESC';
		}
		
		$dados['empresa'] = $this->Treacker_model->empresas();
		$dados['tarefas_agente'] = $this->Treacker_model->get_tarefas_concluidas($empresa,$data,$status,$ranking);
		$dados['tarefas_grupo'] = $this->Treacker_model->get_tarefas_grupo($empresa,$data,$status,$ranking);
		$dados['status_atividade'] = $this->Treacker_model->get_status_atividade($empresa,$data);
		$dados['kpis_empresa'] = $this->Treacker_model->get_kpis_empresa($empresa,$data);
		$dados['forms_respondido'] = $this->Treacker_model->get_form_empresa($empresa,$data);
		$dados['atividades_dia'] = $this->Treacker_model->get_atividades_dias($empresa,$data);
		$dados['executas_pendentes'] = $this->Treacker_model->get_executas_pendentes($empresa,$data);
		$dados['agentes_online'] = $this->Treacker_model->agentes_online($empresa);
		$dados['status'] = $status;
		$dados['status_agente'] = $this->Treacker_model->status_agente($empresa,$data);
		$dados['ranking_tempo'] = $this->Treacker_model->get_tempo_medio_tarefa($empresa,$data,$ranking);
		//$dados['ranking_kms'] = $this->Treacker_model->get_km_ranking($empresa,$data,$ranking);
		//print_r($dados);exit;
		$this->load->view('dash_tracker', $dados);
	}
	
}


