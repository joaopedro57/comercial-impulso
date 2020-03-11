<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Empty Page</title>

    <link href="<?php echo asset() ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo asset() ?>font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo asset() ?>css/animate.css" rel="stylesheet">
    <link href="<?php echo asset() ?>css/style.css" rel="stylesheet">

</head>

<body class="">

<div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle text-center" src="<?php echo asset(), $user['img']?>" style="width: 75px" />
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $user['name'] ?></strong>
                             </span> <span class="text-muted text-xs block"><?php echo $user['cargo'] ?><b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="<?php echo base_url() ?>index.php/Index/logout">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        SOLIDES
                    </div>
                </li>
                <li>
                        <a href="http://comercial.solides.adm.br/"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <?php if ($user['cargo'] == "Financeiro"): ?>
                                <li><a href="<?php echo base_url() ?>Comercial_Controller/financeiro">Financeiro</a></li>  
                            <?php endif ?>
                                <li><a href="<?php echo base_url() ?>Comercial_Controller/">Atual</a></li>
                            <?php if ($user['cargo'] == "Gestora Comercial" || $user['cargo'] == "Sales Ops" || $user['cargo'] == "Coordenador"): ?>
                             <li><a href="<?php echo base_url() ?>Comercial_Controller/gestao">Gestão</a></li>
                                <li><a href="<?php echo base_url() ?>Comercial_Controller/war_room">War Room</a></li>
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
        <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Dashboard Comercial</span>
                </li>

                <li>
                    <a href="login.html">
                        <i class="fa fa-sign-out" href="<?php echo base_url() ?>index.php/Index/logout"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>
        </div>
            <!--COMEÇO CORPO -->
            <div class="row wrapper border-bottom white-bg page-heading"> 
                <div class="col-sm-4">
                    <h2>This is main title</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">This is</a>
                        </li>
                        <li class="active">
                            <strong>Breadcrumb</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-sm-8">
                    <div class="title-action">
                        <a href="" class="btn btn-primary">This is action area</a>
                    </div>
                </div>
            </div>
            
            <!-- FIM CORPO -->
            <!-- footer -->
            <div class="footer">
                <div class="pull-right">
                    10GB of <strong>250GB</strong> Free.
                </div>
                <div>
                    <strong>Copyright</strong> Example Company &copy; 2014-2017
                </div>
            </div>

        </div>
        </div>

    <!-- Mainly scripts -->
    <script src="<?php echo asset() ?>js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo asset() ?>js/bootstrap.min.js"></script>
    <script src="<?php echo asset() ?>js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo asset() ?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo asset() ?>js/inspinia.js"></script>
    <script src="<?php echo asset() ?>js/plugins/pace/pace.min.js"></script>


</body>

</html>
