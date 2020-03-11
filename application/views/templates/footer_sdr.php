       

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
    
   <script >
        $(function() {
        
     Morris.Line({
        element: 'grafico-perfil-sdr',
        data:  [{ y: "<?php echo $grafico['0']['meses'] ?>", a: <?php echo $grafico['0']['shows'] ?>, b: <?php echo $grafico['0']['meta'] ?> },
                { y: "<?php echo $grafico['1']['meses'] ?>", a: <?php echo $grafico['1']['shows'] ?>, b: <?php echo $grafico['1']['meta'] ?> }, 
                { y: "<?php echo $grafico['2']['meses'] ?>", a: <?php echo $grafico['2']['shows'] ?>, b: <?php echo $grafico['2']['meta'] ?> },
                { y: "<?php echo $grafico['3']['meses'] ?>", a: <?php echo $grafico['3']['shows'] ?>, b: <?php echo $grafico['3']['meta'] ?> } ,
                { y: "<?php echo $grafico['4']['meses'] ?>", a: <?php echo $grafico['4']['shows'] ?>, b: <?php echo $grafico['4']['meta'] ?> } ,
                { y: "<?php echo $grafico['5']['meses'] ?>", a: <?php echo $grafico['5']['shows'] ?>, b: <?php echo $grafico['5']['meta'] ?> } , 
                { y: "<?php echo $grafico['6']['meses'] ?>", a: <?php echo $grafico['6']['shows'] ?>, b: <?php echo $grafico['6']['meta'] ?> } ,
                { y: "<?php echo $grafico['7']['meses'] ?>", a: <?php echo $grafico['7']['shows'] ?>, b: <?php echo $grafico['7']['meta'] ?> } , 
                { y: "<?php echo $grafico['8']['meses'] ?>", a: <?php echo $grafico['8']['shows'] ?>, b: <?php echo $grafico['8']['meta'] ?> },
                { y: "<?php echo $grafico['9']['meses'] ?>", a: <?php echo $grafico['9']['shows'] ?>, b: <?php echo $grafico['9']['meta'] ?> },
                { y: "<?php echo $grafico['10']['meses'] ?>",a: <?php echo $grafico['10']['shows'] ?>, b: <?php echo $grafico['10']['meta'] ?> },
                { y: "<?php echo $grafico['11']['meses'] ?>",a: <?php echo $grafico['11']['shows'] ?>, b: <?php echo $grafico['11']['meta'] ?>}],
                
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['Feito', 'Meta'],
        hideHover: 'auto',
        resize: true,
        lineColors: ['#54cdb4','#1ba373'],
        });
     });
    </script>

</body>
</html>
