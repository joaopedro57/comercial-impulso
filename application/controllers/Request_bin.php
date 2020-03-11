<?php
//Controller que recebe todos os dados,tanto vindo do RD quanto do Pipedrive
class Request_bin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mkt_rd_model');//model de atualização e pesquisa no bando do marketing(tabela dentro do bd)
		$this->load->model('Pipedrive_updates_model');//model de update no banco de dados
		$this->load->helper('pipedrive_api_helper');//helper das APIs do Pipedrive
		$this->load->helper('rd_api_helper');//helper das APIs do RD Station
		$this->load->library('session');//logado ou não no sistema
		$this->load->model('Comercial_model');//model de pesquisa no bando de dados do comercial
		$this->load->helper('att_helper');//helper de funções usadas no sistema
	} 
	
	public function xia_ze()
	{
		ini_set('memory_limit', '-1');
		set_time_limit (0);
		
		$dados = $this->Comercial_model->filipe_chato();

		echo(json_encode($dados));
	}

	public function pipedrive_post() // função que recebe o Weebhook do Pipedrive
	{	
		ini_set('memory_limit', '-1');
		set_time_limit (0);
		
		$json = file_get_contents("php://input");
		$request = json_decode($json,1);

		$dados_json = array(
			"id" => $request['meta']['id'],
			"json_pipe" => $json);

		$this->Pipedrive_updates_model->salvar_json($dados_json); //salva o json assim que chega

			if($request['meta']['object'] == "deal"){
				self::_updates($request);
				if ($request['current']['status'] == "won") {
		
				 	switch ($request['current']['pipeline_id']){ //troca o json que chega entre os diferentes bancos 
							case "20":
								self::_updates($request);
								break;
							case "21":
								self::_updates_won($request);
								break;
							case "25":
								self::_updates_avulso($request);
								break;
			 				default:
								break;
					}	
				} 
			}
				
			else{
				return false;
			}
	}

	private function _updates($request)//atualiza todas os leads que estão no funil, exceto do ONE SHOT(funil 25)
	{
		$tamanho_empresa = pipedrive_get_person($request['current']['person_id']);
		$current_stage =  $request['current']['stage_id'];
		$previous_stage =  $request['previous']['stage_id'];
		$sdr = pipedrive_get_usuario($request['current'][PIPEDRIVE_QUALIFICADOR_FIELD]);
		$closer = pipedrive_get_usuario($request['current'][PIPEDRIVE_CLOSER_FIELD]); 
		$deal = pipedrive_get_deal($request['meta']['id']);
		$org = pipedrive_get_organization($request['current']['org_id']); 
		$deal_activitys = pipedrive_get_deal_updates($request['meta']['id']);
		$data_diagnostico = 0;
		$id_rd = 0;
		
		 foreach ($deal_activitys['data'] as $data) {
		 	if ($data['object'] == 'note') {
		 		$tag = explode("/" , $data['data']['content']);
		 
		 		if ($tag['2'] == 'rdstation.com.br') {
		 			$id_rd = explode('"',$tag['5']);
		 		}
		 	}
		 	if(isset($data['data']['type']) && $data['data']['type'] == 'reunio_realizada'){
				$data_diagnostico = $data['data']['due_date'];
			}
		 }
				$data1 = date_create($request['current']['add_time']); //salvar no modelo do db
				$data = date_format($data1 , 'Y-m-d');

				$data2 = date_create($deal['data']['lost_time']);
				$data_perdido = date_format($data2 , 'Y-m-d'); 
				
				$idade_deal =  ceil($deal['data']['age']['total_seconds']/86400 );	
	
		$stage = $deal['data']['stay_in_pipeline_stages']['order_of_stages'];

		foreach ($stage as $key) { //calcula em quanto tempo ficou em cada etapa do funil 
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

			'id' 					=> $request['meta']['id'],
			'user_id' 				=> $request['current']['user_id'],
			'title' 				=> $request['current']['title'],
			'value' 				=> $request['current']['value'],
			'status' 				=> $request['current']['status'],
			'stage_change_time' 	=> $request['current']['stage_change_time'],
			'next_activity_date' 	=> $request['current']['next_activity_date'],
			'last_activity_date' 	=> $request['current']['last_activity_date'],
			'sdr' 					=> $request['current'][PIPEDRIVE_QUALIFICADOR_FIELD],
			'mercado' 				=> $request['current'][PIPEDRIVE_FIELD_MERCADO],
			'localizacao' 			=> $request['current'][PIPEDRIVE_FIELD_LOCALIZACAO],
			'cargo' 				=> $request['current'][PIPEDRIVE_FIELD_CARGO],
			'quant_colaboradores' 	=> $request['current'][PIPEDRIVE_FIELD_QUANT_COLABORADOR],
			'closer'				=> $request['current'][PIPEDRIVE_CLOSER_FIELD],
			'cenario_lead' 			=> $request['current'][PIPEDRIVE_FIELD_CENARIO],
			'origem' 				=> $request['current'][PIPEDRIVE_FIELD_ORIGEM],
			'stage_id' 				=> $request['current']['stage_id'],
			'add_time'				=> $data,
			'tamanho_empresa'		=> $tamanho_empresa['data'][PIPEDRIVE_FIELD_PESSOA_TAMANHO_EMPRESA],
			'funil'					=> $request['current']['pipeline_id'],
			'criador'				=> $deal['data']['creator_user_id']['id'],
			'email_pessoal'			=> $deal['data']['person_id']['email']['0']['value'],
			'telefone_pessoa'		=> $deal['data']['person_id']['phone']['0']['value'],
			'motivo_lost'			=> $deal['data']['lost_reason'],
			'data_perdido'			=> $data_perdido,
			'atividades_feitas'		=> $deal['data']['done_activities_count'],
			'data_ultima_conversao'	=> $deal['data'][PIPEDRIVE_FIELD_DATA_ULTIMA_CONVERSAO],
			'ultima_conversao'		=> $deal['data'][PIPEDRIVE_FIELD_ULTIMA_CONVERSAO],
			'rd_tag'				=> $deal['data'][PIPEDRIVE_FIELD_TAG],
			'faixa_funcionario'		=> $deal['data'][PIPEDRIVE_FIELD_TAMNHO_EMPRESA_NEGOCIO],
			'idade_deal'			=> $idade_deal,
			'rd_origem'				=> $org['data'][PIPEDRIVE_FIELD_ORIGEM_RD],
			'uuid_rd'				=> $id_rd['0'],
			'data_diagnostico'		=> $data_diagnostico,
			'status_negociacao'		=> $request['current'][PIPEDRIVE_FILED_NEGOCIACAO],
			'emails_parceiro'		=> $request['current'][PIPEDRIVE_FIELD_EMAIL_PARCEIRO]
			
		);
		//salva as etapas do funil que o lead percorreu
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
		

		$this->Pipedrive_updates_model->salvar($dados_deal); //salva e atualiza os dados do lead no banco principal dos deal
	}

	private function _updates_avulso($request)//salva os leads do avulso(ainda precisa ser muito bem reestruturado)
	{			
		$current_stage 	= $request['current']['stage_id'];
		$previous_stage =  $request['previous']['stage_id'];
		$deal 			= pipedrive_get_deal($request['meta']['id']); 

		$dados_deal = array(
			'id' => $request['meta']['id'],
			'user_id' => $request['current']['user_id'],
			'value' => $request['current']['value'],
			'last_activity' =>$request['current']['last_activity'],
		);

	$this->Pipedrive_updates_model->salvar_avulso($dados_deal);//salva e atualiza os dados do lead no banco do one shot


	}

	private function _updates_won($request)
	//salva todos os ganhos de MRR(importante que para salvar o lead precisa ter a atividade "Diagnostico Realizada concluida")
	{


		$org = pipedrive_get_organization($request['current']['org_id']);
		$deal = pipedrive_get_deal($request['meta']['id']);
		$deal_activitys = pipedrive_get_deal_updates($request['meta']['id']);
      	$add_time2 = date_create($request['current']['add_time']);
		$add_time = date_format($add_time2 , 'Y-m-d'); 
		$cnpj = $org['data'][PIPEDRIVE_FILED_CNPJ];
		$receita = cnpj_receita($cnpj);
		$mercado = explode("," , $receita['atividade_principal']['0']['text']);
		$produto = pipedrive_get_produto_deal($request['meta']['id']);	
		$mercado_cnpj = mercado_ibge($receita['atividade_principal']['0']['code']);
		$produto_div = produto($produto['data']['0']['name']);
		$uf = uf($receita['uf']);
		$estado = sanitizeString($uf);
		$id_rd = 1;
	
		foreach ($deal_activitys['data'] as $data) { // salva o UUID do RD 
		 	
			if ($data['object'] == 'note') {
		 		$tag = explode("/" , $data['data']['content']);
		 
		 		if ($tag['2'] == 'rdstation.com.br') {
		 			$id_rd = explode('"',$tag['5']);
		 		}
		 	
		 	}
		}

		foreach ($deal_activitys['data'] as $data) {//calcula a data do diagnostico
			
			
			if(isset($data['data']['type']) && $data['data']['type'] == 'reunio_realizada'){
				$data_diagnostico = $data['data']['due_date'];
				
				if($deal['data']['won_time'] == null) { //subtração das datas
					$data6 = "-1";
				}
				
				else {
				$data1 = date_create($deal['data']['won_time']);
				$data2 = date_format($data1 , 'Y-m-d'); 
							
				$data3 = new DateTime($data_diagnostico);
				$data4 = new DateTime($data2);

				$data5 = date_diff($data3,$data4); 
				$data6 = $data5->format("%a");
			    
			    }
			}		

			if (!$data_diagnostico) {//faz o ciclo de venda se não tiver a atividade diagnostico 
				$data_diagnostico = date_format(date_create($add_time), 'Y-m-d');
				$data1 = date_create($deal['data']['won_time']);
				$data2 = date_format($data1 , 'Y-m-d'); 
				$data3 = new DateTime($data_diagnostico);
				$data4 = new DateTime($data2);
				$data5 = date_diff($data3,$data4); 
				$data6 = $data5->format("%a");
			}

		   	if(isset($data_diagnostico)){//so entra aqui se o diagnostico aconteceu
			   	$dados_deal = array(			
					'id' 					=> $request['meta']['id'],
					'title' 				=> $request['current']['title'],
					'value' 				=> $request['current']['value'],
					'sdr' 					=> $request['current'][PIPEDRIVE_QUALIFICADOR_FIELD],
					'pessoa_contato'        => $request['current']['person_name'],
                    'mercado' 				=> $request['current'][PIPEDRIVE_FIELD_MERCADO],
					'localizacao' 			=> $request['current'][PIPEDRIVE_FIELD_LOCALIZACAO],
					'cargo' 				=> $request['current'][PIPEDRIVE_FIELD_CARGO],
					'quant_colaboradores' 	=> $request['current'][PIPEDRIVE_FIELD_QUANT_COLABORADOR],
					'closer'				=> $request['current'][PIPEDRIVE_CLOSER_FIELD],
					'cenario_lead' 			=> $request['current'][PIPEDRIVE_FIELD_CENARIO],
					'origem' 				=> $request['current'][PIPEDRIVE_FIELD_ORIGEM],
					'condicao_fechamento'	=> $org['data'][PIPEDRIVE_FIELD_CONDICAO_FECHAMENTO],
					'resumo_fechamento'		=> $org['data'][PIPEDRIVE_FIELD_RESUMO_FECHAMENTO],
					'data_vencimento'       => $org['data'][PIPEDRIVE_FIELD_DATA_VENCIMENTO],
                    'ciclo_venda'			=> $data6,
					'produto'				=> $produto['data']['0']['name'],
					'data_ganho'			=> $data2,
                	'add_time' 				=> $add_time,
                	'mercado_principal_cnpj' => $receita['atividade_principal']['0']['text'] , 
					'mercado_cnpj'			=> $mercado_cnpj,
					'code_cnpj'				=> $receita['atividade_principal']['0']['code'],
					'uf_cnpj'				=> $estado,
					'produto_div'			=> $produto_div,
					'uuid_rd'				=> $id_rd['0']
                );

		   		$this->Pipedrive_updates_model->salvar_won($dados_deal);//salva e atualiza os negocios ganhos no banco	
		   		
		   	}
		}	
		//busca o id_clifor no CRM
		$previsao = array( //atualiza a previsão caso eles não tenham feito isso
		   			'id' => $dados_deal['id'],
		   			'value' => $dados_deal['value'],
		   			'closer' => $dados_deal['closer'] );
		   		
		$this->Pipedrive_updates_model->status_previsao($previsao);
		

		sleep('3');
		$idclifor = $this->Comercial_model->dados_crm($cnpj);
		$dados_deal['id_clifor'] = $idclifor['0']['ID'];

		$this->Pipedrive_updates_model->salvar_won($dados_deal);

		self::_updates_won_rd($org);
	}
	
	public function update_Rd() //Recebe o Weebhook do RD Station para salvar todos os leads que convertem dentro do RD
	{
		ini_set('memory_limit', '-1');
		set_time_limit (0);
		
		$json = file_get_contents("php://input");
		$request = json_decode($json, 1);

			$access_token = $this->Mkt_rd_model->get_token_rd();
			$pessoa = pipedrive_get_person($request['current']['person_id']);
			$email = $pessoa['data']['email']['0']['value'];
			
			$lead = dados_lead_email($email,$access_token['0']['id']);
			
			if ($lead['curl_info']['http_code'] == 401) { //Refresh no token do RD Station para faze as requisições 
				$refresh = $this->Mkt_rd_model->get_refresh_rd();

				$new_token = att_token($refresh['0']['id']);

				$this->Mkt_rd_model->token_rd($new_token['access_token']);

				$this->Mkt_rd_model->refresh_rd($new_token['refresh_token']);

				$access_token = $this->Mkt_rd_model->get_token_rd();
				
				$lead = dados_lead_email($email,$access_token['0']['id']);
			}

			$deal_activitys = pipedrive_get_deal_updates($request['meta']['id']);
			
			foreach ($deal_activitys['data'] as $nota) {
				if($nota['object'] == "note"){
					$note = $nota['data']['content'];
					$rd = explode(" ", $note);			
					
					if ($rd['4'] == "RD") {
					return TRUE;	
					}
				}
			}

			if(isset($lead['errors'])){ // cria o lead dentro do RD
				$dados_lead = array(
					'event_type' => "CONVERSION",
					'event_family' => "CDP",
				);
				$dados_lead['payload'] = array(
					'conversion_identifier' => "otb_pipedrive",//nome da conversão dentro do RD
					'name' => $pessoa['data']['name'],
					'email' => $pessoa['data']['email']['0']['value'],
					'personal_phone' => $pessoa['data']['phone']['0']['value']
				);
				$return = criar_lead_rd($dados_lead,$access_token['0']['id']);
			}

			else{ // converte o lead ja existente dentro do RD
				$dados_lead = array(
					'event_type' => "CONVERSION",
					'event_family' => "CDP",
				);
				$dados_lead['payload'] = array(
					'conversion_identifier' => "otb_pipedrive",//nome da conversão dentro do RD
					'name' => $pessoa['data']['name'],
					'email' => $pessoa['data']['email']['0']['value'],
					'personal_phone' => $pessoa['data']['phone']['0']['value']
				);			
				$return = criar_lead_rd($dados_lead,$access_token['0']['id']);
			}

			for ($i=0; $i < 10; $i++) { 
				
				$lead = dados_lead_email($email,$access_token['0']['id']);
				
				if (isset($lead['uuid'])) {
					$note = "Histórico do Lead no RD Station: http://rdstation.com.br/leads/public/".$lead['uuid'];
					$add = pipedrive_add_note($request['meta']['id'],$note);
					break;
				}
				
				else {
					sleep('20');
				}
			}
			
	}

	public function _updates_won_rd($org)//funão que atualiza o status do contato dentro do RD
	{
		$email = $org['data']['fb01daac4bd31dd942fc823e8537a16ec722f6f0'];//pega o email que vai usar o sistema

		$access_token = $this->Mkt_rd_model->get_token_rd(); // pega o token de acesso 	
		$lead = dados_lead_email($email,$access_token['0']['id']);
		
			
		if ($lead['curl_info']['http_code'] == 401) { //Refresh no token do RD Station para faze as requisições 
			$refresh = $this->Mkt_rd_model->get_refresh_rd();
			$new_token = att_token($refresh['0']['id']);
			$this->Mkt_rd_model->token_rd($new_token['access_token']);
			$this->Mkt_rd_model->refresh_rd($new_token['refresh_token']);
			$access_token = $this->Mkt_rd_model->get_token_rd();

			self::_updates_won_rd($request);
		}
		
		$dados_lead = array(
			'event_type' => "SALE",
			'event_family' => "CDP",
		);
		$dados_lead['payload'] = array(
			'email' => $email,
			'funnel_name' => "Funil de vendas",
			'value' => 0
		);
		
		$return = criar_lead_rd($dados_lead,$access_token['0']['id']);
			
	} 
}