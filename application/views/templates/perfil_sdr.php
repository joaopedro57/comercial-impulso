<?php 
        $ranking_ano = 1;//rankging do mês
                foreach ($shows_total as $ranking) {
                    if ($ranking['user_id'] == $dados_user['0']['user_id']) {
                        break;
                    }      
                    $ranking_ano++;
                }

        $ranking_mes = 1;//ranking do ano 
            foreach ($shows_total_mes as $ranking) {
                if ($ranking['user_id'] == $dados_user['0']['user_id']) {
                    break;
                }      
                $ranking_mes++;
            }
?>

<?php setlocale (LC_ALL, 'portuguese-brazilian'); ?>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-4">
        <h2>SDR</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo asset() ?>index.html">Home</a>
            </li>
            <li>
                <a>SDR</a>
            </li>
            <li class="active">
                <strong><?php echo $dados_user['0']['name'] ?></strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row m-b-lg m-t-lg">
        <div class="col-md-3">
            <div class="ibox-content text-center">
                <h1><?php echo $dados_user['0']['name'] ?></h1>
                <div class="largura col-xs-12">
                    <div class="profile-image">
                        <img src="<?php echo asset(), $dados_user['0']['img'] ?>" class="img-circle circle-border m-b-md" alt="profile">
                    </div>
                </div>
                <h2>
                    <p class="font-bold">SDR</p>
                </h2>
                <h3 class="font-bold">Salario: R$1.607,37</h3>
            </div>
        </div>
        <!-- Dados do Ano -->
        <div class="col-lg-6">
            <h2 class="font-bold">Dados do Ano:</h2>
            <div class="col-lg-4">
                <div class="widget style1 navy-bg">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-thumbs-up fa-3x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <h3> Shows </h3>
                            <h3 class="font-bold"><?php echo $shows_ano['0']['shows'] ?></h3>  
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="widget navy-bg text-center">
                    <h3>Nº Contas</h3>
                        <h3 class="font-bold"><?php echo $contas_ano['0']['contas'] ?></h3>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="widget navy-bg text-center">
                    <h3>Tx de Shows</h3>
                    <?php if ($leadsConversao['0']['Agendamento'] < 1): ?>
                        <h3 class="font-bold">0%</h3>
                    <?php else: ?>
                        <h3 class="font-bold"><?php echo round(($shows_mes['0']['shows']/$leadsConversao['0']['Agendamento'])*100) ?>%</h3>
                    <?php endif ?>
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
                            <h2 class="font-bold"><?php echo $ranking_ano ?></h2>  
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
                            <h2 class="font-bold"><?php echo $ranking_mes ?></h2>  
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12" align="center">
                <div class="widget ibox-content text-center" style="padding-left: -; padding-left: 20px;">
                    <div class="title"><h2>Funil Mês</h2></div>
                    <br>
                    <div>
                        <table class="table">
                            <tr>
                                <td><h3 class="font-bold">Banco</h3></td>
                                <td><h3 class="font-bold">Pesquisa</h3></td>
                                <td><h3 class="font-bold">Prospecção</h3></td>
                                <td><h3 class="font-bold">Conexão</h3></td>
                                <td><h3 class="font-bold">Agendado</h3></td>
                            </tr>
                            <tr>
                                <td><h4><?php echo $leadsConversao['0']['Banco'] ?></h4></td>
                                <td><h4><?php echo $leadsConversao['0']['Pesquisa'] ?></h4></td>
                                <td><h4><?php echo $leadsConversao['0']['Prospccao'] ?></h4></td>
                                <td><h4><?php echo $leadsConversao['0']['Conexao'] ?></h4></td>
                                <td><h4><?php echo $leadsConversao['0']['Agendamento'] ?></h4></td>
                            </tr>
                            <tr>
                                    <td class="text-navy">100%<i class="fa fa-bolt"></i></td>
                                <?php if ($leadsConversao['0']['Pesquisa'] == 0): ?>
                                    <td class="text-navy">0%<i class="fa fa-bolt"></i></td>
                                <?php else: ?>
                                    <td class="text-navy"><?php echo round(($leadsConversao['0']['Pesquisa']/$leadsConversao['0']['Banco'])*100); ?> <i class="fa fa-bolt"></i> </td>
                                <?php endif ?>
                                <?php if ($leadsConversao['0']['Prospccao']== 0): ?>
                                    <td class="text-navy">0%<i class="fa fa-bolt"></i></td>
                                <?php else: ?>
                                    <td class="text-navy"><?php echo round(($leadsConversao['0']['Prospccao']/$leadsConversao['0']['Pesquisa'])*100); ?> <i class="fa fa-bolt"></i> </td>
                                <?php endif ?>
                                <?php if ($leadsConversao['0']['Conexao'] == 0): ?>
                                    <td class="text-navy">0%<i class="fa fa-bolt"></i></td>
                                <?php else: ?>
                                    <td class="text-navy"><?php echo round(($leadsConversao['0']['Conexao']/$leadsConversao['0']['Prospccao'])*100); ?> <i class="fa fa-bolt"></i> </td>
                                <?php endif ?>
                                <?php if ($leadsConversao['0']['Agendamento'] == 0): ?>
                                    <td class="text-navy">0%<i class="fa fa-bolt"></i></td>
                                <?php else: ?>
                                    <td class="text-navy"><?php echo round(($leadsConversao['0']['Agendamento']/$leadsConversao['0']['Conexao'])*100); ?> <i class="fa fa-bolt"></i> </td>
                                <?php endif ?>
                                
                            </tr>
                        </table>
                    </div>
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
                        <h1 style="margin-top: 2px; padding-left: 11px;" class="font-bold"><?php echo $shows_mes['0']['shows'] ?> shows </h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="widget style1 yellow-bg">
                    <h2 style="font-size: 170%;" class="font-bold">Meta: <?php echo $meta_mes['0']['meta'] ?></h2>
                    <h2 style="font-size: 170%;" class="font-bold">Feito: <?php echo round(($shows_mes['0']['shows']/$meta_mes['0']['meta'])*100)?>%</h2>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="widget yellow-bg text-center">
                    <h2 style="font-size: 160%;" class="font-bold">Contas Vendidas</h2>
                    <h2 style="font-size: 170%;" class="font-bold"><?php echo $contas_mes['0']['contas']?></h2>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="widget yellow-bg text-center">
                    <h2 class="font-bold">Total Vendido</h2>
                    <?php if ($contas_mes['0']['contas'] == 0): ?>
                        <h2 style="font-size: 170%;" class="font-bold">R$0,00</h2>
                    <?php else: ?>
                        <h2 style="font-size: 170%;" class="font-bold">R$<?php echo number_format($contas_mes['0']['valor'],2,',' , '.')?></h2>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</div><!-- FIM DA PRIMEIRA PARTE -->
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Meta ao Longo do Ano</h5>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div id="grafico-perfil-sdr"></div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="ibox-content">
            <h2 class="font-bold">Selecione Os Closers</h2>
            <form method="post" class="form-horizontal">
                <div class="form-group">
                    <div class="col-sm-10">
                        <?php foreach ($closers as $value): ?>
                            <label class="checkbox-inline i-checks" style="margin-left: 10px;"> 
                            <input type="checkbox" value="<?php echo $value['user_id'] ?>" name="id[]">
                             <?php echo $value['name'] ?>
                            </label>
                        <?php endforeach ?>
                    </div>
                </div>
                <button class="btn btn-primary dim btn-dim" type="submit"><strong>Salvar</strong></button>
            </form>
        </div>
    </div>
    <br>
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Closers Dados Mês</h5>

                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <input type="text" class="form-control input-sm m-b-xs" id="filter"
                                   placeholder="Search in table">

                            <table class="footable table table-stripped" data-page-size="8" data-filter=#filter>
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Closers</th>
                                    <th>Total de Shows</th>
                                    <th>Seus Shows</th>
                                    <th>Seus Agendamentos</th>
                                    <th>Taxa de Shows</th>
                                    <th>Suas Contas</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if (isset($vendedores)): ?>
                                <?php foreach ($vendedores as $dados): ?>
                                    <?php if ($dados['nome'] != ''): ?>
                                    <tr class="gradeX">
                                        <td class="client-avatar"><img alt="image" src="<?php echo asset(), $dados['img'] ?>" ></td>
                                        <td><?php echo $dados['nome'] ?></td>
                                        <td class="text-center"><?php echo $dados['shows_totais'] ?></td>
                                        <td class="text-center"><?php echo $dados['shows'] ?></td>
                                        <td class="text-center"><?php echo $dados['agendamentos'] ?></td>
                                        <?php if ($dados['shows'] != 0): ?>
                                        <td class="text-center"><?php echo round(($dados['agendamentos']/$dados['shows'])*100) ?>%</td>
                                        <?php else: ?>
                                        <td class="text-center">0%</td>
                                        <?php endif ?>
                                        <td class="text-center"><?php echo $dados['contas'] ?></td>
                                    </tr>
                                    <?php endif ?>        
                                <?php endforeach ?>
                                <?php endif ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="6">
                                        <ul class="pagination pull-right"></ul>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
</div>
