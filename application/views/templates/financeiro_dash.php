  <div>
    <!-- Conteudo da pagina -->
    <div>
        <!-- Texto da parte de cima, MRR, MQL e etc.. -->
        <div class="wrapper wrapper-content">
            <div class="row">
                <form method="post">
                    <div class="form-group col-lg-2" id="data_4">
                        <label class="font-normal">Month select</label>
                        <div class="input-group date">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="data"
                            type="text" class="form-control" name='data' value="<?php echo $data_ini ?>">
                        </div>
                        <button class="btn btn-primary" type="submit" >Salvar</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-4">
                    <div class="widget style1 navy-bg">
                        <div class="row">
                            <div class="col-xs-4">
                                <i class="fa fa-money fa-5x"></i>
                            </div>
                            <div class="col-xs-8 text-right">
                                <span> MRR TOTAL </span>
                                <h2 class="font-bold"><?php echo "R$", number_format($mrr['valor'] ,2, ',' , '.'); ?></h2>
                                <h4> 100%</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="widget style1 navy-bg">
                        <div class="row">
                            <div class="col-xs-4">
                                <i class="fa fa-bank fa-5x"></i>
                            </div>
                            <div class="col-xs-8 text-right">
                                <span> MRR Recebido </span>
                                <h2 id="recebidos" class="font-bold"><?php echo "R$", number_format($recebidos['valor'] ,2, ',' , '.'); ?></h2>
                                <h4><?php echo round(($recebidos['valor']/$mrr['valor'])*100) ?>%</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="widget style1 red-bg">
                        <div class="row">
                            <div class="col-xs-4">
                                <i class="fa fa-bomb fa-5x"></i>
                            </div>
                            <div class="col-xs-8 text-right">
                                <span> Perda de MRR </span>
                                <h2 class="font-bold" id="perda_recebiveis"><?php echo "R$",number_format($perda_recebiveis['valor'],2, ',' , '.'); ?></h2>
                                <h4><?php echo round(($perda_recebiveis['valor']/$mrr['valor'])*100) ?>%</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="widget style1 yellow-bg">
                        <div class="row">
                            <div class="col-xs-4">
                                <i class="fa fa-barcode fa-5x"></i>
                            </div>
                            <div class="col-xs-8 text-right">
                                <span> MRR A Receber </span>
                                <h2 class="font-bold" id="aReceber"><?php echo "R$",number_format($aReceber['valor'],2, ',' , '.'); ?></h2>
                                <h4><?php echo round(($aReceber['valor']/$mrr['valor'])*100) ?>%</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="widget style1 yellow-bg">
                        <div class="row">
                            <div class="col-xs-4">
                                <i class="fa fa-calculator fa-5x"></i>
                            </div>
                            <div class="col-xs-8 text-right">
                                <span> Primeiro Pagamento</span>
                                <h2 class="font-bold"><?php echo "R$",number_format($primeiro_pagamento['valor'],2, ',' , '.'); ?></h2>
                                <h4><?php echo round(($primeiro_pagamento['valor']/$mrr['valor'])*100) ?>%</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="widget style1 red-bg">
                        <div class="row">
                            <div class="col-xs-4">
                                <i class="fa fa-warning fa-5x"></i>
                            </div>
                            <div class="col-xs-8 text-right">
                                <span> Inadimplente </span>
                                <h2 class="font-bold" ><a id="inadimplente" style="color: white;"><?php echo "R$",number_format($clientes['valor_total_inadimplente'],2, ',' , '.'); ?></a></h2>
                                <h4><?php echo round(($clientes['valor_total_inadimplente']/$mrr['valor'])*100) ?>%</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="progress progress-striped active">
                <div style="width: <?php echo round(($recebidos['valor']/$mrr['valor'])*100)  ?>%" class="progress-bar progress-bar-primary">
                    <span class="sr-only"><?php echo round(($recebidos['valor']/$mrr['valor'])*100)  ?>% Complete (success)</span>
                </div>
                <div style="width: <?php echo round(($aReceber['valor']/$mrr['valor'])*100) - round(($inadimplente/$mrr['valor'])*100)  ?>%" class="progress-bar progress-bar-warning">
                    <span class="sr-only"><?php echo round(($aReceber['valor']/$mrr['valor'])*100) ?>% Complete (warning)</span>
                </div>
                <div style="width: <?php echo round(($inadimplente/$mrr['valor'])*100) ?>%" class="progress-bar progress-bar-danger">
                    <span class="sr-only"><?php echo round(($inadimplente/$mrr['valor'])*100) ?></span>
                </div>
            </div>
        </div>
        <div class="wrapper wrapper-content">
            <div class="row ibox-content">
                <div class="col-lg-8"></div>
                <div class="col-lg-4">
                    <div class="widget style1 lazur-bg">
                        <div class="row">
                            <div class="col-xs-4">
                                <i class="fa fa-group fa-5x"></i>
                            </div>
                            <div class="col-xs-8 text-right">
                                <span> Total de Clientes MRR </span>
                                <h2 class="font-bold"><?php echo $nClientes['COUNT(IDCLIFOR)'] ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div id="grafico-financeiro"></div>
                </div>
                
            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Clientes Inadimplentes</h5>
                        </div>
                        <div class="ibox-content">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                    <thead>
                                        <tr>
                                            <th>IDLICOFR</th>
                                            <th>Nome da Empresa</th>
                                            <th>Data Vencimento da Parcela</th>
                                            <th>Valor Mensalidade</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($clientes as $value): ?>   
                                            <tr class="gradeX">
                                                <td><a target="blank" href="http://solides.adm.br/solides/crm/clientefornecedor/edit/<?php echo $value['IDCLIFOR'] ?>"><?php echo $value[ 'IDCLIFOR'] ?></a></td>
                                                <td><?php echo $value['NOMEFANTASIA'] ?></td>
                                                <td><?php echo $value['DATAVENCIMENTO'] ?></td>
                                                <td class="center"><?php echo "R$",number_format($value['VALOR_MENSALIDADE'],2, ',' , '.') ?></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>