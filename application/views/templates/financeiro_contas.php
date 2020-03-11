        <!-- Date range use moment.js same as full calendar plugin -->
        <script src="<?php echo asset() ?>js/plugins/fullcalendar/moment.min.js"></script>
        <link href="<?php echo asset() ?>css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">

        <!-- Date range picker -->
        <script src="<?php echo asset() ?>js/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- FooTable -->
        <link href="<?php echo asset() ?>css/plugins/footable/footable.core.css" rel="stylesheet">
        <!-- FooTable -->
        <script src="<?php echo asset() ?>js/plugins/footable/footable.all.min.js"></script>
        
            <!-- Page-Level Scripts -->
            <script>
                $(document).ready(function() {
                    $('.footable').footable();
                    $('.footable2').footable();

                    $('#data_5 .input-daterange').datepicker({
                    keyboardNavigation: false,
                    forceParse: false,
                    autoclose: true
                    });
                    
                    $('input[name="daterange"]').daterangepicker();
                });
            </script>

                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5 style="padding-right: 10px;">Clientes Pagos</h5>
                            <form method="post" ajax=true action="<?php echo base_url() ?>Ajustes_Controller/get_clientes_pagos">
                                <div class="form-group"  id="data_5">
                                    <div class="input-daterange input-group" id="datepicker">
                                        <input type="text" class="input-sm form-control" id="data_ini" name="data_ini" value="<?php echo date('m/d/Y') ?>"/>
                                        <span class="input-group-addon">to</span>
                                        <input type="text" class="input-sm form-control" id="data_fim" name="data_fim" value="<?php echo date('m/d/Y') ?>" />
                                        <input type="hidden" name="id" value="<?php echo $dados['0']['email'] ?>">
                                    </div>
                                </div>
                                <input type="submit" value="Submit" />
                            </form>
                        </div>
                        <div class="ibox-content">
                            <table class="footable table table-stripped toggle-arrow-tiny">
                                <thead>
                                <tr>
                                    <th data-toggle="true">Cliente</th>
                                    <th>Valor</th>
                                    <th data-hide="all">CRM</th>
                                    <th data-hide="all">Data Venda</th>
                                    <th data-hide="all">Data Pagamento</th>
                                    <th data-hide="all">Produto</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php if (isset($dados['0']['NOMEFANTASIA'])): ?>                                        
                                    <?php foreach ($dados as $value): ?>
                                        <tr>
                                            <td><?php echo $value['NOMEFANTASIA'] ?></td>
                                            <td><?php echo $value['VALOR_MENSALIDADE'] ?></td>
                                            <td><a href="http://solides.adm.br/solides/crm/clientefornecedor/edit/<?php echo $value['IDCLIFOR'] ?>" target="_blank" ><?php echo $value['IDCLIFOR']; ?></a></td>
                                            <td><?php echo date_format(date_create($value['DATAVENDA']),'d-m-Y') ?></td>
                                            <td><?php echo date_format(date_create($value['DATAPGTO']),'d-m-Y') ?></td>
                                            <td><?php echo $value['NOMEPRODUTO'] ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                    <?php endif ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="5">
                                        <ul class="pagination pull-right"></ul>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                            <h4>TOTAL PAGO: <?php echo "R$", number_format($dados['0']['valor_total'],2,',' , '.') ?></h4>
                        </div>
                    </div>
<script>
    $(document).ready(function(e) {
    
    $("form[ajax=true]").submit(function(e) {
        
        e.preventDefault();
        
        var form_data = $(this).serialize();
        var form_url = $(this).attr("action");
        var form_method = $(this).attr("method").toUpperCase();
        console.log(form_data);
        $.ajax({
            url: form_url, 
            type: form_method,      
            data: form_data,     
            cache: false,
            success: function(result){                          
                $("#view_financeiro").html(result);                   
            }           
        });    
        
    });
    
});
</script>