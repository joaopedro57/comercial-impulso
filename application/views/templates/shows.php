    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-1"><i class="fa fa-money"></i>Closers</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-2"><i class="fa fa-phone"></i>SDR</a></li>
                        </ul>
                    </div>
                    <div class="ibox-content">
                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane active">
                                <input type="text" class="form-control input-sm m-b-xs" id="filter" placeholder="Search in table">
                                <table class="footable table table-stripped" id="tab-1" data-page-size="30" data-filter=#filter>
                                    <thead>
                                        <tr>
                                            <th class="text-center"></th>
                                            <th class="text-center">Closer</th>
                                            <th class="text-center">Agendamentos Hoje</th>
                                            <th class="text-center">Agendametos ultimos 7dias</th>
                                            <th class="text-center">Shows ultimos 7dias</th>
                                            <th class="text-center">Shows Recebidos</th>
                                            <th class="text-center">Seus Shows</th>
                                            <th class="text-center">Total de Shows</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($dados as $value): ?>
                                            <tr>
                                                <td class="client-avatar text-center"><img alt="image" src="<?php echo asset(), $value['img'] ?>" ></td>
                                                <td class="text-center"><?php echo $value['nome'] ?></td>
                                                <td class="text-center"><?php echo $value['agendamentos_hj'] ?></td>
                                                <td class="text-center"><?php echo $value['agendamentos_7dias'] ?></td>
                                                <td class="text-center"><?php echo $value['shows_7dias'] ?></td>
                                                <td class="text-center"><?php echo ($value['shows_totais'] - $value['shows_seus'])?></td>
                                                <td class="text-center"><?php echo $value['shows_seus'] ?></td>
                                                 <td class="text-center"><?php echo $value['shows_totais'] ?></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                            <div id="tab-2" class="tab-pane">
                                <input type="text" class="form-control input-sm m-b-xs" id="filter" placeholder="Search in table">
                                <table class="footable table table-stripped" data-page-size="30" data-filter=#filter id="tab-2">
                                    <thead>
                                        <tr>
                                            <th class="text-center"></th>
                                            <th class="text-center">SDR</th>
                                            <th class="text-center">Agendamentos</th>
                                            <th class="text-center">Taxa de Shows</th>
                                            <th class="text-center">Total de Shows</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($shows as $value): ?>
                                            <tr>
                                                <td class="client-avatar text-center"><img alt="image" src="<?php echo asset(), $value['img'] ?>" ></td>
                                                <td class="text-center"><?php echo $value['nome'] ?></td>
                                                <td class="text-center"><?php echo $value['agendamentos'] ?></td>
                                                <?php if ($value['agendamentos'] < 1): ?>
                                                <td class="text-center">0%</td>
                                                <?php else: ?>                                                    
                                                <td class="text-center"><?php echo round(($value['shows']/$value['agendamentos'])*100) ?>%</td>
                                                <?php endif ?>
                                                <td class="text-center"><?php echo $value['shows'] ?></td>
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
