<?php   
defined('BASEPATH') OR exit('No direct script access allowed');

class Roda_Indicacao extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('pipedrive_api');
		$this->load->library('session');
		$this->load->model('Indicacao_model');
		$this->load->helper('google_sheet_api');
	} 
	
	public function index()
	{	
		verificacao_google();

		$this->load->view('roda_indicacao');
	}

	public function enviar()
	{
				
		$email = $_POST["email"];
		$nome = $_POST["nome"];
		$email_indicado = $_POST["email_indicado"];
		$nome_indicado = $_POST["nome_indicado"];
		$empresa_indicada = $_POST["empresa_indicada"];
		$telefone_indicado = $_POST["telefone_indicado"];
		$valor = $_POST["numero_sorteio"];
		
		
		if ($valor == 0) {
			$premio = '10% de desconto na primeira mensalidade';
		}
		elseif ($valor == 1) {
			$premio = '5 EADs para treinar suas lideranças';
		}
		elseif ($valor == 2) {
			$premio = '2 Horas de atendimento personalizado do nosso Sucesso do Cliente';
		}
		elseif ($valor == 3) {
			$premio = '1 formação presencial';
		}
		elseif ($valor == 4) {
			$premio = '25% na primeira mensalidade';
		}
		elseif ($valor == 5) {
			$premio = 'Tente Outra Vez';
		}
		elseif ($valor == 6) {
			$premio = '5 créditos Profilers';
		}
		elseif ($valor == 7) {
			$premio = '2 EADs People Analytics';
		}
		elseif ($valor == 8) {
			$premio = '2 EADs Gestão Comportamental';
		}
		elseif ($valor == 9) {
			$premio = '2 créditos Profilers';
		}

		$dados = array(
			'nome' => $nome,
			'email' => $email,
			'nome_indicado' => $nome_indicado,
			'email_indicado' => $email_indicado,
			'empresa_indicada' => $empresa_indicada,
			'telefone_indicado' => $telefone_indicado,
			'premio' => $premio,
			'data' => date('d-m-Y'),
		);
		if (!$dados['nome'] || !$dados['email_indicado'] || !$dados['empresa_indicada'] || !$dados['nome_indicado']) {
			$retornar = "falhou";
			print_r($retornar);
			return $retornar;
		}

		$ze = $this->Indicacao_model->roda_indicacao($dados);
		if (!$ze) {
			print_r("Não Salvou no BD");
		}

		//$google = google_input_roda($dados);
		//sprint_r($google);exit;

		$email = array(
			'from' => 'joaopedro@solides.com.br',
			'from_name' => 'João Pedro',
			'email' => $email,
			'assunto' => 'Indique e Ganhe SOLIDES', 	
			'mensagem' => 'Olá, '.$nome. ', tudo bem?
			<br><br> Você acabou de girar a nossa ROLETA parceira e ganhou: <br><br><strong>'.$premio. '</strong><br><br> Agora é muito simples, basta entrar em contato com seu consultor <br> e resgatar o seu prémio com a  <strong> SOLIDES </strong>!',
		);

		$xia = enviar_email($email);
		if (!$xia) {
			print_r("Não enviou o e-mail");
		}
		else {
			$retornar = "certo";
			print_r($retornar);
			return $retornar;
		}
	}

}