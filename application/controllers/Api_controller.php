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
		print_r($dados);exit;

		$dados = array(
			'firstName' => "Lucas",
			'name' => "Lucas Doido",
			'email' => "lucas@impulso.work",
			'company' => "Impulso",
			'phones' => array( array(
				'label' => "Escritório",
				'phone' => "+5531992280009",
				'lastUsage' => "2019-05-16T20:00:00Z")));

		$meetime = json_encode($dados);
		$enviar = meetime_lead($meetime);

		print_r($enviar);exit;
	}
}
