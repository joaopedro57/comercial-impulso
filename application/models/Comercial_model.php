<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comercial_model extends CI_Model {


	public function __construct()
	{
		$this->load->database();
		$this->solides_master_db = $this->load->database('solides_master_devel', TRUE);

	}
	
	public function cliente_id($id)
	{
		$clientes = $this->db->query
		("SELECT
		    dw.id,
		    dw.title,
		    ( SELECT name FROM user u WHERE u.user_id = dw.closer) AS 'closer',
		    ( SELECT name FROM user u WHERE u.user_id = dw.sdr) AS 'sdr',
		    ( SELECT campo FROM campos_pipe cp WHERE cp.id = dw.mercado) AS 'mercado',
		    ( SELECT campo FROM campos_pipe cp WHERE cp.id = dw.origem) AS 'origem',
			( SELECT campo FROM campos_pipe cp WHERE cp.id = dw.cargo) AS 'cargo',
			( SELECT img FROM user u WHERE u.user_id = dw.closer) AS 'img',
	        dw.value,
		    dw.ciclo_venda,
		    dw.produto,
		    dw.condicao_fechamento,
		    dw.resumo_fechamento,
		    dw.quant_colaboradores,
		    dw.data_ganho,
			dw.cenario_lead,
	        dw.quant_colaboradores,
	        dw.pessoa_contato,
	        dw.data_vencimento
			FROM
			    user u
			INNER JOIN deal_won dw ON
			    u.user_id = dw.closer
			INNER JOIN campos_pipe cp ON
			    dw.mercado = cp.id
			WHERE 
				dw.id = {$id}
			ORDER BY 
			 	dw.data_ganho desc");

   		return $clientes->result_array(); 
	}

	public function bd_query()
	{
		$clientes = $this->db->query
		("SELECT
	    dw.id,
	    dw.title,
	    ( SELECT name FROM user u WHERE u.user_id = dw.closer) AS 'closer',
	    ( SELECT name FROM user u WHERE u.user_id = dw.sdr) AS 'sdr',
	    ( SELECT campo FROM campos_pipe cp WHERE cp.id = dw.mercado) AS 'mercado',
	    ( SELECT campo FROM campos_pipe cp WHERE cp.id = dw.origem) AS 'origem',
		( SELECT campo FROM campos_pipe cp WHERE cp.id = dw.cargo) AS 'cargo',
		( SELECT img FROM user u WHERE u.user_id = dw.closer) AS 'img',
        dw.value,
	    dw.ciclo_venda,
	    dw.produto,
	    dw.condicao_fechamento,
	    dw.resumo_fechamento,
	    dw.quant_colaboradores,
	    dw.data_ganho,
		dw.cenario_lead,
        dw.quant_colaboradores,
        dw.pessoa_contato,
        dw.data_vencimento
		FROM
		    user u
		INNER JOIN deal_won dw ON
		    u.user_id = dw.closer
		ORDER BY 
		 	dw.data_ganho desc");

   		return $clientes->result_array(); 
	}
	
	public function clientes_mes()
	{
		$data_ini = date("Y-m-01");
		$data_fim = date("Y-m-t");

		$clientes = $this->db->query
		("SELECT
	    dw.id,
	    dw.title,
	    ( SELECT name FROM user u WHERE u.user_id = dw.closer) AS 'closer',
	    ( SELECT name FROM user u WHERE u.user_id = dw.sdr) AS 'sdr',
	    ( SELECT campo FROM campos_pipe cp WHERE cp.id = dw.mercado) AS 'mercado',
	    ( SELECT campo FROM campos_pipe cp WHERE cp.id = dw.origem) AS 'origem',
		( SELECT campo FROM campos_pipe cp WHERE cp.id = dw.cargo) AS 'cargo',
		( SELECT img FROM user u WHERE u.user_id = dw.closer) AS 'img',
        dw.value,
	    dw.ciclo_venda,
	    dw.produto,
	    dw.condicao_fechamento,
	    dw.resumo_fechamento,
	    dw.quant_colaboradores,
	    dw.data_ganho,
		dw.cenario_lead,
        dw.quant_colaboradores,
        dw.pessoa_contato,
        dw.data_vencimento
		FROM
		    deal_won dw
		WHERE
			dw.data_ganho BETWEEN '$data_ini' and '$data_fim'");

		return $clientes->result_array();
	}

	
	public function mrr()
	{
		$data_ini = date("Y-m-01");
		$data_fim = date("Y-m-t");

		$mrr = $this->db->query
		("SELECT SUM(value) FROM deal_won WHERE data_ganho between '$data_ini' and '$data_fim' ");

	return $mrr->result_array();
	}

	public function mediana()
	{
		$mediana = $this->db->query("SELECT value FROM deal_won");

		return $mediana->result_array();
	}
	public function mrrTotal()
	{
		$data_ini = date("Y-01-01");
		$data_fim = date("Y-12-31");

		$mrrTotal = $this->db->query
		("SELECT SUM(value) FROM deal_won WHERE data_ganho between '$data_ini' and '$data_fim' ");

	return $mrrTotal->result_array();
	}

	public function count()
	{
		$data_ini = date("Y-m-01");
		$data_fim = date("Y-m-t");

		$numeroConta = $this->db->query
		("SELECT count(id) FROM deal_won WHERE data_ganho between '$data_ini' and '$data_fim'");

	return $numeroConta->result_array();
	}

	public function countAnterior()
	{
		$data_ini = date('Y-m-01', strtotime('-1 months', strtotime(date('Y-m-d'))));
		$data_fim = date('Y-m-t',  strtotime('-1 months', strtotime(date('Y-m-d'))));

		$numeroConta = $this->db->query
		("SELECT count(id) FROM deal_won WHERE data_ganho between '$data_ini' and '$data_fim'");

	return $numeroConta->result_array();
	}

	public function closer()
	{
		$data_ini = date("Y-m-01");
		$data_fim = date("Y-m-t");
		$meta = date("Y-m");

		$closers = $this->db->query
		("SELECT
		( SELECT img FROM user u WHERE u.user_id = dw.closer) AS 'img',
	    ( SELECT name FROM user u WHERE u.user_id = dw.closer) AS 'closer',
	    ( SELECT SUM(value) FROM deal_won dw WHERE u.user_id = dw.closer AND data_ganho between '$data_ini' and '$data_fim') AS 'Total Vendido',
	    ( SELECT COUNT(id) FROM deal_won dw WHERE u.user_id = dw.closer AND data_ganho between '$data_ini' and '$data_fim') AS 'Total de Contas',
	    ( SELECT SUM(ciclo_venda) FROM deal_won dw WHERE u.user_id = dw.closer AND data_ganho between '$data_ini' and '$data_fim') AS 'Ciclo de Venda',
        ( SELECT meta FROM meta WHERE u.user_id = meta.user_id AND meses='$meta') AS 'meta'
        FROM
            user u
        INNER JOIN deal_won dw ON
            u.user_id = dw.closer
        WHERE data_ganho between '$data_ini' and '$data_fim'
        GROUP BY name");
	
		return $closers->result_array();

	}

	public function mrrRankin()
	{
		$data_ini = date("Y-m-01");
		$data_fim = date("Y-m-t");

		$mrrRankin = $this->db->query
		("SELECT
    	( SELECT name FROM user u WHERE u.user_id = dw.closer) AS 'closer',
    	( SELECT img FROM user u WHERE u.user_id = dw.closer) AS 'img',
    	( SELECT SUM(value) FROM deal_won dw WHERE u.user_id = dw.closer AND data_ganho between '$data_ini' and '$data_fim') AS 'Total Vendido'
		FROM
    		user u 
		INNER JOIN deal_won dw ON
    		u.user_id = dw.closer
 		WHERE data_ganho between '$data_ini' and '$data_fim'
 		GROUP BY name 
 		order by  SUM(value) desc");

		return $mrrRankin->result_array();
	}

	public function  tktMedio()
	{
		$data_ini = date("Y-m-01");
		$data_fim = date("Y-m-t");

		$tktMedio = $this->db->query 
		("SELECT
		    ( SELECT name FROM user u WHERE u.user_id = dw.closer) AS 'closer',
		    ( SELECT SUM(value)/COUNT(id) FROM deal_won dw WHERE u.user_id = dw.closer and data_ganho between '$data_ini' and '$data_fim' ) AS 'tkt medio'
		FROM
		    user u 
		INNER JOIN deal_won dw ON
		    u.user_id = dw.closer
		WHERE data_ganho between '$data_ini' and '$data_fim'
		GROUP BY name 
		 order by  SUM(value)/COUNT(id) desc");
	
		return $tktMedio->result_array();
	}

	public function  tktMedioAnterior()
	{
		$data_ini = date('Y-m-01', strtotime('-1 months', strtotime(date('Y-m-d'))));
		$data_fim = date('Y-m-t', strtotime('-1 months', strtotime(date('Y-m-d'))));

		$tktMedio = $this->db->query 
		("SELECT SUM(value)/COUNT(id) FROM deal_won dw WHERE data_ganho between '$data_ini' and '$data_fim' ");
	
		return $tktMedio->result_array();
	}

	public function ciclo_medio()
	{
		$data_ini = date("Y-01-01");
		$data_fim = date("Y-12-31");

		$ciclo_medio = $this->db->query
		("SELECT
			( SELECT name FROM user u WHERE u.user_id = dw.closer) AS 'closer',
			( SELECT SUM(ciclo_venda)/COUNT(id) FROM deal_won dw WHERE u.user_id = dw.closer AND (dw.data_ganho BETWEEN '$data_ini'  AND '$data_fim')) AS 'ciclo'
		FROM
			user u
		INNER JOIN 
			deal_won dw ON u.user_id = dw.closer
		WHERE
			u.status = 'Ativo' AND u.cargo = 'Closer' AND (dw.data_ganho between '$data_ini' and '$data_fim')
		GROUP BY name 
			order by  ciclo  asc;");

		return $ciclo_medio->result_array();
	}

	public function media_ciclo()
	{
		$data_ini = date("Y-m-01");
		$data_fim = date("Y-m-t");

		$media_ciclo = $this->db->query ("SELECT SUM(ciclo_venda)/COUNT(id) FROM deal_won dw WHERE data_ganho between '$data_ini' and '$data_fim'" );

		return $media_ciclo->result_array();
	}

	public function media_ciclo_Anterior()
	{
		$data_ini = date('2019-01-01', strtotime('-1 months', strtotime(date('Y-m-d'))));
		$data_fim = date('2019-01-31', strtotime('-1 months', strtotime(date('Y-m-d'))));

		$media_ciclo = $this->db->query ("SELECT SUM(ciclo_venda)/COUNT(id) FROM deal_won dw WHERE data_ganho between '$data_ini' and '$data_fim'" );

		return $media_ciclo->result_array();
	}
    
    public function closer_perfil($user_id)
	{
		$data = date('Y-m');

		$closer_perfil = $this->db->query
		("SELECT
		dw.id,
	    dw.title,
	    ( SELECT name FROM user u WHERE u.user_id = dw.closer) AS 'closer',
	    ( SELECT name FROM user u WHERE u.user_id = dw.sdr) AS 'sdr',
	    ( SELECT campo FROM campos_pipe cp WHERE cp.id = dw.mercado) AS 'mercado',
	    ( SELECT campo FROM campos_pipe cp WHERE cp.id = dw.origem) AS 'origem',
	    ( SELECT img FROM user u WHERE u.user_id = dw.closer) AS 'img',
	    ( SELECT email FROM user u WHERE u.user_id = dw.closer) AS 'email',
	    ( SELECT user_id FROM user u WHERE u.user_id = dw.closer) AS 'usuario',	    
	    dw.value,
	    dw.ciclo_venda,
	    dw.produto,
	    dw.condicao_fechamento,
	    dw.resumo_fechamento,
	    dw.quant_colaboradores,
	    dw.data_ganho,
		dw.cenario_lead,
        dw.quant_colaboradores,
        dw.pessoa_contato,
        dw.data_vencimento,
        dw.id_clifor,
        ( SELECT campo FROM campos_pipe cp WHERE cp.id = dw.cargo) AS 'cargo',
        ( SELECT meta FROM meta WHERE meta.user_id = dw.closer and meses = '$data') AS 'meta'
        FROM
		    user u
        INNER JOIN deal_won dw ON
		    u.user_id = dw.closer
		WHERE
			dw.closer={$user_id}
		ORDER BY
			data_ganho")->result_array();
	
		if (isset($closer_perfil['0']['closer'])) {
			return $closer_perfil;
		
		}
	}
	public function get_primeiro_pagamento($IDCLIFOR)
	{

		$contas = $this->solides_master_db->query("SELECT CODPRODUTO FROM ASSINATURAS WHERE IDCLIFOR='$IDCLIFOR' AND IDEMP=1;");
		$produto = $contas->result_array();

		if (isset($produto['0']['CODPRODUTO'])) {
			
			$idproduto = $produto['0']['CODPRODUTO'];
			$idvenda = $this->solides_master_db->query("SELECT IDVENDA FROM HVENDAITEM WHERE IDPROD = '$idproduto' AND IDEMP=1 AND IDCLIFOR='$IDCLIFOR';");

			$item = $idvenda->result_array();
			
			if (isset($item['0']['IDVENDA'])) {
				
				$iditem = $item['0']['IDVENDA'];
				$data = $this->solides_master_db->query(
					"SELECT
						datapgto
					from
						CMOVIMENTOS
					where
						id = (
						select
							min(c.id)
						from
							CMOVIMENTOS c
						where
							c.idemp = 1
							and c.idclifor = '$IDCLIFOR'
							and c.datapgto is not null
							and c.idvenda in (
							select
								h.idvenda
							from
								HVENDAITEM h
							join BPRODUTOS b on
								b.codproduto = h.idprod
								and b.idemp = h.idemp
							where
								b.idemp = 1
								and h.idvenda = $iditem
								and h.idclifor = '$IDCLIFOR' ));");

				$datas = $data->result_array();

				if (isset($datas['0']['datapgto'])) {
					return $datas['0']['datapgto'];
				} else {
					$data = $this->solides_master_db->query("SELECT DATA_ULTIMO_PGTO FROM ASSINATURAS WHERE IDCLIFOR='$IDCLIFOR' AND IDEMP=1;")->result_array();
					return $data['0']['DATA_ULTIMO_PGTO'];
				}

			} else {
				$data = $this->solides_master_db->query("SELECT DATA_ULTIMO_PGTO FROM ASSINATURAS WHERE IDCLIFOR='$IDCLIFOR' AND IDEMP=1;")->result_array();
				return $data['0']['DATA_ULTIMO_PGTO'];
			}
			
		} else {
				$data = 0;
				return $data;
			}
	}

	public function contas_closer($user_id)
	{
		$data_ini = date("Y-m-01");
		$data_fim = date("Y-m-t");
		
		$contas = $this->db->query
		("SELECT 
	       count(id) as 'contas_vendidas',		
           SUM(value) as 'total_vendido'
        FROM 
	       deal_won 
        WHERE 
	       closer={$user_id}
	   	AND 
	   	data_ganho between '$data_ini' and '$data_fim'"	);

		return $contas->result_array();
	}

	public function contas_closerTotal($user_id)
	{
		$ano_ini = date('Y-01-01');
		$ano_fim = date('Y-12-31');
		
		$contas = $this->db->query
		("SELECT 
	       count(id) as 'contas_vendidas',		
           SUM(value) as 'total_vendido'
        FROM 
	       deal_won 
        WHERE 
	       closer={$user_id}
	       AND (data_ganho between '{$ano_ini}' and '{$ano_fim}')");

		return $contas->result_array();
	}

	public function acumulo_total() 
	{
		$ano_ini = date('Y-01-01');
		$ano_fim = date('Y-12-31');

		$acummulo = $this->db->query
		("SELECT 
			(SELECT name FROM user WHERE (user.user_id=deal_won.closer)) as 'closer', 
			(SELECT SUM(value) FROM deal_won WHERE (data_ganho between '$ano_ini' and '$ano_fim') AND (user.user_id=deal_won.closer)) AS 'rankin' 
		FROM 
			deal_won
		 INNER JOIN 
		 	user ON user.user_id = deal_won.closer
		WHERE
			(user.status = 'Ativo') AND (user.cargo = 'Closer')
		GROUP BY 
			closer 
		ORDER BY `rankin` DESC;");	

		return $acummulo->result_array();
	}

	public function contato()
	{
		$contato = $this->db->query("SELECT * FROM user WHERE status = 'Ativo' ORDER BY name");

		return $contato->result_array();
	}

	public function contato_equipe($name)
	{
		$contato = $this->db->query("SELECT * FROM user WHERE status = 'Ativo' and Equipe ='{$name}'  ORDER BY name");

		return $contato->result_array();
	}

	public function contato_equipe_gest()
	{
		$contato = $this->db->query("SELECT * FROM user WHERE status = 'Ativo' and cargo='Closer' ORDER BY name");

		return $contato->result_array();
	}

	public function sdr($data_ini,$data_fim)
	{
		$meses  = date_format(date_create($data_fim),'Y-m');

		$sdr = $this->db->query("SELECT name,user_id,img FROM user WHERE cargo='SDR' and status='Ativo'")->result_array();

		foreach ($sdr as  $value) {
			$id = $value['user_id'];
			$shows = $this->db->query("SELECT COUNT(id) FROM deal WHERE (data_diagnostico between '$data_ini' and '$data_fim') and sdr = '$id'")->result_array();
			$meta = $this->db->query("SELECT meta FROM meta WHERE  meses = '$meses' and user_id = '$id'")->result_array();
			if (!isset($meta['0'])) {
				$meta['0']['meta'] = 0;
			}

			$dados[] = array(
				'id' => $id,
		 		'nome' => $value['name'],
		 		'img' => $value['img'],
		 		'shows' => $shows['0']['COUNT(id)'],
		 		'meta' => $meta['0']['meta']);

		}
		return $dados;
	}

	public function previsao($dados1)
	{
		$verifica_cadastro = $this->db->get_where("user", array("user_id" =>  $dados1['user_id'] ));

		if ($verifica_cadastro->num_rows() > 0) {
			$this->db->update('user',$dados1, array("user_id" => $dados1['user_id']));
		}
	}

	public function closerPrevisao($user_id)
	{
		$contato = $this->db->query("SELECT previsao FROM user WHERE user_id = {$user_id}");

		return $contato->result_array();
	}

	public function closersPrevisoes()
	{
		$contato = $this->db->query("SELECT previsao FROM user ");

		return $contato->result_array();
	}

	public function dadosCloser()
	{
		$dadosCloser = $this->db->query("SELECT * FROM user WHERE cargo = 'Closer' and status = 'Ativo' ORDER BY name ");

		return $dadosCloser->result_array();
	}

	public function gestaoDados()
	{
		$data_ini = date("Y-m-01");
		$data_fim = date("Y-m-t");

		$gestao = $this->db->query("
			SELECT
				user.user_id,
				user.name,
				user.img
			FROM
				user
			WHERE
				user.cargo = 'Closer'
				and user.status = 'Ativo'
			group by
				user_id
			order by
				user.name; ");

		return $gestao->result_array();
	}
	public function meta_sdr()
	{
		$data_ini = date("Y-m-01");
		$data_fim = date("Y-m-t");

		$gestao = $this->db->query("
			SELECT
				user.user_id,
				user.name,
				user.img
			FROM
				user
			WHERE
				user.cargo = 'SDR'
				and user.status = 'Ativo'
			group by
				user_id
			order by
				user.name; ");

		return $gestao->result_array();
	}
	public function get_metas_mes($user_id)
	{
		$ano = date('Y');

		$meta = $this->db->query("SELECT meta FROM meta WHERE user_id = '$user_id' AND meses LIKE '%$ano%'");

		return $meta->result_array();	
	}
	public function somaMetas()
	{
		$mes = date('Y-m');

		$somaMetas = $this->db->query("SELECT meta FROM meta WHERE meses='$mes' and user_id= '1' ");

		return $somaMetas->result_array();
	}

	public function leads()
	{
		$data = date('Y-m-d', strtotime('-20 days'));
		$leads = $this->db->query("SELECT COUNT(id) FROM deal WHERE status = 'open' and (funil=20 or funil=21) ");
	
		return $leads->result_array();
	}

		public function leadsParaLost()
	{
		$data = date('Y-m-d', strtotime('-20 days'));

		$leads = $this->db->query("SELECT COUNT(id) FROM deal WHERE status = 'open' AND last_activity_date < '$data')");
	
		return $leads->result_array();
	}
	
	public function leadsMes()
	{
		$data_ini = date("Y-m-01");
		$data_fim = date("Y-m-t");

		$leads = $this->db->query("SELECT COUNT(id) FROM deal WHERE add_time between '$data_ini' and '$data_fim'");
	
		return $leads->result_array();
	}

	public function leadsBanco()
	{
		$data_ini = date("Y-m-01");
		$data_fim = date("Y-m-t");

		$leads = $this->db->query("SELECT COUNT(id) FROM deal WHERE add_time between '$data_ini' and '$data_fim'");
	
		return $leads->result_array();
	}

	public function leadsPesquisa()
	{
		$data_ini = date("Y-m-01");
		$data_fim = date("Y-m-t");

		$leads = $this->db->query("SELECT COUNT(id) FROM deal WHERE stage_2 is not null AND add_time between '$data_ini' and '$data_fim'");
	
		return $leads->result_array();
	}
	
	public function leadsProsp()
	{
		$data_ini = date("Y-m-01");
		$data_fim = date("Y-m-t");

		$leads = $this->db->query("SELECT COUNT(id) FROM deal WHERE stage_3 is not null AND add_time between '$data_ini' and '$data_fim'");
	
		return $leads->result_array();
	}

	public function leadsConexao()
	{
		$data_ini = date("Y-m-01");
		$data_fim = date("Y-m-t");

		$leads = $this->db->query("SELECT COUNT(id) FROM deal WHERE stage_4 is not null AND add_time between '$data_ini' and '$data_fim'");
	
		return $leads->result_array();
	}

	public function leadsAgendamento()
	{
		$data_ini = date("Y-m-01");
		$data_fim = date("Y-m-t");

		$leads = $this->db->query("SELECT COUNT(id) FROM deal WHERE stage_5 is not null AND add_time between '$data_ini' and '$data_fim'");
	
		return $leads->result_array();
	}

	public function leadsDiagnostico()
	{
		$data_ini = date("Y-m-01");
		$data_fim = date("Y-m-t");

		$leads = $this->db->query("SELECT COUNT(id) FROM deal WHERE stage_6 is not null AND add_time between '$data_ini' and '$data_fim'");
	
		return $leads->result_array();
	}

	public function leadsSolucao()
	{
		$data_ini = date("Y-m-01");
		$data_fim = date("Y-m-t");

		$leads = $this->db->query("SELECT COUNT(id) FROM deal WHERE stage_7 is not null AND add_time between '$data_ini' and '$data_fim'");
	
		return $leads->result_array();
	}

	public function leadsProposta()
	{
		$data_ini = date("Y-m-01");
		$data_fim = date("Y-m-t");

		$leads = $this->db->query("SELECT COUNT(id) FROM deal WHERE stage_8 is not null AND add_time between '$data_ini' and '$data_fim'");
	
		return $leads->result_array();
	}

	public function leadsAbertura()
	{
		$data_ini = date("Y-m-01");
		$data_fim = date("Y-m-t");

		$leads = $this->db->query("SELECT COUNT(id) FROM deal WHERE stage_9 is not null AND add_time between '$data_ini' and '$data_fim'");
	
		return $leads->result_array();
	}

	public function leadsGanhos()
	{
		$data_ini = date("Y-m-01");
		$data_fim = date("Y-m-t");

		$leads = $this->db->query("SELECT COUNT(id) FROM deal WHERE status='won' AND add_time between '$data_ini' and '$data_fim'");
	
		return $leads->result_array();
	}

	public function leadsPerdidos()
	{
		$data_ini = date("Y-m-01");
		$data_fim = date("Y-m-t");

		$leads = $this->db->query("SELECT COUNT(id) FROM deal WHERE status='lost' AND add_time between '$data_ini' and '$data_fim'");
	
		return $leads->result_array();
	}


	public function leadsCloserConversao($user_id)
	{
		$data_ini = date("Y-m-01");
		$data_fim = date("Y-m-t");

		$leads = $this->db->query(
			"SELECT
				(SELECT count(id) from deal where (stage_5 between '{$data_ini}' and '{$data_fim}') and user_id='{$user_id}') AS 'Agendado',
				(SELECT count(id) from deal where (stage_6 between '{$data_ini}' and '{$data_fim}') and user_id='{$user_id}') AS 'Diagnostico', 
				(SELECT count(id) from deal where (stage_7 between '{$data_ini}' and '{$data_fim}') and user_id='{$user_id}') AS 'Soluçao',
				(SELECT count(id) from deal where (stage_8 between '{$data_ini}' and '{$data_fim}') and user_id='{$user_id}') AS 'Proposta',
				(SELECT count(id) from deal where (stage_9 between '{$data_ini}' and '{$data_fim}') and user_id='{$user_id}') AS 'Abertura'
				" );

		return $leads->result_array();
	}

	public function leadsBanco2()
	{
		$leads = $this->db->query("SELECT COUNT(id) FROM deal WHERE status = 'open' and add_time > '2018-01-01' and stage_id = 135");
	
		return $leads->result_array();
	}

	public function leadsPesquisa2()
	{
		$leads = $this->db->query("SELECT COUNT(id) FROM deal WHERE status = 'open' and stage_id = 125");
	
		return $leads->result_array();
	}

	public function leadsProsp2()
	{
		$leads = $this->db->query("SELECT COUNT(id) FROM deal WHERE status = 'open' and stage_id = 126");
	
		return $leads->result_array();
	}

	public function leadsConexao2()
	{
		$leads = $this->db->query("SELECT COUNT(id) FROM deal WHERE status = 'open' and stage_id = 127");
	
		return $leads->result_array();
	}

	public function leadsAgendamento2()
	{
		$leads = $this->db->query("SELECT COUNT(id) FROM deal WHERE status = 'open' and stage_id = 128");
	
		return $leads->result_array();
	}

	public function leadsDiagnostico2()
	{
		$leads = $this->db->query("SELECT COUNT(id) FROM deal WHERE status = 'open' and stage_id = 131");
	
		return $leads->result_array();
	}

	public function leadsSolucao2()
	{
		$leads = $this->db->query("SELECT COUNT(id) FROM deal WHERE status = 'open' and stage_id = 133");
	
		return $leads->result_array();
	}

	public function leadsProposta2()
	{
		$leads = $this->db->query("SELECT COUNT(id) FROM deal WHERE status = 'open' and stage_id = 139");
	
		return $leads->result_array();
	}

	public function leadsAbertura2()
	{
		$leads = $this->db->query("SELECT COUNT(id) FROM deal WHERE status = 'open' and stage_id = 134");
	
		return $leads->result_array();
	}

	public function campo($campo)
	{
		$campo = $this->db->query("SELECT campo FROM campos_pipe WHERE id = $campo");

		return $campo->result_array();
	}

	public function leadsCloser($user_id)
	{
		$leads = $this->db->query
		("SELECT
			(SELECT COUNT(id) FROM deal WHERE (status='open') and (stage_id = 131) and user_id = $user_id) as 'Diagnostico',
			(SELECT COUNT(id) FROM deal WHERE (status='open') and (stage_id = 133) and user_id = $user_id) as 'Solucao',
			(SELECT COUNT(id) FROM deal WHERE (status='open') and (stage_id = 139) and user_id = $user_id) as 'Proposta',
			(SELECT COUNT(id) FROM deal WHERE (status='open') and (stage_id = 134) and user_id = $user_id) as 'Abertura'
		FROM 
			deal");
		
		return $leads->result_array();
	}

	public function demos($user_id)
	{
		$data_ini = date("Y-m-01");
		$data_fim = date("Y-m-t");

		$demos = $this->db->query("SELECT COUNT(id) from deal WHERE (data_diagnostico between '$data_ini' and '$data_fim') and (sdr='$user_id')");

		return $demos->result_array();
	}

	public function demos_sdr($user_id)
	{
		$data_ini = date("Y-m-01");
		$data_fim = date("Y-m-t");

		$demos = $this->db->query("SELECT COUNT(id) from deal WHERE (data_diagnostico between '$data_ini' and '$data_fim') and (closer ='$user_id') and (sdr != '$user_id')");

		return $demos->result_array();
	}

	public function leadsGeral()
	{
		$data_ini = date("Y-m-01");
		$data_fim = date("Y-m-t");

		$leads = $this->db->query
		("SELECT 
				( SELECT COUNT(id) FROM deal WHERE (stage_1 between '$data_ini' and '$data_fim') and (funil=21 or funil=20)) as 'Banco',
				( SELECT COUNT(id) FROM deal WHERE (stage_2 between '$data_ini' and '$data_fim') and (funil=21 or funil=20)) as 'Pesquisa',
				( SELECT COUNT(id) FROM deal WHERE (stage_3 between '$data_ini' and '$data_fim') and (funil=21 or funil=20)) as 'Prospccao',
				( SELECT COUNT(id) FROM deal WHERE (stage_4 between '$data_ini' and '$data_fim') and (funil=21 or funil=20)) as 'Conexao',
				( SELECT COUNT(id) FROM deal WHERE (stage_5 between '$data_ini' and '$data_fim') and (funil=21 or funil=20)) as 'Agendamento',
				( SELECT COUNT(id) FROM deal WHERE (stage_6 between '$data_ini' and '$data_fim') and (funil=21 or funil=20)) as 'Diagnostico',
				( SELECT COUNT(id) FROM deal WHERE (stage_7 between '$data_ini' and '$data_fim') and (funil=21 or funil=20)) as 'Solucao',
				( SELECT COUNT(id) FROM deal WHERE (stage_8 between '$data_ini' and '$data_fim') and (funil=21 or funil=20)) as 'Proposta',
				( SELECT COUNT(id) FROM deal WHERE (stage_9 between '$data_ini' and '$data_fim') and (funil=21 or funil=20)) as 'Abertura',
				( SELECT COUNT(id) FROM deal WHERE status='lost' AND data_perdido between '$data_ini' and '$data_fim') as 'Perdidos'
			FROM
				deal");
		return $leads->result_array();
	}

	public function leadsGanhosGeral()
	{
		$data_ini = date("Y-m-01");
		$data_fim = date("Y-m-t");

		$leads = $this->db->query("SELECT COUNT(id) FROM deal_won WHERE data_ganho between '$data_ini' and '$data_fim'");
	
		return $leads->result_array();
	}

	public function leadsPerdidosGeral()
	{
		$data_ini = date("Y-m-01");
		$data_fim = date("Y-m-t");

		$leads = $this->db->query("SELECT COUNT(id) FROM deal WHERE status='lost' AND data_perdido between '$data_ini' and '$data_fim'");
	
		return $leads->result_array();
	}

	public function funilSdr ()
	{
		$leads = $this->db->query("SELECT COUNT(id) FROM deal WHERE (status='open') and funil=20");

		return $leads->result_array();
	}

	public function funilCloser()
	{
		$leads = $this->db->query("SELECT COUNT(id) FROM deal WHERE (status='open') and funil=21");

		return $leads->result_array();
	}

	public function mercado()
	{
		$mercado = $this->db->query("SELECT COUNT(id), (SELECT campo from campos_pipe where campos_pipe.id = deal.mercado) as 'mercado' FROM deal WHERE (status='open') AND (funil = 21 or funil = 20) GROUP BY mercado ORDER BY COUNT(id) DESC ");

		return $mercado->result_array();
	}

	public function origem_room()
	{
		$origem = $this->db->query("SELECT COUNT(id), (SELECT campo from campos_pipe where campos_pipe.id = deal.origem) as 'origem' FROM deal WHERE (status='open') AND (funil = 21 or funil = 20) GROUP BY origem ORDER BY COUNT(id) DESC ");

		return $origem->result_array(); 
	}

	public function motivo_lost()
	{
		$perdido = $this->db->query("SELECT COUNT(id),motivo_lost FROM deal WHERE status='lost' AND (data_perdido BETWEEN '2018-10-01' AND '2018-10-31') GROUP BY motivo_lost ORDER BY COUNT(id) DESC");

		return $perdido->result_array(); 
	}

	public function conversao()
	{

		$conversao = $this->db->query("SELECT ultima_conversao FROM deal WHERE ultima_conversao is not NULL GROUP BY ultima_conversao ORDER BY COUNT(id) DESC");
	
		return $conversao->result_array();
	}

	public function tx_ultima_conversao($dados,$data_ini,$data_fim)
	{
			
		$tx = $this->db->query
		("SELECT 
			(SELECT COUNT(id) FROM deal WHERE stage_1 IS NOT NULL AND (add_time BETWEEN '$data_ini' AND '$data_fim') AND (rd_tag LIKE '%$dados%')) as 'Banco',
			(SELECT COUNT(id) FROM deal WHERE stage_2 IS NOT NULL AND (add_time BETWEEN '$data_ini' AND '$data_fim') AND (rd_tag LIKE '%$dados%')) as 'Pesquisa',
			(SELECT COUNT(id) FROM deal WHERE stage_3 IS NOT NULL AND (add_time BETWEEN '$data_ini' AND '$data_fim') AND (rd_tag LIKE '%$dados%')) as 'Prospccao',
			(SELECT COUNT(id) FROM deal WHERE stage_4 IS NOT NULL AND (add_time BETWEEN '$data_ini' AND '$data_fim') AND (rd_tag LIKE '%$dados%')) as 'Conexao',
			(SELECT COUNT(id) FROM deal WHERE stage_5 IS NOT NULL AND (add_time BETWEEN '$data_ini' AND '$data_fim') AND (rd_tag LIKE '%$dados%')) as 'Agendamento',
			(SELECT COUNT(id) FROM deal WHERE stage_6 IS NOT NULL AND (add_time BETWEEN '$data_ini' AND '$data_fim') AND (rd_tag LIKE '%$dados%')) as 'Diagnostico',
			(SELECT COUNT(id) FROM deal WHERE stage_7 IS NOT NULL AND (add_time BETWEEN '$data_ini' AND '$data_fim') AND (rd_tag LIKE '%$dados%')) as 'Solucao',
			(SELECT COUNT(id) FROM deal WHERE stage_8 IS NOT NULL AND (add_time BETWEEN '$data_ini' AND '$data_fim') AND (rd_tag LIKE '%$dados%')) as 'Proposta',
			(SELECT COUNT(id) FROM deal WHERE stage_9 IS NOT NULL AND (add_time BETWEEN '$data_ini' AND '$data_fim') AND (rd_tag LIKE '%$dados%')) as 'Abertura',
			(SELECT COUNT(id) FROM deal WHERE (status='lost') AND (add_time BETWEEN '$data_ini' AND '$data_fim') AND (rd_tag LIKE '%$dados%')) as 'Lost',
			(SELECT COUNT(id) FROM deal WHERE (status='won') AND (add_time BETWEEN '$data_ini' AND '$data_fim') AND (rd_tag LIKE '%$dados%')) as 'Ganho'
		FROM 
			deal  ");

		return $tx->result_array();
	}

	public function pagamento($closer)
	{
		$data_ini = date("Y-01-01");
		$data_fim = date("Y-12-31");
		$valor = 0;
		$contas_pagas = 0;
		$contas_vendidas = 0;
		$user_id = $this->db->query("SELECT user_id FROM user WHERE name='$closer'")->result_array();
		$closer = $user_id['0']['user_id'];
		$idclifor = $this->db->query("SELECT id_clifor FROM deal_won WHERE closer = '$closer' AND data_ganho between '$data_ini' and '$data_fim'")->result_array();
		$total_vendido = $this->db->query("SELECT SUM(value) FROM deal_won WHERE closer = '$closer' AND data_ganho between '$data_ini' and '$data_fim' ")->result_array();

		foreach ($idclifor as $value) {
			$id = $value['id_clifor'];

			$pagamento = $this->solides_master_db->query("SELECT VALOR_MENSALIDADE, DATA_ULTIMO_PGTO FROM ASSINATURAS WHERE IDCLIFOR = '$id' AND IDEMP = '1';")->result_array();

			$contas_vendidas ++;
			if (isset($pagamento['0'])) {
				if ($pagamento['0']['DATA_ULTIMO_PGTO'] != '') {
					$valor = $valor+$pagamento['0']['VALOR_MENSALIDADE'];
					
					$contas_pagas ++;
				}
			}
		}
		
		$dados = array(
			'pago' => $valor,
			'contas_pagas' => $contas_pagas,
			'contas_vendidas' => $contas_vendidas,
			'total_vendido' => $total_vendido['0']['SUM(value)']);

		return $dados;
	}

	public function pagamento_vendedor($email)
	{
		$data_ini = date("Y-m-01");
		$data_fim = date("Y-m-t");

		$pagamento = $this->solides_master_db->query
		("	SELECT
				SUM(main.VALOR_MENSALIDADE) AS COMISSAO,
				COUNT(main.IDVENDA) AS QTDVENDAS,
				main.NOME
			FROM
				(
				SELECT
					w.* ,
					a.NOME
				FROM
					(
					SELECT
						cm.ID AS IDMOV ,
						cm.IDCLIFOR ,
						cm.IDEMP ,
						cm.VALOR ,
						cm. DATAPGTO ,
						hvi.IDPROD ,
						hvi.IDVENDA ,
						hv.RESPONSAVEL ,
						hv.DATAVENDA ,
						b.NOME AS NOMEPRODUTO,
						ass.VALOR_MENSALIDADE
					FROM
						CMOVIMENTOS cm
					INNER JOIN (
						SELECT
							MIN(x.ID) AS IDMOV ,
							x.IDCLIFOR
						FROM
							CMOVIMENTOS x
						WHERE
							x.IDEMP = 1
						GROUP BY
							x.IDCLIFOR,
							x.IDVENDA
						ORDER BY
							x.ID,
							x.IDCLIFOR ) z ON
						z.IDMOV = cm.ID
						AND z.IDCLIFOR = cm.IDCLIFOR
					JOIN HVENDA hv ON
						cm.IDVENDA = hv.IDVENDA
						AND cm.IDCLIFOR = hv.IDCLIFOR
						AND cm.IDEMP = hv.IDEMP
					JOIN HVENDAITEM hvi ON
						cm.IDVENDA = hvi.IDVENDA
						AND cm.IDCLIFOR = hvi.IDCLIFOR
						AND cm.IDEMP = hvi.IDEMP
					JOIN BPRODUTOS b ON
						b.CODPRODUTO = hvi.IDPROD
					JOIN ASSINATURAS ass ON 
						cm.IDCLIFOR = ass.IDCLIFOR
					WHERE
						cm.DATAPGTO IS NOT NULL
						AND hv.RESPONSAVEL <> 1
						AND cm.DATAPGTO BETWEEN '$data_ini' AND '$data_fim'
					ORDER BY
						cm.DATAPGTO ) w
				JOIN APESSOAS a ON
					a.MATRICULA = w.RESPONSAVEL
				WHERE
					a.EMAIL = '{$email}' ) main;
			");
		return $pagamento->result_array();
	}

	public function pagos() 
	{
		$acummulo = $this->db->query
		("SELECT 
			(SELECT name FROM user WHERE (user.user_id=deal_won.closer) ) as 'closer', 
			(SELECT SUM(deal_won.value) FROM deal_won WHERE (data_ganho between '2019-01-01' and '2019-12-31')and (user.user_id=deal_won.closer)) AS 'rankin',
			(SELECT COUNT(deal_won.id) FROM deal_won WHERE (data_ganho between '2019-01-01' and '2019-12-31') and (user.user_id=deal_won.closer)) AS 'contas' ,
			(SELECT email FROM user WHERE (user.user_id=deal_won.closer)) as 'email'
		FROM 
			deal_won
		 INNER JOIN 
		 	user ON user.user_id = deal_won.closer
		WHERE
			(user.status = 'Ativo') AND (user.cargo = 'Closer')
		GROUP BY 
			closer 
		ORDER BY rankin desc;");	

		return $acummulo->result_array();
	}

	public function dados_crm($cnpj)
	{
		$negocio = $this->solides_master_db->query("SELECT * FROM CCLIFOR WHERE EMAIL = '$cnpj'");

		return $negocio->result_array();
	}

	public function equipe($name)
	{
		$vendedores = $this->db->query("SELECT * FROM user WHERE Equipe = '{$name}'");

		return $vendedores->result_array();
	}

	public function contas_coordenador()
	{	
		$data_ini = date("Y-m-01");
		$data_fim = date("Y-m-t");

		$contas = $this->db->query
		("SELECT sum(d.value) as 'Total Vendido',COUNT(d.id) as 'Total de Contas', SUM(d.ciclo_venda) as 'Ciclo de Venda',u.equipe from deal_won d
	      join user u on u.user_id = d.closer
	      where d.data_ganho BETWEEN '$data_ini' and '$data_fim'
	      group by equipe
	      ORDER BY SUM(d.value) desc");

		return $contas->result_array();
	}

	public function melhores_vendedores()
	{
		$data_ini = date("Y-m-01");
		$data_fim = date("Y-m-t");

		$contas = $this->db->query
		("SELECT sum(d.value) as 'Total Vendido',u.equipe,name from deal_won d
	      join user u on u.user_id = d.closer
	      where d.data_ganho BETWEEN '$data_ini' and '$data_fim'
	      group by name
	      ORDER BY SUM(d.value) desc;");

		return $contas->result_array();
	}

	public function semana1($nome)
	{
		$data = date('m-Y');

		$semana = $this->db->query("SELECT id,resultado FROM previsao WHERE previsao = 'S1' and data = '{$data}' and coordenador='{$nome}'");

		return $semana->result_array();
	}

	public function semana1_gest()
	{
		$data = date('m-Y');

		$semana = $this->db->query("SELECT id,resultado FROM previsao WHERE previsao = 'S1' and data = '{$data}'");

		return $semana->result_array();
	}

	public function semana2($nome)
	{
		$data = date('m-Y');

		$semana = $this->db->query("SELECT id,resultado FROM previsao WHERE previsao = 'S2' and data = '{$data}' and coordenador='{$nome}'");

		return $semana->result_array();
	}

	public function semana2_gest()
	{
		$data = date('m-Y');

		$semana = $this->db->query("SELECT id,resultado FROM previsao WHERE previsao = 'S2' and data = '{$data}'");

		return $semana->result_array();
	}

	public function semana3($nome)
	{
		$data = date('m-Y');

		$semana = $this->db->query("SELECT id,resultado FROM previsao WHERE previsao = 'S3' and data = '{$data}' and coordenador='{$nome}'");

		return $semana->result_array();
	}

	public function semana3_gest()
	{
		$data = date('m-Y');

		$semana = $this->db->query("SELECT id,resultado FROM previsao WHERE previsao = 'S3' and data = '{$data}'");

		return $semana->result_array();
	}

	public function semana4($nome)
	{
		$data = date('m-Y');

		$semana = $this->db->query("SELECT id,resultado FROM previsao WHERE previsao = 'S4' and data = '{$data}' and coordenador='{$nome}'");

		return $semana->result_array();
	}

	public function semana4_gest()
	{
		$data = date('m-Y');

		$semana = $this->db->query("SELECT id,resultado FROM previsao WHERE previsao = 'S4' and data = '{$data}'");

		return $semana->result_array();
	}

	public function contas_semana($id)
	{
		$contas = $this->db->query("SELECT title, value, next_activity_date, id, ( SELECT name FROM user WHERE user.user_id = deal.closer) AS 'closer' FROM deal WHERE id = '{$id}'");

		return $contas->result_array();
	}

	public function tx_fechamento($user_id)
	{
		$data_ini = date('Y-m-01', strtotime('-1 months', strtotime(date('Y-m-d'))));
		$data_fim = date('Y-m-t',  strtotime('-1 months', strtotime(date('Y-m-d'))));


		$tx = $this->db->query("SELECT COUNT(id) FROM deal WHERE (stage_8 BETWEEN '$data_ini' AND '$data_fim') AND closer='$user_id';");
		$ganho = $this->db->query("SELECT COUNT(id) FROM deal_won WHERE (data_ganho BETWEEN '$data_ini' AND '$data_fim') AND closer='$user_id';");

		$proposta = $tx->result_array();
		$ganhos = $ganho->result_array();
		
		if ($proposta['0']['COUNT(id)'] < 1) {
			
			$taxa = 0;
		}
		
		else {
			$taxa = round(($ganhos['0']['COUNT(id)']/$proposta['0']['COUNT(id)'])*100);
		}

		return $taxa;
	}

	public function grafico_mrr_meta()
	{
		$ano = date('Y');

		$grafico = $this->db->query("SELECT meta,meses FROM meta WHERE meses LIKE '%$ano%' and user_id='1' GROUP by meses;");

		return $grafico->result_array();
	}

	public function grafico_mrr_valor($mes)
	{
		$grafico = $this->db->query("SELECT SUM(value) FROM deal_won WHERE data_ganho LIKE '%$mes%';");

		return $grafico->result_array();
	}
	
	public function grafico_vendedor_meta($user_id)
	{
		$ano = date('Y');

		$grafico = $this->db->query("SELECT SUM(meta) AS 'meta',meses FROM meta WHERE meses LIKE '%$ano%' AND user_id='$user_id' GROUP by meses;");

		return $grafico->result_array();
	}
	
	public function grafico_vendedor_valor($mes,$user_id)
	{
		$grafico = $this->db->query("SELECT SUM(value) FROM deal_won WHERE data_ganho LIKE '%$mes%' and closer='$user_id' ");

		return $grafico->result_array();
	}

	public function result_contas($user_id)
	{
		$contas = $this->db->query("
			SELECT
				deal.id,
				deal.title,
				deal.value,
				deal.quant_colaboradores,
				deal.data_diagnostico,
				deal.stage_8,
				previsao.previsao
			FROM
				deal
			INNER JOIN 
			previsao on previsao.id = deal.id
			WHERE
				(status = 'open')
				and (stage_id = 139
				or stage_id = 134)
				and (user_id = '$user_id')
			order by
				data_diagnostico");

		return $contas->result_array();
	}

	public function result_contas_pipe($user_id)
	{
		$contas = $this->db->query("
			SELECT
				deal.id,
				deal.title,
				deal.value,
				deal.quant_colaboradores,
				deal.data_diagnostico,
				deal.stage_8
			FROM
				deal
			WHERE
				(status = 'open')
				and (stage_id = 139
				or stage_id = 134)
				and (user_id = '$user_id')
			order by
				data_diagnostico");

		return $contas->result_array();
	}

	public function result_previsao($id)
	{
		$previsao = $this->db->query("SELECT previsao FROM previsao WHERE data = '01-2019' AND  id='$id' ORDER BY id_auto desc");

		return $previsao->result_array();
	}

	public function grafico_coordenador($nome)
	{
		$data = date('m-Y');

		$grafico = $this->db->query("
			SELECT
				SUM(value) as 'total',
				previsao,
				coordenador
			FROM
				previsao
			WHERE
				(previsao = 'S1'
				or previsao = 'S2'
				or previsao = 'S3'
				or previsao = 'S4')
				AND (coordenador = '$nome')
				AND (data = '$data')
			GROUP BY
				previsao");
		
		return $grafico->result_array();
	}

	public function grafico_coordenador_status($nome)
	{
		$data = date('m-Y');

		$grafico = $this->db->query("
			SELECT
				SUM(value) as 'total'
			FROM
				previsao
			WHERE
				(previsao = 'S1'
				or previsao = 'S2'
				or previsao = 'S3'
				or previsao = 'S4')
				AND (coordenador = '$nome')
				AND (data = '$data')
				AND (resultado = 'Sim')
			GROUP BY
				previsao");
		
		return $grafico->result_array();
	}

	public function grafico_coordenador_gest()
	{
		$data = date('m-Y');

		$grafico = $this->db->query("
			SELECT
				SUM(value) as 'total',
				previsao
			FROM
				previsao
			WHERE
				(previsao = 'S1'
				or previsao = 'S2'
				or previsao = 'S3'
				or previsao = 'S4')
				AND (data = '$data')
			GROUP BY
				previsao");
		
		return $grafico->result_array();
	}

	public function grafico_coordenador_gest_status()
	{
		$data = date('m-Y');

		$grafico = $this->db->query("
			SELECT
				SUM(value) as 'total'
			FROM
				previsao
			WHERE
				(previsao = 'S1'
				or previsao = 'S2'
				or previsao = 'S3'
				or previsao = 'S4')
				AND (data = '$data')
				AND (resultado = 'Sim')
			GROUP BY
				previsao");
		
		return $grafico->result_array();
	}

	public function grafico_coordenadores()
	{
		$data = date('m-Y');

		$grafico = $this->db->query("
			SELECT
				SUM(value) as 'total',
				previsao
			FROM
				previsao
			WHERE
				(previsao = 'S1'
				or previsao = 'S2'
				or previsao = 'S3'
				or previsao = 'S4')
				AND (data = '$data')
			GROUP BY
				previsao");
		
		return $grafico->result_array();
	}

	public function pagamento_financeiro($parametro)
	{
		$data_ini = $parametro['data_ini'];
		$data_fim = $parametro['data_fim'];
		$email = $parametro['email'];
		
		$pagamento = $this->solides_master_db->query
		("	SELECT
				SUM(main.VALOR_MENSALIDADE) AS COMISSAO,
				COUNT(main.IDVENDA) AS QTDVENDAS,
				main.NOME
			FROM
				(
				SELECT
					w.* ,
					a.NOME
				FROM
					(
					SELECT
						cm.ID AS IDMOV ,
						cm.IDCLIFOR ,
						cm.IDEMP ,
						cm.VALOR ,
						cm. DATAPGTO ,
						hvi.IDPROD ,
						hvi.IDVENDA ,
						c.RESPCLIENTE ,
						hv.DATAVENDA ,
						b.NOME AS NOMEPRODUTO,
						ass.VALOR_MENSALIDADE
					FROM
						CMOVIMENTOS cm
					INNER JOIN (
						SELECT
							MIN(x.ID) AS IDMOV ,
							x.IDCLIFOR
						FROM
							CMOVIMENTOS x
						WHERE
							x.IDEMP = 1
						GROUP BY
							x.IDCLIFOR,
							x.IDVENDA
						ORDER BY
							x.ID,
							x.IDCLIFOR ) z ON
						z.IDMOV = cm.ID
						AND z.IDCLIFOR = cm.IDCLIFOR
					JOIN HVENDA hv ON
						cm.IDVENDA = hv.IDVENDA
						AND cm.IDCLIFOR = hv.IDCLIFOR
						AND cm.IDEMP = hv.IDEMP
					JOIN HVENDAITEM hvi ON
						cm.IDVENDA = hvi.IDVENDA
						AND cm.IDCLIFOR = hvi.IDCLIFOR
						AND cm.IDEMP = hvi.IDEMP
					JOIN BPRODUTOS b ON
						b.CODPRODUTO = hvi.IDPROD
					JOIN ASSINATURAS ass ON 
						cm.IDCLIFOR = ass.IDCLIFOR
					JOIN CCLIFOR c ON c.ID = cm.IDCLIFOR AND c.IDEMP = cm.IDEMP
					WHERE
						cm.DATAPGTO IS NOT NULL
						AND hv.RESPONSAVEL <> 1
						AND cm.DATAPGTO BETWEEN '$data_ini' AND '$data_fim'
					ORDER BY
						cm.DATAPGTO ) w
				JOIN APESSOAS a ON
					a.MATRICULA = w.RESPCLIENTE
				WHERE
					a.EMAIL = '$email' ) main
			GROUP BY
				main.NOME
			order by
				main.NOME desc
			");
		//print_r($this->solides_master_db->last_query());exit;
		return $pagamento->result_array();
	}

	public function get_comissoes_por_produto($parametros) {

		if($parametros['data_ini']) {

			$periodo = "AND cm.DATAPGTO BETWEEN '" . $parametros['data_ini'] . "'  AND '" . $parametros['data_fim'] . "'";
		} else {

			$periodo = "AND cm.DATAPGTO BETWEEN CURDATE() - INTERVAL ( DATEDIFF( CURDATE(), DATE_FORMAT( CURDATE(), '%Y/%m/01' ))) DAY AND CURDATE()";
		}

		$email = $parametros['email'];

		$query = $this->solides_master_db->query("
			SELECT  w.*
			, a.NOME 
			FROM(
				SELECT cm.ID AS IDMOV 
				, cm.IDCLIFOR
				, cm.IDEMP
				, cm.VALOR
				, cm. DATAPGTO
				, hvi.IDPROD 
				, c.RESPCLIENTE
				, hv.DATAVENDA 
				, b.NOME AS NOMEPRODUTO 
				, c.NOMEFANTASIA
				, ass.VALOR_MENSALIDADE
				FROM CMOVIMENTOS cm
				INNER JOIN (
					SELECT MIN(x.ID) AS IDMOV
					, x.IDCLIFOR
					FROM CMOVIMENTOS x
						WHERE x.IDEMP = 1
					GROUP BY x.IDCLIFOR, x.IDVENDA
					ORDER BY x.ID, x.IDCLIFOR
				) z ON z.IDMOV = cm.ID AND z.IDCLIFOR = cm.IDCLIFOR
				JOIN HVENDA hv ON cm.IDVENDA = hv.IDVENDA AND cm.IDCLIFOR = hv.IDCLIFOR AND cm.IDEMP = hv.IDEMP
				JOIN HVENDAITEM hvi ON cm.IDVENDA = hvi.IDVENDA AND cm.IDCLIFOR = hvi.IDCLIFOR AND cm.IDEMP = hvi.IDEMP
				JOIN BPRODUTOS b ON b.CODPRODUTO = hvi.IDPROD
				JOIN CCLIFOR c ON c.ID = cm.IDCLIFOR AND c.IDEMP = cm.IDEMP
				JOIN ASSINATURAS ass ON ass.IDCLIFOR = cm.IDCLIFOR AND ass.IDEMP = cm.IDEMP
					WHERE cm.DATAPGTO IS NOT NULL
					AND hv.RESPONSAVEL <> 1
					AND b.NOME NOT LIKE '%Adesão%'
					" . $periodo . "
					ORDER BY cm.DATAPGTO
			) w
			JOIN APESSOAS a ON
				a.MATRICULA = w.RESPCLIENTE
			WHERE
				a.EMAIL = '$email';");
		
		//print_r($this->solides_master_db->last_query());
		$dados = $query->result_array();
		$dados['0']['email'] = $email;
		// print_r($this->solides_master_db->last_query());exit;
		return $dados;
	}

	public function contas_vendidas($value='')
	{
		$data_ano = date("Y");

		$contas_vendidas = $this->db->query("
			SELECT
				id_clifor
			FROM
				deal_won 
			WHERE
				data_ganho LIKE '%$data_ano%';")->result_array();

		$dados['pagamento'] = 0;
		$dados['contas_pagas'] = 0;
		$dados['contas_vendidas'] = 0;
		foreach ($contas_vendidas as $value) {
			$vendido = $this->solides_master_db->query("
				SELECT
					DATA_ULTIMO_PGTO,
					VALOR_MENSALIDADE
				FROM
					ASSINATURAS
				WHERE
					IDCLIFOR = '{$value['id_clifor']}'")->result_array();
			if (isset($vendido['0'])) {
				if ($vendido['0']['DATA_ULTIMO_PGTO'] != '') {
					$dados['pagamento'] = $dados['pagamento'] + $vendido['0']['VALOR_MENSALIDADE'];
					$dados['contas_pagas'] ++;
				}

				$dados['contas_vendidas'] ++;
			}
		}	
		return $dados;
	}

	public function primeiro_pagamento()
	{
		
		$primeiro_pagamento = $this->solides_master_db->query("SELECT SUM(VALOR_MENSALIDADE) as valor from ASSINATURAS
			where DATA_ULTIMO_PGTO is null AND DATA_CANCELAMENTO is  null")->result_array();

		return $primeiro_pagamento[0];
	}

	public function get_id_crm()
	{
		$crm = $this->solides_master_db->query(
			"SELECT
				c.ID,
				c.CNPJ
			FROM
				CCLIFOR c
			INNER JOIN ASSINATURAS a ON 
			c.ID = a.IDCLIFOR
			WHERE
				c.SEGMENTO is null
				and c.CNPJ is not null
				and c.IDEMP = 1
				and a.DATA_CANCELAMENTO is null;")->result_array();

		return $crm;
	}

	public function att_crm($dados)
	{

		$this->solides_master_db->update('CCLIFOR', $dados, array("ID" => $dados['ID'],"IDEMP" => $dados['IDEMP']));
			
		if($this->solides_master_db->affected_rows() > 0){
			
			return TRUE;

		}
		else{
			return FALSE;
		}
	}

	public function filipe_chato()
	{
		$dados = $this->solides_master_db->query(
			"SELECT max(m.id) as idmovimento, c.id as IDCLIFOR,
				 c.NOMEFANTASIA,
				 DATAVENDA,
				 p.NOME, m.VALOR, m.SITUACAOMOTIVO,
				 DATE_FORMAT(m.DATAVENCIMENTO,'%d/%m/%Y') as 'DATAVENCIMENTO',
				 DATE_FORMAT(m.DATACANCELAMENTO,'%d/%m/%Y') as 'DATACANCELAMENTO',
				 COUNT(m.ID) AS 'QTDE_MOVIMENTOS_PAGOS'
				 from CMOVIMENTOS m
				 join CCLIFOR c on c.id = m.idclifor and c.idemp = m.idemp
				 JOIN HVENDA V ON V.IDEMP = m.IDEMP AND V.IDCLIFOR = m.IDCLIFOR AND V.IDVENDA = m.IDVENDA
				 join HVENDAITEM i on i.idemp = m.idemp and i.idclifor = m.idclifor and i.idvenda = V.idvenda
				 join BPRODUTOS p on p.idemp = m.idemp and p.codproduto = i.idprod
				 where m.idemp = 1
				 and m.valor > 10
				 and m.situacao = 'C'
				 #and (select count(*) from CMOVIMENTOS
				#		where idclifor = c.id
				#		and datapgto is NULL
				#		and situacao is NULL
				#		and idemp = 1) = 0
				 and m.DATACANCELAMENTO BETWEEN '2019-01-01' AND '2019-07-18'
				 and p.mensalidade = 'S'
				 group by idclifor
				 order by datavencimento desc;")->result_array();

		foreach ($dados as $key => $value) {
			$id = $value['IDCLIFOR'];

			$pgto = $this->solides_master_db->query("
				SELECT 
					COUNT(mov.ID) AS QTDE_MOVIMENTOS_PAGOS
						FROM CMOVIMENTOS mov 
							JOIN HVENDAITEM vi ON vi.IDVENDA = mov.IDVENDA AND vi.IDCLIFOR = mov.IDCLIFOR AND mov.IDEMP = 1
							JOIN BPRODUTOS p ON vi.IDPROD = p.CODPRODUTO
							JOIN ASSINATURAS a ON a.CODPRODUTO = vi.IDPROD AND mov.IDCLIFOR = a.IDCLIFOR AND a.IDEMP = 1
							WHERE mov.IDCLIFOR = '$id' AND p.MENSALIDADE = 'S' AND mov.DATAPGTO IS NOT NULL")->result_array();

			$dados[$key]['mensalidade_pagas'] = $pgto[0]['QTDE_MOVIMENTOS_PAGOS'];

		}

		return $dados;
	}

	public function att_emails_pipe($dados)
	{
		$this->db->update('user', $dados, array("user_id" => $dados['user_id']));

		return TRUE;
	}
}