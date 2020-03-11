<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}


	public function login($email, $senha){

		$user = $this->db->query ("SELECT * FROM user WHERE email = '$email' AND password = '$senha'");

		if($user->num_rows() > 0){
			$dados = $user->row_array();
			return $dados;			
		}
		else{
			return FALSE;
		}
	}


	public function registrar($user)
	{
		$verifica_cadastro = $this->db->get_where("user", array("user_id" =>  $user['user_id'] ));

		if ($verifica_cadastro->num_rows() > 0) {
			$this->db->update('user',$user, array("user_id" => $user['user_id']));

			if($this->db->affected_rows() > 0){
				$this->session->set_flashdata('sucess', 'Usuario criado com sucesso');
			}
			else {
				$this->session->set_flashdata('msg_erro', 'Ops! Algos deu errado, confira as informações');
			}			
		}
		else {
			$this->db->insert('user', $user);
				if($this->db->affected_rows() > 0){
					
					if ($user['cargo'] == "Closer") {
						$acumulo = array(
							'user_id' => $user['user_id'],
							'total_vendido' => 0,
							'contas_vendidas' => 0,);
						$this->db->insert('acumulo_05',$acumulo);
					}

					$this->session->set_flashdata('sucess', 'Usuario criado com sucesso');
				}
				
				else{
					$this->session->set_flashdata('msg_erro', 'Ops! Algos deu errado, confira as informações');
				}
		}
	}

	public function get_cargo()
	{
		$user = $this->db->query("SELECT * FROM user WHERE status = 'Ativo' and cargo='Coordenador'");

		return $user->result_array();
	}
}