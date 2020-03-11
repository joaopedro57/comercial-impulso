<?php   
defined('BASEPATH') OR exit('No direct script access allowed');
//Controller que rege todas as funções da Dashboard Comercial
class Comercial_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Comercial_model');//model de pesquisa no bando de dados do comercial
		$this->load->helper('pipedrive_api');//helper das APIs do Pipedrive
		$this->load->model("login_model");//model que determina ques está logado
		$this->load->library('session');//logado ou não no sistema
		$this->load->model('Pipedrive_updates_model');//model de update no banco de dados

		if($this->session->userdata('logado') != 1 ) {
			redirect("index/logout"); //se a pessoa tiver deslogada redireciona para a pagina de loguin

		}
	} 
	
	public function index()//funão que cria a pagina inicial da Dashboard
	{
		ini_set('memory_limit', '-1');
		set_time_limit (0);
		
		
		$request['valorTotal'] 				= $this->Comercial_model->mrrTotal(); //retorna o valor total ja vendido 
		$request['valor'] 					= $this->Comercial_model->mrr(); // retorna o valor do MRR atual
		$request['nConta'] 					= $this->Comercial_model->count(); //retorna o numero de contas ja vendidas atual
		$request['closers'] 				= $this->Comercial_model->closer(); //retorna as informações de cada Closer que vendeu
		$request['mrrRankin'] 				= $this->Comercial_model->mrrRankin(); //retorna o ranking de MRR dos Closer atual
		$request['tktMedio'] 				= $this->Comercial_model->tktMedio();//retorna o Ranking de tkt médio de cada Closer
		$request['ciclo_medio'] 			= $this->Comercial_model->ciclo_medio(); //retorna o ciclo de vendas de cada Closer no
		$request['media_do_ciclo'] 			= $this->Comercial_model->media_ciclo();//retorna o ciclo de vendas do comercial no mes atual
		$request['acumulo'] 				= $this->Comercial_model->acumulo_total();//retorna o ranking de total vendidos por Closer
		$request['user']            		= $this->session->userdata();//retorna as informações do usuario
		$request['contato']   				= $this->Comercial_model->contato();//retorna as informações de contato de todos do comercial
		$request['somaMetas']				= $this->Comercial_model->somaMetas();//retorna a meta do comercial
		$request['tktMedioAnterior'] 		= $this->Comercial_model->tktMedioAnterior();//retorna o tkt médio do mes aterior
		$request['nContaAnterior']			= $this->Comercial_model->countAnterior();//retorna o numero de contas do mes anterior
		$request['ciclo_anterior']			= $this->Comercial_model->media_ciclo_Anterior();//retorna o ciclo de venda do mes anterior
		
		//monta a tabela de relação entre vendidos e pagos, usando o banco do CRM
		
		$tbl_vendedor_vendidos = $this->Comercial_model->pagos();
		foreach ($tbl_vendedor_vendidos as $key => $value) {
			$pagamento = $this->Comercial_model->pagamento($value['closer']); //retorna as informações de pago por usuario usando o email

			$tbl_pagamento[$key] = array(
				'closer' => $value['closer'],
				'pagos' => $pagamento['pago'],
				'contas_pagas' => $pagamento['contas_pagas'],
				'contas_vendidas' => $pagamento['contas_vendidas'],
				'vendido' => $pagamento['total_vendido']);
		}
		$request['pagamento'] = $tbl_pagamento;

		//monta o grafico das metas
		$request['grafico'] = $this->Comercial_model->grafico_mrr_meta();//retorna a meta por mês
		foreach ($request['grafico'] as $key => $value) {
			$vendido = $this->Comercial_model->grafico_mrr_valor($value['meses']);//retorna o valor vendido por mês
			$request['grafico'][$key]['vendido'] = round($vendido['0']['SUM(value)']);
		}

		$request['dados_pagos'] = $this->Comercial_model->contas_vendidas();
		$request['primeiro_pagamento'] = $this->Comercial_model->primeiro_pagamento();

		$this->load->view('templates/header', $request);//recebe 'contato' e 'userdata'
		$this->load->view('templates/pagina_inicial',$request);
		$this->load->view('templates/footer',$request);	

	}

	public function clientes()//função que cria a pagina do clientes, acessiveis so pelos gestorer e coordenadores
	{
		$request['user']      		= $this->session->userdata();//retorna as informações do usuario
		$request['contato']   		= $this->Comercial_model->contato();//retorna as informações de contato de todos do comercial
		$request['nConta'] 			= $this->Comercial_model->count();//retorna o numero de contas ja vendidas atual
		$request['clientes'] 		= $this->Comercial_model->bd_query();//retorna as informações dos clientes

		$this->load->view('templates/header', $request);//recebe 'contato' e 'userdata'
		$this->load->view('templates/clientes', $request);
		$this->load->view('templates/footer');
	
	

	}
    
     public function perfil($user_id)//função dos perfils dos closers, reebe o ID de quem está logado para criar 
	{
		ini_set('memory_limit', '-1');
		set_time_limit (0);
		
		$request['user'] = $this->session->userdata();//retorna as informações do usuario

		if ($request['user']['cargo'] == 'Closer') {

			$user_id = $request['user']['user_id'];		
		}

		$request['vendedor'] = $this->Comercial_model->closer_perfil($user_id);//retorna as informações das contas vendidas pelo vendedor
		$index = 0;
		
		foreach ($request['vendedor'] as $value) {
			if (isset($value['id_clifor'])) {
				$request['vendedor'][$index]['primeiro_pagamento'] = $this->Comercial_model->get_primeiro_pagamento($value['id_clifor']);
				
			}
			$index ++;	
		}

		$request['dados'] 					= $this->Comercial_model->contas_closer($user_id);//retorna o numero de contas e o total vendido no mes
		$request['mrrRankin'] 				= $this->Comercial_model->mrrRankin();//retorna o ranking de MRR dos Closer atual
		$request['acumuloTotal'] 			= $this->Comercial_model->acumulo_total();//retorna o ranking de total vendidos por Closer
		$request['contato']   				= $this->Comercial_model->contato();//retorna as informações de contato de todos do comercial
		$request['contas_vendedorTotal'] 	= $this->Comercial_model->contas_closerTotal($user_id);//retorna o numero de contas e o total vendido no ano
		$request['leadsCloserConversao']	= $this->Comercial_model->leadsCloserConversao($user_id);//retorna taxa de conversão dos leads no mês 
		$request['leadsCloser']				= $this->Comercial_model->leadsCloser($user_id);//retorna todos leads atual em cada etapa 
		$request['demos']					= $this->Comercial_model->demos($user_id);//retorna o numero de demos feitos pra se mesmo
		$request['demos_sdr']				= $this->Comercial_model->demos_sdr($user_id);//retorna o numero de demos feitos pra se mesmo
		$request['txFechamento']			= $this->Comercial_model->tx_fechamento($user_id);//retorna a taxa de fechamento do MES ANTERIOR
		$request['comisao']					= $this->Comercial_model->pagamento_vendedor($request['vendedor']['0']['email']);//retorna a comissao do vendeodr no mes(contas que PAGARAM no mês)

		//monta o grafico das metas
		$request['grafico'] = $this->Comercial_model->grafico_vendedor_meta($user_id);//retorna o valor da meta do vendedor por mês
		foreach ($request['grafico'] as $key => $value) {
			$vendido = $this->Comercial_model->grafico_vendedor_valor($value['meses'],$user_id);//retorna o valor vendido do vendedor no mês
			$request['grafico'][$key]['vendido'] = round($vendido['0']['SUM(value)']);
		}

		$this->load->view('templates/header',$request);//recebe 'contato' e 'userdata'
		$this->load->view('templates/perfil',$request);
		$this->load->view('templates/footer');
	}
    
	public function contatos()//função que cria a pagina de Contatos
	{
		$request['user']      = $this->session->userdata();//retorna as informações do usuario
		$request['contato']   = $this->Comercial_model->contato();//retorna as informações de contato de todos do comercial
		
		//faz as regras de negocio para atualização dos status do colaborador
		$dados = $this->input->post();
		if ($request['user']['cargo'] != 'Closer' || $request['user']['cargo'] != 'SDR' || $request['user']['cargo'] != 'One Shot') {
			foreach ($dados as $key => $value) {
				$status = array(
					'user_id' => $key,
					'status' => $value
				);
				$this->Pipedrive_updates_model->att_status($status);
			}
		} 

		$this->load->view('templates/header', $request);//recebe 'contato' e 'userdata'
		$this->load->view('templates/contatos', $request);
		$this->load->view('templates/footer');
	}   

	public function gestao()//função que cria a pagina de Gestão 
	{
		ini_set('memory_limit', '-1');
		set_time_limit (0);
		
		$request['meta_sdr']			= $this->Comercial_model->meta_sdr();//retorna a meta dos sdr e infos de perfil
 		$request['nConta'] 				= $this->Comercial_model->count();//retorna o numero de contas vendidas no mês
		$request['clientes'] 			= $this->Comercial_model->clientes_mes();//retorna as informações dos clientes vendidos no mês
		$request['user']      			= $this->session->userdata();//retorna as informações do usuario
		$request['valorTotal'] 			= $this->Comercial_model->mrrTotal();//retorna o total de MRR do ano 
		$request['previsao']			= $this->Comercial_model->closersPrevisoes(); //retorna a Previsão do closer
		$request['vendedores']			= $this->Comercial_model->dadosCloser(); //retorna todos os dados dos Closers
		$request['valor'] 				= $this->Comercial_model->mrr(); //retorna o valor do MRR atual
		$request['contato']   			= $this->Comercial_model->contato(); //retorna as informações de contato de todos do comercial
		$request['leads']				= $this->Comercial_model->leads();//retorna a quantidade de lead aberto no funil de MRR(sdr e closer)
		$request['leadsMes']			= $this->Comercial_model->leadsMes();//retorna a quantidade de leads gerados no mês
		$request['leadsBanco2']			= $this->Comercial_model->leadsBanco2();//leads que atualmente estão na etapa 
		$request['leadsPesquisa2']		= $this->Comercial_model->leadsPesquisa2();//leads que atualmente estão na etapa 
		$request['leadsProsp2']			= $this->Comercial_model->leadsProsp2();//leads que atualmente estão na etapa 
		$request['leadsConexao2']		= $this->Comercial_model->leadsConexao2();//leads que atualmente estão na etapa 
		$request['leadsAgendamento2']	= $this->Comercial_model->leadsAgendamento2();//leads que atualmente estão na etapa 
		$request['leadsDiagnostico2']	= $this->Comercial_model->leadsDiagnostico2();//leads que atualmente estão na etapa 
		$request['leadsSolucao2']		= $this->Comercial_model->leadsSolucao2();//leads que atualmente estão na etapa 
		$request['leadsProposta2']		= $this->Comercial_model->leadsProposta2();//leads que atualmente estão na etapa 
		$request['leadsAbertura2']		= $this->Comercial_model->leadsAbertura2();//leads que atualmente estão na etapa 
		$request['meta_mes']			= $this->Comercial_model->grafico_mrr_meta();//retorna as metas de todos os meses

		//recebe os dados de meta 
		$dados = $this->input->post();	
			foreach ($dados as $key => $value ) {
				$id = explode("/",$key); //separa o mês do id
				if (isset($value)) {
					$meta = array(
						'user_id' => $id['0'],
						'meses' => $id['1'],
						'meta' => $value);
					$this->Pipedrive_updates_model->atualizarMeta($meta);//salva a meta no banco
				}		
			}
		//monta a view das metas em cada mes
		$request['metas'] = $this->Comercial_model->gestaoDados(); 		
		$posicao = 0;
		foreach ($request['metas'] as $valores) {
			$meta = $this->Comercial_model->get_metas_mes($valores['user_id']);//retorna as metas de cada mes 
			foreach ($meta as $key => $value) {
				$request['metas'][$posicao]['meses'][$key] = $value['meta'];
			}
			$posicao ++;
		}

		$posicao2 = 0;
		foreach ($request['meta_sdr'] as $valores) {
			$meta = $this->Comercial_model->get_metas_mes($valores['user_id']);//retorna as metas de cada mes 
			foreach ($meta as $key => $value) {
				$request['meta_sdr'][$posicao2]['meses'][$key] = $value['meta'];
			}
			$posicao2 ++;
		}

		$request['somaMetas']	=$this->Comercial_model->somaMetas();

		$this->load->view('templates/header', $request);
		$this->load->view('templates/gestao', $request);
		$this->load->view('templates/footer', $request);
	

	}

	public function war_room()
	{
		$request['contato']   				= $this->Comercial_model->contato();
		$request['user']      				= $this->session->userdata();
		$request['leadsMes']				= $this->Comercial_model->leadsMes();
		$request['leadsBanco']				= $this->Comercial_model->leadsBanco();
		$request['leadsPesquisa']			= $this->Comercial_model->leadsPesquisa();
		$request['leadsProsp']				= $this->Comercial_model->leadsProsp();
		$request['leadsConexao']			= $this->Comercial_model->leadsConexao();
		$request['leadsAgendamento']		= $this->Comercial_model->leadsAgendamento();
		$request['leadsDiagnostico']		= $this->Comercial_model->leadsDiagnostico();
		$request['leadsSolucao']			= $this->Comercial_model->leadsSolucao();
		$request['leadsProposta']			= $this->Comercial_model->leadsProposta();
		$request['leadsAbertura']			= $this->Comercial_model->leadsAbertura();
		$request['leadsGanhos']				= $this->Comercial_model->leadsGanhos();
		$request['leadsPerdidos']			= $this->Comercial_model->leadsPerdidos();
		$request['leadsGeral']				= $this->Comercial_model->leadsGeral();
		$request['leadsGanhosGeral']		= $this->Comercial_model->leadsGanhosGeral();
		$request['leadsPerdidosGeral']		= $this->Comercial_model->leadsPerdidosGeral();
		$request['funilSdr']				= $this->Comercial_model->funilSdr();
		$request['funilCloser']				= $this->Comercial_model->funilCloser();
		$request['mercado']					= $this->Comercial_model->mercado();
		$request['origem']					= $this->Comercial_model->origem_room();
		$request['leadsBanco2']				= $this->Comercial_model->leadsBanco2();
		$request['leadsPesquisa2']			= $this->Comercial_model->leadsPesquisa2();
		$request['leadsProsp2']				= $this->Comercial_model->leadsProsp2();
		$request['leadsConexao2']			= $this->Comercial_model->leadsConexao2();
		$request['leadsAgendamento2']		= $this->Comercial_model->leadsAgendamento2();
		$request['leadsDiagnostico2']		= $this->Comercial_model->leadsDiagnostico2();
		$request['leadsSolucao2']			= $this->Comercial_model->leadsSolucao2();
		$request['leadsProposta2']			= $this->Comercial_model->leadsProposta2();
		$request['leadsAbertura2']			= $this->Comercial_model->leadsAbertura2();
		$request['lost']					= $this->Comercial_model->motivo_lost();
		$request['conversao']				= $this->Comercial_model->conversao();

		$request['conversao_att'] = $this->input->post("conversao");

		if ($request['conversao_att']) {

			$data1 = date_create($this->input->post("start"));
			$data2 = date_create($this->input->post("end")); 

			$data_ini = date_format($data1, 'Y-m-d');
			$data_fim = date_format($data2, 'Y-m-d');

			$request['tx_ultima_conversao'] = $this->Comercial_model->tx_ultima_conversao($request['conversao_att'],$data_ini,$data_fim);

			
		}
		else {

			$request['tx_ultima_conversao'] = 0;
		}

		$this->load->view('templates/header', $request);
		$this->load->view('templates/war_room', $request);
		$this->load->view('templates/footer', $request);
	}

	public function coordenador($name)//cria a pagina dos coordenadores
	{

		$request['user']      = $this->session->userdata();//retorna as informações do usuario
		$nome = str_replace("%20", " ", $name);//pega o nome do coordenador

		$previsao = $this->input->post();//recebe o valor da previsão e do status

		foreach ($previsao as $key => $value) { //monta o array com a previsao e o status
			if($value != "Selecione:" && $key != "clientes_length") {
				
				$prev = explode("/",$key);

				$valor = explode("/",$value);

				if (!isset($valor['1'])) {
					$valor['1'] = 0;
				}

				if (!isset($prev['1'])) {

					$status = array(
					'id' => $key,
					'previsao' => $valor['0'],
					'value' => $valor['1'],
					'data' => date('m-Y'),
					'coordenador' => $nome );

					$this->Pipedrive_updates_model->att_previsao($status);//salva a previsão no banco
				}

				else{
					$previsibilidade = array(
						'id' => $prev['0'],
						'previsao' => $prev['1'],
						'data' => $prev['2'],
						'resultado' => $value);

					$this->Pipedrive_updates_model->att_previsao_status($previsibilidade);//salva o status da conta no banco
				}
			}
		}

		//monta a previsão por semana
		$semana1 = $this->Comercial_model->semana1($nome);
		$index1 = 0;
		foreach ($semana1 as $id) {
			$request['semana1'][$index1] = $this->Comercial_model->contas_semana($id['id']);
			if (isset($id['resultado'])) {
				$request['semana1'][$index1]['0']['resultado'] = $id['resultado'];
			}
			$index1 ++;	
		}
		
		$semana2 = $this->Comercial_model->semana2($nome);

		$index2 = 0;
		foreach ($semana2 as $id) {
			$request['semana2'][$index2] = $this->Comercial_model->contas_semana($id['id']);
			if (isset($id['resultado'])) {
				$request['semana2'][$index2]['0']['resultado'] = $id['resultado'];
			}
			$index2 ++;
		}

		$semana3 = $this->Comercial_model->semana3($nome);
		$index3 = 0;
		foreach ($semana3 as $id) {
			$request['semana3'][$index3] = $this->Comercial_model->contas_semana($id['id']);
			if (isset($id['resultado'])) {
				$request['semana3'][$index3]['0']['resultado'] = $id['resultado'];
			}
			$index3 ++;
		}
		$semana4 = $this->Comercial_model->semana4($nome);
		$index4 = 0;
		foreach ($semana4 as $id) {
			$request['semana4'][$index4] = $this->Comercial_model->contas_semana($id['id']);
			if (isset($id['resultado'])) {
				$request['semana4'][$index4]['0']['resultado'] = $id['resultado'];
			}
			$index4 ++;
		}

		$request['contato_equipe']   = $this->Comercial_model->contato_equipe($nome); //retorna os dados dos vendedores que estão nessa equipe
		$request['contas_coordenador'] = $this->Comercial_model->contas_coordenador();//monta a tabala com os dados do mês por coordenador
		$request['melhores_vendedores'] = $this->Comercial_model->melhores_vendedores();//retorna os melhores vendedores no mês
		$request['grafico_coordenador'] = $this->Comercial_model->grafico_coordenador($nome);//retorna a soma das contas por semana
		$request['grafico_coordenador_status'] = $this->Comercial_model->grafico_coordenador_status($nome);//retorna a soma das contas por semana
		$request['grafico_coordenadores'] = $this->Comercial_model->grafico_coordenadores();//retorna a soma das contas por semana de todos os coordenadores
		$request['contato']   				= $this->Comercial_model->contato();

		//seta valores para o grafico rodar
		if (!isset($request['grafico_coordenador_status']['0'])) {
			$request['grafico_coordenador_status']['0']['total'] = 0;
		}
		if (!isset($request['grafico_coordenador_status']['1'])) {
			$request['grafico_coordenador_status']['1']['total'] = 0;
		}
		if (!isset($request['grafico_coordenador_status']['2'])) {
			$request['grafico_coordenador_status']['2']['total'] = 0; 
		}
		if (!isset($request['grafico_coordenador_status']['3'])) {
			$request['grafico_coordenador_status']['3']['total'] = 0;
		}

		//monta o grafico de previsao 
		foreach ($request['contas_coordenador'] as $key => $value) {
			$previsao = $this->Comercial_model->grafico_coordenador($value['equipe']);
			
			$request['tbl_previsao'][$key]['equipe'] = $value['equipe'];
			if (isset($previsao['0']['total'])) {
				$request['tbl_previsao'][$key]['S1'] = $previsao['0']['total'];
			}
			if (isset($previsao['1']['total'])) {
				$request['tbl_previsao'][$key]['S2'] = $previsao['1']['total'];
			}
			if (isset($previsao['2']['total'])) {
				$request['tbl_previsao'][$key]['S3'] = $previsao['2']['total'];
			}
			if (isset($previsao['3']['total'])) {
				$request['tbl_previsao'][$key]['S4'] = $previsao['3']['total'];
			}
		}

		$this->load->view('templates/header', $request);
		$this->load->view('templates/coordenador', $request);
		$this->load->view('templates/footer', $request);
	}

	public function coordenadores()//cria a pagina dos coordenadores geral
	{

		$request['user']      = $this->session->userdata();//retorna as informações do usuario
	
		$previsao = $this->input->post();//recebe o valor da previsão e do status

		foreach ($previsao as $key => $value) { //monta o array com a previsao e o status
			if($value != "Selecione:" && $key != "clientes_length") {
				
				$prev = explode("/",$key);

				$valor = explode("/",$value);

				if (!isset($valor['1'])) {
					$valor['1'] = 0;
				}

				if (!isset($prev['1'])) {

					$status = array(
					'id' => $key,
					'previsao' => $valor['0'],
					'value' => $valor['1'],
					'data' => date('m-Y'),
					'coordenador' => $nome );

					$this->Pipedrive_updates_model->att_previsao($status);//salva a previsão no banco
				}

				else{
					$previsibilidade = array(
						'id' => $prev['0'],
						'previsao' => $prev['1'],
						'data' => $prev['2'],
						'resultado' => $value);

					$this->Pipedrive_updates_model->att_previsao_status($previsibilidade);//salva o status da conta no banco
				}
			}
		}

		//monta a previsão por semana
		$semana1 = $this->Comercial_model->semana1_gest();
		$index1 = 0;
		foreach ($semana1 as $id) {
			$request['semana1'][$index1] = $this->Comercial_model->contas_semana($id['id']);
			if (isset($id['resultado'])) {
				$request['semana1'][$index1]['0']['resultado'] = $id['resultado'];
			}
			$index1 ++;	
		}
		$semana2 = $this->Comercial_model->semana2_gest();
		$index2 = 0;
		foreach ($semana2 as $id) {
			$request['semana2'][$index2] = $this->Comercial_model->contas_semana($id['id']);
			if (isset($id['resultado'])) {
				$request['semana2'][$index2]['0']['resultado'] = $id['resultado'];
			}
			$index2 ++;
		}

		$semana3 = $this->Comercial_model->semana3_gest();
		$index3 = 0;
		foreach ($semana3 as $id) {
			$request['semana3'][$index3] = $this->Comercial_model->contas_semana($id['id']);
			if (isset($id['resultado'])) {
				$request['semana3'][$index3]['0']['resultado'] = $id['resultado'];
			}
			$index3 ++;
		}
		$semana4 = $this->Comercial_model->semana4_gest();
		$index4 = 0;
		foreach ($semana4 as $id) {
			$request['semana4'][$index4] = $this->Comercial_model->contas_semana($id['id']);
			if (isset($id['resultado'])) {
		 		$request['semana4'][$index4]['0']['resultado'] = $id['resultado'];
			}
			$index4 ++;
		}

		$request['contato']  = $this->Comercial_model->contato();
		$request['contato_equipe']   = $this->Comercial_model->contato_equipe_gest(); //retorna os dados dos vendedores que estão nessa equipe
		$request['contas_coordenador'] = $this->Comercial_model->contas_coordenador();//monta a tabala com os dados do mês por coordenador
		$request['melhores_vendedores'] = $this->Comercial_model->melhores_vendedores();//retorna os melhores vendedores no mês
		$request['grafico_coordenador'] = $this->Comercial_model->grafico_coordenador_gest();//retorna a soma das contas por semana
		$request['grafico_coordenadores'] = $this->Comercial_model->grafico_coordenadores();//retorna a soma das contas por semana de todos os 
		$request['grafico_coordenador_status'] = $this->Comercial_model->grafico_coordenador_gest_status();//retorna a soma das contas por semanacoordenadores


		//seta valores para o grafico rodar
		if (!isset($request['grafico_coordenador_status']['0'])) {
			$request['grafico_coordenador_status']['0']['total'] = 0;
		}
		if (!isset($request['grafico_coordenador_status']['1'])) {
			$request['grafico_coordenador_status']['1']['total'] = 0;
		}
		if (!isset($request['grafico_coordenador_status']['2'])) {
			$request['grafico_coordenador_status']['2']['total'] = 0;
		}
		if (!isset($request['grafico_coordenador_status']['3'])) {
			$request['grafico_coordenador_status']['3']['total'] = 0;
		}

		//monta o grafico de previsao 
		foreach ($request['contas_coordenador'] as $key => $value) {
			$previsao = $this->Comercial_model->grafico_coordenador($value['equipe']);
			
			$request['tbl_previsao'][$key]['equipe'] = $value['equipe'];
			if (isset($previsao['0']['total'])) {
				$request['tbl_previsao'][$key]['S1'] = $previsao['0']['total'];
			}
			if (isset($previsao['1']['total'])) {
				$request['tbl_previsao'][$key]['S2'] = $previsao['1']['total'];
			}
			if (isset($previsao['2']['total'])) {
				$request['tbl_previsao'][$key]['S3'] = $previsao['2']['total'];
			}
			if (isset($previsao['3']['total'])) {
				$request['tbl_previsao'][$key]['S4'] = $previsao['3']['total'];
			}
		}

		$this->load->view('templates/header', $request);
		$this->load->view('templates/coordenador', $request);
		$this->load->view('templates/footer', $request);
	}

	public function financeiro() //cria a pagina de comicionamento dos vendedores
	{

		if (is_null($this->input->post("data_ini"))) {
			$data_ini = date("Y-m-01");
			$data_fim = date("Y-m-t");
		} else {
			$data_i = date_create($this->input->post("data_ini"));
			$data_f = date_create($this->input->post("data_fim"));
			
			$data_ini = date_format($data_i, "Y-m-d");
			$data_fim = date_format($data_f, "Y-m-d");
		}

		$request['user'] = $this->session->userdata();//retorna as informações do usuario
		$vendedor = $this->Comercial_model->contato_equipe_gest();
		
		$request['sdr'] = $this->Comercial_model->sdr($data_ini,$data_fim);  

		$index = 0;
		foreach ($vendedor as $value) {
			$parametro = array(
				'email' => $value['email'] ,
				'data_ini' => $data_ini,
				'data_fim' => $data_fim );
			$comissao = $this->Comercial_model->pagamento_financeiro($parametro);

			$dados = array(
				'img' => $value['img'],
				'name' => $value['name'],
				'email' => $value['email']);
			
			if (isset($comissao['0']['COMISSAO'])) {
				$dados['comissao'] = $comissao['0']['COMISSAO'];
			} else {
				$dados['comissao'] = 0;
			}

			$request['vendedor'][$index] = $dados;

			$index ++;
		}



		$request['data_ini'] = $data_ini;
		$request['data_fim'] = $data_fim;
		$request['contato']  = $this->Comercial_model->contato(); //retorna as informações de contato de todos do comercial

		$this->load->view('templates/header', $request);
		$this->load->view('templates/financeiro_view', $request);
		$this->load->view('templates/footer', $request);
	}

}


