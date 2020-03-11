
            <div class="wrapper wrapper-content animated fadeIn">
                <div class="p-w-md m-t-sm">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="widget navy-bg no-padding text-center">
                                <div class="p-m">
                                    <h1 class="m-xs"><?php echo "R$", number_format($valorTotal['0']['SUM(value)'],2, ',' , '.'); ?></h1>

                                    <h3 class="font-bold no-margins">
                                        Total Vendido até  <?php setlocale (LC_ALL, 'portuguese-brazilian'); echo strftime ('%B'); ?> 
                                    </h3>
                                    <small><?php echo round($valorTotal['0']['SUM(value)']/668015),"%" ; ?> <i class="fa fa-bolt"></i></small>
                                </div>
                            </div>
                        </div>  
                        <div class="col-lg-4">
                            <div class="widget lazur-bg no-padding text-center">
                                <div class="p-m">
                                    <h1 class="m-xs">R$ 668.015,00</h1>

                                    <h3 class="font-bold no-margins">
                                        Planejamento de <?php echo date('Y') ?>
                                    </h3>
                                    <br>
                                    <small>168% Em relação ao planejado em 2017</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center">
                            <div class="col-sm-12 col-xs-12 text-center">
                                <div class="widget style1">
                                    <div class="row">
                                        <div class="col-xs-4 text-center" style="margin-top: 6%;">
                                            <i class="fa fa-trophy fa-6x"></i>
                                        </div>
                                        <div class="col-sm-8 col-xs-4 text-center">
                                            <h3 class="m-b-xs"> Feito em <?php echo strftime ('%B'); ?> </h3>
                                            <h1 class="no-margins"><?php echo "R$", number_format($valor['0']['SUM(value)'],2, ',' , '.'); ?></h1>
                                            <br>
                                            <h3 class="m-b-xs">FALTAM</h3>
                                            <h1 class="no-margins"><?php echo "R$", number_format(($somaMetas['0']['meta']-$valor['0']['SUM(value)']),2, ',' , '.');?></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 ">
                                <h5 class="m-b-xs"> Meta <?php echo strftime ('%B'), "100%"; ?> </h5>
                                <h2 class="no-margins"><?php echo "R$", number_format($somaMetas['0']['meta'],2, ',' , '.'); ?></h2>
                                <div class="font-bold text-navy"> <?php echo round(($valor['0']['SUM(value)']*100)/$somaMetas['0']['meta']),"%" ; ?> <i class="fa fa-bolt"></i></div>
                            </div>
                            <div class="col-sm-6">
                                <h5 class="m-b-xs"> Meta <?php echo strftime ('%B'), " 85%"; ?> </h5>
                                <h2 class="no-margins"><?php echo "R$", number_format(($somaMetas['0']['meta'])/100,2, ',' , '.'); ?></h2>
                                <div class="font-bold text-navy"> <?php echo round(($valor['0']['SUM(value)']*100)/(($somaMetas['0']['meta'])/100)),"%" ; ?> <i class="fa fa-bolt"></i></div>
                            </div>
                        </div>
                        <div class="col-sm-12"><br><br></div>
                        <div class="col-sm-4">
                            <div>
                                <div>
                                    <h3>Meta Comercial X MRR 2016</h3>
                                </div>
                                <div>
                                    <div>
                                        <canvas id="lineChart" height="140"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div>
                                <div>
                                    <h3>Meta Comercial X MRR 2017</h3>
                                </div>
                                <div>
                                    <div>
                                        <canvas id="lineChart2" height="140"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div>
                                <div>
                                    <h3>Meta Comercial X MRR 2018</h3>
                                </div>
                                <div>
                                    <div>
                                        <canvas id="lineChart3" height="140"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-1"></div>
                         <div class="col-sm-10 text-center">
                            <div>
                                <div>
                                    <h3>MRR Comercial 2016/2017/2018</h3>
                                </div>
                                <div>
                                    <div>
                                        <canvas id="gestao" height="140"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-1"></div>   
                        <div class="col-sm-12 text-center" style="margin: 45px 0">
                                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 text-center">
                                    <div class="widget style1 lazur-bg">
                                        <div class="row vertical-align">
                                            <h3 class="m-b-xs">Deals Ativos no Mês no Pipedrive</h3>
                                            <br>
                                            <div class="col-xs-3">
                                                <i class="fa fa-user fa-3x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <h2 class="font-bold"><?php echo $leads['0']['COUNT(id)'] ?></h2>
                                                <div class="font-bold"><?php echo round(($leads['0']['COUNT(id)']*100)/3000),"%"  ?> <i class="fa fa-bolt"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 text-center">
                                    <div class="widget style1 yellow-bg">
                                        <div class="row vertical-align">
                                            <h3 class="m-b-xs">MQL Gerados Mês <?php echo strftime ('%B')?></h3>
                                            <br>
                                            <div class="col-xs-3">
                                                <i class="fa fa-thumbs-up fa-3x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <h2 class="font-bold"><?php echo $leadsMes['0']['COUNT(id)'] ?></h2>
                                                <div class="font-bold"><?php echo round(($leadsMes['0']['COUNT(id)']*100)/3000),"%"  ?> <i class="fa fa-bolt"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                </div>
                        </div>
                    <div><br></div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox">
                                <div class="ibox-content">
                                    <div class="table-responsive">
                                        <h2 class="text-center">META CLOSER</h2>
                                        <form role="form" method="post">
                                            <table class="table table-striped text-center">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Closer</th>
                                                        <th class="text-center">Jan</th>
                                                        <th class="text-center">Fev</th>
                                                        <th class="text-center">Mar</th>
                                                        <th class="text-center">Abr</th>
                                                        <th class="text-center">Mai</th>
                                                        <th class="text-center">Jun</th>
                                                        <th class="text-center">Jul</th>
                                                        <th class="text-center">Ago</th>
                                                        <th class="text-center">Set</th>
                                                        <th class="text-center">Out</th>
                                                        <th class="text-center">Nov</th>
                                                        <th class="text-center">Dez</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($metas as $dados): ?>
                                                        <tr>
                                                        <?php if (isset($dados['meses']['0'])): ?>
                                                            <td class="client-avatar"><img alt="image" src="<?php echo asset(), $dados['img'] ?>" ></td>
                                                            <td><?php echo $dados['name'] ?></td>
                                                            <td ><input type="text" name="<?php echo $dados['user_id']?>/<?php echo date('Y') ?>-01" class="form-control" value="<?php echo $dados['meses']['0']?>"></td>
                                                            <td ><input type="text" name="<?php echo $dados['user_id']?>/<?php echo date('Y') ?>-02" class="form-control" value="<?php echo $dados['meses']['1']?>"></td>
                                                            <td ><input type="text" name="<?php echo $dados['user_id']?>/<?php echo date('Y') ?>-03" class="form-control" value="<?php echo $dados['meses']['2']?>"></td>
                                                            <td ><input type="text" name="<?php echo $dados['user_id']?>/<?php echo date('Y') ?>-04" class="form-control" value="<?php echo $dados['meses']['3']?>"></td>
                                                            <td ><input type="text" name="<?php echo $dados['user_id']?>/<?php echo date('Y') ?>-05" class="form-control" value="<?php echo $dados['meses']['4']?>"></td>
                                                            <td ><input type="text" name="<?php echo $dados['user_id']?>/<?php echo date('Y') ?>-06" class="form-control" value="<?php echo $dados['meses']['5']?>"></td>
                                                            <td ><input type="text" name="<?php echo $dados['user_id']?>/<?php echo date('Y') ?>-07" class="form-control" value="<?php echo $dados['meses']['6']?>"></td>
                                                            <td ><input type="text" name="<?php echo $dados['user_id']?>/<?php echo date('Y') ?>-08" class="form-control" value="<?php echo $dados['meses']['7']?>"></td>
                                                            <td ><input type="text" name="<?php echo $dados['user_id']?>/<?php echo date('Y') ?>-09" class="form-control" value="<?php echo $dados['meses']['8']?>"></td>
                                                            <td ><input type="text" name="<?php echo $dados['user_id']?>/<?php echo date('Y') ?>-10" class="form-control" value="<?php echo $dados['meses']['9']?>"></td>
                                                            <td ><input type="text" name="<?php echo $dados['user_id']?>/<?php echo date('Y') ?>-11" class="form-control" value="<?php echo $dados['meses']['10']?>"></td>
                                                            <td ><input type="text" name="<?php echo $dados['user_id']?>/<?php echo date('Y') ?>-12" class="form-control" value="<?php echo $dados['meses']['11']?>"></td>   
                                                        <?php else: ?>
                                                            <td class="client-avatar"><img alt="image" src="<?php echo asset(), $dados['img'] ?>" ></td>
                                                            <td><?php echo $dados['name'] ?></td>
                                                            <td ><input type="text" name="<?php echo $dados['user_id']?>/<?php echo date('Y') ?>-01" class="form-control" value="0"></td>
                                                            <td ><input type="text" name="<?php echo $dados['user_id']?>/<?php echo date('Y') ?>-02" class="form-control" value="0"></td>
                                                            <td ><input type="text" name="<?php echo $dados['user_id']?>/<?php echo date('Y') ?>-03" class="form-control" value="0"></td>
                                                            <td ><input type="text" name="<?php echo $dados['user_id']?>/<?php echo date('Y') ?>-04" class="form-control" value="0"></td>
                                                            <td ><input type="text" name="<?php echo $dados['user_id']?>/<?php echo date('Y') ?>-05" class="form-control" value="0"></td>
                                                            <td ><input type="text" name="<?php echo $dados['user_id']?>/<?php echo date('Y') ?>-06" class="form-control" value="0"></td>
                                                            <td ><input type="text" name="<?php echo $dados['user_id']?>/<?php echo date('Y') ?>-07" class="form-control" value="0"></td>
                                                            <td ><input type="text" name="<?php echo $dados['user_id']?>/<?php echo date('Y') ?>-08" class="form-control" value="0"></td>
                                                            <td ><input type="text" name="<?php echo $dados['user_id']?>/<?php echo date('Y') ?>-09" class="form-control" value="0"></td>
                                                            <td ><input type="text" name="<?php echo $dados['user_id']?>/<?php echo date('Y') ?>-10" class="form-control" value="0"></td>
                                                            <td ><input type="text" name="<?php echo $dados['user_id']?>/<?php echo date('Y') ?>-11" class="form-control" value="0"></td>
                                                            <td ><input type="text" name="<?php echo $dados['user_id']?>/<?php echo date('Y') ?>-12" class="form-control" value="0"></td>
                                                        <?php endif ?>
                                                        </tr>        
                                                    <?php endforeach ?>   
                                                </tbody>
                                            </table>
                                           <button class="btn btn-primary dim btn-dim" type="submit"><strong>Salvar</strong></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox">
                                <div class="ibox-content">
                                    <div class="table-responsive">
                                        <h2 class="text-center">META Totais</h2>
                                        <form role="form" method="post" id="forms_mes">
                                            <table class="table table-striped text-center">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">Jan</th>
                                                        <th class="text-center">Fev</th>
                                                        <th class="text-center">Mar</th>
                                                        <th class="text-center">Abr</th>
                                                        <th class="text-center">Mai</th>
                                                        <th class="text-center">Jun</th>
                                                        <th class="text-center">Jul</th>
                                                        <th class="text-center">Ago</th>
                                                        <th class="text-center">Set</th>
                                                        <th class="text-center">Out</th>
                                                        <th class="text-center">Nov</th>
                                                        <th class="text-center">Dez</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if (isset($meta_mes['0']['meta'])): ?>
                                                        <tr>
                                                        <th class="text-center">
                                                            <input class="form-control" type="text" name="<?php echo date('Y') ?>-01" value="<?php echo $meta_mes['0']['meta'] ?>">
                                                        </th>
                                                        <th class="text-center">
                                                            <input class="form-control" type="text" name="<?php echo date('Y') ?>-02" value="<?php echo $meta_mes['1']['meta'] ?>">
                                                        </th>
                                                        <th class="text-center">
                                                            <input class="form-control" type="text" name="<?php echo date('Y') ?>-03" value="<?php echo $meta_mes['2']['meta'] ?>">
                                                        </th>
                                                        <th class="text-center">
                                                            <input class="form-control" type="text" name="<?php echo date('Y') ?>-04" value="<?php echo $meta_mes['3']['meta'] ?>">
                                                        </th>
                                                        <th class="text-center">
                                                            <input class="form-control" type="text" name="<?php echo date('Y') ?>-05" value="<?php echo $meta_mes['4']['meta'] ?>">
                                                        </th>
                                                        <th class="text-center">
                                                            <input class="form-control" type="text" name="<?php echo date('Y') ?>-06" value="<?php echo $meta_mes['5']['meta'] ?>">
                                                        </th>
                                                        <th class="text-center">
                                                            <input class="form-control" type="text" name="<?php echo date('Y') ?>-07" value="<?php echo $meta_mes['6']['meta'] ?>">
                                                        </th>
                                                        <th class="text-center">
                                                            <input class="form-control" type="text" name="<?php echo date('Y') ?>-08" value="<?php echo $meta_mes['7']['meta'] ?>">
                                                        </th>
                                                        <th class="text-center">
                                                            <input class="form-control" type="text" name="<?php echo date('Y') ?>-09" value="<?php echo $meta_mes['8']['meta'] ?>">
                                                        </th>
                                                        <th class="text-center">
                                                            <input class="form-control" type="text" name="<?php echo date('Y') ?>-10" value="<?php echo $meta_mes['9']['meta'] ?>">
                                                        </th>
                                                        <th class="text-center">
                                                            <input class="form-control" type="text" name="<?php echo date('Y') ?>-11" value="<?php echo $meta_mes['10']['meta'] ?>">
                                                        </th>
                                                        <th class="text-center">
                                                            <input class="form-control" type="text" name="<?php echo date('Y') ?>-12" value="<?php echo $meta_mes['11']['meta'] ?>">
                                                        </th>
                                                    </tr>
                                                    <?php else: ?>
                                                    <tr>
                                                        <th class="text-center"><input class="form-control" type="text" name="<?php echo date('Y') ?>-01" value="0"></th>
                                                        <th class="text-center"><input class="form-control" type="text" name="<?php echo date('Y') ?>-02" value="0"></th>
                                                        <th class="text-center"><input class="form-control" type="text" name="<?php echo date('Y') ?>-03" value="0"></th>
                                                        <th class="text-center"><input class="form-control" type="text" name="<?php echo date('Y') ?>-04" value="0"></th>
                                                        <th class="text-center"><input class="form-control" type="text" name="<?php echo date('Y') ?>-05" value="0"></th>
                                                        <th class="text-center"><input class="form-control" type="text" name="<?php echo date('Y') ?>-06" value="0"></th>
                                                        <th class="text-center"><input class="form-control" type="text" name="<?php echo date('Y') ?>-07" value="0"></th>
                                                        <th class="text-center"><input class="form-control" type="text" name="<?php echo date('Y') ?>-08" value="0"></th>
                                                        <th class="text-center"><input class="form-control" type="text" name="<?php echo date('Y') ?>-09" value="0"></th>
                                                        <th class="text-center"><input class="form-control" type="text" name="<?php echo date('Y') ?>-10" value="0"></th>
                                                        <th class="text-center"><input class="form-control" type="text" name="<?php echo date('Y') ?>-11" value="0"></th>
                                                        <th class="text-center"><input class="form-control" type="text" name="<?php echo date('Y') ?>-12" value="0"></th>
                                                    </tr>
                                                    <?php endif ?>
                                                </tbody>
                                            </table>
                                            <button class="btn btn-primary dim btn-dim" type="button" >
                                                <a style="color: white;" class="mes">SALVAR</a>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox">
                                <div class="ibox-content">
                                    <div class="table-responsive">
                                        <h2 class="text-center">META SDR</h2>
                                        <form role="form" method="post" id="forms_sdr">
                                            <table class="table table-striped text-center">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Closer</th>
                                                        <th class="text-center">Jan</th>
                                                        <th class="text-center">Fev</th>
                                                        <th class="text-center">Mar</th>
                                                        <th class="text-center">Abr</th>
                                                        <th class="text-center">Mai</th>
                                                        <th class="text-center">Jun</th>
                                                        <th class="text-center">Jul</th>
                                                        <th class="text-center">Ago</th>
                                                        <th class="text-center">Set</th>
                                                        <th class="text-center">Out</th>
                                                        <th class="text-center">Nov</th>
                                                        <th class="text-center">Dez</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($meta_sdr as $dados): ?>
                                                        <tr>
                                                        <?php if (isset($dados['meses']['0'])): ?>
                                                            <td class="client-avatar"><img alt="image" src="<?php echo asset(), $dados['img'] ?>" ></td>
                                                            <td><?php echo $dados['name'] ?></td>
                                                            <td ><input type="text" name="<?php echo $dados['user_id']?>/<?php echo date('Y') ?>-01" class="form-control" value="<?php echo $dados['meses']['0']?>"></td>
                                                            <td ><input type="text" name="<?php echo $dados['user_id']?>/<?php echo date('Y') ?>-02" class="form-control" value="<?php echo $dados['meses']['1']?>"></td>
                                                            <td ><input type="text" name="<?php echo $dados['user_id']?>/<?php echo date('Y') ?>-03" class="form-control" value="<?php echo $dados['meses']['2']?>"></td>
                                                            <td ><input type="text" name="<?php echo $dados['user_id']?>/<?php echo date('Y') ?>-04" class="form-control" value="<?php echo $dados['meses']['3']?>"></td>
                                                            <td ><input type="text" name="<?php echo $dados['user_id']?>/<?php echo date('Y') ?>-05" class="form-control" value="<?php echo $dados['meses']['4']?>"></td>
                                                            <td ><input type="text" name="<?php echo $dados['user_id']?>/<?php echo date('Y') ?>-06" class="form-control" value="<?php echo $dados['meses']['5']?>"></td>
                                                            <td ><input type="text" name="<?php echo $dados['user_id']?>/<?php echo date('Y') ?>-07" class="form-control" value="<?php echo $dados['meses']['6']?>"></td>
                                                            <td ><input type="text" name="<?php echo $dados['user_id']?>/<?php echo date('Y') ?>-08" class="form-control" value="<?php echo $dados['meses']['7']?>"></td>
                                                            <td ><input type="text" name="<?php echo $dados['user_id']?>/<?php echo date('Y') ?>-09" class="form-control" value="<?php echo $dados['meses']['8']?>"></td>
                                                            <td ><input type="text" name="<?php echo $dados['user_id']?>/<?php echo date('Y') ?>-10" class="form-control" value="<?php echo $dados['meses']['9']?>"></td>
                                                            <td ><input type="text" name="<?php echo $dados['user_id']?>/<?php echo date('Y') ?>-11" class="form-control" value="<?php echo $dados['meses']['10']?>"></td>
                                                            <td ><input type="text" name="<?php echo $dados['user_id']?>/<?php echo date('Y') ?>-12" class="form-control" value="<?php echo $dados['meses']['11']?>"></td>   
                                                        <?php else: ?>
                                                            <td class="client-avatar"><img alt="image" src="<?php echo asset(), $dados['img'] ?>" ></td>
                                                            <td><?php echo $dados['name'] ?></td>
                                                            <td ><input type="text" name="<?php echo $dados['user_id']?>/<?php echo date('Y') ?>-01" class="form-control" value="0"></td>
                                                            <td ><input type="text" name="<?php echo $dados['user_id']?>/<?php echo date('Y') ?>-02" class="form-control" value="0"></td>
                                                            <td ><input type="text" name="<?php echo $dados['user_id']?>/<?php echo date('Y') ?>-03" class="form-control" value="0"></td>
                                                            <td ><input type="text" name="<?php echo $dados['user_id']?>/<?php echo date('Y') ?>-04" class="form-control" value="0"></td>
                                                            <td ><input type="text" name="<?php echo $dados['user_id']?>/<?php echo date('Y') ?>-05" class="form-control" value="0"></td>
                                                            <td ><input type="text" name="<?php echo $dados['user_id']?>/<?php echo date('Y') ?>-06" class="form-control" value="0"></td>
                                                            <td ><input type="text" name="<?php echo $dados['user_id']?>/<?php echo date('Y') ?>-07" class="form-control" value="0"></td>
                                                            <td ><input type="text" name="<?php echo $dados['user_id']?>/<?php echo date('Y') ?>-08" class="form-control" value="0"></td>
                                                            <td ><input type="text" name="<?php echo $dados['user_id']?>/<?php echo date('Y') ?>-09" class="form-control" value="0"></td>
                                                            <td ><input type="text" name="<?php echo $dados['user_id']?>/<?php echo date('Y') ?>-10" class="form-control" value="0"></td>
                                                            <td ><input type="text" name="<?php echo $dados['user_id']?>/<?php echo date('Y') ?>-11" class="form-control" value="0"></td>
                                                            <td ><input type="text" name="<?php echo $dados['user_id']?>/<?php echo date('Y') ?>-12" class="form-control" value="0"></td>
                                                        <?php endif ?>
                                                        </tr>        
                                                    <?php endforeach ?>   
                                                </tbody>
                                            </table>
                                            <button class="btn btn-primary dim btn-dim" type="button" >
                                                <a style="color: white;" class="sdr">SALVAR</a>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                                <th>Vendedor</th>
                                                <th>Data do Ganho</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($clientes as $dados):?>
                                                <tr>
                                                    <td class="client-avatar"><img alt="image" src="<?php echo asset(), $dados['img'] ?>"> </td>
                                                    <td><a id="clientela" data-toggle="tab" href="<?php echo $dados['id'] ?>" class="client-link"><?php echo $dados['title'] ?></a></td>
                                                    <td><a href="https://solides.pipedrive.com/deal/<?php echo $dados['id'] ?>" target="_blank" ><?php echo $dados['id']; ?></a></td>
                                                    <td><?php echo  "R$", number_format($dados['value'],2, ',' , '.') ?> </td>
                                                    <td><?php echo $dados['closer']  ?> </td>
                                                    <td class="client-status"><span class="label label-primary"><?php echo $dados['data_ganho'] ?></span></td>
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
        </div>
