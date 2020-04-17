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
