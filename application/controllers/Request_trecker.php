<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH.'libraries/REST_Controller.php');

class Request_trecker extends REST_Controller {
	public function __construct()
	{	
		parent::__construct();
		$this->load->model('Treacker_model');// CARREGA O MODEL NA QUE CONTEM AS QUERYS E AS REGRAS DE NEGOCIO
		$this->load->helper('app');
	}

	public function get_tarefas_usuarios_post()
	{//RETORNA 5 AGENS QUE MAIS REALIZARAM UM DETERMINADO ESTADO DE ATIVIDADE
		$post = $this->post();
		$empresa = $post['empresa'];//RECEBE ID EMPRESA
		$data = array(
			'data_ini' => $post['data_ini'],//DATA INICIO DO FILTRO
			'data_fim' => $post['data_fim']);//DATA FINAL DO FILTRO
		
		$status = $post['status'];//RECEBE O STATUS FILTRADO PARA MONTAR O RANKING(QUALQUER STATUS NO BD)
		$ranking = $post['rankning'];//RECEBE SE SERÁ OS 5 MELHORES OU 5 PIORES (RECEBE OS PAREMTETROS ASC E DESC)

		$dados = $this->Treacker_model->get_tarefas_concluidas($empresa,$data,$status,$ranking);
		print_r(json_encode($dados));
	}

	public function get_tarefas_grupo_post()
	{//RETORNA OS 5 GRUPOS QUE MAIS OU MENOS REALIZARAM UM DETERMINADO STATUS DE ATIVIDADE
		$post = $this->post();
		$empresa = $post['empresa'];//RECEBE ID EMPRESA
		$data = array(
			'data_ini' => $post['data_ini'],//DATA INICIO DO FILTRO
			'data_fim' => $post['data_fim']);//DATA FINAL DO FILTRO
		
		$status = $post['status'];//RECEBE O STATUS FILTRADO PARA MONTAR O RANKING(QUALQUER STATUS NO BD)
		$ranking = $post['rankning'];//RECEBE SE SERÁ OS 5 MELHORES OU 5 PIORES (RECEBE OS PAREMTETROS ASC E DESC)

		$dados = $this->Treacker_model->get_tarefas_grupo($empresa,$data,$status,$ranking);
		print_r(json_encode($dados));
	}

	public function get_atividade_status_post()
	{//RETORNA QUAIS STATUS DE ATIVIDADE TEM MAIS
		$post = $this->post();
		$empresa = $post['empresa'];//RECEBE ID EMPRESA
		$data = array(
			'data_ini' => $post['data_ini'],//DATA INICIO DO FILTRO
			'data_fim' => $post['data_fim']);//DATA FINAL DO FILTRO

		$dados = $this->Treacker_model->get_status_atividade($empresa,$data);
		print_r(json_encode($dados));
	}

	public function kpis_empresa_post()
	{//RETORNA 3 KPIS DA EMPRESA, SÃO ELES: TOTAL DE ATIVIDADES CONCLUIDAS, TOTAL DE FORMULARIOS RESPONDIDOS E TOTAL DE HORAS EM ATIVIDADES
		$post = $this->post();
		$empresa = $post['empresa'];//RECEBE ID EMPRESA
		$data = array(
			'data_ini' => $post['data_ini'],//DATA INICIO DO FILTRO
			'data_fim' => $post['data_fim']);//DATA FINAL DO FILTRO

		$dados = $this->Treacker_model->get_kpis_empresa($empresa,$data);
		print_r(json_encode($dados));
	}

	public function get_forms_respondidos_post()
	{//RETORNA UMA CONTAGEM COM QUANTAS RESPOSTAS TIVERAM CADA FORMS DA EMPRESA
		$post = $this->post();
		$empresa = $post['empresa'];//RECEBE ID EMPRESA
		$data = array(
			'data_ini' => $post['data_ini'],//DATA INICIO DO FILTRO
			'data_fim' => $post['data_fim']);//DATA FINAL DO FILTRO

		$dados = $this->Treacker_model->get_form_empresa($empresa,$data);
		print_r(json_encode($dados));
	}

	public function get_atividades_dia_post()
	{//RETORNA QUANTAS ATIVIDADES TIVERAM AGRUPADAS POR DIAS DENTRO DO FILTRO DE DATA
		$post = $this->post();
		$empresa = $post['empresa'];//RECEBE ID EMPRESA
		$data = array(
			'data_ini' => $post['data_ini'],//DATA INICIO DO FILTRO
			'data_fim' => $post['data_fim']);//DATA FINAL DO FILTRO

		$dados = $this->Treacker_model->get_atividades_dias($empresa,$data);
		print_r(json_encode($dados));
	}

	public function tarefas_executas_pendentes_post()
	{//RETORNA O NUMERO DE ATIVIDADES EXECUTADAS, PENDENTES E RETORNA TBM AS ATIVIDADES QUE ESTÃO INICIAS EM ANDAMENTO OU PENDENTE
		$post = $this->post();
		$empresa = $post['empresa'];//RECEBE ID EMPRESA
		$data = array(
			'data_ini' => $post['data_ini'],//DATA INICIO DO FILTRO
			'data_fim' => $post['data_fim']);//DATA FINAL DO FILTRO

		$dados = $this->Treacker_model->get_executas_pendentes($empresa,$data);
		print_r(json_encode($dados));
	}

	public function get_agentes_online_post()
	{//RETORNA O NUMERO TOTAL DE AGENTES ONLINE, OFFLINE, EM TAREFAS E LIVRES
		$post = $this->post();
		$empresa = $post['empresa'];
		
		$dados = $this->Treacker_model->agentes_online($empresa);
		print_r(json_encode($dados));
	}

	public function get_km_tarefas_post()
	{//RETORNA A QUANTIDADE DE KMs TOTAL, O TOTAL PREVISTO, O TOTAL PENDENTE E O DESVIO
		$post = $this->post();
		$empresa = $post['empresa'];
		$data = array(
			'data_ini' => $post['data_ini'],
			'data_fim' => $post['data_fim']);

		$dados = $this->Treacker_model->get_km_tarefa($empresa,$data);
		print_r(json_encode($dados));
	}

	public function status_agentes_post()
	{//RETORNA TODOS OS DADOS NESCESSARIOS PARA MONTAR O QUADRO DAS INFORMAÇÕES DO AGENTE
		$post = $this->post();
		$empresa = $post['empresa'];//RECEBE ID EMPRESA
		$data = array(
			'data_ini' => $post['data_ini'],//DATA INICIO DO FILTRO
			'data_fim' => $post['data_fim']);//DATA FINAL DO FILTRO

		$dados = $this->Treacker_model->status_agente($empresa,$data);
		print_r(json_encode($dados));
	}

	public function get_km_ranking_post()
	{//RETORNA O RANKING DOS AGENTES POR DESVIO DE KM's RODADOS. LEMBRANDO QUE SE ELE TIVER RODADO MAIS QUE O ESTIMANDO PELA TABELA LOG_TAREFAS O NUNERO VAI RETORNAR NEGATIVO

		$post = $this->post();
		$empresa = $post['empresa'];//RECEBE ID EMPRESA
		$data = array(
			'data_ini' => $post['data_ini'],//DATA INICIO DO FILTRO
			'data_fim' => $post['data_fim']);//DATA FINAL DO FILTRO
		
		$ranking = $post['rankning'];//RECEBE SE SERÁ OS  MELHORES OU  PIORES (RECEBE OS PAREMTETROS ASC E DESC)

		$dados = $this->Treacker_model->get_km_ranking($empresa,$data);
		print_r(json_encode($dados));
	}

	public function get_tempo_medio_tarefa_post()
	{//RETORNA O TEMPO MÉDIO GASTO TOTAL NAS TAREFAS EXECUTADAS.
		$post = $this->post();
		$empresa = $post['empresa'];//RECEBE ID EMPRESA
		$data = array(
			'data_ini' => $post['data_ini'],//DATA INICIO DO FILTRO
			'data_fim' => $post['data_fim']);//DATA FINAL DO FILTRO
		
		$ranking = $post['rankning'];//RECEBE SE SERÁ OS  MELHORES OU  PIORES (RECEBE OS PAREMTETROS ASC E DESC). SE FOR 'DESC' VAI SER DO MAIOR TEMPO MÉDIO PARA O MENOR, SE FOR ASC VAI SER DO MENOR TEMPO MÉDIO PRO MAIOR.

		$dados = $this->Treacker_model->get_tempo_medio_tarefa($empresa,$data);
		print_r(json_encode($dados));
	}

	public function fase_tarefas_post()
	{//RETORNA O TEMPO GASTO EM CADA FASE DA TAREFA
		
		$post = $this->post();
		$empresa = $post['empresa'];//RECEBE ID EMPRESA
		$data = array(
			'data_ini' => $post['data_ini'],//DATA INICIO DO FILTRO
			'data_fim' => $post['data_fim']);//DATA FINAL DO FILTRO
		
		$dados = $this->Treacker_model->fase_tarefas($empresa,$data);
		print_r(json_encode($dados));
	}
}