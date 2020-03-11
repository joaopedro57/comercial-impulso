<?php 
        $rankinMrr = 1;//rankging do mês
                foreach ($mrrRankin as $ranking) {
                    if ($ranking['closer'] == $vendedor['0']['closer']) {
                        break;
                    }      
                $rankinMrr++;
                } 
        $rankinTotal = 1;//ranking do ano 
            foreach ($acumuloTotal as $ranking) {
                if ($ranking['closer'] == $vendedor['0']['closer']) {
                    break;
                }      
                $rankinTotal++;
            }
?>
<?php setlocale (LC_ALL, 'portuguese-brazilian'); ?>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-4">
        <h2>Closer</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo asset() ?>index.html">Home</a>
            </li>
            <li>
                <a>Closers</a>
            </li>
            <li class="active">
                <strong><?php echo $vendedor['0']['closer'] ?></strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">


    <div class="row m-b-lg m-t-lg">
        <div class="col-md-3">
            <div class="ibox-content text-center">
                <h1><?php echo $vendedor['0']['closer'] ?></h1>
                <div class="largura col-xs-12">
                    <div class="profile-image">
                        <img src="<?php echo asset(), $vendedor['0']['img'] ?>" class="img-circle circle-border m-b-md" alt="profile">
                    </div>
                </div>
                <h2>
                    <p class="font-bold">Closer</p>
                </h2>
                <br>
                <?php if (isset($comisao['0']['COMISSAO']) && $comisao['0']['COMISSAO'] > 1607.37): ?>
                    <h3 class="font-bold">Salário R$<?php echo number_format($comisao['0']['COMISSAO'],2,',' , '.') ?></h3>
                <?php else: ?>
                    <h3 class="font-bold">Salario: R$1.607,37</h3>
                <?php endif ?>
                <button class="btn btn-primary dim btn-dim" type="button" data-toggle="modal" data-target="#myModal2" id="comissao_v" value="<?php echo $vendedor['0']['email'] ?>">
                    <i class="fa fa-money"></i>
                    <input type="hidden" id="data_ini" value="<?php echo date('Y-m-01') ?>">
                    <input type="hidden" id="data_fim" value="<?php echo date('Y-m-t') ?>">
                </button>
            </div>
        </div>
        <div class="modal inmodal" id="myModal2" tabindex="-1" role="dialog" aria-hidden="true">
            <form method="post">
            <div class="modal-dialog">
                <div class="modal-content animated flipInY">
                    <div class="modal-header">
                        <h4 class="modal-title">Clientes Pagos No Mês</h4>
                    </div>
                    <div>
                        <div id="view_financeiro"></div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary dim btn-dim" type="button" >
                            <a style="color: white;" href="<?php echo base_url() ?>Comercial_Controller/perfil/<?php echo $vendedor['0']['usuario'] ?>" >Voltar</a>
                        </button>
                    </div>
                </div>
            </div>
            </form>
        </div>
        <!-- Dados do Ano -->
        <div class="col-lg-6">
            <h2 class="font-bold">Dados do Ano:</h2>
            <div class="col-lg-5">
                <div class="widget style1 navy-bg">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-thumbs-up fa-3x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span> Total Vendido </span>
                            <h3 class="font-bold"><?php echo "R$", number_format($contas_vendedorTotal['0']['total_vendido'],2,',' , '.') ?></h3>  
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="widget navy-bg text-center">
                    <span>Média de Venda</span>
                        <h3 class="font-bold"><?php echo "R$", number_format(($contas_vendedorTotal['0']['total_vendido']/date('m')),2,',' , '.') ?></h3>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="widget navy-bg text-center">
                    <span>Contas</span>
                    <h3 class="font-bold"><?php echo $contas_vendedorTotal['0']['contas_vendidas'] ?></h3>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="widget style1 blue-bg">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-bell fa-3x"></i>
                        </div>
                        <div class="col-xs-9 text-center">
                            <h3 class="font-bold"> Ranking Ano </h3>
                            <h2 class="font-bold"><?php echo $rankinTotal ?></h2>  
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="widget style1 blue-bg">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-bolt fa-3x"></i>
                        </div>
                        <div class="col-xs-9 text-center">
                            <h3 class="font-bold"> Ranking Mês </h3>
                            <h2 class="font-bold"><?php echo $rankinMrr ?></h2>  
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9" align="center">
                <div class="widget ibox-content text-center" style="padding-left: -; padding-left: 20px;">
                    <div class="title"><h2>Funil Mês</h2></div>
                    <br>
                    <div>
                        <table class="table">
                            <tr>
                                <td><h3 class="font-bold">Diagnostico</h3></td>
                                <td><h3 class="font-bold">Solução</h3></td>
                                <td><h3 class="font-bold">Proposta</h3></td>
                                <td><h3 class="font-bold">Abertura</h3></td>
                            </tr>
                            <tr>
                                <td><h4><?php echo $leadsCloserConversao['0']['Diagnostico'] ?></h4></td>
                                <td><h4><?php echo $leadsCloserConversao['0']['Soluçao'] ?></h4></td>
                                <td><h4><?php echo $leadsCloserConversao['0']['Proposta'] ?></h4></td>
                                <td><h4><?php echo $leadsCloserConversao['0']['Abertura'] ?></h4></td>
                            </tr>
                            <tr>
                                <?php if ($leadsCloserConversao['0']['Agendado'] == 0): ?>
                                    <td class="text-navy">0 <i class="fa fa-bolt"></i></td>
                                <?php else: ?>
                                    <td class="text-navy"><?php echo round(($leadsCloserConversao['0']['Diagnostico']/$leadsCloserConversao['0']['Agendado'])*100); ?> <i class="fa fa-bolt"></i> </td>
                                <?php endif ?>
                                <?php if ($leadsCloserConversao['0']['Diagnostico']== 0): ?>
                                    <td class="text-navy">0 <i class="fa fa-bolt"></i></td>
                                <?php else: ?>
                                    <td class="text-navy"><?php echo round(($leadsCloserConversao['0']['Soluçao']/$leadsCloserConversao['0']['Diagnostico'])*100); ?> <i class="fa fa-bolt"></i> </td>
                                <?php endif ?>
                                <?php if ($leadsCloserConversao['0']['Soluçao'] == 0): ?>
                                    <td class="text-navy">0 <i class="fa fa-bolt"></i></td>
                                <?php else: ?>
                                    <td class="text-navy"><?php echo round(($leadsCloserConversao['0']['Proposta']/$leadsCloserConversao['0']['Soluçao'])*100); ?> <i class="fa fa-bolt"></i> </td>
                                <?php endif ?>
                                <?php if ($leadsCloserConversao['0']['Proposta'] == 0): ?>
                                    <td class="text-navy">0 <i class="fa fa-bolt"></i></td>
                                <?php else: ?>
                                    <td class="text-navy"><?php echo round(($leadsCloserConversao['0']['Abertura']/$leadsCloserConversao['0']['Proposta'])*100); ?> <i class="fa fa-bolt"></i> </td>
                                <?php endif ?>
                                
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="widget navy-bg text-center">
                    <span>Shows SDR</span>
                    <h2><?php echo $demos_sdr['0']['COUNT(id)']; ?></h2>    
                </div>
            </div>
            <div class="col-lg-3">
                <div class="widget navy-bg text-center">
                    <span>Seus Shows</span>
                    <h2><?php echo $demos['0']['COUNT(id)'] ?></h2>    
                </div>
            </div>
        </div>
        
        <!-- Dados do Mes -->
        <div class="col-lg-3">
            <h2 class="font-bold">Dados do Mês:
            <?php setlocale (LC_ALL, 'portuguese-brazilian'); echo strftime ('%B'); ?> </h2>
            <div class="col-lg-12">
                <div class="widget yellw-bg no-padding">
                    <div class="col-xs-2">
                        <i class="fa fa-trophy fa-3x"></i>
                    </div>
                    <div class="col-xs-10">
                        <h1 style="margin-top: 2px; padding-left: 11px;" class="font-bold">R$<?php echo number_format($dados['0']['total_vendido'],2,',' , '.') ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="widget style1 yellow-bg">
                    <h2 style="font-size: 170%;" class="font-bold">Meta: R$<?php echo number_format($vendedor['0']['meta'],2,',' , '.') ?></h2>
                    <h2 style="font-size: 170%;" class="font-bold">Feito: <?php echo round(($dados['0']['total_vendido']/$vendedor['0']['meta'])*100)?>%</h2>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="widget yellow-bg text-center">
                    <h2 style="font-size: 160%;" class="font-bold">Contas Vendidas</h2>
                    <h2 style="font-size: 170%;" class="font-bold"><?php echo $dados['0']['contas_vendidas']?></h2>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="widget yellow-bg text-center">
                    <h2 class="font-bold">Tkt Médio</h2>
                    <?php if ($dados['0']['contas_vendidas'] == 0): ?>
                        <h2 style="font-size: 170%;" class="font-bold">R$0,00</h2>
                    <?php else: ?>
                        <h2 style="font-size: 170%;" class="font-bold">R$<?php echo number_format($dados['0']['total_vendido']/$dados['0']['contas_vendidas'],2,',' , '.')?></h2>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div><!-- FIM DA PRIMEIRA PARTE -->
    <div class="wrapper wrapper-content  animated fadeInRight">
        <div class="row">
            <div class="col-lg-12 widget ibox-content">
                <div class="title">
                    <h1>Funil em tempo Real</h1>
                </div>
                <div class="col-lg-12 text-center">
                    <div class="col-lg-2">
                        <div class="widget lazur-bg">
                            <h3 class="m-b-xs">Diagnostíco</h3>
                            <h1><?php echo $leadsCloser['0']['Diagnostico'] ?></h1>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="widget lazur-bg">
                            <h3 class="m-b-xs">Solução</h3>
                            <h1><?php echo $leadsCloser['0']['Solucao'] ?></h1>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="widget lazur-bg">
                            <h3 class="m-b-xs">Negociação</h3>
                            <h1><?php echo $leadsCloser['0']['Proposta'] ?></h1>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="widget lazur-bg">
                            <h3 class="m-b-xs">Abertura</h3>
                            <h1><?php echo $leadsCloser['0']['Abertura'] ?></h1>
                        </div>
                    </div>
                    <div class="col-lg-4 widget yellow-bg">
                        <h2>Tx Fechamento</h2>
                        <div class="col-lg-6 ">
                            <h3>Mês anterior</h3>
                            <h2><?php echo $txFechamento."%" ?></h2>
                        </div>
                        <div class="col-lg-6 ">
                            <h3>Mês atual</h3>
                            <?php if ($dados['0']['contas_vendidas'] == 0): ?>
                                <h2>0%</h2>
                            <?php else: ?>
                                <h2><?php echo round(($dados['0']['contas_vendidas']/$leadsCloserConversao['0']['Proposta'])*100) ?>%</h2>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Meta ao Longo do Ano</h5>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div id="grafico-perfil"></div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Dados dos Clientes -->
    <div class="wrapper wrapper-content  animated fadeInRight">
        <div class="row">
            <div class="col-lg-8">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Clientes do mes.</h5>
                            </div>
                                <div class="ibox-content">
                        <div class="table-responsive">
                    <table id="clientes" class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                            <tr>
                                <th></th>
                                <th>Cliente</th>
                                <th>Pipedrive</th>
                                <th>Valor</th>
                                <th>CRM</th>
                                <th>Primeiro Pagamento</th>
                                <th>Ganho</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($vendedor as $dados):?>
                            <tr>
                                <td class="client-avatar"><img alt="image" src="<?php echo asset(), $dados['img'] ?>"> </td>
                                <td>
                                    <a data-toggle="tab" href="<?php echo $dados['id'] ?>" class="client-link clientela">
                                        <?php echo $dados['title'] ?>
                                    </a>
                                </td>
                                <td><a href="https://app.hubspot.com/contacts/6009739/deal/<?php echo $dados['id'] ?>" target="_blank" ><?php echo $dados['id']; ?></a></td>
                                <td><?php echo  "R$", number_format($dados['value'],2, ',' , '.') ?> </td>
                                <td><a href="http://solides.adm.br/solides/crm/clientefornecedor/edit/<?php echo $dados['id_clifor'] ?>" target="_blank" ><?php echo $dados['id_clifor']; ?></a></td>
                                <?php if (isset($dados['primeiro_pagamento']) && $dados['primeiro_pagamento'] != 0): ?>
                                <td class="client-status"><span class="label label-primary"><?php echo $dados['primeiro_pagamento'] ?></span></td>
                                <?php else: ?>
                                    <?php if ($dados['data_vencimento'] >= date('Y-m-d')): ?>
                                        <td class="client-status"><span class="label label-warning"><?php echo $dados['data_vencimento'] ?></span></td>
                                    <?php else: ?>
                                        <td class="client-status"><span class="label label-danger">Não Pagou</span></td>
                                    <?php endif ?>
                                <?php endif ?>
                                <td lass="client-status"><span class="label label-primary"><?php echo $dados['data_ganho'] ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dados-cliente"></div>
        </div>
    </div>