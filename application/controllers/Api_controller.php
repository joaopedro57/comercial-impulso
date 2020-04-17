<?php
/*header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Api_controller extends CI_Controller {
	public function __construct()
	{
          parent::__construct();
          $this->load->helper('meetime_api');
    }


	public function cadastrar_lead_post()
	{
		$dados = $this->input->post();
		print_r($dados);
		$dados = array(
			'firstName' => $dados['firstame'],
			'name' => $dados['firstame'],
			'email' => $dados['email'],
			'company' => $dados['company'],
			'phones' => array( array(
				'label' => "Escritório",
				'phone' => "+55".$dados['phone'],
				'lastUsage' => "2019-05-16T20:00:00Z")));
		print_r($dados);exit;
		$meetime = json_encode($dados);
		$enviar = meetime_lead($meetime);

		print_r($enviar);exit;
	}
}
