<?php
class Index extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model');
		$this->load->helper('pipedrive_api');
		$this->load->library('session');

		


	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect();
	}

	
	public function index()
	{
		if($this->session->userdata('logado') != 0 ) {
			redirect("Comercial_Controller/");

		}

		$dados = $this->input->post();
		if($this->input->post('email')){
			self::login();
		}
		
		$this->load->view('templates/login');
	}

	public function register()
	{
		$id 		= $this->input->post('idPipe');
		
		$request['cargo'] = $this->Login_model->get_cargo();

		if (!$id) {
			$this->load->view('templates/register',$request);
		}
		
		else {
			$id 		= $this->input->post('idPipe');
			$dados 		= pipedrive_get_usuario($id);
			if (isset($dados['data'])) {
				$img_type 	= $_FILES['foto']['type'];
				$img_nome 	= $_FILES['foto']['name'];
				$img_error 	= $_FILES['foto']['error'];
				$img_temp 	= $_FILES['foto']['tmp_name'];
				$name 		= $dados['data']['name'];
				$email 		= $dados['data']['email'];;
				$senha 		= md5($this->input->post('novaSenha'));
				$cargo 		= $this->input->post('novoCargo');
				$telefone 	= $this->input->post('telefone');
				$equipe 	= $this->input->post('equipe');
				
				if ($img_error == 0 && ($img_type == 'image/jpeg' || $img_type == 'image/png' )) {
					$user =array(
					'user_id'	=> $id, 
					'name' 		=> $name,
					'email' 	=> $email,
					'password' 	=> $senha,
					'cargo' 	=> $cargo, 
					'telefone'	=> $telefone,
					'Equipe'	=> $equipe, 
					'img'		=> "img/".$img_nome);

					$pasta = 'assets/img/';
					
					$upload = move_uploaded_file($img_temp, $pasta . $img_nome);
					
					if ($upload == TRUE) {
						$this->Login_model->registrar($user);
					}	

					else {
						$this->session->set_flashdata('msg_erro', 'Ops! Algos deu errado, confira o arquivo de img');
					}

					$this->load->view('templates/register',$request);
				}
				
				else {
					$this->session->set_flashdata('msg_erro', 'Ops! Algos deu errado, confira o arquivo de img');
					$this->load->view('templates/register',$request);
				}
			}
			else {
				$this->session->set_flashdata('msg_erro', 'Ops!Confira o ID do Pipedrive');
				$this->load->view('templates/register',$request);
			}
		}
	}

	public function login()
	{
		$user = $this->Login_model->login( $this->input->post('email'), md5($this->input->post('senha')) );
		if($user){
			$newdata = array(
		        'name'  	=> $user['name'],
		        'email'     => $user['email'],
		        'user_id'	=> $user['user_id'],
		        'img'		=> $user['img'],
		        'cargo'		=> $user['cargo'],
		        'logado' 	=> TRUE
			);

			$this->session->set_userdata($newdata);
			if ($newdata['cargo'] == 'One Shot') {
				redirect('Cupom/');
			}
			elseif ($newdata['cargo'] == 'Financeiro') {
				redirect('Financeiro_Controller/dashboard');
			}
			redirect('Comercial_Controller/');
		}
		else{
			$this->session->set_flashdata('msg_erro', 'Usuario ou senha inválidos');
		}
	}
	
}
