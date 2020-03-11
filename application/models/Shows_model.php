	<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shows_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();

	}
	public function salvar_json($json)
	{
		$this->db->insert('json_agendamentos',$json);
		if($this->db->affected_rows() > 0){
				return TRUE;

			}
			else{
				return FALSE;
				
			}

	}

	public function salvar_agendamentos($dados)
	{
		$verifica_cadastro = $this->db->get_where("agendamentos", array("atividade_id" =>  $dados['atividade_id']));

		if ($verifica_cadastro->num_rows() > 0) {

			$this->db->update('agendamentos',$dados, array("atividade_id" =>  $dados['atividade_id']));
			
			if($this->db->affected_rows() > 0){
				return TRUE;

			}
			else{
				return FALSE;
				
			}
		}
		else {
			$this->db->insert('agendamentos', $dados);
				if($this->db->affected_rows() > 0){
					return TRUE;
				}
				else{
					return FALSE;
				}
		}
	}

	public function salvar_shows($dados)
	{
		$verifica_cadastro = $this->db->get_where("shows", array("atividade_id" =>  $dados['atividade_id']));

		if ($verifica_cadastro->num_rows() > 0) {

			$this->db->update('shows',$dados, array("atividade_id" =>  $dados['atividade_id']));
			
			if($this->db->affected_rows() > 0){
				return TRUE;

			}
			else{
				return FALSE;
				
			}
		}
		else {
			$this->db->insert('shows', $dados);
				if($this->db->affected_rows() > 0){
					return TRUE;
				}
				else{
					return FALSE;
				}
		}
	}

	public function closers()
	{
		$closers = $this->db->query("
			SELECT
				user_id,name,img
			FROM
				user
			WHERE 
				status='Ativo' 
				AND cargo = 'Closer'")->result_array();

		foreach ($closers as $dados) {
			$infos = array(
				'user_id' => $dados['user_id'],
				'nome' => $dados['name'],
				'img' => 'http://comercial.solides.adm.br/assets/'.$dados['img']);

			$verifica_cadastro = $this->db->get_where("regras_agendamento", array("user_id" =>  $infos['user_id']));

			if ($verifica_cadastro->num_rows() > 0) {

				$this->db->update('regras_agendamento',$infos, array('user_id' => $infos['user_id']));
			}
			else {
				$this->db->insert('regras_agendamento', $infos);
			}

		}
	}

	public function checar_recebiveis($closer)
	{
		$checar = $this->db->query("SELECT user_id,agendamentos_recebe,agendamentos_recebidos FROM agendamentos_recebe WHERE user_id = '$closer'")->result_array();

		if ($checar['0']['agendamentos_recebe'] < 1) {
			self::ranking_agendamentos($closer);				
		}
		
		else {


			$agendamentos = array(
				'user_id' => $closer, 
				'agendamentos_recebidos' => $checar['0']['agendamentos_recebidos']+1);


			if ($checar['0']['agendamentos_recebe'] <= $agendamentos['agendamentos_recebidos']) {
				$agendamentos['prioridade'] = 0;
				self::ranking_agendamentos($closer);
				$this->db->update('agendamentos_recebe',$agendamentos,array('user_id' => $agendamentos['user_id']));
				return TRUE;
			}

			$this->db->update('agendamentos_recebe',$agendamentos,array('user_id' => $agendamentos['user_id']));
			return TRUE;
			
		}
	}

	public function ranking_agendamentos($closer)
	{
		$ranking = $this->db->query("SELECT * FROM agendamentos_recebe ORDER BY ranking asc")->result_array();
		$ultimo = end($ranking);
			
		foreach ($ranking as $key => $value) {
			if ($value['user_id'] == $closer) {
				$ranking[$key]['ranking'] = $ultimo['ranking']+1;
				$posicao = $key+1;
				$dados =  array(
					'agendamentos_randown' => $value['agendamentos_randown']+1,
					'id' => $value['id']);

				$this->db->update('agendamentos_recebe',$dados,array('id' => $dados['id'])); 
			}		
		}

		foreach ($ranking as $key => $value) {
			if ($value['ranking'] > $posicao) {
				$ranking[$key]['ranking'] = $value['ranking']-1;
			}	
		}
		foreach ($ranking as $value) {
			$infos = array( 
				'id' => $value['id'],
				'ranking' => $value['ranking']);
			$this->db->update('agendamentos_recebe',$infos, array('id' => $infos['id'], ));
		}
			
		return TRUE;
	}

	public function _agendamentos_proprios($closer)
	{ 
		$data_ini = date('Y-m-01');
		$data_fim = date('Y-m-t');
		$closer = $closer['data']['0']['id'];

		$agendamento = $this->db->query("
			SELECT
				COUNT(id)
			FROM
				deal
			WHERE
				sdr = '$closer' 
				AND closer = '$closer'
				AND (data_diagnostico BETWEEN '$data_ini' AND '$data_fim')")->result_array();

		$regras = $this->db->query("SELECT * FROM regras_agendamento WHERE user_id = $closer")->result_array();
		$infos = $this->db->query("SELECT * FROM agendamentos_recebe WHERE user_id = $closer")->result_array();

		if ($agendamento['0']['COUNT(id)'] >= $regras['0']['agendamentos_faz']) {
		 	
		 	$qnt_receber = (floor($agendamento['0']['COUNT(id)']/$regras['0']['agendamentos_faz']))*$regras['0']['agendamentos_recebe'];
		 	$existem = $this->db->query("SELECT agendamentos_recebidos FROM agendamentos_recebe WHERE user_id = $closer")->result_array();
		 	$qnt_receber_total = $qnt_receber - $existem['0']['agendamentos_recebidos'];

		 }

		 else {
			
		 	$qnt_receber = 0;
		 
		 }

		 $dados = array(
		 	'user_id' => $closer,
		 	'agendamentos_recebe' => $qnt_receber);

		 if ($qnt_receber_total > 0) {
		 	$dados['agendamentos_nescessarios'] = 0;
		 	$dados['prioridade'] = 1;
		 	$dados['data_prioridade'] = date("Y-m-d H:i:s");
		 }
		 else {
		 	$dados['prioridade'] = 0;
		 	$dados['agendamentos_nescessarios'] = $regras['0']['agendamentos_faz'];

		 }
		 
		 $this->db->update('agendamentos_recebe',$dados, array('user_id' => $dados['user_id']));		 		
	}
	

	public function att()
	{
		$a = $this->db->query("SELECT * FROM regras_agendamento")->result_array();
		foreach ($a as $key => $value) {
			$dados = array(
				'user_id' => $value['user_id'],
				'agendamentos_nescessarios' => $value['agendamentos_faz']);

			$verifica_cadastro = $this->db->get_where("agendamentos_recebe", array("user_id" =>  $dados['user_id']));

			if ($verifica_cadastro->num_rows() > 0) {

				$this->db->update('agendamentos_recebe',$dados, array('user_id' => $dados['user_id']));
			}
			else {
				$this->db->insert('agendamentos_recebe', $dados);
			}
		}
		print_r("xia");exit;
	}

	public function prioridade()
	{
		$prioridade = $this->db->query("
			SELECT 
				r.user_id,
				r.nome,
				r.img,
				a.agendamentos_recebe,
				a.agendamentos_recebidos,
				a.ranking
			FROM 
				agendamentos_recebe a
			INNER JOIN 
				regras_agendamento r
				ON r.user_id = a.user_id
			WHERE	
				a.prioridade = 1
			ORDER BY 
				a.data_prioridade;")->result_array();

		return $prioridade;
	}

	public function randown()
	{
		$data_ini = date('Y-m-01');
		$data_fim = date('Y-m-t');

		$randown = $this->db->query("
			SELECT 
				r.user_id,
				r.nome,
				r.img,
				a.ranking,
				a.agendamentos_nescessarios,
				a.agendamentos_recebidos
			FROM 
				agendamentos_recebe a
			INNER JOIN 
				regras_agendamento r
				ON r.user_id = a.user_id
			WHERE	
				a.prioridade = 0
			ORDER BY 
				a.ranking;")->result_array();

		foreach ($randown as $key => $value) {
			$total = $this->db->query("SELECT SUM(value) FROM deal_won WHERE closer =".$value['user_id']." and (data_ganho between '$data_ini' AND '$data_fim')")->result_array();
			$shows = $this->db->query("SELECT COUNT(id) FROM deal WHERE closer=".$value['user_id']." and (data_diagnostico between '$data_ini' AND '$data_fim')")->result_array();
			$randown[$key]['total_vendido'] = $total['0']['SUM(value)'];
			$randown[$key]['agendamentos_recebidos'] = $shows['0']['COUNT(id)'];
		}
		
		return $randown;
	}

	public function att_regras_agendamento()
	{
		$closers = $this->db->query("SELECT * from user where cargo = 'closer' AND status = 'Ativo'")->result_array();

		foreach ($closers as $key) {
			$dados = array(
				'user_id' => $key['user_id'],
				'nome' => $key['name'],
				'img' => 'http://comercial.solides.adm.br/assets/'.$key['img']);
			$verifica = $this->db->get_where("regras_agendamento", array("user_id" =>  $dados['user_id']));

			if ($verifica->num_rows() > 0) {
				print_r('$xia');
			}
			else { 
				$this->db->insert('regras_agendamento',$dados);
			}
		}
		
		print_r("xia");exit;
	}
	public function att_agendamento_recebe()
	{
		$closer = $this->db->query("
			SELECT u.name,
				d.closer, 
				SUM(d.value),
				r.agendamentos_faz,
				r.agendamentos_recebe
			FROM user u 
			inner join deal_won d 
			on u.user_id = d.closer
			inner join regras_agendamento r 
			on u.user_id = r.user_id
			where u.status = 'Ativo' 
			and (d.data_ganho BETWEEN '2019-06-01' AND '2019-06-30')
			GROUP BY d.closer
			ORDER BY SUM(d.value) desc;")->result_array();

		foreach ($closer as $key => $value) {
			$id = $value['closer'];

			$shows_proprios = $this->db->query("SELECT COUNT(id) FROM deal WHERE (data_diagnostico between '2019-07-01' and '2019-07-30') and sdr = '$id' and closer = '$id'")->result_array();
			
			if ($shows_proprios['0']['COUNT(id)'] >= $value['agendamentos_faz']) {
				
				$agRecebe = (floor($shows_proprios['0']['COUNT(id)']/$value['agendamentos_faz']))*$value['agendamentos_recebe'];

				$prioridade = 1;
			}
			else {
				$agRecebe = 0;
				$prioridade = 0;
			}

			$dados = array(
				'ranking' => $key+1,
				'user_id' => $value['closer'],
				'agendamentos_randown' => 0,
				'agendamentos_recebidos' => 0,
				'agendamentos_nescessarios' =>$value['agendamentos_faz'],
				'prioridade' => $prioridade,
				'agendamentos_recebe' => $agRecebe);

			$verifica = $this->db->get_where("agendamentos_recebe", array("user_id" =>  $dados['user_id']));

			if ($verifica->num_rows() > 0) {
				$this->db->update('agendamentos_recebe',$dados, array("user_id" => $dados['user_id']));
			}
			else { 
				$this->db->insert('agendamentos_recebe',$dados);
			}

		}

		print_r("deus");exit;
	}

	public function sdrRanking()
	{
		$data_ini = date("Y-m-01");
		$data_fim = date("Y-m-t");

		$dados = $this->db->query("
			SELECT
				COUNT(deal.id) as 'shows',
				user.name as 'SDR',
				user.user_id,
				user.img
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
				shows DESC");

		return $dados->result_array();
	}

	public function ajustesranking()
	{
		$closer = $this->db->query("SELECT user_id FROM user WHERE cargo='Closer' AND status='Inativo'")->result_array();

		foreach ($closer as $value) {
			
		}
	}
}