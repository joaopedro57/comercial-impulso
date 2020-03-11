       

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

    <script>
        $(document).ready(function() {

            $('.footable').footable();
            $('.footable2').footable();

        });

    </script>

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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    <script>
        $(document).ready(function(){

            $("#gerarCupom").click(function() {
                alert("Criar o Cupom?");
                var form = {
                    user_id : $("#user_id").val(),
                    cargo : $("#cargo").val(),
                    cupom : $("#cupom").val(),
                    desconto : $("#desconto").val(),
                    quantidade : $("#quantidade").val(),
                    vencimento : $("#vencimento").val(),
                    qnt_creditos: $('#credito').val(),
                    valor_total : $('#total').val(),
                    idclifor : $('#idclifor').val(),
                    nome_cliente : $('#nome_cliente').val(),
                    email : $('#email_cliente').val(),
                    cpf_cnpj : $('#cpf_cnpj').val(),
                    status : $('#status').val()
                };
                var res;
                console.log(form);
                $.ajax({
                    url: "<?php echo base_url() ?>Cupom/cadastrarCupom",
                    data: form ,
                    method: 'post',
                    success: function(result){   
                        if (result == 0) {
                            swal({
                                title: "OPss!!!",
                                text: "Desconto está acima doque você pode dar!!",
                                icon: "error",
                                button: "Tente Denovo!!",
                            })
                        }
                        else if (result == 1) {
                            swal({
                                title: "Opss!!!",
                                text: "Data de vencimento está errada!!",
                                icon: "error",
                                button: "Tente denovo"
                            })
                        }
                        else if (result == 2) {
                            swal({
                                title: "Cupom Criado!!!",
                                text: "Cupom Criado com sucesso!!",
                                icon: "success",
                                button: "Ok",
                                value: "ok"
                            })
                            .then((ok) => {
                                    window.location.replace("http://comercial.solides.adm.br/Cupom");
                                });
                        }
                        else if (result == 3) {
                            swal({
                                title: "OPss!!!",
                                text: "Cupom já existe!!",
                                icon: "error",
                                button: "Tente denovo"
                            })
                        }
                        else if (result == 4) {
                            swal({
                                title: "OPss!!!",
                                text: "Confira o IDCLIFOR!!",
                                icon: "error",
                                button: "Tente denovo"
                            })
                        }
                    },
                    error: function(result){
                        alert("ERRO!");
                    }
                });
            });
        
            $('#status').change(function() {
                if ( $("#status").val() === "Sim") {
                    $(".n_cliente").hide();
                     $(".cliente").show();
                }
                else if( $("#status").val() === "Nao"){
                    $(".cliente").hide();
                    $(".n_cliente").show();
                }
                else {
                    $(".cliente").hide();
                    $(".n_cliente").hide();  
                }
            });

            $('#credito,#desconto').change(function() {
                var credito = $('#credito').val();
                var desconto = $('#desconto').val()/100;
                if( credito < 5 ){
                    var valor = 69.90*credito-((69.90*credito)*desconto);
                    $('#total').val(valor.toFixed(2));
                }
                else if( credito >= 5 && credito < 9){
                    var valor = 64.90*credito -((64.90*credito)*desconto);
                    $('#total').val(valor.toFixed(2));
                }
                else if( credito >= 10 && credito < 14){
                    var valor = 59.90*credito -((59.90*credito)*desconto);
                    $('#total').val(valor.toFixed(2));
                }
                else if( credito >= 15 && credito < 19){
                    var valor = 54.90*credito -((54.90*credito)*desconto);
                    $('#total').val(valor.toFixed(2));
                }
                else if( credito >= 20 && credito < 29){
                    var valor = 49.90*credito -((49.90*credito)*desconto);
                    $('#total').val(valor.toFixed(2));
                }
                else if( credito >= 30 && credito < 39){
                    var valor = 46.90*credito -((46.90*credito)*desconto);
                    $('#total').val(valor.toFixed(2));
                }
                else if( credito >= 40 && credito < 49){
                    var valor = 43.90*credito -((43.90*credito)*desconto);
                    $('#total').val(valor.toFixed(2));
                }
                else if( credito >= 50){
                    var valor = 41.90*credito -((41.90*credito)*desconto);
                    $('#total').val(valor.toFixed(2));
                }
            });

        });
    </script>
</body>
</html>
