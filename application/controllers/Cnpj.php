<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cnpj extends CI_Controller {
	public function __construct()
	{
          parent::__construct();
          $this->load->helper('meetime_api');
          $this->load->model('Meetime_models');
    }

	public function cnpj()
	{
		$dados = $this->Meetime_models->cnpjs();
		$row = 1;
		foreach ($dados as $value) {
			$receita = get_info_cnpj($value['cnpj']);
			if ($receita) {
				$receita_on = 1;
				$cnpj = array(
					'cnpj' => $value['cnpj'],
					'abertura' => date_format(date_create(str_replace("/", "-", $receita['abertura'])),"Y-m-d"),
					'nome' => $receita['nome'],
					'atividade_principal' => $receita['atividade_principal']['text'],
					'atividade_principal_code' => $receita['atividade_principal']['code'],
					'atividade_principal_resume' => mercado_ibge($receita['atividade_principal']['code']),
					'atividade_secundario' => $receita['atividades_secundarias'][0]['text'],
					'atividade_secundario_code' => $receita['atividades_secundarias'][0]['code'],
					'atividade_secundario_resume' => mercado_ibge($receita['atividades_secundarias'][0]['code']),
					'natureza_juridica' => $receita['natureza_juridica'],
					'capital_social' => $receita['capital_social']
				);
				$this->Meetime_models->insert_cnpj($cnpj);
			} else {
				$receita_on = 0;
			}
			echo $row.") CNPJ: ".$value['cnpj']." Dados Web: ".$receita_on.", \n";
			sleep('10');
			$row++;
			if ($row > 4) {
				exit;
			}
		}
	}
}
