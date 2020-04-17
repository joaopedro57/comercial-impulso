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

		$meetime = json_encode($array);
 		$enviar = meetime_lead($meetime);

		print_r($enviar);exit;
	}
}
