<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mkt_rd_model extends CI_Model {


	public function __construct()
	{
		$this->load->database();

	}

	public function check_rd($dados)
	{
		$verifica_cadastro = $this->db->get_where("check_rd", array("id_pipe" =>  $dados['id_pipe'] ));

		if ($verifica_cadastro->num_rows() > 0) {

			$erro = "erro";
			
			return $erro;
		}
		else {
			$this->db->insert('check_rd', $dados);
				
				if($this->db->affected_rows() > 0){
					
					return TRUE;
					
				}

				else{
					
					return FALSE;
				
				}
		}	
	}

	public function check($id)
	{
		$check = $this->db->query("SELECT status FROM check_rd WHERE id_pipe =".$id);

		return $check->result_array();
	}
	public function salvar($dados)
	{
		$verifica_cadastro = $this->db->get_where("rd_mkt", array("id" =>  $dados['id'] ));

		if ($verifica_cadastro->num_rows() > 0) {

			$this->db->update('rd_mkt',$dados, array("id" => $dados['id']));
			
			if($this->db->affected_rows() > 0){
				
				return TRUE;

			}
			else{
				
				return FALSE;
				
			}
		}
		else {
			$this->db->insert('rd_mkt', $dados);
				
				if($this->db->affected_rows() > 0){
					
					return TRUE;
					
				}

				else{
					
					return FALSE;
				
				}
		}
	}

	public function code_rd($token)
	{
		$this->db->update('token_rd',array('id' => $token), array("campo" => 'code'));

		return TRUE;
	}

	public function token_rd($token)
	{
		$this->db->update('token_rd',array('id' => $token), array("campo" => 'access_token'));

		return TRUE;
	}

	public function refresh_rd($token)
	{
		$this->db->update('token_rd',array('id' => $token), array("campo" => 'refresh_token'));

		return TRUE;
	}

	public function get_token_rd()
	{
		$token = $this->db->query("SELECT id FROM token_rd WHERE campo='access_token'");

		return $token->result_array();
	}

	public function get_refresh_rd()
	{
		$token = $this->db->query("SELECT id FROM token_rd WHERE campo='refresh_token'");

		return $token->result_array();
	}

	public function get_uuid($email)
	{
		$uuid = $this->db->query("SELECT uuid FROM rd_mkt WHERE email = '{$email}'");

		return $uuid->result_array();
	}
}
