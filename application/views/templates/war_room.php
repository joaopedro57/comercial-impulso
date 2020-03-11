<div class="wrapper wrapper-content animated fadeIn">
	<div class="p-w-md m-t-sm">
		<div class="row">
			<div class="col-lg-3">
				<div class="widget style1 yellow-bg" style="background-color: #23c654">
	                <div class="row vertical-align text-center">
	                    <h3 class="m-b-xs">Leads No Funil de SDR</h3>
	                    <br>
	                <div class="col-xs-3">
	                    <i class="fa fa-thumbs-up fa-3x"></i>
	                </div>
	                <div class="col-xs-9 text-right">
	                    <h2 class="font-bold"><?php echo $funilSdr['0']['COUNT(id)'] ?></h2>
	                </div>
	            	</div>
	            </div>
			</div>
			<div class="col-lg-3 text-center">
				<div class="widget style1 lazur-bg">
					<div class="row vertical-align">
						<h3 class="m-b-xs">Leads No Funil de Closer</h3>
						<br>
					<div class="col-xs-3">
						<i class="fa fa-user fa-3x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<h2 class="font-bold"><?php echo $funilCloser['0']['COUNT(id)'] ?></h2>
					</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 text-center">
				<div class="widget style1 navy-bg">
					<div class="row vertical-align">
						<h3 class="m-b-xs">Tx de Fechamento Atual</h3>
						<br>
					<div class="col-xs-3">
						<i class="fa fa-chart-line fa-3x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<h2 class="font-bold"><?php echo round($leadsGanhosGeral['0']['COUNT(id)']*100/$leadsGeral['0']['Proposta'])."%" ?></h2>
					</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 text-center">
				<div class="widget style1 yellow-bg">
					<div class="row vertical-align">
						<h3 class="m-b-xs">MQL Gerado no Mês</h3>
						<br>
					<div class="col-xs-3">
						<i class="fas fa-chart-pie fa-3x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<h2 class="font-bold"><?php echo $leadsMes['0']['COUNT(id)'] ?></h2>
					</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-12 text-center" style="margin: 45px 0">
            <div class="col-sm-6">
                <table class="table text-center">
                    <tr> 
						<td>
							<h5 class="m-b-xs">Leads em Banco de Leads</h5>
							<h1 class="no-margins"><?php echo $leadsBanco2['0']['COUNT(id)'] ?></h1>
						</td>
						<td>
							<h5 class="m-b-xs">Leads em Conexão</h5>
							<h1 class="no-margins"><?php echo $leadsConexao2['0']['COUNT(id)'] ?></h1>
						</td>
						<td>
							<h5 class="m-b-xs">Leads em Solução</h5>
							<h1 class="no-margins"><?php echo $leadsSolucao2['0']['COUNT(id)'] ?></h1>
						</td>
                    </tr>
                    <tr>
						<td>
							<h5 class="m-b-xs">Leads em Pesquisa</h5>
							<h1 class="no-margins"><?php echo $leadsPesquisa2['0']['COUNT(id)'] ?></h1>
						</td>
						<td>		
							<h5 class="m-b-xs">Leads em Reunião Agendada</h5>
							<h1 class="no-margins"><?php echo $leadsAgendamento2['0']['COUNT(id)'] ?></h1>
						</td>
                        <td>
                            <h5 class="m-b-xs">Leads em Negociação</h5>
                            <h1 class="no-margins"><?php echo $leadsProposta2['0']['COUNT(id)'] ?></h1>
                        </td>
                    </tr>
                   	<tr>
                        <td>
                            <h5 class="m-b-xs">Leads em Prospecção</h5>
                            <h1 class="no-margins"><?php echo $leadsProsp2['0']['COUNT(id)'] ?></h1>
                        </td>
                      	<td>
                            <h5 class="m-b-xs">Leads em Diagnostico</h5>
                            <h1 class="no-margins"><?php echo $leadsDiagnostico2['0']['COUNT(id)'] ?></h1>
                        </td>
                         <td>
                            <h5 class="m-b-xs">Leads em Abertura</h5>
                            <h1 class="no-margins"><?php echo $leadsAbertura2['0']['COUNT(id)'] ?></h1>
                         </td>
                    </tr> 
                </table>
                <div class="col-lg-12 text-center">
                    <div id="gauge"></div>
                </div>
            </div>
        	<div class="col-lg-6">
        		<div class="widget style1 red-bg">
					<div class="row vertical-align">
						<h3 class="m-b-xs">Total de Perdidos no Mês</h3>
						<br>
					<div class="col-xs-3">
						<i class="fas fa-chart-pie fa-3x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<h2 class="font-bold"><?php echo $leadsGeral['0']['Perdidos'] ?></h2>
					</div>
					</div>
				</div>
	            <br><br>
	            <div>
		            <h2>Principais motivos de Perda</h2>
		            <canvas id="perdido" height="140"></canvas>
	        	</div>
			</div>
        </div>
		<div class="row">
			<div class="col-lg-6 text-center">
				<h1>Leads Criados nesse Mês</h1>
					<center>
						<table class="table text-center"> 
							<tr>
							<td><h1>MQL</h1></td>
							<td><h1>SQL</h1></td>
							<td><h1>OPs</h1></td>
							</tr>
							<tr>
							<td>
								<h5 class="m-b-xs">Pesquisa </h5>
								<h1 ><?php echo $leadsPesquisa['0']['COUNT(id)'] ?> </h1>
								<?php if ($leadsBanco['0']['COUNT(id)'] == 0): ?>
								<div class="font-bold text-navy">0 <i class="fa fa-bolt"></i></div>
								<?php else: ?>
								<div class="font-bold text-navy"><?php echo round(($leadsPesquisa['0']['COUNT(id)']*100)/$leadsBanco['0']['COUNT(id)']),"%"  ?> <i class="fa fa-bolt"></i></div>
								<?php endif ?>
							</td>
							<td>
								<h5 class="m-b-xs">Agendamento </h5>
								<h1 ><?php echo $leadsAgendamento['0']['COUNT(id)'] ?></h1>
								<?php if ($leadsConexao['0']['COUNT(id)'] == 0): ?>
								<div class="font-bold text-navy">0 <i class="fa fa-bolt"></i></div>
								<?php else: ?>
								<div class="font-bold text-navy"><?php echo round(($leadsAgendamento['0']['COUNT(id)']*100)/$leadsConexao['0']['COUNT(id)']),"%"  ?> <i class="fa fa-bolt"></i></div>
								<?php endif ?>
							</td>
							<td>
								<h5 class="m-b-xs">Proposta </h5>
								<h1 ><?php echo $leadsProposta['0']['COUNT(id)'] ?></h1>
								<?php if ($leadsSolucao['0']['COUNT(id)'] == 0): ?>
								<div class="font-bold text-navy">0 <i class="fa fa-bolt"></i></div>
								<?php else: ?>
								<div class="font-bold text-navy"><?php echo round(($leadsProposta['0']['COUNT(id)']*100)/$leadsSolucao['0']['COUNT(id)']),"%"  ?> <i class="fa fa-bolt"></i></div>
								<?php endif ?>
							</td>
							</tr>
							<tr>
							<td>
								<h5 class="m-b-xs">Prospecção</h5>
								<h1 ><?php echo $leadsProsp['0']['COUNT(id)'] ?></h1>
								<?php if ($leadsPesquisa['0']['COUNT(id)'] == 0): ?>
								<div class="font-bold text-navy">0 <i class="fa fa-bolt"></i></div>
								<?php else: ?>
								<div class="font-bold text-navy"><?php echo round(($leadsProsp['0']['COUNT(id)']*100)/$leadsPesquisa['0']['COUNT(id)']),"%"  ?> <i class="fa fa-bolt"></i></div>
								<?php endif ?>
							</td>
							<td>
								<h5 class="m-b-xs">Diagnostico(Show) </h5>
								<h1 ><?php echo $leadsDiagnostico['0']['COUNT(id)'] ?></h1>
								<?php if ($leadsAgendamento['0']['COUNT(id)'] == 0): ?>
								<div class="font-bold text-navy">0 <i class="fa fa-bolt"></i></div>
								<?php else: ?>
								<div class="font-bold text-navy"><?php echo round(($leadsDiagnostico['0']['COUNT(id)']*100)/$leadsAgendamento['0']['COUNT(id)']),"%"  ?> <i class="fa fa-bolt"></i></div>
								<?php endif ?>
							</td>
							<td>
								<h5 class="m-b-xs">Abertura </h5>
								<h1 ><?php echo $leadsAbertura['0']['COUNT(id)'] ?></h1>
								<?php if ($leadsProposta['0']['COUNT(id)'] == 0): ?>
								<div class="font-bold text-navy">0 <i class="fa fa-bolt"></i></div> 
								<?php else: ?>
								<div class="font-bold text-navy"><?php echo round(($leadsAbertura['0']['COUNT(id)']*100)/$leadsProposta['0']['COUNT(id)']),"%"  ?> <i class="fa fa-bolt"></i></div>
								<?php endif ?>
							</td>
							</tr>
							<tr>
							<td>
								<h5 class="m-b-xs">Conexão </h5>
								<h1 ><?php echo $leadsConexao['0']['COUNT(id)'] ?></h1>
								<?php if ($leadsProsp['0']['COUNT(id)'] == 0): ?>
								<div class="font-bold text-navy">0 <i class="fa fa-bolt"></i></div>
								<?php else: ?>
								<div class="font-bold text-navy"><?php echo round(($leadsConexao['0']['COUNT(id)']*100)/$leadsProsp['0']['COUNT(id)']),"%"  ?> <i class="fa fa-bolt"></i></div>
								<?php endif ?>
							</td>
							<td>
								<h5 class="m-b-xs">Solução</h5>
								<h1 ><?php echo $leadsSolucao['0']['COUNT(id)'] ?></h1>
								<?php if ($leadsDiagnostico['0']['COUNT(id)'] == 0): ?>
								<div class="font-bold text-navy">0 <i class="fa fa-bolt"></i></div>
								<?php else: ?>
								<div class="font-bold text-navy"><?php echo round(($leadsSolucao['0']['COUNT(id)']*100)/$leadsDiagnostico['0']['COUNT(id)']),"%"  ?> <i class="fa fa-bolt"></i></div>
								<?php endif ?>
							</td>
							<td>
								<h5 class="m-b-xs">Ganhos no mês</h5>
								<h1 ><?php echo $leadsGanhos['0']['COUNT(id)'] ?></h1>
								<?php if ($leadsAbertura['0']['COUNT(id)'] == 0): ?>
								<div class="font-bold text-navy">0 <i class="fa fa-bolt"></i></div>
								<?php else: ?>
								<div class="font-bold text-navy"><?php echo round(($leadsGanhos['0']['COUNT(id)']*100)/$leadsAbertura['0']['COUNT(id)']),"%"  ?> <i class="fa fa-bolt"></i></div>
								<?php endif ?>
							</td>
							</tr>
						</table>
					</center>
			</div>
			
			<div class="col-lg-6 text-center">
				<h1>Funil Geral do Mês</h1>
				<center>
						<table class="table text-center"> 
							<tr>
							<td><h1>MQL</h1></td>
							<td><h1>SQL</h1></td>
							<td><h1>OPs</h1></td>
							</tr>
							<tr>
							<td>
								<h5 class="m-b-xs">Pesquisa </h5>
								<h1 ><?php echo $leadsGeral['0']['Pesquisa'] ?> </h1>
								<?php if ($leadsGeral['0']['Banco'] == 0): ?>
								<div class="font-bold text-navy">0 <i class="fa fa-bolt"></i></div>
								<?php else: ?>
								<div class="font-bold text-navy"><?php echo round(($leadsGeral['0']['Pesquisa']*100)/$leadsGeral['0']['Banco']),"%"  ?> <i class="fa fa-bolt"></i></div>
								<?php endif ?>
							</td>
							<td>
								<h5 class="m-b-xs">Agendamento </h5>
								<h1 ><?php echo $leadsGeral['0']['Agendamento'] ?></h1>
								<?php if ($leadsGeral['0']['Conexao'] == 0): ?>
								<div class="font-bold text-navy">0 <i class="fa fa-bolt"></i></div>
								<?php else: ?>
								<div class="font-bold text-navy"><?php echo round(($leadsGeral['0']['Agendamento']*100)/$leadsGeral['0']['Conexao']),"%"  ?> <i class="fa fa-bolt"></i></div>
								<?php endif ?>
							</td>
							<td>
								<h5 class="m-b-xs">Proposta </h5>
								<h1 ><?php echo $leadsGeral['0']['Proposta'] ?></h1>
								<?php if ($leadsGeral['0']['Solucao'] == 0): ?>
								<div class="font-bold text-navy">0 <i class="fa fa-bolt"></i></div>
								<?php else: ?>
								<div class="font-bold text-navy"><?php echo round(($leadsGeral['0']['Proposta']*100)/$leadsGeral['0']['Solucao']),"%"  ?> <i class="fa fa-bolt"></i></div>
								<?php endif ?>
							</td>
							</tr>
							<tr>
							<td>
								<h5 class="m-b-xs">Prospecção</h5>
								<h1 ><?php echo $leadsGeral['0']['Prospccao'] ?></h1>
								<?php if ($leadsGeral['0']['Pesquisa'] == 0): ?>
								<div class="font-bold text-navy">0 <i class="fa fa-bolt"></i></div>
								<?php else: ?>
								<div class="font-bold text-navy"><?php echo round(($leadsGeral['0']['Prospccao']*100)/$leadsGeral['0']['Pesquisa']),"%"  ?> <i class="fa fa-bolt"></i></div>
								<?php endif ?>
							</td>
							<td>
								<h5 class="m-b-xs">Diagnostico(Show) </h5>
								<h1 ><?php echo $leadsGeral['0']['Diagnostico'] ?></h1>
								<?php if ($leadsGeral['0']['Agendamento'] == 0): ?>
								<div class="font-bold text-navy">0 <i class="fa fa-bolt"></i></div>
								<?php else: ?>
								<div class="font-bold text-navy"><?php echo round(($leadsGeral['0']['Diagnostico']*100)/$leadsGeral['0']['Agendamento']),"%"  ?> <i class="fa fa-bolt"></i></div>
								<?php endif ?>
							</td>
							<td>
								<h5 class="m-b-xs">Abertura </h5>
								<h1 ><?php echo $leadsGeral['0']['Abertura'] ?></h1>
								<?php if ($leadsGeral['0']['Proposta'] == 0): ?>
								<div class="font-bold text-navy">0 <i class="fa fa-bolt"></i></div> 
								<?php else: ?>
								<div class="font-bold text-navy"><?php echo round(($leadsGeral['0']['Abertura']*100)/$leadsGeral['0']['Proposta']),"%"  ?> <i class="fa fa-bolt"></i></div>
								<?php endif ?>
							</td>
							</tr>
							<tr>
							<td>
								<h5 class="m-b-xs">Conexão </h5>
								<h1 ><?php echo $leadsGeral['0']['Conexao'] ?></h1>
								<?php if ($leadsGeral['0']['Prospccao'] == 0): ?>
								<div class="font-bold text-navy">0 <i class="fa fa-bolt"></i></div>
								<?php else: ?>
								<div class="font-bold text-navy"><?php echo round(($leadsGeral['0']['Conexao']*100)/$leadsGeral['0']['Prospccao']),"%"  ?> <i class="fa fa-bolt"></i></div>
								<?php endif ?>
							</td>
							<td>
								<h5 class="m-b-xs">Solução</h5>
								<h1 ><?php echo $leadsGeral['0']['Solucao'] ?></h1>
								<?php if ($leadsGeral['0']['Diagnostico'] == 0): ?>
								<div class="font-bold text-navy">0 <i class="fa fa-bolt"></i></div>
								<?php else: ?>
								<div class="font-bold text-navy"><?php echo round(($leadsGeral['0']['Solucao']*100)/$leadsGeral['0']['Diagnostico']),"%"  ?> <i class="fa fa-bolt"></i></div>
								<?php endif ?>
							</td>
							<td>
								<h5 class="m-b-xs">Ganhos no mês</h5>
								<h1 ><?php echo $leadsGanhosGeral['0']['COUNT(id)'] ?></h1>
								<?php if ($leadsGeral['0']['Proposta'] == 0): ?>
								<div class="font-bold text-navy">0 <i class="fa fa-bolt"></i></div>
								<?php else: ?>
								<div class="font-bold text-navy"><?php echo round(($leadsGanhosGeral['0']['COUNT(id)']*100)/$leadsGeral['0']['Proposta']),"%"  ?> <i class="fa fa-bolt"></i></div>
								<?php endif ?>
							</td>
							</tr>
						</table>
					</center>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
				<div class="ibox-content text-center">
	                <div>
	                	<h2>Principais Mercados</h2>
	                    <canvas id="mercado" height="140"></canvas>
	                </div>
            	</div>
			</div>
			<div class="col-lg-6">
				<div class="ibox-content text-center">
	                <div>
	                	<h2>Principais Origens</h2>
	                    <canvas id="origem" height="140"></canvas>
	                </div>
            	</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<form action="" method="post">
					<div class="col-lg-3"></div>
					<div class="col-lg-6 text-center">
						<center>
							<div class="inbox-content">
								<h2>Selecione a Conversão:</h2>
								<select class="form-control m-b" name="conversao">
										<option>Selecione: </option>
										<option>lead_scoring_perfil_a</option>
										<option>lead_scoring_perfil_b</option>
										<option>lead_scoring_perfil_c</option>
								</select>
								<div class="form-group" id="data_5">
		                            <div class="input-daterange input-group text-center" id="datepicker">
		                                <input type="text" class="input-sm form-control" name="start" value="<?php echo date("m/01/Y") ?>"/>
		                                <span class="input-group-addon">to</span>
		                                <input type="text" class="input-sm form-control" name="end" value="<?php echo date("m/d/Y") ?>" />
		                            </div>
		                        </div>
		                        <button class="btn btn-primary" value="Submit" type="submit">Pesquisar</button>
							</div>
						</center>
					</div>
					<div class="col-lg-3"></div>
				</form>
			</div>
		</div>
		<br><br>
		<?php if ($tx_ultima_conversao != 0): ?>
			<div class="row">
				<div class="col-lg-12">
					<div class="col-lg-8">
						<table class="table text-center">
							<tr>
								<td><h1>MQL</h1></td>
								<td><h1>SQL</h1></td>
								<td><h1>OPs</h1></td>
							</tr>
							<tr>
							<td>
								<h5 class="m-b-xs">Pesquisa </h5>
								<h1 ><?php echo $tx_ultima_conversao['0']['Pesquisa'] ?> </h1>
								<?php if ($tx_ultima_conversao['0']['Banco'] == 0): ?>
								<div class="font-bold text-navy">0 <i class="fa fa-bolt"></i></div>
								<?php else: ?>
								<div class="font-bold text-navy"><?php echo round(($tx_ultima_conversao['0']['Pesquisa']*100)/$tx_ultima_conversao['0']['Banco']),"%"  ?> <i class="fa fa-bolt"></i></div>
								<?php endif ?>
							</td>
							<td>
								<h5 class="m-b-xs">Agendamento </h5>
								<h1 ><?php echo $tx_ultima_conversao['0']['Agendamento'] ?></h1>
								<?php if ($tx_ultima_conversao['0']['Conexao'] == 0): ?>
								<div class="font-bold text-navy">0 <i class="fa fa-bolt"></i></div>
								<?php else: ?>
								<div class="font-bold text-navy"><?php echo round(($tx_ultima_conversao['0']['Agendamento']*100)/$tx_ultima_conversao['0']['Conexao']),"%"  ?> <i class="fa fa-bolt"></i></div>
								<?php endif ?>
							</td>
							<td>
								<h5 class="m-b-xs">Proposta </h5>
								<h1 ><?php echo $tx_ultima_conversao['0']['Proposta'] ?></h1>
								<?php if ($tx_ultima_conversao['0']['Solucao'] == 0): ?>
								<div class="font-bold text-navy">0 <i class="fa fa-bolt"></i></div>
								<?php else: ?>
								<div class="font-bold text-navy"><?php echo round(($tx_ultima_conversao['0']['Proposta']*100)/$tx_ultima_conversao['0']['Solucao']),"%"  ?> <i class="fa fa-bolt"></i></div>
								<?php endif ?>
							</td>
							</tr>
							<tr>
							<td>
								<h5 class="m-b-xs">Prospecção</h5>
								<h1 ><?php echo $tx_ultima_conversao['0']['Prospccao'] ?></h1>
								<?php if ($tx_ultima_conversao['0']['Pesquisa'] == 0): ?>
								<div class="font-bold text-navy">0 <i class="fa fa-bolt"></i></div>
								<?php else: ?>
								<div class="font-bold text-navy"><?php echo round(($tx_ultima_conversao['0']['Prospccao']*100)/$tx_ultima_conversao['0']['Pesquisa']),"%"  ?> <i class="fa fa-bolt"></i></div>
								<?php endif ?>
							</td>
							<td>
								<h5 class="m-b-xs">Diagnostico(Show) </h5>
								<h1 ><?php echo $tx_ultima_conversao['0']['Diagnostico'] ?></h1>
								<?php if ($tx_ultima_conversao['0']['Agendamento'] == 0): ?>
								<div class="font-bold text-navy">0 <i class="fa fa-bolt"></i></div>
								<?php else: ?>
								<div class="font-bold text-navy"><?php echo round(($tx_ultima_conversao['0']['Diagnostico']*100)/$tx_ultima_conversao['0']['Agendamento']),"%"  ?> <i class="fa fa-bolt"></i></div>
								<?php endif ?>
							</td>
							<td>
								<h5 class="m-b-xs">Abertura </h5>
								<h1 ><?php echo $tx_ultima_conversao['0']['Abertura'] ?></h1>
								<?php if ($tx_ultima_conversao['0']['Proposta'] == 0): ?>
								<div class="font-bold text-navy">0 <i class="fa fa-bolt"></i></div> 
								<?php else: ?>
								<div class="font-bold text-navy"><?php echo round(($tx_ultima_conversao['0']['Abertura']*100)/$tx_ultima_conversao['0']['Proposta']),"%"  ?> <i class="fa fa-bolt"></i></div>
								<?php endif ?>
							</td>
							</tr>
							<tr>
							<td>
								<h5 class="m-b-xs">Conexão </h5>
								<h1 ><?php echo $tx_ultima_conversao['0']['Conexao'] ?></h1>
								<?php if ($tx_ultima_conversao['0']['Prospccao'] == 0): ?>
								<div class="font-bold text-navy">0 <i class="fa fa-bolt"></i></div>
								<?php else: ?>
								<div class="font-bold text-navy"><?php echo round(($tx_ultima_conversao['0']['Conexao']*100)/$tx_ultima_conversao['0']['Prospccao']),"%"  ?> <i class="fa fa-bolt"></i></div>
								<?php endif ?>
							</td>
							<td>
								<h5 class="m-b-xs">Solução</h5>
								<h1 ><?php echo $tx_ultima_conversao['0']['Solucao'] ?></h1>
								<?php if ($tx_ultima_conversao['0']['Diagnostico'] == 0): ?>
								<div class="font-bold text-navy">0 <i class="fa fa-bolt"></i></div>
								<?php else: ?>
								<div class="font-bold text-navy"><?php echo round(($tx_ultima_conversao['0']['Solucao']*100)/$tx_ultima_conversao['0']['Diagnostico']),"%"  ?> <i class="fa fa-bolt"></i></div>
								<?php endif ?>
							</td>
							</tr>
						</table>
					</div>
					<div class="col-lg-4">
						<div class="col-lg-12 text-center">
							<div class="widget style1 yellow-bg">
								<div class="row vertical-align">
									<h3 class="m-b-xs">MQL Gerado</h3>
									<br>
								<div class="col-xs-3">
									<i class="fa fa-user fa-3x"></i>
								</div>
								<div class="col-xs-9 text-right">
									<h2 class="font-bold"><?php echo $tx_ultima_conversao['0']['Banco'] ?></h2>
								</div>
								</div>
							</div>
						</div>
						<div class="col-lg-12 text-center">
							<div class="widget style1 navy-bg">
								<div class="row vertical-align">
									<h3 class="m-b-xs">Ganhos</h3>
									<br>
								<div class="col-xs-3">
									<i class="fa fa-user fa-3x"></i>
								</div>
								<div class="col-xs-9 text-right">
									<h2 class="font-bold"><?php echo $tx_ultima_conversao['0']['Ganho'] ?></h2>
								</div>
								</div>
							</div>
						</div>
						<div class="col-lg-12 text-center">
							<div class="widget style1 red-bg">
								<div class="row vertical-align">
									<h3 class="m-b-xs">Perdido</h3>
									<br>
								<div class="col-xs-3">
									<i class="fa fa-user fa-3x"></i>
								</div>
								<div class="col-xs-9 text-right">
									<h2 class="font-bold"><?php echo $tx_ultima_conversao['0']['Lost'] ?></h2>
								</div>
								</div>
							</div>
						</div>
					</div>	
				</div>
			</div>
		<?php endif ?>
	</div>
	<div> <iframe width="933" height="700" src="https://app.powerbi.com/view?r=eyJrIjoiMTYyOGJkZmUtZDNjZS00OGZjLTk3ZTYtNDNmZTZiYzNhYWUwIiwidCI6ImU3YTk0ZmQ1LWU3MDQtNGRiMy05ODg2LTY0NDY5YjliMDBhZCJ9" frameborder="0" allowFullScreen="true"></iframe> </div>
</div>