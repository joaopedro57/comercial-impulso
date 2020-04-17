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
		print_r($meetime);exit;
		$enviar = meetime_lead($meetime);

		print_r($enviar);exit;
	}
}
