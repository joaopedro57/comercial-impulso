<?php

class RequestRD extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mkt_rd_model');
		$this->load->helper('rd_api_helper');
		$this->load->library('session');

	} 

	public function  rdPost() {
		
		//redirect("https://api.rd.services/auth/dialog?client_id=9ce068cf-41c4-4d51-9bb8-205330b1419d&redirect_url=http://comercial.solides.adm.br/RequestRD/rdPost");

		$code = $_GET['code'];
		print_r($code);

		$this->Mkt_rd_model->code_rd($code);

		$token = rd_verificacao($code);

		print_r($token);

		$this->Mkt_rd_model->token_rd($token['access_token']);

		$this->Mkt_rd_model->refresh_rd($token['refresh_token']);

		print_r("XIA ZE");

	}




	public function rdWebhook() {
		
		$json = file_get_contents("php://input");

		$request = json_decode($json, 1);

		$data = date_create($request['leads']['0']['created_at']);
		$add_time = date_format($data,'Y-m-d');

		$data_primeira_conversao = date_create($request['leads']['0']['first_conversion']['content']['created_at']);
		$add_time_primeira_conversao = date_format($data_primeira_conversao,'Y-m-d');

		$data_ultima_conversao = date_create($request['leads']['0']['last_conversion']['content']['created_at']);
		$add_time_ultima_conversao = date_format($data_ultima_conversao, 'Y-m-d');

		$data_opp_mkt = date_create($request['leads']['0']['last_marked_opportunity_date']);
		$add_time_opp_mkt = date_format($data_opp_mkt,'Y-m-d');



		$dados_leads = array(
			//campos padrão
			'id' 													=> $request['leads']['0']['id'],
			'email' 												=> $request['leads']['0']['email'],
			'name'													=> $request['leads']['0']['name'],
			'empresa'												=> $request['leads']['0']['company'],
			'oportunidade'											=> $request['leads']['0']['opportunity'],
			'data_criacao'											=> $add_time,
			'numero_convercoes' 									=> $request['leads']['0']['number_conversions'],
			'user'													=> $request['leads']['0']['user'],
			//primeira conversao
			'identificador_primeira_conversao'						=> $request['leads']['0']['first_conversion']['content']['identificador'],
			'data_primeira_conversao'								=> $add_time_primeira_conversao,
			'source_origem_primeira_conversao'						=> $request['leads']['0']['first_conversion']['conversion_origin']['source'],
			'mdeium_origem_primeira_conversao'						=> $request['leads']['0']['first_conversion']['conversion_origin']['medium'],
			'value_origem_primeira_conversao'						=> $request['leads']['0']['first_conversion']['conversion_origin']['value'],
			'campaign_origem_primeira_conversao'					=> $request['leads']['0']['first_conversion']['conversion_origin']['campaign'],
			'channel_origem_primeira_conversao'						=> $request['leads']['0']['first_conversion']['conversion_origin']['channel'],
			//ultima conversao
			'identificador_ultima_conversao'						=> $request['leads']['0']['last_conversion']['content']['identificador'],
			'data_ultima_conversao'									=> $add_time_ultima_conversao,
			'source_origem_ultima_conversao'						=> $request['leads']['0']['last_conversion']['conversion_origin']['source'],
			'mdeium_origem_ultima_conversao'						=> $request['leads']['0']['last_conversion']['conversion_origin']['medium'],
			'value_origem_ultima_conversao'							=> $request['leads']['0']['last_conversion']['conversion_origin']['value'],
			'campaign_origem_ultima_conversao'						=> $request['leads']['0']['last_conversion']['conversion_origin']['campaign'],
			'channel_origem_ultima_conversao'						=> $request['leads']['0']['last_conversion']['conversion_origin']['channel'],
			//custom field
			'tamanho_empresa_custom_field'							=> $request['leads']['0']['custom_fields']['Tamanho de empresa'],
			'cargo_rh'												=> $request['leads']['0']['custom_fields']['Cargo RH'],
			'econodata_status'										=> $request['leads']['0']['custom_fields']['econodata-status-enriquecimento'],
			//campos padrão 2
			'telefone_pessoal'										=> $request['leads']['0']['personal_phone'],
			'lead_stage'											=> $request['leads']['0']['lead_stage'],
			'last_marked_opportunity_date'							=> $add_time_opp_mkt,
			'fit_score'												=> $request['leads']['0']['fit_score'],
			'interest'												=> $request['leads']['0']['interest'],
			'uuid'													=> $request['leads']['0']['uuid'],
		);
		
		
			$tag = implode(" - ",$request['leads']['0']['tags']);
			$dados_leads['tag'] = $tag;
		
		

		if ($request['leads']['0']['custom_fields']['econodata-status-enriquecimento'] == 'SIM') {
			
			$dados_leads['cnpj'] = $request['leads']['0']['custom_fields']['econodata-cnpj'];
			$dados_leads['uf'] = $request['leads']['0']['custom_fields']['econodata-uf'];
			
		}

		$this->Mkt_rd_model->salvar($dados_leads);
	}
}