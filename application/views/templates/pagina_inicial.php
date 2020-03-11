  <?php $mrrTotal = 1219000;  //valores que não estão no banco de dados

    $porcTotal2018 = round(($valorTotal['0']['SUM(value)'])*100/$mrrTotal)."%"; 
    if ($valor['0']['SUM(value)'] != 0) {
         $tkt = $valor['0']['SUM(value)']/$nConta['0']['count(id)'];
    }
   else {
    $tkt = 0;
   }
    ?> 

<div>
    <!-- Conteudo da pagina -->
    <div>
        <!-- Texto da parte de cima, MRR, MQL e etc.. -->
        <div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-3">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <span class="label label-info pull-right"><?php echo date("d/m/y"); ?></span>
                            <h5>MRR </h5>
                        </div>
                        <div class="ibox-content text-center">
                            <h1 class="no-margins">
                                <?php echo "R$", number_format($valor['0']['SUM(value)'] ,2, ',' , '.'); ?>
                            </h1>
                            <div class="stat-percent font-bold text-success"><?php echo round(($valor['0']['SUM(value)']*100)/($somaMetas['0']['meta'])),"%" ; ?><i class="fa fa-bolt"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <span class="label label-info pull-right"><?php echo date("d/m/y"); ?></span>
                            <h5>Ticket Médio</h5>
                        </div>
                        <div class="ibox-content text-center">
                            <h1 class="no-margins">
                                <?php if ($valor['0']['SUM(value)'] == 0): ?>
                                    <?php echo "R$0,00" ?>
                                <?php else: ?>
                                    <?php echo "R$",number_format(($valor['0']['SUM(value)'])/$nConta['0']['count(id)'],2, ',' , '.'); ?>
                                <?php endif ?>
                            <?php if ($tkt >= $tktMedioAnterior['0']['SUM(value)/COUNT(id)']): ?>
                                <div class="stat-percent font-bold text-navy"><i class="fas fa-level-up-alt"></i></div> 
                            <?php else: ?>
                                <div class="stat-percent font-bold text-danger"><i class="fas fa-level-down-alt"></i></div>
                            <?php endif ?>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title text-center">
                            <span class="label label-info pull-right"><?php echo date("d/m/y"); ?></span>
                            <h5>Contas Vendidas</h5>
                        </div>
                        <div class="ibox-content text-center">
                            <h1 class="no-margins">
                                <?php echo $nConta['0']['count(id)'] ?>
                                <?php if ($nConta['0']['count(id)']>= $nContaAnterior['0']['count(id)']): ?>
                                <div class="stat-percent font-bold text-navy"><i class="fas fa-level-up-alt"></i></div> 
                                <?php else: ?>
                                <div class="stat-percent font-bold text-danger"><i class="fas fa-level-down-alt"></i></div>
                                <?php endif ?>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title text-center">
                            <span class="label label-info pull-right"><?php echo date("d/m/y"); ?></span>
                            <h5>Ciclo de Venda Médio</h5>
                        </div>
                        <div class="ibox-content text-center">
                            <h1 class="no-margins">
                                <?php echo round($media_do_ciclo['0']['SUM(ciclo_venda)/COUNT(id)']); ?>                      
                            <?php if ($media_do_ciclo['0']['SUM(ciclo_venda)/COUNT(id)'] >= $ciclo_anterior['0']['SUM(ciclo_venda)/COUNT(id)']): ?>
                                <div class="stat-percent font-bold text-danger"><i class="fas fa-level-down-alt"></i></div> 
                            <?php else: ?>
                                <div class="stat-percent font-bold text-navy"><i class="fas fa-level-up-alt"></i></div>
                            <?php endif ?>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Texto do grafico e % lateral -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Projeção da Meta do Ano</h5>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-lg-9">
                                    <div id="grafico-pagina-inicial"></div> <!-- GRAFICO DE META/MES -->
                                    </div>    
                                    <div class="col-lg-3">
                                    <ul class="stat-list">
                                        <li>
                                            <h2 class="no-margins">R$294.422,80</h2>
                                            <small>2017</small>
                                            <div class="stat-percent">98% </div>
                                            <div class="progress progress-mini">
                                                <div style="width: 98%;" class="progress-bar"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <h2 class="no-margins ">R$499.534,29</h2>
                                            <small>2018</small>
                                            <div class="stat-percent">95% </div>
                                            <div class="progress progress-mini">
                                                <div style="width: 95%;" class="progress-bar"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <h2 class="no-margins ">
                                                <?php echo "R$", number_format($valorTotal['0']['SUM(value)'],2, ',' , '.'); ?>
                                            </h2>
                                            <small>2019</small>
                                            <div class="stat-percent">
                                                <?php echo $porcTotal2018 ?> </div>
                                            <div class="progress progress-mini">
                                                <div style="width:<?php echo $porcTotal2018  ?>;" class="progress-bar"></div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-6">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Meta Semanal</h5>
                            </div>
                            <div class="ibox-content">
                                <div>
                                    <canvas id="barChart" height="140"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Ticket Médio e Nº de Contas no Ano</h5>
                            </div>
                            <div class="ibox-content">
                                <div>
                                    <canvas id="tkt" height="140"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tabelas -->
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="table-responsive">
                <div class="ibox-content">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Closer</th>
                                <th>Meta de Vendas</th>
                                <th>Vendas</th>
                                <th>Novas Contas</th>
                                <th>Ticket Médio</th>
                                <th>Ciclo de venda do mês(dias)</th>
                                <th>% da meta</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($closers as $dados1): ?>
                            <tr>
                                <td class="client-avatar">
                                    <img alt="image" src="<?php echo asset(), $dados1['img'] ?>" >
                                </td>
                                <td>
                                    <?php echo $dados1['closer'];  ?>
                                </td>
                                <td><?php echo "R$", number_format($dados1['meta'],2, ',' , '.'); ?></td>
                                <td>
                                    <?php echo "R$", number_format($dados1['Total Vendido'],2, ',' , '.');  ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $dados1['Total de Contas'];  ?>
                                </td>
                                <td class="text-center">
                                    <?php echo "R$", number_format($dados1['Total Vendido']/$dados1['Total de Contas'],2, ',' , '.');  ?>
                                </td>
                                <td class="text-center">
                                    <?php echo round($dados1['Ciclo de Venda']/$dados1['Total de Contas']);?>
                                </td>
                                <?php if ($dados1['meta'] < 1): ?>
                                <td class="text-center">0%</td>
                                <?php else: ?>
                                <td class="text-center"><?php echo round($dados1['Total Vendido']*100/$dados1['meta'])."%" ?></td>
                                <?php endif ?>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title" align="center">
                        <h5>Ranking # MRR mês</h5>
                    </div>
                    <div class="ibox-content">

                        <table class="table table-bordered">

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Closer</th>
                                    <th>MRR</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $posicao = 1;  ?>
                                <?php foreach ($mrrRankin as $mrrR):?>

                                <tr>
                                    <td><?php echo $posicao; ?></td>
                                    <td><?php echo $mrrR['closer']; ?></td>
                                    <td><?php echo "R$", number_format($mrrR['Total Vendido'],2, ',' , '.');  ?></td>
                                    <?php $posicao++; ?>
                                </tr>

                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Ranking # tkt médio mês </h5>
                    </div>
                    <div class="ibox-content">

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Closer</th>
                                    <th>tkt médio</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $posicao2 = 1;  ?>
                                <?php foreach ($tktMedio as $tkt):?>

                                <tr>
                                    <td>
                                        <?php echo $posicao2; ?>
                                    </td>
                                    <td>
                                        <?php echo $tkt['closer']; ?>
                                    </td>
                                    <td>
                                        <?php echo "R$", number_format($tkt['tkt medio'],2, ',' , '.');  ?>
                                    </td>
                                    <?php $posicao2++ ?>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>  
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title" align="center">
                        <h5>Ranking # ciclo médio <?php echo date("Y") ?></h5>
                    </div>
                <div class="ibox-content">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Closer</th>
                                <th>dias</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $posicao3 = 1;  ?>
                        <?php foreach ($ciclo_medio as $ciclo ):?>
                        <tr>
                            <td>
                                <?php echo $posicao3 ?>
                            </td>
                            <td>
                                <?php echo $ciclo['closer']; ?>
                            </td>
                            <td>
                                <?php echo round($ciclo['ciclo'])?>
                            </td>
                                <?php $posicao3++ ?>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Ranking # acúmulo <?php echo date("Y") ?> </h5>
                    </div>
                    <div class="ibox-content">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Closer</th>
                                    <th>Total Vendido</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $posicao4 = 1;  ?>
                                <?php foreach ($acumulo as $rankinAcumulo ):?>
                                <?php if ($rankinAcumulo['rankin'] != 0): ?>
                                    <tr>
                                        <td><?php echo $posicao4 ?></td>
                                        <td><?php echo $rankinAcumulo['closer']; ?></td>
                                        <td><?php echo "R$", number_format($rankinAcumulo['rankin'],2, ',' , '.');  ?></td>
                                        <?php $posicao4++ ?>
                                    </tr>
                                <?php endif ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-3">
                <div class="widget navy-bg text-center">
                    <span>Total Vendido</span>
                    <h2>R$<?php echo number_format($valorTotal['0']['SUM(value)'],2, ',' , '.') ?></h2>    
                </div>
            </div>
            <div class="col-lg-3">
                <div class="widget navy-bg text-center">
                    <span>Total Pago</span>
                    <h2>R$<?php echo number_format($dados_pagos['pagamento'],2, ',' , '.') ?></h2>    
                </div>
            </div>
            <div class="col-lg-3">
                <div class="widget navy-bg text-center">
                    <span>Pagamento em Aberto</span>
                    <h2>R$<?php echo number_format($primeiro_pagamento['valor'],2, ',' , '.') ?></h2>    
                </div>
            </div>
            <div class="col-lg-3">
                <div class="widget navy-bg text-center">
                    <span>Cancelados</span>
                    <h2>R$<?php echo number_format(($valorTotal['0']['SUM(value)']-$dados_pagos['pagamento'])-$primeiro_pagamento['valor'],2, ',' , '.')?></h2>    
                </div>
            </div>
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title" align="center">
                        <h5>Ranking # Total Pago</h5>
                    </div>
                    <div class="ibox-content table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Closer</th>
                                    <th class="text-center">Total Vendido</th>
                                    <th class="text-center">Total Pago</th>
                                    <th class="text-center">% Total Pago</th>
                                    <th class="text-center"></th>
                                    <th class="text-center">Total de Contas</th>
                                    <th class="text-center">Total de Contas Pagas</th>
                                    <th class="text-center">% Contas Pagas</th>
                                    <th class="text-center"></th>
                                </tr>
                            </thead>
                            <tbody align="center">
                                <?php $posicao5 = 1;  ?>
                                <?php foreach ($pagamento as $pagos ):?>
                                <tr>
                                    <td><?php echo $posicao5 ?></td>
                                    <td><?php echo $pagos['closer'] ?></td>
                                    <td><?php echo "R$", number_format($pagos['vendido'],2, ',' , '.') ?></td>
                                    <?php if (isset($pagos['pagos'])): ?>
                                        <td><?php echo "R$", number_format($pagos['pagos'],2, ',' , '.') ?></td>    
                                    <?php else: ?>
                                        <td>R$0,00</td>
                                    <?php endif ?>
                                    <?php if (isset($pagos['pagos']) &&  isset($pagos['vendido'])): ?>
                                        <td><?php echo round(($pagos['pagos']/$pagos['vendido'])*100),"% " ?></td>
                                    <?php else: ?>
                                        <td>0%</td>
                                    <?php endif ?>
                                    <td><span class="pie"><?php echo (($pagos['pagos']/$pagos['vendido'])*100) ?>/100</span></td>
                                    <td><?php echo $pagos['contas_vendidas'] ?></td>
                                    <?php if (isset($pagos['contas_pagas']) && ($pagos['contas_vendidas'] != 0)): ?>
                                        <td><?php echo $pagos['contas_pagas'] ?></td>
                                    <?php else: ?>
                                        <td>0</td>                                        
                                    <?php endif ?>
                                    <?php if (isset($pagos['contas_pagas']) && ($pagos['contas_vendidas'] != 0)): ?>
                                        <td><?php echo round(($pagos['contas_pagas']/$pagos['contas_vendidas'])*100),"%" ?></td>
                                    <?php else: ?>
                                        <td>0%</td>
                                    <?php endif ?> 
                                    <td><span class="pie"><?php echo (($pagos['contas_pagas']/$pagos['contas_vendidas'])*100) ?>/100</span></td>
                                    <?php $posicao5++ ?>
                                </tr>
                                <?php endforeach; ?>
                            </tbody> 
                        </table>
                    </div>
                </div>  
            </div>
        </div>
    </div>
</div>


