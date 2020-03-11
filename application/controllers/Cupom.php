<?php

date_default_timezone_set('America/Sao_Paulo');

class Cupom extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('Cupom_model');//model que pesquisa no banco do cupom
        $this->load->model("login_model");//model que determina ques está logado
        $this->load->library('session');//logado ou não no sistema
        $this->load->helper('pipedrive_api');//helper das APIs do Pipedrive
        $this->load->model('Comercial_model');//model de pesquisa no bando de dados do comercial
        $this->load->helper('att_helper');//helper de funçoes usadas recorrentemente

        if($this->session->userdata('logado') != 1 ) {
			redirect("index/logout"); //se a pessoa tiver deslogada redireciona para a pagina de loguin

		  }

    }

    public function index()
    {
      $data['user'] = $this->session->userdata();
    	$data['contato'] = $this->Comercial_model->contato();//retorna as informações de contato de todos do comercial
      $data['lista'] = $this->Cupom_model->getAllCupons($data['user']['user_id']);
      $data['user'] = $this->session->userdata();//retorna as informações do usuario

      $this->load->view('templates/header',$data);
      $this->load->view('cupom/cupom_view', $data);
      $this->load->view('cupom/footer_cupom');

        
    }

    public function novoCupom()
    {
      $this->load->view('partial/header');
      $this->load->view('components/novo-cupom');
      $this->load->view('partial/footer');
    }

    public function cadastrarCupom()
    {
    	$dados = $this->input->post();

      if($dados){
          

          $data = DateTime::createFromFormat('d/m/Y', $dados['vencimento']);
          

          if(intval($dados['desconto']) > 5 && ($dados['cargo'] == 'Sales Ops' || $dados['cargo'] == 'One Shot')){
            $return = 0;
            print_r($return);
            return $return;
          }
          if($dados['desconto'] > 50 && ($dados['cargo'] == 'Gestora Comercial' || $dados['cargo'] == 'CEO')){
            $return = 0;
            print_r($return);
            return $return;
          }
          if($data->format('Y-m-d') < date('Y-m-d')){
            $return = 1;
            print_r($return);
            return $return;
          }

          $infos = array(
              'cupom' => strtoupper(str_replace(" ", "", $dados['cupom'])),
              'quantidade' => intval($dados['quantidade']),
              'utilizado' => 0,
              'vencimento' =>  $data->format('Y-m-d'),
              'created_at' => date('Y-m-d H:i:s'),
              'user_id' => $dados['user_id'],
            );

            $valDesconto = trim(str_replace("%","", $dados['desconto']));
            $infos['valor'] = $valDesconto;
         
          if ($dados['qnt_creditos'] > 0) {
           $infos['qnt_creditos'] = $dados['qnt_creditos'];
           $infos['valor_total'] = number_format($dados['valor_total'], 2, '.', '');
          }

          if (isset($dados['status']) && strlen($dados['status']) > 0) {
            if ($dados['status'] == 'Sim') {
              
              $cliente = $this->Cupom_model->buscar_idclifor($dados['idclifor']);

              if ($cliente == 1) {
                $return = 4;
                print_r($return);
                return $return;
              }
            }

            elseif ($dados['status'] == 'Nao') {
              $cliente = array(
                'nome_cliente' => $dados['nome_cliente'],
                'email' => $dados['email'],
                'cpf_cnpj' => $dados['cpf_cnpj']);
            }
            
            $infos['nome_cliente'] = $cliente['nome_cliente'];
            $infos['email'] = $cliente['email'];
            $infos['cpf_cnpj'] = limpaCPF_CNPJ($cliente['cpf_cnpj']);
          }

          $cadastrar = $this->Cupom_model->save($infos);
          
          if($cadastrar == TRUE){

            $return = 2;
            print_r($return);
            return $return;
          }else{
            $return = 3;
            print_r($return);
            return $return;
          }
        }
    }

    public function atualizarCupom()
    {
      $id = $this->uri->segment(2);
      $data['cupom'] = $this->Cupom_model->getById($id);
      $this->load->view('partial/header');
      $this->load->view('components/edit-cupom', $data);
      $this->load->view('partial/footer');

      if($this->input->post()){
        $dt = DateTime::createFromFormat('d/m/Y', $this->input->post('vencimento'));
        $data = [
          'valor' => intval($this->input->post('desconto')),
          'quantidade' => intval($this->input->post('quantidade')),
          'vencimento' => $dt->format('Y-m-d'),
          'updated_at' => date('Y-m-d')
        ];

        $this->Cupom_model->update($data, $id);
        redirect(base_url()  .'cupom/' . $id);
      }
    }


    public function deletarCupom()
    {
      $id = $this->uri->segment(2);
      $this->Cupom_model->deleted($id);
      redirect('/');
    }

    public function utilizarCupom()
    {
      
      $cupom = strtoupper($this->uri->segment(2));
      $validar = $this->Cupom_model->validaCupom($cupom);
      if($validar == TRUE){
        $this->Cupom_model->usarCupom($cupom);
        echo 'usado';
      }else{
        echo 'invalido';
      }
    }
}