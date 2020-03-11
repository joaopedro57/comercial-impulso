<?php   
defined('BASEPATH') OR exit('No direct script access allowed');

class Indicacao_farmer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('pipedrive_api');
		$this->load->library('session');
		$this->load->model('Indicacao_model');
		$this->load->helper('google_sheet_api');
	} 
	
	public function index()
	{	
		/*$teste = google_get();
		//print_r($teste);exit;

		$dados = array(
			'nomeCS' 	=> $this->input->post('nomeCS'),
			'empresa' 	=> $this->input->post('empresa'),
			'id' 		=> $this->input->post('id_cliente'),
			'url'		=> $this->input->post('url'),
			'telefone' 	=> $this->input->post('telefone'),
			'objetivo' 	=> $this->input->post('objetivo'),
			'resumo' 	=> $this->input->post('resumo') 
		);

		google_input_farmer([
			"majorDimension"=>"ROWS",
			"values"=> [
				"teste",
				"testeee2",
				"testeeee3"
			]
		]);
		
		$this->Indicacao_model->indicacao($dados);*/

		$this->load->view('indicacao/indicacao_view');
	}


}


