
    <div class="wrapper wrapper-content  animated fadeInRight">
        <div class="row">
            <div class="col-lg-8">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Clientes</h5>
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
                                        <th>Data Ganho</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($clientes as $dados):?>
                                    <tr>
                                        <td class="client-avatar"><img alt="image" src="<?php echo asset(), $dados['img'] ?>"> </td>
                                        <td><a data-toggle="tab" href="<?php echo $dados['id'] ?>" class="client-link clientela"><?php echo $dados['title'] ?></a></td>
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