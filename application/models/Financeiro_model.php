<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Financeiro_model extends CI_Model {


	public function __construct()
	{
		$this->load->database();
		$this->solides_master_db = $this->load->database('solides_master_devel', TRUE);

	}
	
	public function mrr()
	{
		$mrr = $this->solides_master_db->query("SELECT SUM(VALOR_MENSALIDADE) as valor FROM ASSINATURAS WHERE DATA_CANCELAMENTO IS NULL;")->result_array();

		return $mrr[0];
	}

	public function recebidos($data_ini)
	{

		$recebidos = $this->solides_master_db->query("SELECT SUM(VALOR_MENSALIDADE) as valor FROM ASSINATURAS WHERE DATA_ULTIMO_PGTO >= '$data_ini' AND DATA_CANCELAMENTO IS NULL;")->result_array();

		
		return $recebidos[0];
	}

	public function clientes()
	{
		$clientes = $this->solides_master_db->query("SELECT COUNT(IDCLIFOR) FROM ASSINATURAS WHERE DATA_CANCELAMENTO IS NULL; ")->result_array();

		return $clientes[0];
	}

	public function aReceber($data_ini)
	{

		$aReceber = $this->solides_master_db->query("SELECT SUM(VALOR_MENSALIDADE) as valor FROM ASSINATURAS WHERE DATA_ULTIMO_PGTO <= '$data_ini' AND DATA_CANCELAMENTO IS NULL")->result_array();

		return $aReceber[0];
	}
	public function get_recebiveis($data_ini, $data_fim, $mes)
	{
		$recebiveis = array();
		$data_fim_inad = date("Y-m-d", strtotime("$data_ini -3 days"));
		$data_ini_inad = date("Y-m-d", strtotime("$data_fim_inad -3 months"));
		$primeiro_dia_prox_mes = date("Y-m-d", strtotime("$data_ini +1 month"));
		$mes_corrente = date("m");


		// $recebiveis['avulsos_total'] = $this->solides_master_db->query("
		// 	SELECT sum(m.valor) as valor
		// 	FROM CMOVIMENTOS m
		// 	JOIN HVENDAITEM v on v.idclifor = m.idclifor and v.idemp = m.idemp and v.idvenda = m.idvenda
		// 	JOIN BPRODUTOS p on p.idemp = m.idemp and p.codproduto = v.idprod
		// 	where m.idemp = 1
		// 	and p.mensalidade = 'N'
		// 	and m.situacao is NULL
		// 	and m.valor > 10
		// 	and m.datavctooriginal between '$data_ini' and '$data_fim'
		// 	#and (m.datavctooriginal between '$data_ini' and '$data_fim' OR m.datavencimento between '$data_ini' and '$data_fim')
		// ")->row_array()['valor'];

		$recebiveis['avulsos_list'] = $this->solides_master_db->query("
			SELECT c.id, c.nome, m.valorliquido, m.datavctooriginal, m.datavencimento, m.datapgto, p.nome as produto, c.SEGMENTO, cn.desc_cnae
			FROM CMOVIMENTOS m
			JOIN CCLIFOR c on c.id = m.idclifor and c.idemp = m.idemp
			JOIN HVENDAITEM v on v.idclifor = m.idclifor and v.idemp = m.idemp and v.idvenda = m.idvenda
			JOIN BPRODUTOS p on p.idemp = m.idemp and p.codproduto = v.idprod
			LEFT JOIN cnae cn on cn.codigo_cnae = SEGMENTO
			where m.idemp = 1
			and p.mensalidade = 'N'
			and m.situacao is NULL
			and m.valor > 10
			and m.datavencimento between '$data_ini' and '$data_fim'
			#and (m.datavctooriginal between '$data_ini' and '$data_fim' OR m.datavencimento between '$data_ini' and '$data_fim')
		")->result_array();



		$recebiveis['avulsos_recebidos'] = $this->solides_master_db->query("
			SELECT sum(m.valor) as valor
			FROM CMOVIMENTOS m
			JOIN HVENDAITEM v on v.idclifor = m.idclifor and v.idemp = m.idemp and v.idvenda = m.idvenda
			JOIN BPRODUTOS p on p.idemp = m.idemp and p.codproduto = v.idprod
			where m.idemp = 1
			and p.mensalidade = 'N'
			and m.situacao is NULL
			and m.datapgto is not NULL
			and m.valor > 10
			#and m.datavctooriginal between '$data_ini' and '$data_fim'
			#and (m.datavctooriginal between '$data_ini' and '$data_fim' OR m.datavencimento between '$data_ini' and '$data_fim')
			and m.datapgto between '$data_ini' and '$data_fim'
		")->row_array()['valor'];


		$recebiveis['total_a_receber'] = 0;
		$recebiveis['avulsos_total'] = 0;
		$recebiveis['assinaturas'] = 0;
		$ass_ja_contabilizadas = array();
		$avulsao = 0;
		$query = $this->solides_master_db->query("
			SELECT c.id, c.`NOMEFANTASIA`, m.`DATAVENCIMENTO`, m.valorliquido, m.valor, m.datapgto, p.nome, p.`MENSALIDADE`, max(m.datavencimento) as parcela_aberta, m.situacao
			FROM CMOVIMENTOS m
			JOIN HVENDAITEM v on v.idclifor = m.idclifor and v.idemp = m.idemp and v.idvenda = m.idvenda
			JOIN BPRODUTOS p on p.idemp = m.idemp and p.codproduto = v.idprod
			join CCLIFOR c on c.id = m.idclifor and c.idemp = 1
			where m.idemp = 1
			and m.valor > 10
			group by m.id
			having situacao is null
			and parcela_aberta between '2017-01-01' and '$primeiro_dia_prox_mes'
			and (datapgto is null or datapgto between '$data_ini' and '$data_fim')

			order by parcela_aberta asc
		")->result_array();
		foreach ($query as $ass) {
			$d1 = new DateTime($ass['parcela_aberta']);
			$d2 = new DateTime($data_fim);
			$dif_meses = (int)$d1->diff($d2)->format("%r%m");
			$dif_meses = $dif_meses > 0 ? $dif_meses : 0;

			if(!in_array($ass['id'], $ass_ja_contabilizadas) && $ass['MENSALIDADE'] == "S"){
				$ass_ja_contabilizadas[] = $ass['id'];
				$recebiveis['total_a_receber'] += $ass['valorliquido'] * ($dif_meses + 1);
				$recebiveis['assinaturas'] += $ass['valorliquido'] * ($dif_meses + 1);
				//echo "[ {$ass['id']} ] {$ass['parcela_aberta']} - {$ass['valorliquido']} *  ". ($dif_meses + 1)."\n Acumulado: {$recebiveis['total_a_receber']} \n";
			}
			elseif($ass['MENSALIDADE'] == "N"){
				$recebiveis['total_a_receber'] += $ass['valorliquido'];
				//echo "[ {$ass['id']} ] {$ass['parcela_aberta']} AVULSO - {$ass['valorliquido']} \n Acumulado: {$recebiveis['total_a_receber']} \n";
				$recebiveis['avulsos_total'] += $ass['valorliquido'];
			}
		}

		$recebiveis['avulsos_tendencia_prevista'] = $recebiveis['avulsos_total'] / (int)date("d");
		$recebiveis['avulsos_tendencia_real'] = ($recebiveis['avulsos_recebidos'] / (int)date("d") ) * 30;


		//$recebiveis['assinaturas'] = 0;
		$query = $this->solides_master_db->query("
			SELECT c.id, c.nome, m.valorliquido, max(m.datavencimento) as parcela_aberta, max(m.datapgto) as ultimo_pagamento, ass.produto, c.SEGMENTO, cn.desc_cnae
			from (select m.idclifor, m.idemp, p.codproduto, m.idvenda, p.nome as produto
					from CMOVIMENTOS m
					JOIN CCLIFOR c on c.id = m.idclifor and c.idemp = m.idemp
					JOIN HVENDAITEM v on v.idclifor = m.idclifor and v.idemp = m.idemp and v.idvenda = m.idvenda
					JOIN BPRODUTOS p on p.idemp = m.idemp and p.codproduto = v.idprod
					JOIN HVENDA ven on ven.idemp = 1 and ven.idclifor = m.idclifor and ven.idvenda = m.idvenda
					where m.idemp = 1
					and m.situacao is null
					and (m.datapgto is null or m.datapgto between '$data_ini' and '$data_fim')
					and p.mensalidade = 'S'
					and m.valor > 10
					group by c.id
				) ass

			join CMOVIMENTOS m on m.idemp = ass.idemp and m.idclifor = ass.idclifor and m.idvenda = ass.idvenda
			join CCLIFOR c on c.id = ass.idclifor and c.idemp = ass.idemp
			LEFT JOIN cnae cn on cn.codigo_cnae = c.SEGMENTO

			where m.situacao is null
			and (m.datapgto is null or m.datapgto between '$data_ini' and '$data_fim')
			#and c.id = 20393

			group by m.id
			having parcela_aberta < '$primeiro_dia_prox_mes'
			order by nome, parcela_aberta, ultimo_pagamento

		")->result_array();


		$recebiveis['assinaturas_list'] = $query;


		$query = $this->solides_master_db->query("
			SELECT c.id, c.nome, m.valorliquido, max(m.datavencimento) as parcela_aberta, max(m.datapgto) as ultimo_pagamento, ass.produto
			from (select m.idclifor, m.idemp, p.codproduto, m.idvenda, p.nome as produto
					from CMOVIMENTOS m
					JOIN CCLIFOR c on c.id = m.idclifor and c.idemp = m.idemp
					JOIN HVENDAITEM v on v.idclifor = m.idclifor and v.idemp = m.idemp and v.idvenda = m.idvenda
					JOIN BPRODUTOS p on p.idemp = m.idemp and p.codproduto = v.idprod
					JOIN HVENDA ven on ven.idemp = 1 and ven.idclifor = m.idclifor and ven.idvenda = m.idvenda
					where m.idemp = 1
					and m.situacao is null
					and (m.datapgto is null or m.datapgto between '$data_ini' and '$data_fim')
					#and m.datapgto is null
					and p.mensalidade = 'S'
					and m.valor > 10
					group by c.id
				) ass

			join CMOVIMENTOS m on m.idemp = ass.idemp and m.idclifor = ass.idclifor and m.idvenda = ass.idvenda
			join CCLIFOR c on c.id = ass.idclifor and c.idemp = ass.idemp

			where m.situacao is null
			and (m.datapgto is null or m.datapgto between '$data_ini' and '$data_fim')
			#and c.id = 20604

			group by m.id
			having parcela_aberta between '$data_ini_inad' and '$data_fim_inad'
			order by nome, parcela_aberta, ultimo_pagamento

		")->result_array();

		$recebiveis['inadimplentes_assinantes'] = 0;
		foreach ($query as $ass) {
			$d1 = new DateTime($ass['parcela_aberta']);
			$d2 = new DateTime($data_fim);
			$dif_meses = (int)$d1->diff($d2)->format("%r%m");
			$dif_meses = $dif_meses > 0 ? $dif_meses : 0;
			if($ass['ultimo_pagamento'] == ''){
				$recebiveis['inadimplentes_assinantes'] += $ass['valorliquido'] * ($dif_meses + 1);
				//echo "somei {$ass['idclifor']} - {$ass['valor']} *  ". ($dif_meses + 1)."<br>";
			}
			else{
				$recebiveis['inadimplentes_assinantes'] += $ass['valorliquido'];
				//echo "somei {$ass['idclifor']} - {$ass['valor']} só valor  <br>";
			}
		}

		$recebiveis['assinantes_ate_hoje'] = $this->solides_master_db->query("
			SELECT sum(valor) as valor from (
				SELECT c.id, c.nome, m.valor, max(m.datavencimento) as parcela_aberta, max(m.datapgto) as ultimo_pagamento, ass.produto
				from (select m.idclifor, m.idemp, p.codproduto, m.idvenda, p.nome as produto
						from CMOVIMENTOS m
						JOIN CCLIFOR c on c.id = m.idclifor and c.idemp = m.idemp
						JOIN HVENDAITEM v on v.idclifor = m.idclifor and v.idemp = m.idemp and v.idvenda = m.idvenda
						JOIN BPRODUTOS p on p.idemp = m.idemp and p.codproduto = v.idprod
						JOIN HVENDA ven on ven.idemp = 1 and ven.idclifor = m.idclifor and ven.idvenda = m.idvenda
						where m.idemp = 1
						and m.situacao is null
						and (m.datapgto is null or m.datapgto between '$data_ini' and '$data_fim')
						#and m.datapgto is null
						and p.mensalidade = 'S'
						and m.valor > 10
						group by c.id
					) ass

				join CMOVIMENTOS m on m.idemp = ass.idemp and m.idclifor = ass.idclifor and m.idvenda = ass.idvenda
				join CCLIFOR c on c.id = ass.idclifor and c.idemp = ass.idemp

				where m.datapgto between '$data_ini' and '$data_fim'
				#and c.id = 20604

				group by m.id
				#having parcela_aberta < '2017-08-01'
				order by nome, parcela_aberta, ultimo_pagamento
			) A

		")->row_array()['valor'];

		$dados_cancelamento = $this->solides_master_db->query("
			SELECT sum(valor_mensalidade) as valor, count(idclifor) as qtde_cancelamentos from ASSINATURAS
				where data_cancelamento between '$data_ini' AND '$data_fim'

		");

		$recebiveis['cancelamentos'] = $dados_cancelamento->row_array()['valor'];
		$recebiveis['qtde_cancelamentos'] = $dados_cancelamento->row_array()['qtde_cancelamentos'];

		$recebiveis['recebido_total'] = $this->solides_master_db->query("
			SELECT sum(m.valorliquido) as valor
			FROM CMOVIMENTOS m
			JOIN CCLIFOR c on c.id = m.idclifor and c.idemp = 1
			where m.idemp = 1
			and m.datapgto is not NULL
			and m.datapgto BETWEEN '$data_ini' AND '$data_fim'
		")->row_array()['valor'];

		$recebiveis['datas_vencimento_alteradas'] = $this->solides_master_db->query("
			SELECT sum(valornovo) as valor from CMOVIMENTOSLOG
			where dataantiga between '$data_ini' AND '$data_fim'
			and month(datanova) <> $mes_corrente
		")->row_array()['valor'];//print_r($this->solides_master_db->last_query());exit;


		$recebiveis['ass_tendencia_prevista'] = $recebiveis['assinaturas'] / (int)date("d");
		$recebiveis['ass_tendencia_real'] = ($recebiveis['assinantes_ate_hoje'] / (int)date("d") ) * 30;

		$recebiveis['meta_recebiveis_porc'] = ( $recebiveis['recebido_total'] * 100) / $recebiveis['total_a_receber'] ;

		return $recebiveis;
	}

	public function perda_recebiveis($data_ini,$data_fim,$mes_corrente)
	{

		$perda_recebiveis = $this->solides_master_db->query("SELECT sum(valornovo) as valor from CMOVIMENTOSLOG
			where dataantiga between '$data_ini' AND '$data_fim'
			and month(datanova) <> $mes_corrente")->result_array();

		return $perda_recebiveis[0];
	}

	public function primeiro_pagamento($data_ini)
	{

		$primeiro_pagamento = $this->solides_master_db->query("SELECT SUM(VALOR_MENSALIDADE) as valor from ASSINATURAS
			where DATA_ULTIMO_PGTO is null AND DATA_CANCELAMENTO is  null")->result_array();

		return $primeiro_pagamento[0];
	}
	public function grafico_recebimento($data_ini)
	{

		$grafico = $this->solides_master_db->query("SELECT SUM(VALOR_MENSALIDADE),DATA_ULTIMO_PGTO FROM ASSINATURAS WHERE DATA_ULTIMO_PGTO >= '$data_ini' AND DATA_CANCELAMENTO IS NULL GROUP BY DATA_ULTIMO_PGTO;")->result_array();

		return $grafico;
	}

	public function inadimplente($data_ini,$data_fim)
	{	
		$data_atual = date('Y-m-t');

		if ($data_fim == $data_atual) {
			$data_fim_inad = date("Y-m-d", strtotime("-2 days"));
			$data_ini_inad = date("Y-m-d", strtotime($data_fim_inad. "-3 months"));
		}
		else {
			$data_fim_inad = $data_fim;
			$data_ini_inad = date("Y-m-d", strtotime($data_fim_inad. "-3 months"));
		}

		$inadimplente = $this->solides_master_db->query("
			SELECT a.IDCLIFOR,c.NOMEFANTASIA,z.DATAVENCIMENTO,a.VALOR_MENSALIDADE
			FROM ASSINATURAS a 
			JOIN (SELECT h.IDPROD,c.ID,c.IDCLIFOR,c.DATAPGTO,c.DATAVENCIMENTO
			FROM CMOVIMENTOS c
			JOIN HVENDAITEM h ON c.IDCLIFOR = h.IDCLIFOR AND c.IDEMP = h.IDEMP AND c.IDVENDA = h.IDVENDA
			WHERE c.IDEMP = 1
			AND h.IDEMP = 1
			AND c.DATAPGTO is null
			GROUP BY c.IDCLIFOR
			ORDER BY c.ID desc) z ON a.IDCLIFOR = z.IDClIFOR
			JOIN CCLIFOR c on a.IDCLIFOR = c.ID
			WHERE a.CODPRODUTO = z.IDPROD
			AND a.DATA_CANCELAMENTO IS NULL
			AND z.DATAVENCIMENTO < CURDATE()
			AND z.DATAVENCIMENTO >= '$data_ini_inad'
			AND z.DATAVENCIMENTO <= '$data_fim_inad'
			AND c.IDEMP = 1")->result_array();
		
		$valor_total = 0;
		foreach ($inadimplente as $dados) {
			$datetime1 = date_create($dados['DATAVENCIMENTO']);
			$datetime2 = date_create(date("Y-m-d"));
			$interval = date_diff( $datetime1, $datetime2);
			$str_interval = ($interval->format('%a'))/30;

			if ($str_interval < 1) {
				$multiplicador = 1;
			}
			else {
				$multiplicador = floor($str_interval);
			}

			$valor_conta = $dados['VALOR_MENSALIDADE']*$multiplicador;

			$valor_total += $valor_conta;

		}
		
		$inadimplente['valor_total_inadimplente'] = $valor_total;

		return $inadimplente;
	}
}