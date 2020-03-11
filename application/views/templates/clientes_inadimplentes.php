
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Basic Data Tables example with responsive plugin</h5>
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
<script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

        });
</script>