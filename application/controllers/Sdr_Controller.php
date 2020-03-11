<?php   
defined('BASEPATH') OR exit('No direct script access allowed');
//Controller que rege todas as funções da Dashboard Comercial
class Sdr_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Sdr_model');//model de pesquisa no bando de dados do comercial
		$this->load->helper('pipedrive_api');//helper das APIs do Pipedrive
		$this->load->model("login_model");//model que determina ques está logado
		$this->load->library('session');//logado ou não no sistema
		$this->load->model('Sdr_updates_model');//model de update no banco de dados

		if($this->session->userdata('logado') != 1 ) {
			redirect("index/logout"); //se a pessoa tiver deslogada redireciona para a pagina de loguin
		}
	} 
    
     public function perfil($user_id)//função dos perfils dos SDR, reebe o ID de quem está logado para criar 
	{
		ini_set('memory_limit', '-1');
		set_time_limit (0);

		$request['dados_user'] 		= $this->Sdr_model->dados_user($user_id);//retorna os dados do usuario que esta na pagina
		$request['user']			= $this->session->userdata();//retorna as informações do usuario
		$request['contato'] 		= $this->Sdr_model->contato();//retorna as informações de contato de todos do comercial
		$request['shows_total'] 	= $this->Sdr_model->shows_total();//retorna a quantidade de shows total no ano de todos os SDR
		$request['shows_total_mes'] = $this->Sdr_model->shows_total_mes();//retorna a quantidade de shows de todos os SDR's no mes
		$request['shows_mes'] 		= $this->Sdr_model->shows_mes($user_id);//retorna a quantidade de shows dentro do mês
		$request['shows_ano']		= $this->Sdr_model->shows_ano($user_id);//retorna a quantidade de shows feitos no ano
		$request['contas_mes']		= $this->Sdr_model->contas_mes($user_id);//retorna o numero de contas vendidas no mês
		$request['contas_ano']		= $this->Sdr_model->contas_ano($user_id);//retorna o numero de contas vendidas no mês
		$request['meta_mes']		= $this->Sdr_model->meta_mes($user_id);//retorna a meta do SDR no mês
		$request['leadsConversao'] 	= $this->Sdr_model->leadsConversao($user_id);//retorna a conversão pelo funil no mês(Banco até Agendamento)
		$request['closers'] 		= $this->Sdr_model->closer_agendamentos();//retorna o nome e o id dos closers ativos

		$request['grafico'] = $this->Sdr_model->grafico_sdr_meta($user_id);//retorna o valor da meta do vendedor por mês
		
		foreach ($request['grafico'] as $key => $value) {
			$shows = $this->Sdr_model->grafico_sdr_show($value['meses'],$user_id);//retorna o valor vendido do vendedor no mês
			$request['grafico'][$key]['shows'] = round($shows['0']['shows']);
		}
		
		$id = $this->input->post("id");
		if (isset($id)) {
			
			foreach ($id as $value) {
				$closers = $value.",".$closers;
			}
			
			$dados = array(
				'user_id' => $user_id,
				'closers' => $closers);

			$this->Sdr_updates_model->salvar_closers($dados);//salva dados de quem são os closers que vao ser agendados aquele mês
		}

		$vendedores = $this->Sdr_model->result_closers($user_id);//retorna os ids dos closers que o SDR tem que agendar
		
		if (isset($vendedores['0'])) {
			$ids = explode(',', $vendedores['0']['closers']);
			$index = 0;
			foreach ($ids as $key) {
				if (isset($key)) {
					$request['vendedores'][$index] = $this->Sdr_model->infos_closers($user_id,$key);//retorna as informações dos closers que tem que ser agendados
					$index ++;
				}
			}
		}

		$this->load->view('templates/header',$request);//recebe 'contato' e 'userdata'
		$this->load->view('templates/perfil_sdr',$request);
		$this->load->view('templates/footer_sdr',$request);
	}

	public function shows_geral()
	{
		$request['dados'] 	= $this->Sdr_model->table_shows();//retorna tabela de shows 
		$request['user']	= $this->session->userdata();//retorna as informações do usuario
		$request['contato'] = $this->Sdr_model->contato();//retorna as informações de contato de todos do comercial
		$request['shows'] = $this->Sdr_model->shows_sdr();//retorna a quatidade de shows dos SDRs

		$this->load->view('templates/header',$request);//recebe 'contato' e 'userdata'
		$this->load->view('templates/shows',$request);
		$this->load->view('templates/footer_sdr',$request);



	}
}


