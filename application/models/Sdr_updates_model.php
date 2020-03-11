<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sdr_updates_model extends CI_Model {


	public function __construct()
	{
		$this->load->database();

	}

	public function salvar_closers($dados)
	{
		$verifica_cadastro = $this->db->get_where("agendamentos_sdr", array("user_id" =>  $dados['user_id']));

		if ($verifica_cadastro->num_rows() > 0) {

			$this->db->update('agendamentos_sdr',$dados, array("user_id" => $dados['user_id']));
			
			if($this->db->affected_rows() > 0){
				return TRUE;

			}
			else{
				return FALSE;
				
			}
		}
		else {
			$this->db->insert('agendamentos_sdr', $dados);
				if($this->db->affected_rows() > 0){
					return TRUE;
				}
				else{
					return FALSE;
				}
		}
	}
}



