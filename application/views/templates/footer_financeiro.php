       

        <div class="footer" > 
            <div>
                <strong>Copyright </strong> Solides Tecnologia LTDA &copy; 2018-2020
            </div>
        </div>
    </div>
</div>



    
    

    <!-- Mainly scripts -->
    <script src="<?php echo asset() ?>js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo asset() ?>js/bootstrap.min.js"></script>
    <script src="<?php echo asset() ?>js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo asset() ?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Flot -->
    <script src="<?php echo asset() ?>js/plugins/flot/jquery.flot.js"></script>
    <script src="<?php echo asset() ?>js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="<?php echo asset() ?>js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="<?php echo asset() ?>js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="<?php echo asset() ?>js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="<?php echo asset() ?>js/plugins/flot/jquery.flot.symbol.js"></script>
    <script src="<?php echo asset() ?>js/plugins/flot/curvedLines.js"></script>

    <!-- Touch Punch - Touch Event Support for jQuery UI -->
    <script src="<?php echo asset() ?>js/plugins/touchpunch/jquery.ui.touch-punch.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo asset() ?>js/inspinia.js"></script>
    <script src="<?php echo asset() ?>js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="<?php echo asset() ?>js/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="<?php echo asset() ?>js/plugins/dataTables/datatables.min.js"></script>
    <!-- FooTable -->
    <script src="<?php echo asset() ?>js/plugins/footable/footable.all.min.js"></script>


    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function() {

            $('.footable').footable();
            $('.footable2').footable();

        });

    </script>
    
    <script>
        $(document).ready(function(){

            $('#clientes').dataTable();
            
            $('#data_5 .input-daterange').datepicker({
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true
            });
        });
    </script>

    <!-- Jvectormap -->
    <script src="<?php echo asset() ?>js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="<?php echo asset() ?>js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

    <!-- ChartJS-->
    <script src="<?php echo asset() ?>js/plugins/chartJs/Chart.min.js"></script>
    <script src="<?php echo asset() ?>js/demo/chartjs-demo.js"></script>

    <!-- Mainly scripts -->
    <script src="<?php echo asset() ?>js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo asset() ?>js/bootstrap.min.js"></script>
    <script src="<?php echo asset() ?>js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo asset() ?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo asset() ?>js/plugins/dataTables/datatables.min.js"></script>

    <!-- FooTable -->
    <script src="<?php echo asset() ?>js/plugins/footable/footable.all.min.js"></script>

    <style>
    @font-face {
      font-family: 'Glyphicons Halflings';
      src: url('//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/fonts/glyphicons-halflings-regular.eot');
      src: url('//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/fonts/glyphicons-halflings-regular.eot?#iefix') format('embedded-opentype'),
           url('//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/fonts/glyphicons-halflings-regular.woff2') format('woff2'),
           url('//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/fonts/glyphicons-halflings-regular.woff') format('woff'),
           url('//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/fonts/glyphicons-halflings-regular.ttf') format('truetype'),
           url('//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/fonts/glyphicons-halflings-regular.svg#glyphicons_halflingsregular') format('svg');
    }
    </style>
    <!-- Peity -->
    <script src="<?php echo asset() ?>js/plugins/peity/jquery.peity.min.js"></script>

    <!-- Peity demo data -->
    <script src="<?php echo asset() ?>js/demo/peity-demo.js"></script>
    
    <!-- Morris -->
    <script src="<?php echo asset() ?>js/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="<?php echo asset() ?>js/plugins/morris/morris.js"></script>
    
    <!-- iCheck -->
    <script src="<?php echo asset() ?>js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>

     <!-- d3 and c3 charts -->
    <script src="<?php echo asset() ?>js/plugins/d3/d3.min.js"></script>
    <script src="<?php echo asset() ?>js/plugins/c3/c3.min.js"></script>

    <!-- Date range use moment.js same as full calendar plugin -->
    <script src="<?php echo asset() ?>js/plugins/fullcalendar/moment.min.js"></script>

    <!-- Date range picker -->
    <script src="<?php echo asset() ?>js/plugins/daterangepicker/daterangepicker.js"></script>

    <!-- Data picker -->
   <script src="<?php echo asset() ?>js/plugins/datapicker/bootstrap-datepicker.js"></script>

   <script>
        
        $(function() {
         Morris.Line({
            element: 'grafico-financeiro',
            data:  <?php print_r($grafico_recebimento)?> ,
            xkey: 'DATA_ULTIMO_PGTO',
            ykeys: ['SUM(VALOR_MENSALIDADE)'],
            labels: ['Recebidos'],
            hideHover: 'auto',
            resize: true,
            lineColors: ['#1AB3B0'],
            });
         });
        $(document).ready(function(){

             $('#data_4 .input-group.date').datepicker({
                minViewMode: 1,
                keyboardNavigation: false,
                forceParse: false,
                forceParse: false,
                autoclose: true,
                
            });
        });
        $("#filtrar").click(function() {
            var dados = {
                valor:  $("#data").val()
            };
            $.ajax({
                url: "<?php echo base_url() ?>Financeiro_Controller/get_resultado_mes",
                    data: dados ,
                    method: 'post',
                    dataType: 'json',
                    success: function(result){
                        var data = {
                            recebidos: result.recebidos.valor,
                            aReceber: result.aReceber.valor,
                            perda_recebiveis: result.perda_recebiveis.valor,
                            primeiro_pagamento: result.primeiro_pagamento.valor,
                            inadimplente: result.inadimplentes_assinantes
                        };
                        $("#recebidos").attr("text","data.recebidos");
                    }
            });
        });
        $("#inadimplente").click(function(){
            var dados = {
                valor: $("#data").val()
            };
            $.ajax({
                url: "<?php echo base_url()?>Ajustes_Controller/get_inadimplentes",
                data: dados ,
                method: 'post' ,
                dataType: 'json',
                success: function(result){
                    alert("sucesso");
                },
                error: function(result){
                    $("#tabela_inadimplentes").html(result);
                }
            });
        });
   </script>
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

</body>
</html>
