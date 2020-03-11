<?php
//Controller que recebe todos os dados,tanto vindo do RD quanto do Pipedrive
class Hubspot_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Hubspot_Model');
		$this->load->helper('pipedrive_api_helper');
		$this->load->helper('att_helper');
	} 
	
	public function hubspot() 
	{	
		$contas = $this->Hubspot_Model->getContasGanhas();
		foreach ($contas as $key => $data) {
			$deal = pipedrive_get_deal($data['id']);
			$org = pipedrive_get_organization($deal['data']['org_id']['value']);
			$atividades = pipedrive_get_atividades_deal($data['id']);

			$proprietario = $deal['data']['user_id']['email'];

			$pessoa[$key] = array(
				'email' => $deal['data']['person_id']['email']['0']['value'],
				'firstname' => $deal['data']['person_id']['name'],//nome
				'phone' => $deal['data']['person_id']['phone']['0']['value'],//telefone
				'proprietario' => $proprietario,
				'company' => $org['data']['name']);

			$negocio[$key] = array(
				'titulo' => $deal['data']['title'],
				'valor' => $deal['data']['value'],
				'close_time' => $deal['data']['won_time'],
				'status' => $deal['data']['status'],
				'qualificador' => $deal['data']['ad52fb6c63280806e3734c32e61038d28039f580']['email'],
				'closer' => $deal['data']['48359c2b9e6663f1f515a48b0a6c766f2370b5bc']['email'],
				'cenario' => $deal['data']['719eae8cbead5f3730910de201e856f365df8d9d'],
				'appear_in' => $deal['data']['b06f7f49f90950900be0bc1c7e1600096af9b7cd'],
				'proprietario' => $proprietario);

			$url = explode('@', $org['data']['fb01daac4bd31dd942fc823e8537a16ec722f6f0']);
			$teste_url = url_exists($url['1']);
			
			if (!$teste_url) {
				$url['1'] = '';
			}

			$organizacao[$key] = array(
				'nome' => $org['data']['name'],
				'url' => $url['1'],
				'responsavel_sistema' => $org['data']['a2e0c2e0a12dc00b6ab9c44c64ef511b463f02d2'],
				'email_responsavel' => $org['data']['fb01daac4bd31dd942fc823e8537a16ec722f6f0'],
				'responsavel_financeiro' => $org['data']['a381b946c00f77490fdffd80139a0ff3f5c8cb3e'],
				'email_financeiro' => $org['data']['8baa4b6f529a31ac14087ae65b95c673e72aadcf'],
				'condicao_espcial' => $org['data']['5b1c9224f608fa204f3ed678bf634702f31398b3'],
				'resumo_cs' => $org['data']['52b8fe5eb819af8d45827a7cdd8fbc1a7424f433'],
				'proprietario' => $proprietario,
				'cpf_cnpj' => $org['data']['5850a9f9ea11e610e434906f20c1b50c1a7d99b9'],
				'logradouro' => $org['data']['5fddcfea1aaef44d5d93778207ae103812ce2005'],
				'numero' => $org['data']['b17c107df5ec8374f61db0ee94eebe5b773b69ca'],
				'complemento' => $org['data']['d40ce4b95b55acec58e62bc1002657fe0cf573ba'],
				'cep' => $org['data']['6f140db1f464dd20dd5d7b59c6a9bb3b92b9467f'],
				'idclifor' => $data['id_clifor'],
				'bairro' => $org['data']['170d61273e0edf72231f9ddfdaa06dc5bb5dceb1'],
				'uf' => get_uf($org['data']['66c014304c13f8aa67c2feddac3c6b7187f919cd']));
		}
	}
}

