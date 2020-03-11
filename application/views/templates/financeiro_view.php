    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12 ibox-content">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-1"><i class="fa fa-money"></i>Closers</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-2"><i class="fa fa-phone"></i>SDR</a></li>
                        </ul>
                    </div>
                    <div class="ibox-content">
                        <div class="tab-content">
                            <form method="post">
                                <div class="form-group"  id="data_5">
                                    <div class="input-daterange input-group" id="datepicker">
                                        <input type="text" class="input-sm form-control" id="data_ini" name="data_ini" value="<?php echo date_format(date_create($data_ini), 'm/d/Y') ?>"/>
                                        <span class="input-group-addon">to</span>
                                        <input type="text" class="input-sm form-control" id="data_fim" name="data_fim" value="<?php echo date_format(date_create($data_fim), 'm/d/Y') ?>" />
                                    </div>
                                </div>
                                <button class="btn btn-primary " type="submit"><strong>Buscar</strong></button>
                            </form>
                            <div id="tab-1" class="tab-pane active">
                                <div class="col-lg-7">
                                    <div class="table-responsive">
                                        <table id="clientes" class="table table-striped table-bordered table-hover dataTables-example" >
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Closer</th>
                                                    <th>Total de Comissão</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($vendedor as $dados):?>
                                                <tr>
                                                    <td class="client-avatar"><img alt="image" src="<?php echo asset(), $dados['img'] ?>"> </td>
                                                    <td><a data-toggle="tab" id="dinheiro" href="<?php echo $dados['email'] ?>" class="client-link dinheiro"><?php echo $dados['name'] ?></a></td>
                                                    <?php if ($dados['comissao'] < 1607.37): ?>
                                                        <td>R$0,00</td> 
                                                    <?php else: ?>
                                                        <td>R$<?php echo  number_format(($dados['comissao']-1607.37),2,',' , '.') ?></td>
                                                    <?php endif ?>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div id="view_financeiro"></div>
                                </div>
                            </div>
                            <div id="tab-2" class="tab-pane">
                                <table class="footable table table-stripped" data-page-size="30" data-filter=#filter id="tab-2">
                                    <thead>
                                        <tr>
                                            <th class="text-center"></th>
                                            <th class="text-center">SDR</th>
                                            <th class="text-center">Meta</th>
                                            <th class="text-center">Shows</th>
                                            <th class="text-center">% da Meta</th>
                                            <th class="text-center">Comissão</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($sdr as $value): ?>
                                            <tr>
                                                <td class="client-avatar text-center"><img alt="image" src="<?php echo asset(), $value['img'] ?>" ></td>
                                                <td class="text-center"><?php echo $value['nome'] ?></td>
                                                <td class="text-center"><?php echo $value['meta'] ?></td>                                         
                                                <td class="text-center"><?php echo $value['shows'] ?></td>
                                                <?php if ($value['meta'] == 0): ?>
                                                 <td class="text-center">0%</td>
                                                 <?php else: ?>
                                                 <td class="text-center"><?php echo round(($value['shows']/$value['meta'])*100) ?>%</td>   
                                                <?php endif ?>
                                                <?php if($value['meta'] == 0): ?>
                                                <td class="text-center">R$0,00</td>
                                                <?php elseif (($value['shows']/$value['meta'])*100 <= 100): ?>
                                                <td class="text-center">R$0,00</td>
                                                <?php elseif(($value['shows']/$value['meta'])*100 > 100 && ($value['shows']/$value['meta'])*100 <= 115): ?>
                                                <td class="text-center">R$600,00</td>
                                                <?php elseif(($value['shows']/$value['meta'])*100 > 115 && ($value['shows']/$value['meta'])*100 <= 130): ?>
                                                <td class="text-center">R$700,00</td>
                                                <?php elseif(($value['shows']/$value['meta'])*100 > 130): ?>
                                                <td class="text-center">R$800,00</td>
                                                <?php endif ?>
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
    </div>
