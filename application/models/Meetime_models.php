<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Meetime_models extends CI_Model {

	public function __construct()
    {
        $this->load->database();
    }

    public function salvar_lead($dados)
    {
    	$db = $this->db->insert('landpage',$dados);
    	if($db == 1) {
    		return TRUE;
    	} else {
    		return FALSE;
    	}
    }
}