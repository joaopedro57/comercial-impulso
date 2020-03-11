       

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
    <!-- Hotjar Tracking Code for www.solides.com.br -->
    <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:1388835,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
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

     <!-- d3 and c3 charts -->
    <script src="<?php echo asset() ?>js/plugins/d3/d3.min.js"></script>
    <script src="<?php echo asset() ?>js/plugins/c3/c3.min.js"></script>

    <!-- Date range use moment.js same as full calendar plugin -->
    <script src="<?php echo asset() ?>js/plugins/fullcalendar/moment.min.js"></script>

    <!-- Date range picker -->
    <script src="<?php echo asset() ?>js/plugins/daterangepicker/daterangepicker.js"></script>

    <!-- Data picker -->
   <script src="<?php echo asset() ?>js/plugins/datapicker/bootstrap-datepicker.js"></script>


    <!-- Forms War Roowm -->

    <script>
        $(document).ready(function() {
        $("form").submit(function(){

            });
       });
    </script>



<!-- Script dos Graficos -->

    <script >
        $(function() {

     Morris.Line({
        element: 'grafico-pagina-inicial',
        data:  [{ y: "<?php echo $grafico['0']['meses'] ?>", a: <?php echo $grafico['0']['vendido'] ?>, b: <?php echo $grafico['0']['meta'] ?> },
                { y: "<?php echo $grafico['1']['meses'] ?>", a: <?php echo $grafico['1']['vendido'] ?>, b: <?php echo $grafico['1']['meta'] ?> }, 
                { y: "<?php echo $grafico['2']['meses'] ?>", a: <?php echo $grafico['2']['vendido'] ?>, b: <?php echo $grafico['2']['meta'] ?> },
                { y: "<?php echo $grafico['3']['meses'] ?>", a: <?php echo $grafico['3']['vendido'] ?>, b: <?php echo $grafico['3']['meta'] ?> } ,
                { y: "<?php echo $grafico['4']['meses'] ?>", a: <?php echo $grafico['4']['vendido'] ?>, b: <?php echo $grafico['4']['meta'] ?> } ,
                { y: "<?php echo $grafico['5']['meses'] ?>", a: <?php echo $grafico['5']['vendido'] ?>, b: <?php echo $grafico['5']['meta'] ?> } , 
                { y: "<?php echo $grafico['6']['meses'] ?>", a: <?php echo $grafico['6']['vendido'] ?>, b: <?php echo $grafico['6']['meta'] ?> } ,
                { y: "<?php echo $grafico['7']['meses'] ?>", a: <?php echo $grafico['7']['vendido'] ?>, b: <?php echo $grafico['7']['meta'] ?> } , 
                { y: "<?php echo $grafico['8']['meses'] ?>", a: <?php echo $grafico['8']['vendido'] ?>, b: <?php echo $grafico['8']['meta'] ?> },
                { y: "<?php echo $grafico['9']['meses'] ?>", a: <?php echo $grafico['9']['vendido'] ?>, b: <?php echo $grafico['9']['meta'] ?> },
                { y: "<?php echo $grafico['10']['meses'] ?>",a: <?php echo $grafico['10']['vendido'] ?>, b: <?php echo $grafico['10']['meta'] ?> },
                { y: "<?php echo $grafico['11']['meses'] ?>",a: <?php echo $grafico['11']['vendido'] ?>, b: <?php echo $grafico['11']['meta'] ?>}],
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['Feito', 'Meta'],
        hideHover: 'auto',
        resize: true,
        lineColors: ['#1AB3B0','#ed5565'],
        });
     });

    </script>
    <script>
        $(function(){
            Morris.Line({
                element: 'grafico-pagina-gestao',
                data:  [{ y: "01",   a: 43680.36,   b: 43775 },
                        { y: "02",   a: 27227.45,   b: 39525 }, 
                        { y: "03",   a: 31639.78,   b: 40375 },
                        { y: "04",   a: 39686.44,   b: 36125 } ,
                        { y: "05",   a: 36770.24,   b: 36550 } ,
                        { y: "06",   a: 50669.12,   b: 41225 } , 
                        { y: "07",   a: 46068.85,   b: 45475 } ,
                        { y: "08",   a: 47547.99,   b: 62050 } , 
                        { y: "09",   a: <?php echo $valor['0']['SUM(value)'] ?>, b: <?php echo $somaMetas['0']['SUM(meta)']*0.85 ?>}],
                xkey: 'y',
                ykeys: ['a', 'b'],
                labels: ['Feito', 'Meta'],
                hideHover: 'auto',
                resize: true,
                lineColors: ['#1AB3B0','#ed5565'],
                });
            });
    </script>
    
    <script >
        $(function() {
        
     Morris.Line({
        element: 'grafico-perfil',
        data:  [{ y: "<?php echo $grafico['0']['meses'] ?>", a: <?php echo $grafico['0']['vendido'] ?>, b: <?php echo $grafico['0']['meta'] ?> },
                { y: "<?php echo $grafico['1']['meses'] ?>", a: <?php echo $grafico['1']['vendido'] ?>, b: <?php echo $grafico['1']['meta'] ?> }, 
                { y: "<?php echo $grafico['2']['meses'] ?>", a: <?php echo $grafico['2']['vendido'] ?>, b: <?php echo $grafico['2']['meta'] ?> },
                { y: "<?php echo $grafico['3']['meses'] ?>", a: <?php echo $grafico['3']['vendido'] ?>, b: <?php echo $grafico['3']['meta'] ?> } ,
                { y: "<?php echo $grafico['4']['meses'] ?>", a: <?php echo $grafico['4']['vendido'] ?>, b: <?php echo $grafico['4']['meta'] ?> } ,
                { y: "<?php echo $grafico['5']['meses'] ?>", a: <?php echo $grafico['5']['vendido'] ?>, b: <?php echo $grafico['5']['meta'] ?> } , 
                { y: "<?php echo $grafico['6']['meses'] ?>", a: <?php echo $grafico['6']['vendido'] ?>, b: <?php echo $grafico['6']['meta'] ?> } ,
                { y: "<?php echo $grafico['7']['meses'] ?>", a: <?php echo $grafico['7']['vendido'] ?>, b: <?php echo $grafico['7']['meta'] ?> } , 
                { y: "<?php echo $grafico['8']['meses'] ?>", a: <?php echo $grafico['8']['vendido'] ?>, b: <?php echo $grafico['8']['meta'] ?> },
                { y: "<?php echo $grafico['9']['meses'] ?>", a: <?php echo $grafico['9']['vendido'] ?>, b: <?php echo $grafico['9']['meta'] ?> },
                { y: "<?php echo $grafico['10']['meses'] ?>",a: <?php echo $grafico['10']['vendido'] ?>, b: <?php echo $grafico['10']['meta'] ?> },
                { y: "<?php echo $grafico['11']['meses'] ?>",a: <?php echo $grafico['11']['vendido'] ?>, b: <?php echo $grafico['11']['meta'] ?>}],
                
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['Feito', 'Meta'],
        hideHover: 'auto',
        resize: true,
        lineColors: ['#54cdb4','#1ba373'],
        });
     });
    </script>
    
    <script >
        $(function() {
                var barData = {
        labels: ["Semana 1", "Semana 2", "Semana 3", "Semana 4"],
        datasets: [
            {
                label: "Meta",
                backgroundColor: 'rgba(237, 85, 101, 0.5)',
                pointBorderColor: "#fff",
                data: [<?php echo ($somaMetas['0']['meta'])*0.15 ?>, <?php echo ($somaMetas['0']['meta'])*0.25 ?>, <?php echo ($somaMetas['0']['meta'])*0.35 ?>, <?php echo ($somaMetas['0']['meta'])*0.25 ?>]
            },
            {
                label: "Feito",
                backgroundColor: 'rgba(26,179,148,0.5)',
                borderColor: "rgba(26,179,148,0.7)",
                pointBackgroundColor: "rgba(26,179,148,1)",
                pointBorderColor: "#fff",
                data: [<?php echo ($valor['0']['SUM(value)'])?>  ]
            }
        ]
    };

    var barOptions = {
        responsive: true
    };


    var ctx2 = document.getElementById("barChart").getContext("2d");
    new Chart(ctx2, {type: 'bar', data: barData, options:barOptions});
        });
    </script>
    
    <script >
        $(function() {
            var lineData = {
        labels: ["Jan", "Fev", "Mar", "Abi", "Mai", "Jun", "Jul","Ago","Set","Out","Nov","Dez"],
        datasets: [

            {
                label: "Tkt Médio",
                backgroundColor: 'rgba(26,179,148,0.5)',
                borderColor: "rgba(26,179,148,0.7)",
                pointBackgroundColor: "rgba(26,179,148,1)",
                pointBorderColor: "#fff",
                data: [756.92,907.03,859.88,982.46,<?php echo round($valor['0']['SUM(value)']/$nConta['0']['count(id)']) ?>]
            },{
                label: "Contas",
                backgroundColor: 'rgba(28, 132, 198, 0.5)',
                pointBorderColor: "#fff",
                data: [72,68,52,60, <?php echo $nConta['0']['count(id)'] ?>]
            }
        ]
    };

    var lineOptions = {
        responsive: true
    };


    var ctx = document.getElementById("tkt").getContext("2d");
    new Chart(ctx, {type: 'line', data: lineData, options:lineOptions});
        });
    </script>

    <script>
        $(function() {
            var doughnutData = {
                labels: ["<?php echo $mercado['1']['mercado'] ?>" ,"<?php echo $mercado['2']['mercado'] ?>","<?php echo $mercado['3']['mercado'] ?>","<?php echo $mercado['4']['mercado'] ?>","<?php echo $mercado['5']['mercado'] ?>","<?php echo $mercado['6']['mercado'] ?>" ],
                datasets: [{
                    data: [<?php echo $mercado['1']['COUNT(id)'] ?>,<?php echo $mercado['2']['COUNT(id)'] ?>,<?php echo $mercado['3']['COUNT(id)'] ?>,<?php echo $mercado['4']['COUNT(id)'] ?>,<?php echo $mercado['5']['COUNT(id)'] ?>,<?php echo $mercado['6']['COUNT(id)'] ?>],
                    backgroundColor: ["#a3e1d4","#dedede","#b5b8cf","#30ba9e","#2fb7b7","#2f91b7"]
                }]
            } ;


            var doughnutOptions = {
                responsive: true
            };


            var ctx4 = document.getElementById("mercado").getContext("2d");
            new Chart(ctx4, {type: 'doughnut', data: doughnutData, options:doughnutOptions});

            var doughnutData = {
                labels: ["<?php echo $origem['1']['origem'] ?>" ,"<?php echo $origem['2']['origem'] ?>","<?php echo $origem['3']['origem'] ?>","<?php echo $origem['4']['origem'] ?>","<?php echo $origem['5']['origem'] ?>","<?php echo $origem['6']['origem'] ?>" ],
                datasets: [{
                    data: [<?php echo $origem['1']['COUNT(id)'] ?>,<?php echo $origem['2']['COUNT(id)'] ?>,<?php echo $origem['3']['COUNT(id)'] ?>,<?php echo $origem['4']['COUNT(id)'] ?>,<?php echo $origem['5']['COUNT(id)'] ?>,<?php echo $origem['6']['COUNT(id)'] ?>],
                    backgroundColor: ["#a3e1d4","#dedede","#b5b8cf","#30ba9e","#2fb7b7","#2f91b7"]
                }]
            } ;


            var doughnutOptions = {
                responsive: true
            };


            var ctx4 = document.getElementById("origem").getContext("2d");
            new Chart(ctx4, {type: 'doughnut', data: doughnutData, options:doughnutOptions});
        });
        
    </script>
    <script>
        $(function() { 
            var barData = {
        labels: ["<?php echo $lost['0']['motivo_lost']?>", "<?php echo $lost['1']['motivo_lost']?>", "<?php echo $lost['2']['motivo_lost']?>", "<?php echo $lost['3']['motivo_lost']?>", "<?php echo $lost['4']['motivo_lost']?>", "<?php echo $lost['5']['motivo_lost']?>"],
        datasets: [
            {
                label: "Perdidos",
                backgroundColor: 'rgba(237, 85, 101, 0.5)',
                pointBorderColor: "#fff",
                data: [<?php echo $lost['0']['COUNT(id)'] ?>, <?php echo $lost['1']['COUNT(id)'] ?>, <?php echo $lost['2']['COUNT(id)'] ?>, <?php echo $lost['3']['COUNT(id)'] ?>, <?php echo $lost['4']['COUNT(id)'] ?>, <?php echo $lost['5']['COUNT(id)'] ?> ]
            },
        ]
    };

    var barOptions = {
        responsive: true
    };


    var ctx2 = document.getElementById("perdido").getContext("2d");
    new Chart(ctx2, {type: 'horizontalBar', data: barData, options:barOptions});
        });
    </script>
    <script>
        $(function(){
           c3.generate({
                bindto: '#gauge',
                data:{
                    columns: [
                        ['MQL Gerado', <?php echo round(($leadsMes['0']['COUNT(id)']*100)/3000) ?>]
                    ],

                    type: 'gauge'
                },
                color:{
                    pattern: ['#1ab394', '#f0a4ad']

                }
            });
        });
    </script>
    <script>
        $(document).ready(function(){
           $("#menu1").click(function(){
                /*if ( document.getElementById("menu").className.match(/(?:^|\s)pace-done(?!\S)/) ) {
                    document.getElementById("menu").className = "pace-done mini-navbar body-small";
                }
                else {
                    document.getElementById("menu").className = "pace-done";
                }*/
                document.getElementById("menu").className = "pace-done mini-navbar body-small";
            });

           $("#menu2").click(function(){
                document.getElementById("menu").className = "pace-done";
           });
        });        
    </script>
    <script>
        $(document).ready(function(){
            $(".clientela").click(function() {
                var id = {
                     id : $(this).attr("href")
                };
                var res;
                console.log(id);
                $.ajax({
                    url: "<?php echo base_url() ?>Ajustes_Controller/result_cliente",
                    data: id ,
                    method: 'post',
                    dataType:'json',
                    success: function(result){
                        $("div #aparecer").remove();
                       console.log(result);
                       var html = "<div id='aparecer' class='col-sm-4'><div class='ibox'><div class='ibox-content'><div class='tab-content'><div class='tab-pane active'> <div class='row m-b-lg'> <div class='col-lg-12 text-center'> <h2> <strong>" + result.title + "</strong> </h2> </div><div class='col-lg-12'> <p> " + result.cenario_lead + " </p></div></div><div class='client-detail' style='display: inline-block;'> <div class='full-height-scroll'> <strong>Condições de Fechamento</strong> <p> " + result.condicao_fechamento + " </p><hr/> <strong>Resumo do Fechamento</strong> <p> " + result.resumo_fechamento + " </p><hr/> <strong>Informações da Conta</strong> <div id='vertical-timeline' class='vertical-container dark-timeline'> <div class='vertical-timeline-block'> <div class='vertical-timeline-icon gray-bg'> <i class='fa fa-coffee'></i> </div><div class='vertical-timeline-content'> <p> SDR: " + result.sdr + " </p></div></div><div class='vertical-timeline-block'> <div class='vertical-timeline-icon gray-bg'> <i class='fa fa-briefcase'></i> </div><div class='vertical-timeline-content'> <p> Data do Ganho: " + result.data_ganho + " </p></div></div><div class='vertical-timeline-block'> <div class='vertical-timeline-icon gray-bg'> <i class='fa fa-briefcase'></i> </div><div class='vertical-timeline-content'> <p> ID do Pipe: " + result.id + "</p></div></div><div class='vertical-timeline-block'> <div class='vertical-timeline-icon gray-bg'> <i class='fa fa-briefcase'></i> </div><div class='vertical-timeline-content'> <p> Pessoa em Contato: " + result.pessoa_contato + " </p></div></div><div class='vertical-timeline-block'> <div class='vertical-timeline-icon gray-bg'> <i class='fa fa-bolt'></i> </div><div class='vertical-timeline-content'> <p> Cargo: " + result.cargo + " </p></div></div><div class='vertical-timeline-block'> <div class='vertical-timeline-icon navy-bg'> <i class='fa fa-warning'></i> </div><div class='vertical-timeline-content'> <p> Produto: " + result.produto + " </p></div></div><div class='vertical-timeline-block'> <div class='vertical-timeline-icon gray-bg'> <i class='fa fa-coffee'></i> </div><div class='vertical-timeline-content'> <p> Ciclo de Venda: " + result.ciclo_venda + " </p></div></div></div></div></div></div></div></div></div></div>";
                    
                    $(".dados-cliente").append(html);

                    },
                    error: function(result){
                        alert("ERRO!");
                    }
                });
            });
        });
    </script> 
    <script>
        $(document).ready(function(){
            $("img").click(function() {
                var id = {
                    id : $(this).attr("id")
                };
                var res;
                console.log(id);
                $.ajax({
                    url: "<?php echo base_url() ?>Ajustes_Controller/get_contas",
                    data: id ,
                    method: 'post',
                    success: function(result){   
                        $("#contas").html(result);
                    },
                    error: function(result){
                        alert("ERRO!");
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $(".dinheiro").click(function() {
                var id = {
                    id : $(this).attr("href"),
                    data_ini : $("#data_ini").attr("value"),
                    data_fim : $("#data_fim").attr("value")
                };
                var res;
                console.log(id);
                $.ajax({
                    url: "<?php echo base_url() ?>Ajustes_Controller/get_clientes_pagos",
                    data: id ,
                    method: 'post',
                    success: function(result){   
                        $("#view_financeiro").html(result);
                    },
                    error: function(result){
                        alert("ERRO!");
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $(".mes").click(function() {
                var form = $("#forms_mes").serializeArray();
                console.log(form);
                $.ajax({
                    url: "<?php echo base_url() ?>Ajustes_Controller/meta_geral",
                    data: {
                        dataForm: form
                    },
                    method: 'post',
                    dataType: "JSON",
                    success: function(result){   
                        alert("Salvo");
                    },
                    error: function(result){
                        alert("ERRO!");
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $(".sdr").click(function() {
                var form = $("#forms_sdr").serializeArray();
                console.log(form);
                $.ajax({
                    url: "<?php echo base_url() ?>Ajustes_Controller/sdr_meta",
                    data: {
                        dataForm: form
                    },
                    method: 'post',
                    dataType: "JSON",
                    success: function(result){   
                        alert("Salvo");
                    },
                    error: function(result){ }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $("#comissao_v").click(function() {
                var id = {
                    id : $(this).attr("value"),
                    data_ini : $("#data_ini").attr("value"),
                    data_fim : $("#data_fim").attr("value")
                };
                var res;
                console.log(id);
                $.ajax({
                    url: "<?php echo base_url() ?>Ajustes_Controller/get_clientes_pagos",
                    data: id ,
                    method: 'post',
                    success: function(result){   
                        $("#view_financeiro").html(result);
                    },
                    error: function(result){
                        alert("ERRO!");
                    }
                });
            });
        });
    </script>
    <script >
        $(function() {
                var barData = {
        labels: ["<?php echo $contas_coordenador['0']['equipe'] ?>", "<?php echo $contas_coordenador['1']['equipe'] ?>", "<?php echo $contas_coordenador['2']['equipe'] ?>"],
        datasets: [
            {
                label: "Feito",
                backgroundColor: 'rgba(12, 89, 244, 0.5)',
                pointBorderColor: "#fff",
                data: [<?php echo round($contas_coordenador['0']['Total Vendido']) ?>, <?php echo round($contas_coordenador['1']['Total Vendido']) ?>, <?php echo round($contas_coordenador['2']['Total Vendido']) ?>]
            },
            {
                label: "Numero de Contas",
                backgroundColor: 'rgba(26,179,148,0.5)',
                borderColor: "rgba(26,179,148,0.7)",
                pointBackgroundColor: "rgba(26,179,148,1)",
                pointBorderColor: "#fff",
                data: [<?php echo $contas_coordenador['0']['Total de Contas'] ?>,<?php echo $contas_coordenador['1']['Total de Contas'] ?>,<?php echo $contas_coordenador['2']['Total de Contas'] ?>]
            }
        ]
    };

    var barOptions = {
        responsive: true
    };


    var ctx2 = document.getElementById("coordenador").getContext("2d");
    new Chart(ctx2, {type: 'bar', data: barData, options:barOptions});
        });
    </script>
    <script >
        $(function() {
                    var barData = {
            labels: ["S1","S2","S3","S4"],
            datasets: [
                {
                    label: "Valor Previsao",
                    backgroundColor: 'rgba(26,179,148,0.5)',
                    borderColor: "rgba(26,179,148,0.7)",
                    pointBackgroundColor: "rgba(26,179,148,1)",
                    pointBorderColor: "#fff",
                    data: [<?php echo round($grafico_coordenador['0']['total']) ?>,<?php echo round($grafico_coordenador['1']['total']) ?>,<?php echo round($grafico_coordenador['2']['total']) ?>,<?php echo round($grafico_coordenador['3']['total']) ?>]
                },

                {
                    label: "Valor Entrou",
                    backgroundColor: 'rgba(242,139,14,0.5)',
                    pointBorderColor: "#fff",
                    data: [<?php echo round($grafico_coordenador_status['0']['total']) ?>,<?php echo round($grafico_coordenador_status['1']['total']) ?>,<?php echo round($grafico_coordenador_status['2']['total']) ?>,<?php echo round($grafico_coordenador_status['3']['total']) ?>]
                }
            ]
        };

        var barOptions = {
            responsive: true
        };


        var ctx2 = document.getElementById("coordenador_previsao").getContext("2d");
        new Chart(ctx2, {type: 'horizontalBar', data: barData, options:barOptions});
            });
    </script>
</body>
</html>
