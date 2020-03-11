<?php   
defined('BASEPATH') OR exit('No direct script access allowed');
//Controller que rege todas as funções da Dashboard Comercial
class Financeiro_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Financeiro_model');//modeldo financeiro
		$this->load->model("login_model");//model que determina ques está logado
		$this->load->library('session');//logado ou não no sistema
		$this->load->helper('pipedrive_api');//helper das APIs do Pipedrive


		if($this->session->userdata('logado') != 1 ) {
			redirect("index/logout"); //se a pessoa tiver deslogada redireciona para a pagina de loguin

		}
	} 
	
	public function dashboard()//funão que cria a pagina inicial da Dashboard
	{
		$data = $this->input->post();
		if (isset($data['data'])) {
			$data_ini = date("Y-m-01",strtotime($data['data']));
			$data_fim = date("Y-m-t",strtotime($data['data']));
			$mes = date("m",strtotime($data['data']));
			$data_front = date("m/01/Y",strtotime($data['data']));

		} else {
			$data_ini = date("Y-m-01");
			$data_fim = date("Y-m-t");
			$mes = date("m");
			$data_front = date("m/01/Y");
		}

		$dados['mrr'] = $this->Financeiro_model->mrr();
		$dados['recebidos'] = $this->Financeiro_model->recebidos($data_ini);
		$dados['aReceber'] = $this->Financeiro_model->aReceber($data_ini);
		$dados['nClientes'] = $this->Financeiro_model->clientes();
		$dados['user'] = $this->session->userdata();//retorna as informações do 
		$dados['perda_recebiveis'] = $this->Financeiro_model->perda_recebiveis($data_ini,$data_fim,$mes);
		$dados['primeiro_pagamento'] = $this->Financeiro_model->primeiro_pagamento($data_ini);
		$dados['grafico_recebimento'] = json_encode($this->Financeiro_model->grafico_recebimento($data_ini));
		
		$in = $this->Financeiro_model->get_recebiveis($data_ini,$data_fim,$mes);
		$dados['inadimplente'] = $in['inadimplentes_assinantes'];
		$dados['clientes'] = $this->Financeiro_model->inadimplente($data_ini,$data_fim);
		$dados['data_ini'] = $data_front;

		$this->load->view('templates/header',$dados);
		$this->load->view('templates/financeiro_dash',$dados);
		$this->load->view('templates/footer_financeiro',$dados);
	}

	public function get_resultado_mes()
	{
		$data = $this->input->post();

		$data_ini = date("Y-m-01",strtotime($data['valor']));
		$data_fim = date("Y-m-t",strtotime($data['valor']));
		$mes = date("m",strtotime($data['valor']));

		$dados = $this->Financeiro_model->get_recebiveis($data_ini,$data_fim,$mes);
		$dados['recebidos'] = $this->Financeiro_model->recebidos($data_ini);
		$dados['aReceber'] = $this->Financeiro_model->aReceber($data_ini);
		$dados['perda_recebiveis'] = $this->Financeiro_model->perda_recebiveis($data_ini,$data_fim,$mes);
		$dados['primeiro_pagamento'] = $this->Financeiro_model->primeiro_pagamento($data_ini);

		print_r(json_encode($dados));
		
	}

}


