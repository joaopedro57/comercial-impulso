<div class="wrapper wrapper-content  animated fadeInRight">
    <div class="row ibox-content">
        <div class="col-lg-12">
            <div class="col-lg-6">
                <h1>Ranking Geral</h1>
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Coordenador</th>
                                <th>Total Vendido</th>
                                <th>Total de Contas</th>
                                <th>Ciclo de Venda</th>
                                <th>Ticket Médio</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $posicao = 1; ?>
                            <?php foreach ($contas_coordenador as $dados): ?>
                            <tr>
                                <td>
                                     <?php echo $posicao ?>
                                </td>
                                <td>
                                     <?php echo $dados['equipe'] ?>
                                </td>
                                <td>
                                     <?php echo "R$" , number_format(($dados['Total Vendido']),2, ',' , '.'); ?>
                                </td>
                                <td>
                                     <?php echo $dados['Total de Contas'] ?>
                                </td>
                                <td>
                                     <?php echo round($dados['Ciclo de Venda']/$dados['Total de Contas']) ?>
                                </td>
                                <td>  
                                     <?php echo "R$", number_format(($dados['Total Vendido']/$dados['Total de Contas']),2, ',' , '.'); ?>
                                </td>
                            </tr>
                            <?php $posicao ++ ?>  
                            <?php endforeach ?> 
                        </tbody>
                    </table>  
                </div>
            <div class="col-lg-6">
                <div>
                    <canvas id="coordenador"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-6">
                <div class="ibox-content">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th class="text-center">Coordenador</th>
                            <th class="text-center">S1</th>
                            <th class="text-center">S2</th>
                            <th class="text-center">S3</th>
                            <th class="text-center">S4</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tbl_previsao as $value): ?>
                            <tr>
                                <td class="font-bold"><?php echo $value['equipe'] ?></td>
                                <?php if (isset($value['S1'])): ?>
                                    <td>R$<?php echo number_format($value['S1'],2, ',' , '.')?></td>
                                <?php else: ?>
                                    <td>R$0,00</td>
                                <?php endif ?>
                                <?php if (isset($value['S2'])): ?>
                                    <td>R$<?php echo number_format($value['S2'],2, ',' , '.')?></td>
                                <?php else: ?>
                                    <td>R$0,00</td>
                                <?php endif ?>
                                <?php if (isset($value['S3'])): ?>
                                    <td>R$<?php echo number_format($value['S3'],2, ',' , '.')?></td>
                                <?php else: ?>
                                    <td>R$0,00</td>
                                <?php endif ?>
                                <?php if (isset($value['S4'])): ?>
                                    <td>R$<?php echo number_format($value['S4'],2, ',' , '.')?></td>
                                <?php else: ?>
                                    <td>R$0,00</td>
                                <?php endif ?>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            </div>
            <div class="col-lg-6">
                <div class="ibox-content">
                    <canvas id="coordenador_previsao"></canvas>
                </div>
            </div>
        </div>
    </div>
    <form method="post">
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-1"><i class="fa fa-calendar"></i> Semana 1</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-2"><i class="fa fa-calendar"></i> Semana 2</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-3"><i class="fa fa-calendar"></i> Semana 3</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-4"><i class="fa fa-calendar"></i> Semana 4</a></li>
                        </ul>
                    </div>
                    <div class="ibox-content">
                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane active">
                                    <table class="table table-striped" id="tab-1">
                                         <thead>
                                             <tr>
                                                 <th>Nome</th>
                                                 <th>Valor</th>
                                                 <th>Proxima Atividade</th>
                                                 <th>Vendedor</th>
                                                 <th>Status</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                             <?php if (isset($semana1)): ?>
                                             <?php foreach ($semana1 as $dados): ?>
                                            <tr>
                                                <td>
                                                    <?php echo $dados['0']['title'] ?>
                                                </td>
                                                <td>
                                                    <?php echo "R$", number_format($dados['0']['value'],2, ',' , '.') ?>
                                                </td>
                                                <td>
                                                    <?php echo date("d/m/Y", strtotime($dados['0']['next_activity_date'])) ?>
                                                </td>
                                                <td>
                                                    <?php echo $dados['0']['closer'] ?>
                                                </td>
                                                <td>
                                                    <select class="form-control m-b" name="<?php echo $dados['0']['id'] ?>/S1/<?php echo date('m-Y')?>">
                                                        <?php if (!isset($dados['0']['resultado'])): ?>
                                                            <option></option>
                                                            <option>Sim</option>
                                                            <option>Não</option>
                                                        <?php else: ?>
                                                            <option><?php echo $dados['0']['resultado'] ?></option>
                                                             <option>Sim</option>
                                                            <option>Não</option>
                                                        <?php endif ?>
                                                    </select>
                                                </td>
                                            </tr>
                                             <?php endforeach ?>   
                                             <?php endif ?>
                                         </tbody>
                                    </table>
                            </div>
                            <div id="tab-2" class="tab-pane">
                                    <table class="table table-striped" id="tab-2">
                                        <thead>
                                             <tr>
                                                 <th>Nome</th>
                                                 <th>Valor</th>
                                                 <th>Proxima Atividade</th>
                                                 <th>Vendedor</th>
                                                 <th>Status</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (isset($semana2)): ?>
                                            <?php foreach ($semana2 as $dados): ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $dados['0']['title'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo "R$", number_format($dados['0']['value'],2, ',' , '.') ?>
                                                    </td>
                                                    <td>
                                                        <?php echo date("d/m/Y", strtotime($dados['0']['next_activity_date'])) ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $dados['0']['closer'] ?>
                                                    </td>
                                                    <td>
                                                        <select class="form-control m-b" name="<?php echo $dados['0']['id']?>/S2/<?php echo date('m-Y')?>">
                                                        <?php if (!isset($dados['0']['resultado'])): ?>
                                                            <option></option>
                                                            <option>Sim</option>
                                                            <option>Não</option>
                                                        <?php else: ?>
                                                            <option><?php echo $dados['0']['resultado'] ?></option>
                                                             <option>Sim</option>
                                                             <option>Não</option>
                                                        <?php endif ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                             <?php endforeach ?>
                                            <?php endif ?>
                                         </tbody>
                                    </table>
                            </div>
                            <div id="tab-3" class="tab-pane">
                                    <table class="table table-striped" id="tab-3">
                                         <thead>
                                             <tr>
                                                 <th>Nome</th>
                                                 <th>Valor</th>
                                                 <th>Proxima Atividade</th>
                                                 <th>Vendedor</th>
                                                 <th>Status</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                            <?php if (isset($semana3)): ?>
                                            <?php foreach ($semana3 as $dados): ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $dados['0']['title'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo "R$", number_format($dados['0']['value'],2, ',' , '.') ?>
                                                    </td>
                                                    <td>
                                                        <?php echo date("d/m/Y", strtotime($dados['0']['next_activity_date'])) ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $dados['0']['closer'] ?>
                                                    </td>
                                                    <td>
                                                        <select class="form-control m-b" name="<?php echo $dados['0']['id']?>/S3/<?php echo date('m-Y')?>">
                                                        <?php if (!isset($dados['0']['resultado'])): ?>
                                                            <option></option>
                                                            <option>Sim</option>
                                                            <option>Não</option>
                                                        <?php else: ?>
                                                            <option><?php echo $dados['0']['resultado'] ?></option>
                                                             <option>Sim</option>
                                                            <option>Não</option>
                                                        <?php endif ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                             <?php endforeach ?>
                                            <?php endif ?>
                                         </tbody>
                                    </table>
                            </div>
                            <div id="tab-4" class="tab-pane">
                                    <table class="table table-striped" id="tab-4">
                                         <thead>
                                             <tr>
                                                 <th>Nome</th>
                                                 <th>Valor</th>
                                                 <th>Proxima Atividade</th>
                                                 <th>Vendedor</th>
                                                 <th>Status</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                            <?php if (isset($semana4)): ?>
                                             <?php foreach ($semana4 as $dados): ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $dados['0']['title'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo "R$", number_format($dados['0']['value'],2, ',' , '.') ?>
                                                    </td>
                                                    <td>
                                                        <?php echo date("d/m/Y", strtotime($dados['0']['next_activity_date'])) ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $dados['0']['closer'] ?>
                                                    </td>
                                                    <td>
                                                        <select class="form-control m-b" name="<?php echo $dados['0']['id']?>/S4/<?php echo date('m-Y')?>">
                                                        <?php if (!isset($dados['0']['resultado'])): ?>
                                                            <option></option>
                                                            <option>Sim</option>
                                                            <option>Não</option>
                                                        <?php else: ?>
                                                            <option><?php echo $dados['0']['resultado'] ?></option>
                                                             <option>Sim</option>
                                                            <option>Não</option>
                                                        <?php endif ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                             <?php endforeach ?>   
                                            <?php endif ?>
                                         </tbody>
                                    </table>
                                </div>
                            </div>
                        <button class="btn btn-primary" value="Entrar" id="salvar">Salvar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox-content col-lg-2 text-center">
                <div class="ibox float-e-margins">
                    <?php foreach ($contato_equipe as $vendedores): ?>
                    <div class="feed-element" >
                        <a href="javascript:void(0);" class="pull-left" >
                        <img alt="image" id="<?php echo $vendedores['user_id'] ?>" class="img-circle" src="<?php echo asset(), $vendedores['img'] ?>">
                        </a>
                        <strong><?php echo $vendedores['name'] ?></strong>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
            <div id="contas"></div>
        </div>
    </div>
    </form>
</div>