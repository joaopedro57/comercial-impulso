<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pipedrive_updates_model extends CI_Model {


	public function __construct()
	{
		$this->load->database();
		$this->solides_master_db = $this->load->database('solides_master_devel', TRUE);
		$this->gcloud = $this->load->database('gcloud_data_db', TRUE);
	}

	public function salvar_json($dados)
	{
		$verifica_cadastro = $this->db->get_where("json_pipedrive", array("id" =>  $dados['id']));

		if ($verifica_cadastro->num_rows() > 0) {

			$this->db->update('json_pipedrive',$dados, array("id" => $dados['id']));
			
			if($this->db->affected_rows() > 0){
				return TRUE;

			}
			else{
				return FALSE;
				
			}
		}
		else {
			$this->db->insert('json_pipedrive', $dados);
				if($this->db->affected_rows() > 0){
					return TRUE;
				}
				else{
					return FALSE;
				}
		}
	}
	public function atualizarMeta($dados)
	{
		$verifica_cadastro = $this->db->get_where("meta", array("user_id" =>  $dados['user_id'], "meses" => $dados['meses'] ));

		if ($verifica_cadastro->num_rows() > 0) {

			$this->db->update('meta',$dados, array("user_id" => $dados['user_id'], "meses" => $dados['meses']));
			
			if($this->db->affected_rows() > 0){
				return TRUE;

			}
			else{
				return FALSE;
				
			}
		}
		else {
			$this->db->insert('meta', $dados);
				if($this->db->affected_rows() > 0){
					return TRUE;

				}
				else{
					return FALSE;
				}
		}
	}
	public function att_previsao($dados)
	{
		$verifica_cadastro = $this->db->get_where("previsao", array("id" =>  $dados['id'],"previsao" => $dados['previsao'], "data" => $dados['data'] ));
		if ($verifica_cadastro->num_rows() > 0) {

			$this->db->update('previsao',$dados, array("id" => $dados['id'],"previsao" => $dados['previsao'], "data" => $dados['data'] ));
			
			if($this->db->affected_rows() > 0){
				return TRUE;

			}
			else{
				return FALSE;
				
			}
		}
		else {
			$this->db->insert('previsao', $dados);
				if($this->db->affected_rows() > 0){
					return TRUE;
				}
				else{
					return FALSE;
				}
		}
	}
	
	public function att_previsao_status($dados)
	{
		$verifica_cadastro = $this->db->get_where("previsao", array("id" =>  $dados['id'],"previsao" => $dados['previsao'], "data" => $dados['data'] ));
		
		if ($verifica_cadastro->num_rows() > 0) {
		
			$this->db->update('previsao',$dados, array("id" => $dados['id'],"previsao" => $dados['previsao'], "data" => $dados['data'] ));
			
			if($this->db->affected_rows() > 0){
				return TRUE;
			}
			else{
				return FALSE;	
			}
		}
		else {
			return FALSE;
		}
	}
	
	public function att_status($dados)
	{
		$this->db->update('user', $dados, array("user_id" => $dados['user_id']));
	}

	public function salvar($dados)
	{
		$verifica_cadastro = $this->db->get_where("deal", array("id" =>  $dados['id'] ));

		if ($verifica_cadastro->num_rows() > 0) {

			$this->db->update('deal',$dados, array("id" => $dados['id']));
			
			if($this->db->affected_rows() > 0){
				return TRUE;

			}
			else{
				return FALSE;
				
			}
		}
		else {
			$this->db->insert('deal', $dados);
				if($this->db->affected_rows() > 0){
					return TRUE;
				}
				else{
					return FALSE;
				}
		}
	}

	public function salvar_avulso($dados)
	{
		$verifica_cadastro = $this->db->get_where("deal_avulso", array("id" => $dados['id'] ));
		
		if ($verifica_cadastro->num_rows() > 0){
			$this->db->update('deal_avulso', $dados, array("id" => $dados['id']));
			
			if($this->db->affected_rows() > 0){
				
				return TRUE;
			}
			else{

				return FALSE;
			}
		}

		else {
			$this->db->insert('deal_avulso',$dados);
			if ($this->db->affected_rows() > 0) {
				return TRUE;
			}
			else {
				return FALSE;
			}

		}
	}

	public function salvar_won($dados)
	{
		$verifica_cadastro = $this->db->get_where("deal_won", array("id" =>  $dados['id'] ));


		if ($verifica_cadastro->num_rows() > 0){
			$this->db->update('deal_won', $dados, array("id" => $dados['id']));
			
			if($this->db->affected_rows() > 0){
				return TRUE;
			}
			else{
				return FALSE;
			}
		}

		else {
			$this->db->insert('deal_won',$dados);
			if ($this->db->affected_rows() > 0) {
				return TRUE;
			}
			else {
				return FALSE;
			}

		}
	}
	public function get_id_deal() 
	{
		$id = $this->db->query("SELECT id, data_ganho FROM deal_won");

   		return $id->result_array();
	}

	public function get_code_rd()
	{
		$code = $this->db->query("SELECT id FROM token_rd WHERE campo='code' ");

		return $code->result_array();
	}

	public function status_previsao($dados)
	{
		$data = date('m-Y');

		$verifica_cadastro = $this->db->get_where("previsao", array("id" =>  $dados['id'], "data" => $data))->result_array();
		
		if (isset($verifica_cadastro['0'])) {
			foreach ($verifica_cadastro as $infos) {
				if ($infos['resultado'] == '') {

					$att = array(
						'id' => $infos['id'],
						'resultado' => 'Sim');

					$this->db->update('previsao', $att, array("id" => $att['id']));
				}
			}
		
			return TRUE;
		}

		else {
			$closer = $dados['closer'];

			$infos = $this->db->query("SELECT * FROM previsao ORDER BY id_auto desc; ")->result_array();
			$coordenador = $this->db->query("SELECT Equipe FROM user where user_id = '$closer'")->result_array();
			
			$att = array(
				'id' => $dados['id'],
				'value' => $dados['value'],
				'data' => $data,
				'previsao' => $infos['0']['previsao'],
				'resultado' => 'Sim',
				'Coordenador' => $coordenador['0']['Equipe']);

			$this->db->insert('previsao',$att);

			return TRUE;
		}
	}

	public function coletarCNPJ()
	{
		$cnpj = $this->solides_master_db->query("
			SELECT  c.CNPJ
			FROM ASSINATURAS a
			INNER JOIN CCLIFOR c ON
			c.ID = a.IDCLIFOR AND c.IDEMP = a.IDEMP
			WHERE a.DATA_CANCELAMENTO IS NULL
			AND c.CNPJ IS NOT NULL
			AND c.IDEMP = 1;")->result_array();

		return $cnpj;
	}

	public function salvarCNAE($dados)
	{
		$insert = $this->gcloud->insert('cnpj_cnae',$dados);

		return $insert;

	}
}



