<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sdr_model extends CI_Model {


	public function __construct()
	{
		$this->load->database();
		$this->solides_master_db = $this->load->database('solides_master_devel', TRUE);

	}
	
	public function contato()
	{
		$contato = $this->db->query("SELECT * FROM user WHERE status = 'Ativo' ORDER BY name");

		return $contato->result_array();
	}

	public function dados_user($user_id)
	{
		$user = $this->db->query("SELECT * FROM user WHERE user_id='$user_id'");

		return $user->result_array();
	}

	public function shows_total()
	{
		$data_ini = date('Y-01-01');
		$data_fim = date('Y-12-31');

		$shows = $this->db->query("
			SELECT
				COUNT(deal.id) as 'shows',
				user.name as 'SDR',
				user.user_id
			FROM
				deal
			INNER JOIN
				user on deal.sdr = user.user_id
			WHERE
				data_diagnostico BETWEEN '$data_ini' AND '$data_fim'
				AND user.cargo = 'SDR'
			GROUP BY
				SDR
			ORDER BY
				shows DESC;");

		return $shows->result_array();
	}

	public function shows_total_mes()
	{
		$data_ini = date('Y-m-01');
		$data_fim = date('Y-m-t');

		$shows = $this->db->query("
			SELECT
				COUNT(deal.id) as 'shows',
				user.name as 'SDR',
				user.user_id
			FROM
				deal
			INNER JOIN
				user on deal.sdr = user.user_id
			WHERE
				data_diagnostico BETWEEN '$data_ini' AND '$data_fim'
				AND user.cargo = 'SDR'
			GROUP BY
				SDR
			ORDER BY
				shows DESC;");

		return $shows->result_array();
	}

	public function shows_mes($user_id)
	{
		$data_ini = date('Y-m-01');
		$data_fim = date('Y-m-t');

		$shows = $this->db->query("
			SELECT
				COUNT(deal.id) as 'shows'
			FROM
				deal
			WHERE
				data_diagnostico BETWEEN '$data_ini' AND '$data_fim'
				AND sdr = '$user_id';");

		return $shows->result_array();
	}

	public function shows_ano($user_id)
	{
		$data_ini = date('Y-01-01');
		$data_fim = date('Y-12-31');

		$shows = $this->db->query("
			SELECT
				COUNT(deal.id) as 'shows'
			FROM
				deal
			WHERE
				data_diagnostico BETWEEN '$data_ini' AND '$data_fim'
				AND sdr = '$user_id';");

		return $shows->result_array();

	}

	public function contas_mes($user_id)
	{
		$data_ini = date('Y-m-01');
		$data_fim = date('Y-m-t');

		$contas = $this->db->query("
			SELECT
				COUNT(id) as 'contas',
				SUM(value) as 'valor'
			FROM
				deal_won
			WHERE
				sdr = '$user_id'
				AND (data_ganho BETWEEN '$data_ini' AND '$data_fim');");

		return $contas->result_array();

	}

	public function contas_ano($user_id)
	{
		$data_ini = date('Y-01-01');
		$data_fim = date('Y-12-31');

		$contas = $this->db->query("
			SELECT
				COUNT(id) as 'contas'
			FROM
				deal_won
			WHERE
				sdr = '$user_id'
				AND (data_ganho BETWEEN '$data_ini' AND '$data_fim');");

		return $contas->result_array();

	}

	public function meta_mes($user_id)
	{
		$data = date('Y-m');

		$metas = $this->db->query("
			SELECT
				meta
			FROM
				meta
			WHERE
				meses = '$data'
				AND user_id = '$user_id';");

		return $metas->result_array();
	}

	public function leadsConversao($user_id)
	{
		$data_ini = date("Y-m-01");
		$data_fim = date("Y-m-t");

		$leads = $this->db->query
		("SELECT 
				( SELECT COUNT(id) FROM deal WHERE (add_time between '$data_ini' and '$data_fim') and  (sdr='$user_id')) as 'Banco',
				( SELECT COUNT(id) FROM deal WHERE (stage_2 between '$data_ini' and '$data_fim') and  (sdr='$user_id')) as 'Pesquisa',
				( SELECT COUNT(id) FROM deal WHERE (stage_3 between '$data_ini' and '$data_fim') and  (sdr='$user_id')) as 'Prospccao',
				( SELECT COUNT(id) FROM deal WHERE (stage_4 between '$data_ini' and '$data_fim') and  (sdr='$user_id')) as 'Conexao',
				( SELECT COUNT(id) FROM agendamentos WHERE (data_agendamento between '$data_ini' and '$data_fim') and  (qualificador='$user_id')) as 'Agendamento'
			FROM
				deal");

		return $leads->result_array();
	}

	public function grafico_sdr_meta($user_id)
	{
		$ano = date('Y');

		$grafico = $this->db->query("SELECT SUM(meta) AS 'meta',meses FROM meta WHERE meses LIKE '%$ano%' AND user_id='$user_id' GROUP by meses;");

		return $grafico->result_array();
	}

	public function grafico_sdr_show($mes,$user_id)
	{
		$grafico = $this->db->query("SELECT COUNT(id) as 'shows' FROM deal WHERE data_diagnostico LIKE '%$mes%' and sdr='$user_id' ");

		return $grafico->result_array();
	}

	public function closer_agendamentos()
	{
		$closers = $this->db->query("SELECT name,user_id FROM user WHERE cargo = 'Closer' AND status='Ativo'");

		return $closers->result_array();
	}

	public function result_closers($user_id)
	{
		$closers = $this->db->query("SELECT * FROM agendamentos_sdr WHERE user_id = '$user_id'");

		return $closers->result_array();
	}

	public function infos_closers($user_id,$closer_id)
	{
		$data = date("Y-m");

		$name_db = $this->db->query(" SELECT name,img FROM user WHERE user_id = '$closer_id'");
		$name = $name_db->result_array();
	
		$total_shows_db = $this->db->query("SELECT COUNT(id) as 'total_shows' FROM deal WHERE data_diagnostico LIKE '%$data%' AND closer='$closer_id'");
		$total_shows = $total_shows_db->result_array();

		$shows_db = $this->db->query("
			SELECT
				(
					SELECT COUNT(id)
				FROM
					deal
				WHERE
					stage_5 LIKE '%$data%'
					AND closer = '$closer_id'
					AND sdr = '$user_id'
 
			) as 'Agendamentos',
				(
					SELECT COUNT(id)
				FROM
					deal
				WHERE
					data_diagnostico LIKE '%$data%'
					AND closer = '$closer_id'
					AND sdr = '$user_id'

			) as 'Shows'
			FROM
				deal;");
		$shows = $shows_db->result_array();


		$contas_db = $this->db->query("SELECT COUNT(id) as 'contas' FROM deal_won WHERE closer='$closer_id' AND sdr='$user_id'");
		
		$contas = $contas_db->result_array();
		
		if (isset($name['0'])) {
			
			$dados = array(
			'nome' => $name['0']['name'],
			'img' => $name['0']['img'],
			'shows_totais' => $total_shows['0']['total_shows'],
			'shows' => $shows['0']['Shows'],
			'agendamentos' => $shows['0']['Agendamentos'],
			'contas' => $contas['0']['contas']);
			
			return $dados;
		} else {
			return FALSE;
		}
		
	}
	public function table_shows()
	{
		$data_ini = date('Y-m-01');
		$data_fim = date('Y-m-t');
		$data_hoje = date('Y-m-d');

		$data = date('Y-m');
		
		$closers = $this->db->query("SELECT name,user_id,img FROM user WHERE cargo='Closer' and status='Ativo'")->result_array();
		foreach ($closers as $value) {
			$id = $value['user_id'];
		 	$shows_proprios = $this->db->query("SELECT COUNT(id) FROM deal where (data_diagnostico between '$data_ini' and '$data_fim') and sdr='$id'")->result_array();
		 	$shows_totais = $this->db->query("SELECT COUNT(id) FROM deal where (data_diagnostico between '$data_ini' and '$data_fim') and (closer='$id' or sdr='$id')")->result_array();
		 	$agendamentos_hj = $this->db->query("SELECT COUNT(id) FROM deal WHERE stage_5 = '$data_hoje' and sdr='$id' " )->result_array();
		 	$agendamentos_7dias = $this->db->query("SELECT COUNT(id) FROM deal WHERE sdr='$id' AND (stage_5 BETWEEN DATE_SUB(now(), INTERVAL 7 DAY) AND now())")->result_array();
		 	$shows_7dias = $this->db->query("SELECT COUNT(id) FROM deal WHERE (data_diagnostico BETWEEN DATE_SUB(now(), INTERVAL 7 DAY) AND now()) and sdr='$id'")->result_array();

		 	$dados[] = array(
		 		'id' => $id,
		 		'nome' => $value['name'],
		 		'img' => $value['img'],
		 		'shows_seus' => $shows_proprios['0']['COUNT(id)'],
		 		'agendamentos_hj' => $agendamentos_hj['0']['COUNT(id)'],
		 		'agendamentos_7dias' => $agendamentos_7dias['0']['COUNT(id)'],
		 		'shows_totais' => $shows_totais['0']['COUNT(id)'],
		 		'shows_7dias' => $shows_7dias['0']['COUNT(id)']);
		 		
		 }

		 return $dados;
	}

	public function shows_sdr()
	{
		$data_ini = date('Y-m-01');
		$data_fim = date('Y-m-t');

		$sdr = $this->db->query("SELECT name,user_id,img FROM user WHERE cargo='SDR' and status='Ativo'")->result_array();

		foreach ($sdr as  $value) {
			$id = $value['user_id'];
			$shows = $this->db->query("SELECT COUNT(id) FROM deal WHERE (data_diagnostico between '$data_ini' and '$data_fim') and sdr = '$id'")->result_array();
			$diagnostico = $this->db->query("SELECT COUNT(id) FROM agendamentos WHERE (data_agendamento between '$data_ini' and '$data_fim') and qualificador = '$id'")->result_array();
			$dados[] = array(
				'id' => $id,
		 		'nome' => $value['name'],
		 		'img' => $value['img'],
		 		'shows' => $shows['0']['COUNT(id)'],
		 		'agendamentos' => $diagnostico['0']['COUNT(id)']);

		}
		return $dados;
	}

}