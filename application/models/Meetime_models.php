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

    public function exemplo($dados)
    {
        $db = $this->db->insert('ex',$dados);

        return TRUE;
    }

    public function cnpjs()
    {
        $dados = $this->db->query("SELECT DISTINCT(cnpj) FROM cnpjs;")->result_array();

        return $dados;
    }

    public function insert_cnpj($cnpj)
    {
        $verifica_cadastro = $this->db->get_where("cnpjs_web", array("cnpj" =>  $cnpj['cnpj']));

        if ($verifica_cadastro->num_rows() > 0) {

            $this->db->update('cnpjs_web',$cnpj, array("cnpj" => $cnpj['cnpj']));

            if($this->db->affected_rows() > 0){
                return TRUE;

            }
            else{
                return FALSE;

            }
        }
        else {
            $this->db->insert('cnpjs_web', $cnpj);
                if($this->db->affected_rows() > 0){
                    return TRUE;
                }
                else{
                    return FALSE;
                }
        }
    }
}