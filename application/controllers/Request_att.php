<?php

class Request_att extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pipedrive_updates_model');
		$this->load->helper('pipedrive_api_helper');
		$this->load->library('session');
		$this->load->helper('rd_api_helper');
		$this->load->model('Comercial_model');
		$this->load->helper("att_helper");
		$this->load->database();
		$this->solides_master_db = $this->load->database('solides_master_devel', TRUE);

	} 
	
	public function pipedrive_post()
	{	
		$bd = $this->Pipedrive_updates_model->get_id_deal();
		
		
		ini_set('memory_limit', '-1');
		set_time_limit (0);

			foreach ($bd as $id) {

				if(isset($stage_1)){
					unset($stage_1);
				}
				if(isset($stage_2)){
					unset($stage_2);
				}
				if(isset($stage_3)){
					unset($stage_3);
				}
				if(isset($stage_4)){
					unset($stage_4);
				}
				if(isset($stage_5)){
					unset($stage_5);
				}
				if(isset($stage_6)){
					unset($stage_6);
				}
				if(isset($stage_7)){
					unset($stage_7);
				}
				if(isset($stage_8)){
					unset($stage_8);
				}
				if(isset($stage_9)){
					unset($stage_9);
				}
				if (isset($data)) {
					unset($data);
				}
				if (isset($idade_deal)) {
					unset($idade_deal);
				}
				if (isset($data_perdido)) {
					unset($data_perdido);
				}

				$deal = pipedrive_get_deal($id['id']);
				$org = pipedrive_get_organization($deal['data']['org_id']['value']);
				$tamanho_empresa = pipedrive_get_person($deal['data']['person_id']['value']);

						$data1 = date_create($deal['data']['add_time']); //salvar no modelo do db
						$data = date_format($data1 , 'Y-m-d');
				
						if ($deal['data']['lost_time'] != "") {
							$data2 = date_create($deal['data']['lost_time']);
							$data_perdido = date_format($data2 , 'Y-m-d'); 	
						}
						
						$idade_deal =  ceil($deal['data']['age']['total_seconds']/86400 );	
			

				$stage = $deal['data']['stay_in_pipeline_stages']['order_of_stages'];
				
				foreach ($stage as $key) {
					if ($key == PIPEDRIVE_STAGE_BANCO_DE_LEAD) {
						$data_add_time = $deal['data']['add_time'];
						$seconds = $deal['data']['stay_in_pipeline_stages']['times_in_stages'][PIPEDRIVE_STAGE_BANCO_DE_LEAD];
						$stage_1 = date("Y-m-d H:i:s",strtotime("$data_add_time +$seconds sec"));
					}
					elseif ($key == PIPEDRIVE_STAGE_PESQUISA) {
						$seconds =  $deal['data']['stay_in_pipeline_stages']['times_in_stages'][PIPEDRIVE_STAGE_PESQUISA];	
						$stage_2 =  date("Y-m-d H:i:s",strtotime("$stage_1 +$seconds sec"));
					}
					elseif ($key == PIPEDRIVE_STAGE_PROPESCCAO) {
						$seconds = $deal['data']['stay_in_pipeline_stages']['times_in_stages'][PIPEDRIVE_STAGE_PROPESCCAO]; 	
						$stage_3 =  date("Y-m-d H:i:s",strtotime("$stage_2 +$seconds sec"));
					}
					elseif ($key == PIPEDRIVE_STAGE_CONEXAO) {
						$seconds = $deal['data']['stay_in_pipeline_stages']['times_in_stages'][PIPEDRIVE_STAGE_CONEXAO];
						$stage_4 =  date("Y-m-d H:i:s",strtotime("$stage_3 +$seconds sec"));
					}
					elseif ($key == PIPEDRIVE_STAGE_REUNIAO_AGENDADA) {
						$seconds = $deal['data']['stay_in_pipeline_stages']['times_in_stages'][PIPEDRIVE_STAGE_REUNIAO_AGENDADA];	 
						$stage_5 =  date("Y-m-d H:i:s",strtotime("$stage_4 +$seconds sec"));
					}
					elseif ($key == PIPEDRIVE_STAGE_DIAGNOSTICO) {
						$seconds = $deal['data']['stay_in_pipeline_stages']['times_in_stages'][PIPEDRIVE_STAGE_DIAGNOSTICO];
						$stage_6 =  date("Y-m-d H:i:s",strtotime("$stage_5 +$seconds sec"));
					}
					elseif ($key == PIPEDRIVE_STAGE_SOLUCAO) {
						$seconds = $deal['data']['stay_in_pipeline_stages']['times_in_stages'][PIPEDRIVE_STAGE_SOLUCAO];	
						$stage_7 =  date("Y-m-d H:i:s",strtotime("$stage_6 +$seconds sec"));
					}
					elseif ($key == PIPEDRIVE_STAGE_PROPOSTA) {
						$seconds = $deal['data']['stay_in_pipeline_stages']['times_in_stages'][PIPEDRIVE_STAGE_PROPOSTA];	
						$stage_8 =  date("Y-m-d H:i:s",strtotime("$stage_7 +$seconds sec"));
					}
					elseif ($key == PIPEDRIVE_STAGE_ABERTURA) {
						$seconds = $deal['data']['stay_in_pipeline_stages']['times_in_stages'][PIPEDRIVE_STAGE_ABERTURA];
						$stage_9 =  date("Y-m-d H:i:s",strtotime("$stage_8 +$seconds sec"));
					}
				}

				$dados_deal = array(
					'id'					=> $id['id'],
					'user_id' 				=> $deal['data']['user_id']['id'],
					'title' 				=> $deal['data']['title'],
					'value' 				=> $deal['data']['value'],
					'status' 				=> $deal['data']['status'],
					'sdr' 					=> $deal['data'][PIPEDRIVE_QUALIFICADOR_FIELD]['id'],
					'mercado' 				=> $deal['data'][PIPEDRIVE_FIELD_MERCADO],
					'localizacao' 			=> $deal['data'][PIPEDRIVE_FIELD_LOCALIZACAO],
					'cargo' 				=> $deal['data'][PIPEDRIVE_FIELD_CARGO],
					'quant_colaboradores' 	=> $deal['data'][PIPEDRIVE_FIELD_QUANT_COLABORADOR],
					'closer'				=> $deal['data'][PIPEDRIVE_CLOSER_FIELD]['id'],
					'cenario_lead' 			=> $deal['data'][PIPEDRIVE_FIELD_CENARIO],
					'origem' 				=> $deal['data'][PIPEDRIVE_FIELD_ORIGEM],
					'stage_id' 				=> $deal['data']['stage_id'],
					'add_time'				=> $data,
					'funil'					=> $deal['data']['pipeline_id'],
					'criador'				=> $deal['data']['creator_user_id']['id'],
					'email_pessoal'			=> $deal['data']['person_id']['email']['0']['value'],
					'telefone_pessoa'		=> $deal['data']['person_id']['phone']['0']['value'],
					'motivo_lost'			=> $deal['data']['lost_reason'],
					'atividades_feitas'		=> $deal['data']['done_activities_count'],
					'data_ultima_conversao'	=> $deal['data'][PIPEDRIVE_FIELD_DATA_ULTIMA_CONVERSAO],
					'ultima_conversao'		=> $deal['data'][PIPEDRIVE_FIELD_ULTIMA_CONVERSAO],
					'rd_tag'				=> $deal['data'][PIPEDRIVE_FIELD_TAG],
					'faixa_funcionario'		=> $deal['data'][PIPEDRIVE_FIELD_TAMNHO_EMPRESA_NEGOCIO],
					'idade_deal'			=> $idade_deal,

				);

				if(isset($stage_1)){
					$dados_deal['stage_1'] = date_format(date_create($deal['data']['add_time']) , 'Y-m-d');
				}
				if(isset($stage_2)){
					$dados_deal['stage_2'] = date_format(date_create($stage_1) , 'Y-m-d');
				}
				if(isset($stage_3)){
					$dados_deal['stage_3'] = date_format(date_create($stage_2) , 'Y-m-d');
				}
				if(isset($stage_4)){
					$dados_deal['stage_4'] = date_format(date_create($stage_3) , 'Y-m-d');
				}
				if(isset($stage_5)){
					$dados_deal['stage_5'] = date_format(date_create($stage_4) , 'Y-m-d');
				}
				if(isset($stage_6)){
					$dados_deal['stage_6'] = date_format(date_create($stage_5) , 'Y-m-d');
				}
				if(isset($stage_7)){
					$dados_deal['stage_7'] = date_format(date_create($stage_6) , 'Y-m-d');
				}
				if(isset($stage_8)){
					$dados_deal['stage_8'] = date_format(date_create($stage_7) , 'Y-m-d');
				}
				if(isset($stage_9)){
					$dados_deal['stage_9'] = date_format(date_create($stage_8) , 'Y-m-d');
				}
				
				if (isset($org['data'][PIPEDRIVE_FIELD_ORIGEM_RD])) {
					$dados_deal['rd_origem'] = $org['data'][PIPEDRIVE_FIELD_ORIGEM_RD];
				}

				if (isset($tamanho_empresa['data'][PIPEDRIVE_FIELD_PESSOA_TAMANHO_EMPRESA])) {
					$dados_deal['tamanho_empresa'] = $tamanho_empresa['data'][PIPEDRIVE_FIELD_PESSOA_TAMANHO_EMPRESA];
				}
				if (isset($data_perdido)) {
					$dados_deal['data_perdido'] = $data_perdido;
				}

				$dados_deal['att'] = 4;
				
				$this->Pipedrive_updates_model->salvar($dados_deal); 
		}	
	}	

	public function att_cnpj()
	{
		$bd = $this->Pipedrive_updates_model->get_id_deal();
		
		ini_set('memory_limit', '-1');
		set_time_limit (0);
		
		foreach ($bd as $id ) {
		
		$deal = pipedrive_get_deal($id['id']);
		$org = pipedrive_get_organization($deal['data']['org_id']['value']);
		$cnpj = $org['data'][PIPEDRIVE_FILED_CNPJ];

		$receita = cnpj_receita($cnpj);

		$mercado = explode("," , $receita['atividade_principal']['0']['text']);

		$dados_deal = array(
			'id' => $id['id'],
			'mercado_principal_cnpj' => $receita['atividade_principal']['0']['text'] , 
			'mercado_cnpj'	=> $mercado['0'],
			'code_cnpj'		=> $receita['atividade_principal']['0']['code'],
			'uf_cnpj'	=> $receita['uf']
		);

		$dados_deal['att'] = 3;
		

		$this->Pipedrive_updates_model->salvar_won($dados_deal);

		sleep(30);

		}

		print_r("xia ze");
	}

	public function att_mercado()
	{
		$bd = $this->Pipedrive_updates_model->get_id_deal();
		
	
		ini_set('memory_limit', '-1');
		set_time_limit (0);
	
		foreach ($bd as $id ) {

			$code = explode(".", $id['code_cnpj']);
			
			if ($code['0'] >= 01 && $code['0'] <= 03 ) {
				$mercado = "AGRICULTURA, PECUÁRIA, PRODUÇÃO FLORESTAL, PESCA E AQÜICULTURA";
			}
			
			elseif ($code['0'] >= 10 && $code['0'] <= 33) {
				$mercado = "INDÚSTRIAS DE TRANSFORMAÇÃO";
			}
			elseif ($code['0'] == 35) {
				$mercado = "ELETRICIDADE E GÁS";
			}
			elseif ($code['0'] >= 36 && $code['0'] <= 39) {
				$mercado = "ÁGUA, ESGOTO, ATIVIDADES DE GESTÃO DE RESÍDUOS E DESCONTAMINAÇÃO";
			}
			elseif ($code['0'] >= 41 && $code['0'] <= 43) {
				$mercado = "CONSTRUÇÃO";
			}
			elseif ($code['0'] >= 45 && $code['0'] <= 47) {
				$mercado = "COMÉRCIO; REPARAÇÃO DE VEÍCULOS AUTOMOTORES E MOTOCICLETAS";
			}
			elseif ($code['0'] >= 49 && $code['0'] <= 53) {
				$mercado = "TRANSPORTE, ARMAZENAGEM E CORREIO";
			}
			elseif ($code['0'] >= 55 && $code['0'] <= 56) {
				$mercado = "ALOJAMENTO E ALIMENTAÇÃO";
			}
			elseif ($code['0'] >= 58 && $code['0'] <= 63) {
				$mercado = "INFORMAÇÃO E COMUNICAÇÃO";
			}
			elseif ($code['0'] >= 64 && $code['0'] <= 66) {
				$mercado = "ATIVIDADES FINANCEIRAS, DE SEGUROS E SERVIÇOS RELACIONADOS";
			}
			elseif ($code['0'] == 68) {
				$mercado = "ATIVIDADES IMOBILIÁRIAS";
			}
			elseif ($code['0'] >= 69 && $code['0'] <= 75) {
				$mercado = "ATIVIDADES PROFISSIONAIS, CIENTÍFICAS E TÉCNICAS";
			}
			elseif ($code['0'] >= 77 && $code['0'] <= 82) {
				$mercado = "ATIVIDADES ADMINISTRATIVAS E SERVIÇOS COMPLEMENTARES";
			}
			elseif ($code['0'] == 84) {
				$mercado = "ADMINISTRAÇÃO PÚBLICA, DEFESA E SEGURIDADE SOCIAL";
			}
			elseif ($code['0'] == 85) {
				$mercado = "EDUCAÇÃO";
			}
			elseif ($code['0'] >= 86 && $code['0'] <= 88) {
				$mercado = "SAÚDE HUMANA E SERVIÇOS SOCIAIS";
			}
			elseif ($code['0'] >= 90 && $code['0'] <= 93) {
				$mercado = "ARTES, CULTURA, ESPORTE E RECREAÇÃO";
			}
			elseif ($code['0'] >= 94 && $code['0'] <= 96) {
				$mercado = "OUTRAS ATIVIDADES DE SERVIÇOS";
			}
			elseif ($code['0'] == 97) {
				$mercado = "SERVIÇOS DOMÉSTICOS";
			}
			elseif ($code['0'] == 99) {
				$mercado = "ORGANISMOS INTERNACIONAIS E OUTRAS INSTITUIÇÕES EXTRATERRITORIAIS";
			}

			$dados_deal = array(
				"mercado_cnpj" => $mercado,
				"id" => $id['id'],
			);

			$this->Pipedrive_updates_model->salvar_won($dados_deal);	
		}
		
		print_r("XIA ZE");exit;
	}

	public function estado()
	{

	$bd = $this->Pipedrive_updates_model->get_id_deal();
	ini_set('memory_limit', '-1');
	set_time_limit (0);
	
		foreach ($bd as $id ) {

			switch ($id['uf_cnpj']) {
				
				case "AC" :	$data = "Acre";					
				break;
				case "AL" :	$data = "Alagoas";				
				break;
				case "AM" :	$data = "Amazonas";				
				break;
				case "AP" :	$data = "Amapá";				
				break;
				case "BA" :	$data = "Bahia";				
				break;
				case "CE" :	$data = "Ceará";				
				break;
				case "DF" :	$data = "Distrito Federal";		
				break;
				case "ES" :	$data = "Espírito Santo";		
				break;
				case "GO" :	$data = "Goiás";					
				break;
				case "MA" :	$data = "Maranhão";				
				break;
				case "MG" :	$data = "Minas Gerais";			
				break;
				case "MS" :	$data = "Mato Grosso do Sul";	
				break;
				case "MT" :	$data = "Mato Grosso";			
				break;
				case "PA" :	$data = "Pará";					
				break;
				case "PB" :	$data = "Paraíba";				
				break;
				case "PE" :	$data = "Pernambuco";			
				break;
				case "PI" :	$data = "Piauí";					
				break;
				case "PR" :	$data = "Paraná";				
				break;
				case "RJ" :	$data = "Rio de Janeiro";		
				break;
				case "RN" :	$data = "Rio Grande do Norte";	
				break;
				case "RO" :	$data = "Rondônia";				
				break;
				case "RR" :	$data = "Roraima";				
				break;
				case "RS" :	$data = "Rio Grande do Sul";		
				break;
				case "SC" :	$data = "Santa Catarina";		
				break;
				case "SE" :	$data = "Sergipe";				
				break;
				case "SP" :	$data = "São Paulo";				
				break;
				case "TO" :	$data = "Tocantíns";				
				break;
			}
			
			

 			

			$pastaPessoal = sanitizeString($id['uf_cnpj']);

			$dados_deal = array(
				"id" => $id['id'],
				"uf_cnpj" => $pastaPessoal,
			);


			$this->Pipedrive_updates_model->salvar_won($dados_deal);
		}
	print_r("xia ze");exit;
	}

	public function produto_div()
	{
		$bd = $this->Pipedrive_updates_model->get_id_deal();
		ini_set('memory_limit', '-1');
		set_time_limit (0);
		
		foreach ($bd as $id ) {
			$all = explode(" ", $id['produto']);
			
			if ($all['2'] == "Assessment") {
				$produto = "Assessment";	
			}
			elseif ($all['2'] == "Basic") {
				$produto = "Profiler Gestão Basic";
			}
			elseif ($all['3'] == "Recruiter") {
				$produto = "Recruiter";
			}
			elseif ($all['3'] == "Multi;presa") {
				$produto = "Multipresa";
				print_r("xia ze");
			}
			elseif ($all['1'] == "API") {
				$produto = "API";
			}
			elseif ($all['0'] == "White") {
				$produto = "White Label ";
			}
			else {
				$produto = "Profiler Gestão";
			}
			$dados_deal = array(
				"produto_div" => $produto,
				"id" => $id['id']
			);
			
			$this->Pipedrive_updates_model->salvar_won($dados_deal);
		}
		
		
	}

	public function att_id_rd()
	{
		$bd = $this->Pipedrive_updates_model->get_id_deal();
		ini_set('memory_limit', '-1');
		set_time_limit (0);
		foreach ($bd as $id ) {

			$deal_activitys = pipedrive_get_deal_updates($id['id']);
			$id_rd = 0;
			
			foreach ($deal_activitys['data'] as $atividade) {
			 	if ($atividade['object'] == 'note') {
			 		$tag = explode("/" , $atividade['data']['content']);
			 		
			 		
			 		if ($tag['2'] == 'rdstation.com.br') {
			 			$id_rd = explode('"',$tag['5']);
			 		}
			 	}
			 }

			$dados_deal = array(
				"uuid_rd" => $id_rd['0'],
				"id" => $id['id'],
				"att" => "5"
			);

			$this->Pipedrive_updates_model->salvar_won($dados_deal);

		}
	print_r("xia ze");exit;
	}

	public function rd_att()
	{
		$bd = $this->Pipedrive_updates_model->get_id_deal();
		ini_set('memory_limit', '-1');
		set_time_limit (0);
		foreach ($bd as $id ) {
		$deal = pipedrive_get_deal($id['id']);
		$access_token = $this->Mkt_rd_model->get_token_rd();
		$email = $deal['data']['person_id']['email']['0']['value'];
		$lead = dados_lead_email($email,$access_token['0']['id']);
		
		if ($lead['curl_info']['http_code'] == 401) {
			$refresh = $this->Mkt_rd_model->get_refresh_rd();

			$new_token = att_token($refresh['0']['id']);

			$this->Mkt_rd_model->token_rd($new_token['access_token']);

			$this->Mkt_rd_model->refresh_rd($new_token['refresh_token']);

			$access_token = $this->Mkt_rd_model->get_token_rd();
		}
		$lead = dados_lead_email($email,$access_token['0']['id']);
		
		$dados_deal = array(
				"uuid_rd" => $lead['uuid'],
				"id" => $id['id'],
				"att" => "6"
			);

			$this->Pipedrive_updates_model->salvar_won($dados_deal);
		}
		print_r("XIA ZE");exit;
	}

	public function att_email_user()
	{
		$bd = $this->Pipedrive_updates_model->get_id_deal();

		ini_set('memory_limit', '-1');
		set_time_limit (0);
	
		foreach ($bd as $id ) {
			$user = pipedrive_get_usuario($id['user_id']);

			if ($user['success'] == 1) {
				
				$email = $user['data']['email'];

				$dados_user = array(
					'user_id' => $user['data']['id'],
					'email' => $email);
			
				
				$this->Pipedrive_updates_model->salvar($dados_user);
			}
		}
		print_r("XIA ZE");
	}	

	public function att_idclifor()
	{
		$bd = $this->Pipedrive_updates_model->get_id_deal();

		ini_set('memory_limit', '-1');
		set_time_limit (0);
	
		foreach ($bd as $id ) {
			$deal = pipedrive_get_deal($id['id']);
			$org = pipedrive_get_organization($deal['data']['org_id']['value']);
			$email = $org['data']['fb01daac4bd31dd942fc823e8537a16ec722f6f0'];
			$negocio = $this->Comercial_model->dados_crm($email);
			$id_clifor = $negocio['0']['ID'];

			$dados_deal = array(
				'id' => $id['id'],
				'id_clifor' => $id_clifor,
			);
			$this->Pipedrive_updates_model->salvar_won($dados_deal);
		}
	}

	public function att_valor_previsao()
	{
		$bd = $this->Pipedrive_updates_model->get_id_deal();

		ini_set('memory_limit', '-1');
		set_time_limit (0);

		foreach ($bd as $id) {
			
			$id_id = $id['id'];
			
			$valor = $this->db->query("SELECT value FROM deal WHERE id='$id_id'");
			
			$real = $valor->result_array();
			
			$previsao = array(
				'id' => $id['id'],
				'value' => $real['0']['value'],
				'data' => $id['data'], 
				'id_auto' => $id['id_auto'], 
				'previsao' => $id['previsao']);

			$this->Pipedrive_updates_model->att_previsao($previsao);
		}
	}

	public function att_status_negociacao()
	{
		$bd = $this->Pipedrive_updates_model->get_id_deal();

		ini_set('memory_limit', '-1');
		set_time_limit (0);

		foreach ($bd as $id) {
			$deal = pipedrive_get_deal($id['id']);

			$dados = array(
				'id' => $id['id'],
				'status_negociacao' => $deal['data'][PIPEDRIVE_FILED_NEGOCIACAO]);

			$this->Pipedrive_updates_model->salvar($dados);
			
			sleep('1');
		}
	}

	public function api_gestao()
	{
		ini_set('memory_limit', '-1');
		set_time_limit (0);

		$api = gestao_profiler();

		foreach ($api as $dados) {
				$dados_profiler = array(
					'id' => $dados['id'],
					'nome' => $dados['name'],
					'email' => $dados['email'],
					'genero' => $dados['gender'],
					'data_admissao' => $dados['dateAdmission'],
					'data_demissao' => $dados['dateDismissal'],
					'data_profiler' => $dados['testDate'],
					'perfil_predominante' => $dados['profiler']['perfil'],
					'id_energia' => $dados['profiler']['forca_candidato'],
					'nivel_energia' => $dados['profiler']['nivelenergia'],
					'iem' => $dados['profiler']['indicestress'],
					'nivel_iem' => $dados['profiler']['nivelestress'],
					'ia' => $dados['profiler']['ia'],
					'nivel_ia' => $dados['profiler']['ia_nivel'],
					'moral' => $dados['profiler']['moral'],
					'nivel_moral' => $dados['profiler']['moral_nivel'],
					'ip' => $dados['profiler']['indice_positivo'],
					'nivel_ip' => $dados['profiler']['nivelip'],
					'amplitude' => $dados['profiler']['amplitude'],
					'nivel_amplitude' => $dados['profiler']['amplitude_nivel'],
					'tempo_consumido' => $dados['profiler']['tempoconsumido'],
					'nivel_tempo' => $dados['profiler']['niveltempo'],
					'if' => $dados['profiler']['flexibilidade'],
					'nivel_if' => $dados['profiler']['flex_nivel'],
					'perfil_postivo_e' => $dados['profiler']['perc_executor2colp'],
					'perfil_negativo_e' => $dados['profiler']['perc_executor2coln'],
					'percent_e' => $dados['profiler']['perc_executor'],
					'nivel_e' => $dados['profiler']['nivel_d1pi'],
					'perfil_positivo_c' => $dados['profiler']['perc_comunicador2sanp'],
					'perfil_negativo_c' => $dados['profiler']['perc_comunicador2sann'],
					'percent_c' => $dados['profiler']['perc_comunicador'],
					'nivel_c' => $dados['profiler']['nivel_d2pi'],
					'perfil_positivo_p' => $dados['profiler']['perc_planejador2flep'],
					'perfil_negativo_p' => $dados['profiler']['perc_planejador2flen'],
					'percent_p' => $dados['profiler']['perc_planejador'],
					'nivel_p' => $dados['profiler']['nivel_d3pi'],
					'perfil_positivo_a' => $dados['profiler']['perc_analista2melp'],
					'perfil_negativo_a' => $dados['profiler']['perc_analista2meln'],
					'percent_a' => $dados['profiler']['perc_analista'],
					'nivel_a' => $dados['profiler']['nivel_d4pi'],
					'incitabilidade' => $dados['profiler']['incitabilidade'],
					'nivel_incitabilidade' => $dados['profiler']['nivel_incitab'],
					'energia_perfil' => $dados['profiler']['energperfil'],
					'nivel_energia_perfil' => $dados['profiler']['nivel_energperfil'],
					'cerebro_esq' => $dados['profiler']['cerebro_esq'],
					'cerebro_dir' => $dados['profiler']['cerebro_dir'],
					'cerebro_fre' => $dados['profiler']['cerebro_fre'],
					'cerebro_tra' => $dados['profiler']['cerebro_tra'],
					'agressividade' => $dados['profiler']['agressividade'],
					'perfil_tecnico' => $dados['profiler']['aptidao_para_habilidades_tecnicas'],
					'automotivacao' => $dados['profiler']['automotivacao'],
					'capacidade_de_sonhar' => $dados['profiler']['capacidade_de_sonhar'],
					'concentracao' => $dados['profiler']['concentracao'],
					'condescendencia' => $dados['profiler']['condescendencia'],
					'hab_artistica' => $dados['profiler']['hab_artistica'],
					'detalhismo' => $dados['profiler']['detalhismo'],
					'dominancia' => $dados['profiler']['dominancia'],
					'empatia' => $dados['profiler']['empatia'],
					'exatidao' => $dados['profiler']['exatidao'],
					'entusiasmo' => $dados['profiler']['entusiasmo'],
					'extroversao' => $dados['profiler']['extroversao'],
					'facilidade_mudancas' => $dados['profiler']['facilidade_em_lidar_com_mudancas'],
					'formalidade' => $dados['profiler']['formalidade'],
					'independencia' => $dados['profiler']['independencia'],
					'multi_tarefas' => $dados['profiler']['multi_tarefas'],
					'paciencia' => $dados['profiler']['paciencia'],
					'desenvolver_relacionamento' => $dados['profiler']['se_desenvolve_pelo_relacionamento'],
					'desenvolver_trabalho' => $dados['profiler']['se_desenvolve_pelo_trabalho'],
					'sociabilidade' => $dados['profiler']['sociabilidade']);
			
				print_r($dados_profiler);exit;
			}
		
	}

	public function mes_gnaho()
	{
		ini_set('memory_limit', '-1');
		set_time_limit (0);

		$bd = $this->Pipedrive_updates_model->get_id_deal();
		foreach ($bd as $dados) {
			if ($dados['id'] > 1) {
				$mes = date_format(date_create($dados['data_ganho']),'Y-m');

				$dados = array(
					'id' => $dados['id'],
					'mes_ganho' => $mes);
				
				$this->Pipedrive_updates_model->salvar_won($dados);
			}
		}
	}

	public function att_segemnto_crm()
	{
		$bd = $this->Comercial_model->get_id_crm();

		ini_set('memory_limit', '-1');
		set_time_limit (0);
		
		foreach ($bd as $id ) {
		
		$cnpj = limpaCPF_CNPJ($id['CNPJ']);
		$receita = cnpj_receita($cnpj);
		
		$codigo = codigo_knae($receita['atividade_principal']['0']['code']);
		
		$dados_deal = array(
			'ID' => $id['ID'],
			'SEGMENTO' => $codigo, 
			'IDEMP' => 1,
		);
		

		$this->Comercial_model->att_crm($dados_deal);

		sleep(10);

		}

	}

	public function ajustes_financeiro()
	{
		$deados = $this->solides_master_db->query("SELECT * FROM ASSINATURAS WHERE VALOR_MENSALIDADE = 0 AND DATA_CANCELAMENTO IS NULL;")->result_array();
		
		foreach ($deados as $value) {
			$id = $value['IDCLIFOR'];
			$comercial = $this->solides_master_db->query("SELECT * FROM CMOVIMENTOS WHERE IDCLIFOR='$id' AND IDEMP = 1 ORDER BY ID DESC")->result_array();
			$dados[] = array(
				'IDCLIFOR' => $comercial['0']['IDCLIFOR'],
				'VALOR_MENSALIDADE' => $comercial['0']['VALORLIQUIDO']);
			
		}
		
		foreach ($dados as $value) {

				$this->solides_master_db->update('ASSINATURAS',$value,array("IDCLIFOR" => $value['IDCLIFOR']));
			
		}

		print_r("XIA CACHORO");exit;
	}

	public function att_email_dashboard()
	{
		$ids = $this->Comercial_model->contato_equipe_gest();

		foreach ($ids as $value) {
			$email = pipedrive_get_user($value['user_id']);

			$att = array(
				'user_id' => $value['user_id'],
				'email' => $email['data']['email']);

			$this->Comercial_model->att_emails_pipe($att);
		}
	}
}

