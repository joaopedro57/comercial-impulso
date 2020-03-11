<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Comercial</title>

    <link href="<?php echo asset() ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo asset() ?>font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo asset() ?>css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <link href="<?php echo asset() ?>css/animate.css" rel="stylesheet">
    <link href="<?php echo asset() ?>css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?php echo asset() ?>css/style.css" rel="stylesheet">
    <link href="<?php echo asset() ?>css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="<?php echo asset() ?>img/icone_solides2.png"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link href="<?php echo asset() ?>css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">
    <link href="<?php echo asset() ?>css/plugins/datapicker/datepicker3.css" rel="stylesheet">

     <!-- FooTable -->
    <link href="<?php echo asset() ?>css/plugins/footable/footable.core.css" rel="stylesheet">
    <!-- Ichek -->
    <link href="<?php echo asset() ?>css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">

     <!-- c3 Charts -->
    <link href="<?php echo asset() ?>css/plugins/c3/c3.min.css" rel="stylesheet">
    
    <!-- Latest compiled and minified CSS -->
   <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css"> -->




</head>

<body id="menu" class="">
    <div id="wrapper">

        <nav class="navbar-default navbar-static-side" role="navigation">

            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element text-center"> <span>
                        <img alt="image" class="img-circle text-center" src="<?php echo asset(), $user['img']?>" style="width: 75px" />
                        </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $user['name'] ?></strong>
                             </span> <span class="text-muted text-xs block"><?php echo $user['cargo'] ?> <b class="caret"></b></span> </span> </a>

                        </div>
                        <div class="logo-element">
                            <h5>SOLIDES</h5>
                        </div>
                    </li>
                    <li>
                        <a href="http://comercial.solides.adm.br/"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <?php if ($user['cargo'] == "Financeiro"): ?>
                                <li><a href="<?php echo base_url() ?>Comercial_Controller/financeiro">Financeiro</a></li>
                                <li><a href="<?php echo base_url()?>Financeiro_Controller/dashboard">Dashboard de Meta</a>s</li>  
                            <?php endif ?>
                            <?php if ($user['cargo'] == "One Shot"): ?>
                                <li><a href="<?php echo base_url() ?>Cupom/">Cupons</a></li>
                            <?php endif ?>
                                <li><a href="<?php echo base_url() ?>Comercial_Controller/">Atual</a></li>
                            <?php if ($user['cargo'] == "Gestora Comercial" || $user['cargo'] == "Sales Ops" || $user['cargo'] == "Coordenador"): ?>
                                <li><a href="<?php echo base_url() ?>Comercial_Controller/gestao">Gestão</a></li>
                                <li><a href="<?php echo base_url() ?>Comercial_Controller/war_room">War Room</a></li>
                                <li><a href="<?php echo base_url() ?>Sdr_Controller/shows_geral">Shows</a></li>
                            <?php endif ?>
                            <?php if ($user['cargo'] == "Coordenador"): ?>
                                <li><a href="<?php echo base_url() ?>Comercial_Controller/coordenador/<?php echo $user['name'] ?>">Coordenador</a></li> 
                            <?php endif ?>
                            <?php if ($user['cargo'] == "Sales Ops" || $user['cargo'] == "Gestora Comercial"): ?>
                                <li><a href="<?php echo base_url() ?>Comercial_Controller/financeiro">Financeiro</a></li> 
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Coordenador </span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li>
                                <a href="#">Coordenadores<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <?php foreach ($contato as $coord): ?>
                                        <?php if ($coord['cargo'] == "Coordenador"): ?>
                                            <li>
                                                <a href="<?php echo base_url() ?>Comercial_Controller/coordenador/<?php echo $coord['name'] ?>"><?php echo $coord['name'] ?></a>
                                            </li>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </ul>
                            </li>
                            <li><a href="<?php echo base_url() ?>Comercial_Controller/coordenadores">Geral</a></li>
                        </ul>
                    </li>
                    <?php else: ?>
                    </ul>
                    <?php endif ?>
                    <?php if ($user['cargo'] != "Financeiro"): ?>
                        <?php if ($user['name'] != "Gisele"): ?>
                            <li>
                                <a><i class="fas fa-chart-pie"></i> <span class="nav-label">Closers</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    <?php if ($user['cargo'] == "Gestora Comercial" || $user['cargo'] == "Sales Ops") : ?>                              
                                        <?php foreach ($contato as $users): ?>
                                            <?php if ($users['cargo'] == "Closer"):  ?>
                                                <li><a href="<?php echo base_url() ?>Comercial_Controller/perfil/<?php echo $users['user_id'] ?>"><?php echo $users['name'] ?></a></li>
                                            <?php endif; ?>
                                        <?php endforeach;  ?>
                                    <?php elseif ($user['cargo'] == "Coordenador"): ?>
                                    <?php foreach ($contato as $vendedores): ?>
                                        <?php if ($user['name'] == $vendedores['Equipe']): ?>
                                            <li><a href="<?php echo base_url() ?>Comercial_Controller/perfil/<?php echo $vendedores['user_id'] ?>"><?php echo $vendedores['name'] ?></a></li>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                    <?php elseif($user['cargo'] == "Closer"): ?>
                                        <li><a href="<?php echo base_url() ?>Comercial_Controller/perfil/<?php echo $user['user_id'] ?>"><?php echo $user['name'] ?></a></li> 
                                    <?php endif; ?>
                                </ul>
                            </li>
                        <?php endif ?>
                    <li>
                        <a><i class="fas fa-phone"></i> <span class="nav-label">SDR</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <?php if ($user['cargo'] == "Gestora Comercial" || $user['cargo'] == "Sales Ops") : ?>                              
                                <?php foreach ($contato as $users): ?>
                                    <?php if ($users['cargo'] == "SDR"):  ?>
                                        <li><a href="<?php echo base_url() ?>Sdr_Controller/perfil/<?php echo $users['user_id'] ?>"><?php echo $users['name'] ?></a></li>
                                    <?php endif; ?>
                                <?php endforeach;  ?>
                            <?php elseif ($user['cargo'] == "Coordenador"): ?>
                            <?php foreach ($contato as $vendedores): ?>
                                <?php if ($user['name'] == $vendedores['Equipe']): ?>
                                    <li><a href="<?php echo base_url() ?>Sdr_Controller/perfil/<?php echo $vendedores['user_id'] ?>"><?php echo $vendedores['name'] ?></a></li>
                                <?php endif ?>
                            <?php endforeach ?>
                            <?php elseif($user['cargo'] == "SDR"): ?>
                                <li><a href="<?php echo base_url() ?>Sdr_Controller/perfil/<?php echo $user['user_id'] ?>"><?php echo $user['name'] ?></a></li> 
                            <?php endif; ?>
                        </ul>
                    </li>                 
                    <?php endif ?>
                    <?php if ($user['cargo'] == "Gestora Comercial"): ?>
                    <li>
                        <a href="<?php echo base_url() ?>Comercial_Controller/clientes"><i class="fa fa-desktop"></i> <span class="nav-label">Clientes</span>  </a>
                    </li>                                   
                    <?php elseif ($user['cargo'] == "Sales Ops"): ?>
                    <li>
                        <a href="<?php echo base_url() ?>Comercial_Controller/clientes"><i class="fa fa-desktop"></i> <span class="nav-label">Clientes</span>  </a>
                    </li> 
                    <?php endif ?>
                    <li>
                        <a href="<?php echo base_url() ?>Comercial_Controller/contatos"><i class="fa fa-envelope"></i> <span class="nav-label">Contatos</span>  </a>
                    </li>
                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <div class="navbar-header">
                    <button class="navbar-minimalize minimalize-styl-2 btn btn-primary" id="menu1" "><i class="fa fa-bars"></i> </button>
                    <button class="navbar-minimalize minimalize-styl-2 btn btn-primary" id="menu2" "><i class="fa fa-bars"></i> </button>
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary" href="<?php echo base_url() ?>index.php/Index/logout"><i class="fas fa-sign-out-alt"></i> </a>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <h2><span class="m-r-sm text-muted welcome-message">Dashboard Comercial</span></h2>
                    </li>
                </ul>  
            </div>