    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <title>Roleta do seu Sucesso</title>
        <meta name="viewport" content="width=device-width" />

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <link href="<?php echo asset() ?>css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo asset() ?>css/roleta.css" rel="stylesheet" />
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css'>
        <link rel="stylesheet" href="<?php echo asset() ?>css/style.css">
        <link href="<?php echo asset() ?>font-awesome/css/font-awesome.css" rel="stylesheet">
        <link href="<?php echo asset() ?>css/animate.css" rel="stylesheet">
        <link rel="shortcut icon" type="image/png" href="<?php echo asset() ?>img/icone_solides2.png"/>

        <style type="text/css">
            @media only screen and (max-width: 768px) {
                .input_field {
                    max-width: 280px;
                }

                .logo-mobile {
                    padding-top: 10px;
                    padding-bottom: 10px;
                }

                .imagem-grafico {
                    padding-left: 0;
                }

                #chart {
                    min-width: 0;
                }

                .dice {
                    display: none;
                }

                .like {
                    display: none;
                }

                .btn_roleta {
                    margin: 30px 0;
                }

                .img {
                    width: 355px;
                    margin-left: -14px;
                    margin-top: 17px;

                }
            }

            @media only screen and (min-width:1066px) {
                .img_arrow {
                    transform: rotate(90deg);
                    width: 65px;
                    margin-left: 86%;
                    margin-top: -112%;
                }
                .foguete {
                    width: 10%;
                    margin-top: -85%;
                }
                .img {
                    margin-left: -6.5%;
                }

                .imagem-grafico {
                    padding-left: 128px;
                }
            }

            @media only screen and (min-width:1600px) {
                .img {
                    margin-left: -5.2%;
                }
                .img_arrow {
                    margin-left: 60%;
                    margin-top: -77%;
                }
                .foguete {
                    margin-top: -68%;
                }
                .cloud_white {
                    height: 30%
                }
                #question {
                    position: absolute;
                    width: 225px;
                    height: 201px;
                    top: 165px;
                    left: 331px;
                }
            }
        </style>

    </head>
    <body style="overflow-x: hidden;">

        <div class="col-md-12" align="center" style="background-color: #102137">
            <div class="col-md-4" align="center"></div>
            <div class="col-md-4" align="center">
                <a class="logo-mobile" href="https://www.solides.com.br" target="blank" ><img src="<?php echo asset() ?>img/logo_branca.png" width="30%" 
            style="
                padding-top: 22px;
                padding-bottom: 22px;
                /*margin-left: 150%;*/
                "/></a>
            </div>
            <div class="col-md-4" align="center"></div>   
        </div>
            </div>
            </div>
        </div>
                <div class="col-md-12 col-xs-12" style="background-image: url(<?php echo asset() ?>img/bg-2.jpg)">
                    <div class="row">
                        <div>
                        <img src="<?php echo asset() ?>img/indique.png" style="margin-left: 23%;margin-top: 4%;width: 53%;margin-bottom: 4%;">
                        </div>
                <div class="col-md-6 col-xs-12 imagem-grafico">
                    <img class="img" src="<?php echo asset() ?>img/roda_03.png" />
                    <div id="chart"></div>
                </div>
                <div class="col-md-6  col-xs-12  description_rollet">
                    <div>
                        <h1 class="aposte">
                            APOSTE AGORA NO <br />
                            SEU SUCESSO!

                        </h1>
                        <form id="indicacao">
                        <div class="form_premio" style="display: inline-flex; justify-content: center;">
                        </div>
                        <div class="form_premio" style="text-align:center;" data-toggle="validator">
                            <input type="text" name="nome" placeholder="Seu nome*" class="input_field" id="nome" required="">
                            <br /> <br />
                            <input type="email" name="email" placeholder="Seu e-mail*" class="input_field" id="email" required="">
                        </div>
                        <br /><p><strong> <font size="4">Agora é a hora de deixar os dados do indicado</font></strong></p><br />
                        <div class="form_premio_indicação" style="text-align:center;" data-toggle="validator">
                            <input type="text" name="nome_indicado" placeholder="Nome do indicado*" class="input_field" id="nome_empresa" required="">
                            <br /> <br />
                            <input type="email" name="email_indicado" placeholder="E-mail do indicado*" class="input_field" id="email_empresa" required="">
                             <br /> <br />
                            <input type="text" name="empresa_indicada" placeholder="Empresa do indicado*" class="input_field" id="empresa" required="">
                            <br /> <br />
                            <input type="tel" name="telefone_indicado" placeholder="Telefone do indicado" class="input_field " id="telefone_empresa">
                            <input type="hidden" name="numero_sorteio" value="" id="sorteio">
                        </div>
                        <img class="dice" src="<?php echo asset() ?>img/dice.png" />
                        <button class="btn_roleta form_premio" type="submit" id="gire">Indicar e Girar</button>
                        <img class="like" src="<?php echo asset() ?>img/like.png" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-xs-12" style="background-color: #f1f1f1">
            <div class="col-md-4  col-xs-12"> </div>
            <div class="col-md-4  col-xs-12 text-center" style="margin-top: 2%">
                <img src="<?php echo asset() ?>img/coracao.png" width="30%""/>
            </div>
            <div class="col-md4  col-xs-12"></div>
            <div class="row" style="margin-top: 5%;">

                    <div class="col-md-12  col-xs-12">
                        <div class="col-md-3 col-xs-12"></div>
                        <div class="col-md-6 col-xs-12">
                            <font color="#102137" size="4">
                            <h1><strong>Na Solides a nossa parceria começa com você ganhando!</strong></h1>
                                <br />
                                <p>
                                    Indique um amigo/profissional que você acredita que precisa conhecer sobre Gestão Comportamental e ganhe prêmios!
                                </p>
                                <br />
                                <p>
                                    <b>Como funciona:</b>
                                </p>

                        <li style="list-style: none;">1- Preencha no formulário acima os dados de quem você gostaria de indicar.</li>
                        <li style="list-style: none;">2- Gire a Roleta.</li>
                        <li style="list-style: none;">3- Confira seu prêmio!! Verifique seu cupom em seu e-mail e conte para o seu consultor comercial!</li>
                        <br />
                        <p>
                            <strong>Regras:</strong>
                            <br /><br>
                            1- Os prêmios não são cumulativos, você poderá indicar quantas pessoas quiser, porém só podera usufruir de um beneficio.
                            <br />
                            2- Essa campanha é por tempo limitado.
                            <br />
                            3- Todos os campos com * devem estar preenchidos.
                            <br />
                            4- Os prêmios só serão válidos mediante a efetuação do termo de adesão.
                            <br />
                            5- O indicado não pode fazer parte da mesma instituição que você atua. 
                            <br />
                        </p>
                            <br />
                            <strong>ATENÇÃO! </strong> Caso você utilize um e-mail inválido no campo:"e-mail do indicado" não terá acesso ao cupom. Então, certifique-se de ter colocado todas as informações corretamente.
                            <br /><br />
                            Em seguida você receberá por e-mail o cupom que deverá utilizar para ativar o seu benefício.
                            <br /><br />
                            Participando dessa promoção você está autorizando a Solides a entrar em contato com a pessoa indicada.
                            <br /><br><br>
                            </font>
                            </div>
                        <div class="col-md-3 col-xs-12"></div>

                    </div>
                </div>
            </div>
           <div class="col-md-12 col-xs-12 text-center" style="background-color: #102137">
            <div>
                <br>
                <font color="white"><h4>Feito pela Solides para você que é apaixonado pelo Desenvolvimento Humano! S2</font>
                <br><br>
            </div>    
        </div>
        <!-- SCRPIT DA PAGINA -->

        <script src="<?php echo asset() ?>Scripts/jquery-1.10.2.min.js"></script>
        <script src="https://d3js.org/d3.v3.min.js" charset="utf-8"></script>
        <script src="<?php echo asset() ?>Scripts/roleta.js?v=4"></script>
       

        <script src="<?php echo asset() ?>Scripts/jquery-1.10.2.js"></script>
        <script>
            $(function () {
                $("#gire").click(function (e) {
                    e.preventDefault();
                  spin();
                });
            });
        </script>

        <script type='text/javascript' src="https://d335luupugsy2.cloudfront.net/js/integration/stable/rd-js-integration.min.js"></script>
        <!-- RD Loader -->
        <script src="<?php echo asset() ?>Scripts/loader_empreendedor.min.js"></script>
        <!-- end RD Loader  -->
        <!-- SCRIPT PARA RODAR A ROLETA -->
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src='https://cdn.jsdelivr.net/velocity/1.0.0/velocity.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js'></script>
        <script  src="<?php echo asset() ?>js/index.js"></script>

        <script src="<?php echo asset() ?>js/plugins/iCheck/icheck.min.js"></script>
        <script src="<?php echo asset() ?>js/jquery-3.1.1.min.js"></script>
        <script src="<?php echo asset() ?>js/bootstrap.min.js"></script>

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-124931749-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-124931749-1');
           </script>


    </body>


    </html>