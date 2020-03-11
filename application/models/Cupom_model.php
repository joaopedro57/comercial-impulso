<?php

class Cupom_model extends CI_Model{

  function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->solides_master_db = $this->load->database('solides_master_devel', TRUE);
  }

  public function save($data)
  {
    if($this->verificaCupom($data['cupom']) == TRUE)
    {
      $this->db->insert('cupons', $data);
      return TRUE;
    }
    else
    {
      return FALSE;
    }
  }
  public function buscar_idclifor($idclifor)
  {
    $CCLIFOR = $this->solides_master_db->query("SELECT NOME,CNPJ,EMAIL FROM CCLIFOR WHERE ID = $idclifor AND IDEMP = 1;");

    if ($CCLIFOR->num_rows() > 0) {

      $dados = $CCLIFOR->result_array();

       $email = explode(",",$dados['0']['EMAIL']);
       
       if (isset($email['1'])) {

          $return = array(
            'nome_cliente' => $dados['0']['NOME'],
            'email' => $email['0'],
            'cpf_cnpj' => $dados['0']['CNPJ']);

          return $return;
        }
        else {
          $return = array(
            'nome_cliente' => $dados['0']['NOME'],
            'email' => $dados['0']['EMAIL'],
            'cpf_cnpj' => $dados['0']['CNPJ']);

          return $return;
        } 
      
    }

    else {
      $return = 1;
      return $return;
    }

  }
  public function update($data, $id)
  {
    $this->db->where('cupons.id', $id);
    $this->db->update('cupons', $data);
  }

  public function deleted($id)
  {
    $this->db->where('id', $id);
    $this->db->update('cupons', ['deleted_at' => date('Y-m-d H:i:s')]);
  }

  public function verificaCupom($cupom)
  {
    $this->db->where('cupom', $cupom);
    $query = $this->db->get('cupons');
    if($query->num_rows() == 0){
        return TRUE;
    }else{
        return FALSE;
    }
  }

  public function getAllCupons($user_id)
  {
    $data = date("Y-m-d");
    $cupons = $this->db->query("SELECT * FROM cupons WHERE user_id='$user_id' and vencimento > '$data'");

    return $cupons->result_array();
  }

  public function getById($id){
    $this->db->where('id', $id);
    return  $this->db->get('cupons')->result_array();
  }

  public function validaCupom($cupom){
    $this->db->where('cupom', $cupom);
    $this->db->where('cupons.utilizado < cupons.quantidade');
    $query = $this->db->get('cupons');
    if($query->num_rows() > 0){
      return TRUE;
    }else{
      return FALSE;
    }
  }
  public function usarCupom($cupom){
    $this->db->set('utilizado', 'utilizado+1', FALSE);
    $this->db->where('cupom', $cupom);
    $this->db->update('cupons');
  }

  
}