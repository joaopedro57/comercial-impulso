<?php   
defined('BASEPATH') OR exit('No direct script access allowed');

class Planilha extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Comercial_model');
		$this->load->helper('pipedrive_api');
		$this->load->model("login_model");
		$this->load->library('session');
	}

	public function index()
	{
		$id = $this->input->post('id');
		
		if ($id) {

			$deal = pipedrive_get_deal($id);
			$deal_activitys = pipedrive_get_deal_updates($id);
			$org = pipedrive_get_organization($deal['data']['org_id']['value']);
			
		
			$mercado = $this->Comercial_model->campo($deal['data'][PIPEDRIVE_FIELD_MERCADO]);
			$origem  = $this->Comercial_model->campo($deal['data'][PIPEDRIVE_FIELD_ORIGEM]);
						


			foreach ($deal_activitys['data'] as $data) {
				if(isset($data['data']['type']) && $data['data']['type'] == 'reunio_realizada'){
					$data_diagnostico = date_create($data['data']['due_date']);		

				   	if(isset($data_diagnostico)) {
							
							$data_ganho = date_create($deal['data']['last_activity']['due_date']);
							$data_vencimento = date_create($org['data'][PIPEDRIVE_FIELD_DATA_VENCIMENTO]);

							$dados_planilha['dados'] = array (
								'numero' 			=> 1 ,
								'cliente' 			=> $deal['data']['title'] ,
								'link_crm' 			=> "-" ,
								'link_pipe' 		=> "https://solides.pipedrive.com/deal/".$id ,
								'plano'				=> "-",
								'mercado' 			=> $mercado['0']['campo'] ,
								'sdr' 				=> " " ,
								'closer' 			=> " ",
								'valor_venda' 		=> $deal['data']['value'] ,
								'data_diagnostico' 	=> date_format($data_diagnostico, 'd/m') ,
								'data_ganho'		=> date_format($data_ganho, 'd/m') ,
								'ciclo'				=> " " ,
								'resumo_cs'			=> $org['data'][PIPEDRIVE_FIELD_RESUMO_FECHAMENTO] ,
								'pagamento'			=> date_format($data_vencimento,'d/m') ,
								'parcela'			=> "-" ,
								'parcela_atrasada'	=> 0 ,
								'n_funcionarios'	=> $deal['data'][PIPEDRIVE_FIELD_QUANT_COLABORADOR] ,
								'origem'			=> $origem['0']['campo'] ,
								'condicoes'			=> $org['data'][PIPEDRIVE_FIELD_CONDICAO_FECHAMENTO] ,
							);


						$this->load->view('planilha',$dados_planilha);
						return true;
					}
				}
			}
		}
		
		$this->load->view('planilha');
	}
}
