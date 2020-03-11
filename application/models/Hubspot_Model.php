<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hubspot_Model extends CI_Model {


	public function __construct()
	{
		$this->load->database();
		$this->solides_master_db = $this->load->database('solides_master_devel', TRUE);
		$this->gcloud_data_db = $this->load->database( 'gcloud_data_db', TRUE );
	}
	
	public function getContasGanhas()
	{
		$contas = $this->db->query("SELECT id,id_clifor FROM deal_won ")->result_array();

		return $contas;
	}
	public function get_infos_tv()
	{
		$dados = array( 
			'ranking' => $this->gcloud_data_db->query("SELECT r.*,
															  g.nome 
														FROM ranking_closer r 
														INNER JOIN grupo_prioridade  g 
														ON g.user_id = r.user_id
														ORDER BY r.ranking ASC")->result_array(),
			
			'prioridade' => $this->gcloud_data_db->query("SELECT p.*,
																 g.nome 
															FROM prioridade_show p
															INNER JOIN grupo_prioridade  g 
															ON g.user_id = p.user_id
															WHERE p.recebeu = 0
															ORDER BY p.data DESC")->result_array()
		);

		return $dados;
		
	}
}