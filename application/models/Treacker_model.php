<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Treacker_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();//LEMBRAR DE ALTERAR O DB PARA O DE HOMOLOGAÇÃO E DEPOIS PRODUÇÃO
		$this->tracker = $this->load->database('tracker', TRUE);
		$this->load->helper('app');
	}

	public function get_tarefas_concluidas($empresa,$data,$status = null, $ranking)
	{
		if ($status) {
			$status = "AND t.status = '".$status."'";
		}
		
		$tarefas = $this->tracker->query("
		SELECT 
			u.nome as 'agentes',
			COUNT(t.id) as 'tarefas'
		FROM tarefas t
		INNER JOIN users u
		ON u.id = t.autor
		INNER JOIN perfil_usuario p
		ON p.idUsuario = t.autor
		WHERE p.idEmpresa =".$empresa."
		AND t.dataTarefa BETWEEN '".$data['data_ini']."' AND '".$data['data_fim']."'
		".$status."
		GROUP BY t.autor
		ORDER BY COUNT(t.id) ".$ranking."
		LIMIT 5;")->result_array();

		return $tarefas;
	}

	public function get_tarefas_grupo($empresa,$data,$status = null,$ranking)
	{
		if ($status) {
			$status = "AND t.status = '".$status."'";
		}

		$grupos = $this->tracker->query("
		SELECT 
			g.nome as 'grupo',
			COUNT(t.id) as 'tarefas'
		FROM groupMembers gm
		INNER JOIN groups g
		ON g.id = gm.grupo
		INNER JOIN users u
		ON u.id = gm.`user`
		INNER JOIN tarefas t
		ON t.autor = gm.`user`
		WHERE g.empresa =".$empresa."
		AND t.dataTarefa BETWEEN '".$data['data_ini']."' AND '".$data['data_fim']."'
		".$status."
		GROUP BY gm.grupo
		ORDER BY COUNT(t.id) ".$ranking.";")->result_array();
		
		return $grupos;
	}

	public function get_status_atividade($empresa,$data)
	{
		$status = $this->tracker->query("
		SELECT 
			t.status as 'status',
			COUNT(t.id) as 'tarefas'
		FROM tarefas t
		INNER JOIN perfil_usuario p
		ON p.idUsuario = t.autor
		WHERE p.idEmpresa =".$empresa."
		AND t.dataTarefa BETWEEN '".$data['data_ini']."' AND '".$data['data_fim']."'
		GROUP BY t.status
		ORDER BY COUNT(t.id) DESC;")->result_array();

		return $status;
	}

	public function get_kpis_empresa($empresa,$data)
	{
		$tarefas = $this->tracker->query("SELECT COUNT(t.id)
		FROM tarefas t
		INNER JOIN perfil_usuario p
		ON p.idUsuario = t.autor
		WHERE p.idEmpresa =".$empresa."
		AND t.dataTarefa BETWEEN '".$data['data_ini']."' AND '".$data['data_fim']."'
		AND t.status = 'concluida'
		ORDER BY COUNT(t.id) DESC;")->result_array();
		
		$forms = $this->tracker->query("SELECT COUNT(fr.id)
		FROM form_resposta fr
		INNER JOIN formulario f
		ON fr.idForm = f.id
		WHERE f.empresa =".$empresa."
		AND fr.concluida = 1
		AND fr.data BETWEEN '".$data['data_ini']."' AND '".$data['data_fim']."';")->result_array();

		$tempo = $this->tracker->query("
			SELECT AVG(ti.tempo_total)
			FROM tarefas t
			INNER JOIN perfil_usuario p
			ON p.idUsuario = t.autor
			INNER JOIN tarefas_indicadores ti
			ON ti.idTarefa = t.id
			WHERE p.idEmpresa =".$empresa."
			AND t.status = 'concluida'
			AND t.dataTarefa BETWEEN '".$data['data_ini']."' AND '".$data['data_fim']."';")->result_array();

		$dados = array(
			'tarefas' => $tarefas[0]['COUNT(t.id)'],
			'forms' => $forms[0]['COUNT(fr.id)'],
			'tempo_resposta' => $tempo[0]['AVG(ti.tempo_total)']);

		return $dados;
	}

	public function get_form_empresa($empresa,$data)
	{
		$forms = $this->tracker->query("
		SELECT 
			f.titulo as 'forms',
			COUNT(fr.id) as 'respondidos'
		FROM form_resposta fr
		INNER JOIN formulario f
		ON fr.idForm = f.id
		WHERE f.empresa =".$empresa."
		AND fr.concluida = 1
		AND fr.data BETWEEN '".$data['data_ini']."' AND '".$data['data_fim']."'
		GROUP BY f.id
		ORDER BY COUNT(fr.id) desc;")->result_array();

		return $forms;
	}

	public function get_atividades_dias($empresa,$data)
	{
		$atividades = $this->tracker->query("
			SELECT 
				t.dataTarefa as 'data',
				COUNT(t.id) as 'atividades'
			FROM tarefas t
			INNER JOIN perfil_usuario p
			ON p.idUsuario = t.autor
			WHERE p.idEmpresa =".$empresa."
			AND t.dataTarefa BETWEEN '".$data['data_ini']."' AND '".$data['data_fim']."'
			AND t.status = 'concluida'
			GROUP BY t.dataTarefa
			ORDER BY t.dataTarefa ASC;")->result_array();

		return $atividades;
	}

	public function get_executas_pendentes($empresa,$data)
	{
		$executadas = $this->tracker->query("
			SELECT COUNT(t.id)
			FROM tarefas t
			INNER JOIN users u
			ON u.id = t.autor
			WHERE u.empresa = ".$empresa."
			AND t.dataTarefa BETWEEN '".$data['data_ini']."' AND '".$data['data_fim']."'
			AND (t.status = 'concluida' OR t.status = 'malsucedida');")->result_array();

		$pendentes = $this->tracker->query("
			SELECT COUNT(t.id)
			FROM tarefas t
			INNER JOIN users u
			ON u.id = t.autor
			WHERE u.empresa = ".$empresa."
			AND t.dataTarefa BETWEEN '".$data['data_ini']."' AND '".$data['data_fim']."'
			AND (t.status <> 'concluida' AND t.status <> 'malsucedida');")->result_array();

		$execusao = 0;
		$pen = 0;
		$pendentes_id = $this->tracker->query("
			SELECT t.status
			FROM tarefas t
			INNER JOIN users u
			ON u.id = t.autor
			WHERE u.empresa = ".$empresa."
			AND t.dataTarefa BETWEEN '".$data['data_ini']."' AND '".$data['data_fim']."'
			AND (t.status <> 'concluida' AND t.status <> 'malsucedida');")->result_array();
		
		foreach ($pendentes_id as $value) {
			if ($value['status'] == 'inicida') {
				$execusao++;
			} 
			elseif ($value['status'] == 'pendente') {
				$pen++;
			} 
		}	

		$dados = array(
			'executadas' => $executadas[0]['COUNT(t.id)'], //EXECUTADAS
			'pendentes' => $pendentes[0]['COUNT(t.id)'],//PENDENTES
			'execusao' => $execusao,//EM EXECUSAO
			'pen' => $pen, //EM EXECUSÃO MAS ESTAO PENDENTES
			'total' => $executadas[0]['COUNT(t.id)'] + $pendentes[0]['COUNT(t.id)']);

		return $dados;
	}

	public function agentes_online($empresa)
	{
		$agentes = $this->tracker->query("
			SELECT id 
			FROM users 
			WHERE empresa =".$empresa)->result_array();

		$on = 0;
		$off = 0;
		$inicidas = 0;
		$n_inicidas = 0;
		foreach ($agentes as $value) {
			$online = $this->tracker->query("
				SELECT tipo 
				FROM registro_ponto
				WHERE idUsuario =".$value['id']."
				ORDER BY idRegistro 
				DESC LIMIT 1")->result_array();
			
			if (isset($online[0])) {
				if ($online[0]['tipo'] == 1) {
					$status = $this->tracker->query("
						SELECT status 
						FROM tarefas 
						WHERE autor = ".$value['id']." 
						ORDER by termino desc 
						LIMIT 1;")->result_array();

					if (isset($status[0])) {
						if ($status[0]['status'] == 'iniciada') {
							$inicidas++;
						} 
						else {
							$n_inicidas++;
						}
					} 
					else {
						$n_inicidas++;
					}

					$on++;
				} else {
					$off++;
				}
			}
		}

		$dados = array(
			'online' => $on,
			'offline' => $off,
			'em_tarefas' => $inicidas,
			'livre' => $n_inicidas,
			'total' => $on + $off);

		return $dados;
	}

	public function get_km_tarefa($empresa,$data)
	{
		$concluidas = $this->tracker->query("
			SELECT u.id as 'user_id'
			,t.id as 't_id'
			FROM tarefas t
			INNER JOIN users u
			ON u.id = t.autor
			WHERE u.empresa = ".$empresa."
			AND t.dataTarefa BETWEEN '".$data['data_ini']."' AND '".$data['data_fim']."'
			AND (t.status = 'concluida' OR t.status = 'malsucedida');")->result_array();

		foreach ($concluidas as $key => $value) {
			$function = $this->tracker->query("
				SELECT medirKmTarefa(".$value['user_id'].",".$value['t_id'].") as 'km'")->result_array();

			$km_conluido += $function[0]['km'];
			$km_previsto = $this->tracker->query("
				SELECT valor FROM tarefas_log WHERE tipo = 'kmEsperado' AND idTarefa =".$value['t_id'])->result_array();

			$previsto_concluido += $km_previsto[0]['valor']; 
		}

		$dados = array('km_conluido' => $km_conluido);

		$pendentes = $this->tracker->query("
			SELECT u.id as 'user_id'
			,t.id as 't_id'
			FROM tarefas t
			INNER JOIN users u
			ON u.id = t.autor
			WHERE u.empresa = ".$empresa."
			AND t.dataTarefa BETWEEN '".$data['data_ini']."' AND '".$data['data_fim']."'
			AND (t.status <> 'concluida' AND t.status <> 'malsucedida');")->result_array();

		foreach ($pendentes as $key => $value) {
			$function = $this->tracker->query("
				SELECT medirKmTarefa(".$value['user_id'].",".$value['t_id'].") as 'km'")->result_array();

			$km_pendente += $function[0]['km'];

			$km_previsto = $this->tracker->query("
				SELECT valor FROM tarefas_log WHERE tipo = 'kmEsperado' AND idTarefa =".$value['t_id'])->result_array();

			$previsto_pendente += $km_previsto[0]['valor'];
		}

		$dados['km_pendentes'] = $km_pendente;
		$dados['total'] = $km_conluido + $km_pendente;
		$dados['previsto_total'] = $previsto_pendente + $previsto_concluido;
		$dados['desvio'] = $dados['total'] - $dados['previsto_total'];

		return $dados;
	}

	public function status_agente($empresa,$data)
	{	
		$agentes = $this->tracker->query("
			SELECT nome,id,bateria 
			FROM users 
			WHERE empresa =".$empresa."
			AND ativo = 1")->result_array();
		
		foreach ($agentes as $key => $value) {
			$online = $this->tracker->query("
				SELECT tipo 
				FROM registro_ponto
				WHERE idUsuario =".$value['id']."
				ORDER BY idRegistro 
				DESC LIMIT 1")->result_array();

			if (isset($online[0])) {
				if ($online[0]['tipo'] == 1) {
					$agentes[$key]['online'] = 1;
				} else {
					$agentes[$key]['online'] = 0;
				}
			} else {
				$agentes[$key]['online'] = 0;
			}
		}

		foreach ($agentes as $key => $value) {
			$tarefas = $this->tracker->query("
				SELECT COUNT(id) 
				FROM tarefas 
				WHERE autor = ".$value['id'].
				" AND (dataTarefa BETWEEN '".$data['data_ini']."' AND '".$data['data_fim']."');")->result_array();

			if ($tarefas[0]['COUNT(id)'] != 0) {
				$executadas = $this->tracker->query("
					SELECT COUNT(t.id)
					FROM tarefas t
					WHERE autor = ".$value['id']."
					AND t.dataTarefa BETWEEN '".$data['data_ini']."' AND '".$data['data_fim']."'
					AND (t.status = 'concluida' OR t.status = 'malsucedida');")->result_array();

				$pendentes = $this->tracker->query("
					SELECT COUNT(t.id)
					FROM tarefas t
					WHERE autor = ".$value['id']."
					AND t.dataTarefa BETWEEN '".$data['data_ini']."' AND '".$data['data_fim']."'
					AND (t.status <> 'concluida' AND t.status <> 'malsucedida');")->result_array();

				$agentes[$key]['total_tarefas'] = $tarefas[0]['COUNT(id)'];
				$agentes[$key]['executadas'] = round(($executadas[0]['COUNT(t.id)']/$tarefas[0]['COUNT(id)'])*100);
				$agentes[$key]['pendentes'] = round(($pendentes[0]['COUNT(t.id)']/$tarefas[0]['COUNT(id)'])*100);
			} else {
				$agentes[$key]['total_tarefas'] = 0;
				$agentes[$key]['executadas'] = 0;
				$agentes[$key]['pendentes'] = 0;
			}
		}

		foreach ($agentes as $key => $value) {
			$kms = $this->get_km_agente($value['id'],$data);

			$agentes[$key]['kms_total'] = $kms['total'];
			$agentes[$key]['km_pendentes'] = $kms['km_pendentes'];
			$agentes[$key]['km_executado'] = $kms['km_conluido'];
			$agentes[$key]['km_desviado'] = $kms['total_desvio'];
		}

		foreach ($agentes as $key => $value) {
			$grupos = $this->tracker->query("
				SELECT g.nome
				FROM groups g 
				JOIN groupMembers  gm 
				ON gm.grupo = g.id 
				WHERE gm.user =".$value['id'])->result_array();

			$agentes[$key]['grupos'] = $grupos;
		}

		foreach ($agentes as $key => $value) {
			$tempo = $this->tracker->query("
				SELECT AVG(ti.tempo_total) as 'tempo_medio'
				FROM tarefas t
				JOIN tarefas_indicadores ti
				ON t.id = ti.idTarefa
				JOIN users u
				ON u.id = ".$value['id']."
				WHERE  t.dataTarefa BETWEEN '".$data['data_ini']."' AND '".$data['data_fim']."'
				GROUP BY t.autor;")->result_array();
			if (isset($tempo[0]['tempo_medio'])) {
				$agente[$key]['tempo_medio'] = $tempo[0]['tempo_medio'];
			} else {
				$agente[$key]['tempo_medio'] = 0;
			}
			
		}

		return $agentes;
	}

	public function get_km_agente($agente,$data)
	{
		$concluidas = $this->tracker->query("
			SELECT t.id
			FROM tarefas t
			WHERE t.autor =".$agente."
			AND t.dataTarefa BETWEEN '".$data['data_ini']."' AND '".$data['data_fim']."'
			AND (t.status = 'concluida' OR t.status = 'malsucedida');")->result_array();

		foreach ($concluidas as $key => $value) {
			$function = $this->tracker->query("
				SELECT medirKmTarefa(".$agente.",".$value['id'].") as 'km'")->result_array();

			$km_conluido += $function[0]['km'];

			$esperado = $this->tracker->query("
				SELECT valor FROM FROM tarefas_log WHERE tipo = 'kmEsperado' AND idTarefa = ".$value['id'])->result_array();

			$km_esperando += $esperado[0]['valor'];

			
		}

		$dados = array('km_conluido' => $km_conluido);

		$pendentes = $this->tracker->query("
			SELECT t.id
			FROM tarefas t
			WHERE t.autor =".$agente."
			AND t.dataTarefa BETWEEN '".$data['data_ini']."' AND '".$data['data_fim']."'
			AND (t.status <> 'concluida' AND t.status <> 'malsucedida');")->result_array();

		foreach ($pendentes as $key => $value) {
			$function = $this->tracker->query("
				SELECT medirKmTarefa(".$agente.",".$value['id'].") as 'km'")->result_array();

			$km_pendente += $function[0]['km'];

			$esperado_pendente = $this->tracker->query("
				SELECT valor FROM FROM tarefas_log WHERE tipo = 'kmEsperado' AND idTarefa = ".$value['id'])->result_array();

			$km_esperado_pendente += $esperado_pendente[0]['valor'];
		}

		$dados['km_pendentes'] = $km_pendente;
		$dados['total'] = $km_conluido + $km_pendente;
		$dados['total_desvio'] = $km_esperando + $km_esperado_pendente;


		return $dados;
	}

	public function get_tempo_medio_tarefa($empresa,$data,$ranking)
	{
		$tempo = $this->tracker->query("
			SELECT u.nome,AVG(ti.tempo_total) as 'tempo' FROM tarefas t
			JOIN tarefas_indicadores ti
			ON t.id = ti.idTarefa
			JOIN users u
			ON u.id = t.autor
			WHERE u.empresa =".$empresa."
			AND t.dataTarefa BETWEEN '".$data['data_ini']."' AND '".$data['data_fim']."'
			GROUP BY t.autor
			ORDER BY AVG(ti.tempo_total) ".$ranking."
			LIMIT 5;")->result_array();

		return $tempo;
	}

	public function get_km_ranking($empresa,$data,$ranking)
	{
		$agentes = $this->tracker->query("
			SELECT nome,id
			FROM users 
			WHERE empresa =".$empresa."
			AND ativo = 1")->result_array();

		foreach ($agentes as $key => $value) {
			$concluidas = $this->tracker->query("
				SELECT t.id
				FROM tarefas t
				WHERE t.autor =".$value['id']."
				AND t.dataTarefa BETWEEN '".$data['data_ini']."' AND '".$data['data_fim']."'
				AND (t.status = 'concluida' OR t.status = 'malsucedida');")->result_array();

			foreach ($concluidas as $dados) {
				$function = $this->tracker->query("
					SELECT medirKmTarefa(".$value['id'].",".$dados['id'].") as 'km'")->result_array();
				$esperado = $this->tracker->query("
					SELECT valor FROM FROM tarefas_log WHERE tipo = 'kmEsperado' AND idTarefa = ".$dados['id'])->result_array();

				$km_rodado += $function[0]['km'];
				$km_esperado += $esperado[0]['valor'];
			}
			
			$agentes[$key]['desvio'] = $km_esperado - $km_rodado;
		}

		if ($ranking = 'DESC') {
			arsort($agentes);
		} else {
			asort($agentes);
		}

		return $agentes;
	}

	public function fase_tarefas($empresa,$data)
	{
		$tarefas = $this->tracker->query("
			SELECT t.id
			FROM tarefas t
			INNER JOIN users u
			ON u.id = t.autor
			WHERE u.empresa = ".$empresa." 
			AND t.dataTarefa BETWEEN '".$data['data_ini']."' AND '".$data['data_fim']."';")->result_array();

		foreach ($tarefas as $value) {
			$travelDone = $this->tracker->query("
				SELECT time 
				FROM tarefas_log 
				WHERE tipo = 'travelDone' 
				AND idTarefa = ".$value['id'])->result_array();
			if (isset($travelDone[0]['time'])) {
				$dateDone = get_date($travelDone[0]['time']);
			} else {
				$dateDone = date('00-00-0000 00:00:00');
			}
			

			$travelStart = $this->tracker->query("
				SELECT time 
				FROM tarefas_log 
				WHERE tipo = 'travelStarted' 
				AND idTarefa = ".$value['id'])->result_array(); 
			if (isset($travelStart[0]['time'])) {
				$dateStart = get_date($travelStart[0]['time']);
			} else {
				$dateStart = date('00-00-0000 00:00:00');
			}
			

			$inicida = $this->tracker->query("
				SELECT time 
				FROM tarefas_log 
				WHERE tipo = 'iniciada' 
				AND idTarefa = ".$value['id'])->result_array();

			if (isset($inicida[0]['time'])) {
				$dateIniciada = get_date($inicida[0]['time']);
			} else {
				$dateIniciada = date('00-00-0000 00:00:00');
			}
			

			$concluida_malsucedida = $this->tracker->query("
				SELECT time 
				FROM tarefas_log 
				WHERE (tipo = 'concluida'
				OR tipo = 'malsucedida')
				AND idTarefa = ".$value['id'])->result_array();

			if (isset($concluida_malsucedida[0]['time'])) {
				$dateConcluidaMalsucedida = get_date($concluida_malsucedida[0]['time']);
			} else {
				$dateConcluidaMalsucedida = date('00-00-0000 00:00:00');
			}
			
			$deslocamento += dateDiff($dateStart,$dateDone);
			$espera += dateDiff($dateIniciada,$dateDone);
			$tarefa += dateDiff($dateConcluidaMalsucedida,$dateIniciada);
			
		}

		$dados = array(
			'deslocamento' => $deslocamento,
			'espera' => $espera,
			'tarefas' => $tarefa,
			'total' => $espera+$espera+$tarefa);
		
		return $dados;		
	}
}