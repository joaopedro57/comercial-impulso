<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Indicacao_model extends CI_Model {


	public function __construct()
	{
		$this->load->database();

	}
	
	public function indicacao($dados)
	{
		$verificar_lead = $this->db->get_where("indicacao", array("id" => $dados['id']));

		if ($verificar_lead->num_rows() > 0) {

			$this->session->set_flashdata('msg_erro', 'ID Já Criado');
		}

		else {

			$this->db->insert('indicacao', $dados);

			if($this->db->affecterd_row() > 0) {

				$this->session->set_flashdata('sucess', 'Lead criado com sucesso');
			}
		}
	}
	public function roda_indicacao($dados)
	{
		$verificar_lead = $this->db->get_where("roda_indicacao", array("email_indicado" => $dados['email_indicado']));

			$this->db->insert('roda_indicacao', $dados);

			if($this->db->affected_rows() > 0) {
				return TRUE;
			}

			else {
				return FALSE;
			}
	}
}

