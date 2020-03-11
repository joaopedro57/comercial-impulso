<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>TrackerUp</title>

    <link href="<?php echo asset() ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo asset() ?>font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo asset() ?>css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?php echo asset() ?>css/plugins/chosen/bootstrap-chosen.css" rel="stylesheet">
    <link href="<?php echo asset() ?>css/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">
    <link href="<?php echo asset() ?>css/plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet">
    <link href="<?php echo asset() ?>css/plugins/cropper/cropper.min.css" rel="stylesheet">
    <link href="<?php echo asset() ?>css/plugins/switchery/switchery.css" rel="stylesheet">
    <link href="<?php echo asset() ?>css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo asset() ?>css/plugins/nouslider/jquery.nouislider.css" rel="stylesheet">
    <link href="<?php echo asset() ?>css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link href="<?php echo asset() ?>css/plugins/ionRangeSlider/ion.rangeSlider.css" rel="stylesheet">
    <link href="<?php echo asset() ?>css/plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css" rel="stylesheet">
    <link href="<?php echo asset() ?>css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
    <link href="<?php echo asset() ?>css/plugins/clockpicker/clockpicker.css" rel="stylesheet">
    <link href="<?php echo asset() ?>css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">
    <link href="<?php echo asset() ?>css/plugins/select2/select2.min.css" rel="stylesheet">
    <link href="<?php echo asset() ?>css/plugins/touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet">
    <link href="<?php echo asset() ?>css/plugins/dualListbox/bootstrap-duallistbox.min.css" rel="stylesheet">
    <link href="<?php echo asset() ?>css/animate.css" rel="stylesheet">
    <link href="<?php echo asset() ?>css/style.css" rel="stylesheet">
    <link href="<?php echo asset() ?>css/plugins/footable/footable.core.css" rel="stylesheet">


</head>

<body class="">

    <div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="<?php echo asset() ?>img/profile_small.jpg" />
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="<?php echo asset() ?>#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">David Williams</strong>
                             </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="<?php echo asset() ?>profile.html">Profile</a></li>
                            <li><a href="<?php echo asset() ?>contacts.html">Contacts</a></li>
                            <li><a href="<?php echo asset() ?>mailbox.html">Mailbox</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo asset() ?>login.html">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>
                <li>
                    <a href="<?php echo asset() ?>index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="<?php echo asset() ?>index.html">Dashboard v.1</a></li>
                        <li><a href="<?php echo asset() ?>dashboard_2.html">Dashboard v.2</a></li>
                        <li><a href="<?php echo asset() ?>dashboard_3.html">Dashboard v.3</a></li>
                        <li><a href="<?php echo asset() ?>dashboard_4_1.html">Dashboard v.4</a></li>
                        <li><a href="<?php echo asset() ?>dashboard_5.html">Dashboard v.5 </a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo asset() ?>layouts.html"><i class="fa fa-diamond"></i> <span class="nav-label">Layouts</span></a>
                </li>
                <li>
                    <a href="<?php echo asset() ?>#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Graphs</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="<?php echo asset() ?>graph_flot.html">Flot Charts</a></li>
                        <li><a href="<?php echo asset() ?>graph_morris.html">Morris.js Charts</a></li>
                        <li><a href="<?php echo asset() ?>graph_rickshaw.html">Rickshaw Charts</a></li>
                        <li><a href="graph_chartjs.html">Chart.js</a></li>
                        <li><a href="graph_chartist.html">Chartist</a></li>
                        <li><a href="c3.html">c3 charts</a></li>
                        <li><a href="graph_peity.html">Peity Charts</a></li>
                        <li><a href="graph_sparkline.html">Sparkline Charts</a></li>
                    </ul>
                </li>   
                <li>
                    <a href="mailbox.html"><i class="fa fa-envelope"></i> <span class="nav-label">Mailbox </span><span class="label label-warning pull-right">16/24</span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="mailbox.html">Inbox</a></li>
                        <li><a href="mail_detail.html">Email view</a></li>
                        <li><a href="mail_compose.html">Compose email</a></li>
                        <li><a href="email_template.html">Email templates</a></li>
                    </ul>
                </li>
                <li>
                    <a href="metrics.html"><i class="fa fa-pie-chart"></i> <span class="nav-label">Metrics</span>  </a>
                </li>
                <li>
                    <a href="widgets.html"><i class="fa fa-flask"></i> <span class="nav-label">Widgets</span></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Forms</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="form_basic.html">Basic form</a></li>
                        <li><a href="form_advanced.html">Advanced Plugins</a></li>
                        <li><a href="form_wizard.html">Wizard</a></li>
                        <li><a href="form_file_upload.html">File Upload</a></li>
                        <li><a href="form_editors.html">Text Editor</a></li>
                        <li><a href="form_autocomplete.html">Autocomplete</a></li>
                        <li><a href="form_markdown.html">Markdown</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-desktop"></i> <span class="nav-label">App Views</span>  <span class="pull-right label label-primary">SPECIAL</span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="profile.html">Profile</a></li>
                        <li><a href="profile_2.html">Profile v.2</a></li>
                        <li><a href="contacts_2.html">Contacts v.2</a></li>
                        <li><a href="projects.html">Projects</a></li>
                        <li><a href="project_detail.html">Project detail</a></li>
                        <li><a href="activity_stream.html">Activity stream</a></li>
                        <li><a href="teams_board.html">Teams board</a></li>
                        <li><a href="social_feed.html">Social feed</a></li>
                        <li><a href="clients.html">Clients</a></li>
                        <li><a href="full_height.html">Outlook view</a></li>
                        <li><a href="vote_list.html">Vote list</a></li>
                        <li><a href="file_manager.html">File manager</a></li>
                        <li><a href="calendar.html">Calendar</a></li>
                        <li><a href="issue_tracker.html">Issue tracker</a></li>
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="article.html">Article</a></li>
                        <li><a href="faq.html">FAQ</a></li>
                        <li><a href="timeline.html">Timeline</a></li>
                        <li><a href="pin_board.html">Pin board</a></li>
                    </ul>
                </li>
                <li class="active">
                    <a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Other Pages</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="search_results.html">Search results</a></li>
                        <li><a href="lockscreen.html">Lockscreen</a></li>
                        <li><a href="invoice.html">Invoice</a></li>
                        <li><a href="login.html">Login</a></li>
                        <li><a href="login_two_columns.html">Login v.2</a></li>
                        <li><a href="forgot_password.html">Forget password</a></li>
                        <li><a href="register.html">Register</a></li>
                        <li><a href="404.html">404 Page</a></li>
                        <li><a href="500.html">500 Page</a></li>
                        <li class="active"><a href="empty_page.html">Empty page</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-globe"></i> <span class="nav-label">Miscellaneous</span><span class="label label-info pull-right">NEW</span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="toastr_notifications.html">Notification</a></li>
                        <li><a href="nestable_list.html">Nestable list</a></li>
                        <li><a href="agile_board.html">Agile board</a></li>
                        <li><a href="timeline_2.html">Timeline v.2</a></li>
                        <li><a href="diff.html">Diff</a></li>
                        <li><a href="pdf_viewer.html">PDF viewer</a></li>
                        <li><a href="i18support.html">i18 support</a></li>
                        <li><a href="sweetalert.html">Sweet alert</a></li>
                        <li><a href="idle_timer.html">Idle timer</a></li>
                        <li><a href="truncate.html">Truncate</a></li>
                        <li><a href="password_meter.html">Password meter</a></li>
                        <li><a href="spinners.html">Spinners</a></li>
                        <li><a href="spinners_usage.html">Spinners usage</a></li>
                        <li><a href="tinycon.html">Live favicon</a></li>
                        <li><a href="google_maps.html">Google maps</a></li>
                        <li><a href="datamaps.html">Datamaps</a></li>
                        <li><a href="social_buttons.html">Social buttons</a></li>
                        <li><a href="code_editor.html">Code editor</a></li>
                        <li><a href="modal_window.html">Modal window</a></li>
                        <li><a href="clipboard.html">Clipboard</a></li>
                        <li><a href="text_spinners.html">Text spinners</a></li>
                        <li><a href="forum_main.html">Forum view</a></li>
                        <li><a href="validation.html">Validation</a></li>
                        <li><a href="tree_view.html">Tree view</a></li>
                        <li><a href="loading_buttons.html">Loading buttons</a></li>
                        <li><a href="chat_view.html">Chat view</a></li>
                        <li><a href="masonry.html">Masonry</a></li>
                        <li><a href="tour.html">Tour</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-flask"></i> <span class="nav-label">UI Elements</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="typography.html">Typography</a></li>
                        <li><a href="icons.html">Icons</a></li>
                        <li><a href="draggable_panels.html">Draggable Panels</a></li> <li><a href="resizeable_panels.html">Resizeable Panels</a></li>
                        <li><a href="buttons.html">Buttons</a></li>
                        <li><a href="video.html">Video</a></li>
                        <li><a href="tabs_panels.html">Panels</a></li>
                        <li><a href="tabs.html">Tabs</a></li>
                        <li><a href="notifications.html">Notifications & Tooltips</a></li>
                        <li><a href="helper_classes.html">Helper css classes</a></li>
                        <li><a href="badges_labels.html">Badges, Labels, Progress</a></li>
                    </ul>
                </li>

                <li>
                    <a href="grid_options.html"><i class="fa fa-laptop"></i> <span class="nav-label">Grid options</span></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-table"></i> <span class="nav-label">Tables</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="table_basic.html">Static Tables</a></li>
                        <li><a href="table_data_tables.html">Data Tables</a></li>
                        <li><a href="table_foo_table.html">Foo Tables</a></li>
                        <li><a href="jq_grid.html">jqGrid</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-shopping-cart"></i> <span class="nav-label">E-commerce</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="ecommerce_products_grid.html">Products grid</a></li>
                        <li><a href="ecommerce_product_list.html">Products list</a></li>
                        <li><a href="ecommerce_product.html">Product edit</a></li>
                        <li><a href="ecommerce_product_detail.html">Product detail</a></li>
                        <li><a href="ecommerce-cart.html">Cart</a></li>
                        <li><a href="ecommerce-orders.html">Orders</a></li>
                        <li><a href="ecommerce_payments.html">Credit Card form</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-picture-o"></i> <span class="nav-label">Gallery</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="basic_gallery.html">Lightbox Gallery</a></li>
                        <li><a href="slick_carousel.html">Slick Carousel</a></li>
                        <li><a href="carousel.html">Bootstrap Carousel</a></li>

                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Menu Levels </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li>
                            <a href="#">Third Level <span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>

                            </ul>
                        </li>
                        <li><a href="#">Second Level Item</a></li>
                        <li>
                            <a href="#">Second Level Item</a></li>
                        <li>
                            <a href="#">Second Level Item</a></li>
                    </ul>
                </li>
                <li>
                    <a href="css_animation.html"><i class="fa fa-magic"></i> <span class="nav-label">CSS Animations </span><span class="label label-info pull-right">62</span></a>
                </li>
                <li class="landing_link">
                    <a target="_blank" href="landing.html"><i class="fa fa-star"></i> <span class="nav-label">Landing Page</span> <span class="label label-warning pull-right">NEW</span></a>
                </li>
                <li class="special_link">
                    <a href="package.html"><i class="fa fa-database"></i> <span class="nav-label">Package</span></a>
                </li>
            </ul>

        </div>
    </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Welcome to INSPINIA+ Admin Theme.</span>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope"></i>  <span class="label label-warning">16</span>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="<?php echo asset() ?>img/a7.jpg">
                                </a>
                                <div class="media-body">
                                    <small class="pull-right">46h ago</small>
                                    <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="<?php echo asset() ?>img/a4.jpg">
                                </a>
                                <div class="media-body ">
                                    <small class="pull-right text-navy">5h ago</small>
                                    <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="<?php echo asset() ?>img/profile.jpg">
                                </a>
                                <div class="media-body ">
                                    <small class="pull-right">23h ago</small>
                                    <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                    <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="mailbox.html">
                                    <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="mailbox.html">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="profile.html">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="grid_options.html">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="notifications.html">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="login.html">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>
        </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <h2>Dashboard Principal</h2>
            </div>

            <div class="wrapper wrapper-content">
                <form method="post">
                    <div class="col-lg-4 animated fadeInRightBig">
                        <label class="font-normal">Selecione A Empresa</label>
                        <select class="select2_demo_3 form-control" name="empresa" id="empresa">
                            <option></option>
                            <?php foreach ($empresa as $dados): ?>
                            <option value="<?php echo $dados['id'] ?>"><?php echo $dados['nome'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="col-lg-3 animated fadeInRightBig">
                        <div class="form-group" id="data_5">
                            <label class="font-normal">Selecione a Data</label>
                            <div class="input-daterange input-group" id="datepicker">
                                <input type="text" class="input-sm form-control" id="start" name="start" value="<?php echo date('m/01/Y') ?>"/>
                                <span class="input-group-addon">to</span>
                                <input type="text" class="input-sm form-control" id="end" name="end" value="<?php echo date('m/t/Y') ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 animated fadeInRightBig">
                        <label class="font-normal">Status</label>
                        <select class="select2_demo_3 form-control" name="status" id="status">
                            <option value="concluida">Concluida</option>
                            <option value="iniciada">Iniciada</option>
                            <option value="interrompida">Interrompida</option>
                            <option value="malsucedida">Mal Sucedida</option>
                            <option value="pendente">Pendente</option>
                        </select>
                    </div>
                    <div class="col-lg-2 animated fadeInRightBig">
                        <label class="font-normal">Ranking</label>
                        <select class="select2_demo_3 form-control" name="status" id="status">
                            <option value="DESC">Melhores</option>
                            <option value="ASC">Piores</option>
                        </select>
                    </div>
                    <div class="col-lg-1 animated fadeInRightBig">
                        <label class="font-normal">Aperte para Filtrar</label>
                        <div>
                            <button class="btn btn-primary " type="submit"><strong>Buscar</strong></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row"></div>
            <div class="wrapper wrapper-content">
                <div class="col-lg-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <span class="label label-info pull-right"><?php echo date("d/m/y"); ?></span>
                            <h5>Total de Tarefas Concluidas</h5>
                        </div>
                        <div class="ibox-content text-center">
                            <h1 class="no-margins">
                                <?php echo $kpis_empresa['tarefas'] ; ?>
                            </h1>
                            <div class="stat-percent font-bold text-success"><i class="fa fa-bolt"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <span class="label label-info pull-right"><?php echo date("d/m/y"); ?></span>
                            <h5>Total de Formularios Preenchidos</h5>
                        </div>
                        <div class="ibox-content text-center">
                            <h1 class="no-margins">
                                <?php echo $kpis_empresa['forms'] ; ?>
                            </h1>
                            <div class="stat-percent font-bold text-success"><i class="fa fa-bolt"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <span class="label label-info pull-right"><?php echo date("d/m/y"); ?></span>
                            <h5>Tempo total gasto em tarefas</h5>
                        </div>
                        <div class="ibox-content text-center">
                            <h1 class="no-margins">
                                <?php echo $kpis_empresa['tempo_resposta'] ; ?>
                            </h1>
                            <div class="stat-percent font-bold text-success"><i class="fa fa-bolt"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row"></div>
            <div class="col-lg-1"></div>
             <div class="col-lg-10">
                <div class="ibox-title" align="center">
                    <h5>Tarefas Executas Por Dia</h5>
                </div>
                <div class="ibox-content">
                    <div id="curve_chart" style="width: 100%; height: 400px;"></div>
                </div>
            </div>
            <div class="col-lg-1"></div>
            <div class="row"></div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title" align="center">
                                <h5>Agentes Online</h5>
                            </div>
                            <div class="ibox-content text-center">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Status</th>
                                            <th>Qnt</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">Online</td>
                                            <td><?php echo $agentes_online['online']; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">Offline</td>
                                            <td><?php echo $agentes_online['offline']; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center font-bold">Total</td>
                                            <td class="font-bold"><?php echo $agentes_online['total']?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div id="Sarah_chart_div" ></div>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                             <th class="text-center" colspan="2">Agentes Online</th>
                                         </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">Em Tarefa</td>
                                            <td><?php echo $agentes_online['em_tarefas']; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">Livres</td>
                                            <td><?php echo $agentes_online['livre']; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title" align="center">
                                <h5>Tarefas Executadas e Pendentes</h5>
                            </div>
                            <div class="ibox-content text-center">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Status</th>
                                            <th>Qnt</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">Executadas</td>
                                            <td><?php echo $executas_pendentes['executadas']; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">Pendentes</td>
                                            <td><?php echo $executas_pendentes['pendentes']; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center font-bold">Total</td>
                                            <td class="font-bold"><?php echo $executas_pendentes['total']?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div id="Anthony_chart_div" ></div>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                             <th class="text-center" colspan="2">Tarefas Pendentes</th>
                                         </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">Em execução</td>
                                            <td><?php echo $executas_pendentes['execusao']; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">Pendentes</td>
                                            <td><?php echo $executas_pendentes['pen']; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title" align="center">
                                <h5>Kms Rodados</h5>
                            </div>
                            <div class="ibox-content text-center">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Status</th>
                                            <th>Qnt</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">Esperados</td>
                                            <td>2020</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">Executado</td>
                                            <td>3000</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center font-bold">Desvio</td>
                                            <td class="font-bold">149%</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div id="columnchart_material" style="width: 400px; height: 300px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title" align="center">
                                <h5>Ranking Tarefas <?php echo $status ?>s</h5>
                            </div>
                            <div class="ibox-content text-center">
                                <div id="drawMixis"></div>
                                <div id="drawsGrupo"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="col-lg-7">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title" align="center">
                            <h5>Ranking Tempo Médio de Tarefa</h5>
                        </div>
                        <div class="ibox-content text-center">
                            <div id="drawsTempoMedio"></div>
                        </div>
                    </div>
                    <div class="ibox float-e-margins">
                        <div class="ibox-title" align="center">
                            <h5>Ranking KMs Percorridos</h5>
                        </div>
                        <div class="ibox-content text-center">
                            <div id="kmRankings"></div>
                        </div>
                    </div>
                </div>                   
                <div class="col-lg-5">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Formularios Respondidos</h5>
                        </div>
                        <div class="ibox-content">
                            <table class="footable table table-stripped toggle-arrow-tiny">
                                <thead>
                                <tr>
                                    <th data-toggle="true">Formulario</th>
                                    <th>Resposta</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($forms_respondido as $value): ?>
                                        <tr>
                                            <td><?php echo $value['forms'] ?></td>
                                            <td><?php echo $value['respondidos'] ?></td>
                                        </tr>
                                    <?php endforeach ?>  
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="5">
                                        <ul class="pagination pull-right"></ul>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Status Agentes</h5>
                        </div>
                        <div class="ibox-content">
                            <input type="text" class="form-control input-sm m-b-xs" id="filter"
                                   placeholder="Search in table">

                            <table class="footable table table-stripped" data-page-size="8" data-filter=#filter>
                                <thead>
                                <tr>
                                    <th data-toggle="true">Nome</th>
                                    <th>Bateria</th>
                                    <th>Online</th>
                                    <th>Tarefas Total</th>
                                    <th>% de tarefas Executadas</th>
                                    <th>% de tarefas Pendentes</th>
                                    <th>Km Total</th>
                                    <th>Km percorrido</th>
                                    <th>km pendente</th>
                                    <th>Grupos</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($status_agente as $value): ?>
                                        <tr>
                                            <td><?php echo $value['nome'] ?></td>
                                            <td><?php echo round($value['bateria']) ?>%</td>
                                            <?php if ($value['online'] == 1): ?>
                                                    <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                                                <?php else: ?>
                                                    <td><a href="#"><i class="fa fa-minus text-danger"></i></a></td>  
                                            <?php endif ?>
                                            <td><?php echo $value['total_tarefas'] ?></td>
                                            <td><?php echo $value['executadas'] ?>%</td>
                                            <td><?php echo $value['pendentes'] ?>%</td>
                                            <td><?php echo $value['kms_total'] ?></td>
                                            <td><?php echo $value['km_pendentes'] ?></td>
                                            <td><?php echo $value['km_executado'] ?></td>
                                            <?php if (isset($value['grupos'][1])): ?>
                                                <td><?php echo $value['grupos'][0]['nome'] ?> + </td>
                                            <?php else: ?>
                                                <?php if (isset($value['grupos'][0])): ?>
                                                    <td><?php echo $value['grupos'][0]['nome'] ?></td>
                                                <?php else: ?>
                                                    <td></td>
                                                <?php endif ?>
                                            <?php endif ?>
                                        </tr>
                                    <?php endforeach ?>  
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="5">
                                        <ul class="pagination pull-right"></ul>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row"></div>
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

    <!-- Flot -->
    <script src="<?php echo asset() ?>js/plugins/flot/jquery.flot.js"></script>
    <script src="<?php echo asset() ?>js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="<?php echo asset() ?>js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="<?php echo asset() ?>js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="<?php echo asset() ?>js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="<?php echo asset() ?>js/plugins/flot/jquery.flot.symbol.js"></script>
    <script src="<?php echo asset() ?>js/plugins/flot/curvedLines.js"></script>
    <script src="<?php echo asset() ?>js/demo/flot-demo.js"></script>

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
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   <script type="text/javascript">

      // Load Charts and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Draw the pie chart for Sarah's pizza when Charts is loaded.
      google.charts.setOnLoadCallback(drawSarahChart);

      // Draw the pie chart for the Anthony's pizza when Charts is loaded.
      google.charts.setOnLoadCallback(drawAnthonyChart);

      // Callback that draws the pie chart for Sarah's pizza.
      function drawSarahChart() {

        // Create the data table for Sarah's pizza.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['Online', <?php echo $agentes_online['online']?>],
          ['Offline', <?php echo $agentes_online['offline']?>]
        ]);

        // Set options for Sarah's pie chart.
        var options = {title:'',
                       width:400,
                       height:300};

        // Instantiate and draw the chart for Sarah's pizza.
        var chart = new google.visualization.PieChart(document.getElementById('Sarah_chart_div'));
        chart.draw(data, options);
      }

      // Callback that draws the pie chart for Anthony's pizza.
      function drawAnthonyChart() {

        // Create the data table for Anthony's pizza.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['Executadas', <?php echo $executas_pendentes['executadas'] ?>],
          ['Pendentes', <?php echo $executas_pendentes['pendentes'] ?>]
        ]);

        // Set options for Anthony's pie chart.
        var options = {title:'',
                       width:400,
                       height:300};

        // Instantiate and draw the chart for Anthony's pizza.
        var chart = new google.visualization.PieChart(document.getElementById('Anthony_chart_div'));
        chart.draw(data, options);
      }

        google.charts.load('current', {packages: ['corechart', 'bar']});
        google.charts.setOnLoadCallback(drawMultSeries);

        function drawMultSeries() {
              var data = google.visualization.arrayToDataTable([
                ['Status', 'Tarefas Status'],
                ['<?php echo $status_atividade[0]['status'] ?>', <?php echo $status_atividade[0]['tarefas'] ?>],
                ['<?php echo $status_atividade[1]['status'] ?>', <?php echo $status_atividade[1]['tarefas'] ?>],
                ['<?php echo $status_atividade[2]['status'] ?>', <?php echo $status_atividade[2]['tarefas'] ?>],
                ['<?php echo $status_atividade[3]['status'] ?>', <?php echo $status_atividade[3]['tarefas'] ?>],
                ['<?php echo $status_atividade[4]['status'] ?>', <?php echo $status_atividade[4]['tarefas'] ?>]
              ]);

              var options = {
                title: 'Status das Tarefas',
                chartArea: {width: '50%'},
                hAxis: {
                  title: 'Total de Tarefas',
                  minValue: 0
                },
                vAxis: {
                  title: 'Status'
                }
              };

              var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
              chart.draw(data, options);
            }
            google.charts.load('current', {packages: ['corechart', 'bar']});
            google.charts.setOnLoadCallback(drawMixis);

            function drawMixis() {
                  var data = google.visualization.arrayToDataTable([
                    ['Agentes', 'Tarefas Concluidas'],
                    ['<?php echo $tarefas_agente[0]['agentes'] ?>', <?php echo $tarefas_agente[0]['tarefas'] ?>],
                    ['<?php echo $tarefas_agente[1]['agentes'] ?>', <?php echo $tarefas_agente[1]['tarefas'] ?>],
                    ['<?php echo $tarefas_agente[2]['agentes'] ?>', <?php echo $tarefas_agente[2]['tarefas'] ?>],
                    ['<?php echo $tarefas_agente[3]['agentes'] ?>', <?php echo $tarefas_agente[3]['tarefas'] ?>],
                    ['<?php echo $tarefas_agente[4]['agentes'] ?>', <?php echo $tarefas_agente[4]['tarefas'] ?>]
                  ]);

                  var options = {
                    title: 'Ranking Tarefas Executadas Por Agente',
                    chartArea: {width: '50%'},
                    hAxis: {
                      title: 'Tarefas Executadas',
                      minValue: 0
                    },
                    vAxis: {
                      title: 'Agente'
                    }
                  };

                  var chart = new google.visualization.BarChart(document.getElementById('drawMixis'));
                  chart.draw(data, options);
                }
                google.charts.load('current', {packages: ['corechart', 'bar']});
                google.charts.setOnLoadCallback(drawsGrupo);

                function drawsGrupo() {
                      var data = google.visualization.arrayToDataTable([
                        ['Agentes', 'Tarefas Concluidas'],
                        ['<?php echo $tarefas_grupo[0]['grupo'] ?>', <?php echo $tarefas_grupo[0]['tarefas'] ?>],
                        ['<?php echo $tarefas_grupo[1]['grupo'] ?>', <?php echo $tarefas_grupo[1]['tarefas'] ?>],
                        ['<?php echo $tarefas_grupo[2]['grupo'] ?>', <?php echo $tarefas_grupo[2]['tarefas'] ?>],
                        ['<?php echo $tarefas_grupo[3]['grupo'] ?>', <?php echo $tarefas_grupo[3]['tarefas'] ?>],
                        ['<?php echo $tarefas_grupo[4]['grupo'] ?>', <?php echo $tarefas_grupo[4]['tarefas'] ?>]
                      ]);

                      var options = {
                        title: 'Ranking Tarefas Executas Por Grupo',
                        chartArea: {width: '50%'},
                        hAxis: {
                          title: 'Total Executadas',
                          minValue: 0
                        },
                        vAxis: {
                          title: 'Grupo'
                        }
                      };

                      var chart = new google.visualization.BarChart(document.getElementById('drawsGrupo'));
                      chart.draw(data, options);
                    }

                google.charts.load('current', {packages: ['corechart', 'bar']});
                google.charts.setOnLoadCallback(kmRankings);

                function kmRankings() {
                      var data = google.visualization.arrayToDataTable([
                        ['Agentes', 'KMs'],
                        ['Lucas Ferreira', 800],
                        ['Mateus Teixeira', 749],
                        ['Iago Brayham', 575],
                        ['Alexandre',477 ],
                        ['Vinicius Batista', 328]
                      ]);

                      var options = {
                        title: 'Ranking KMs Rodados',
                        chartArea: {width: '50%'},
                        hAxis: {
                          title: 'Total Executadas',
                          minValue: 0
                        },
                        vAxis: {
                          title: 'Grupo'
                        }
                      };

                      var chart = new google.visualization.BarChart(document.getElementById('kmRankings'));
                      chart.draw(data, options);
                    }

                google.charts.load('current', {packages: ['corechart', 'bar']});
                google.charts.setOnLoadCallback(drawsTempoMedio);

                function drawsTempoMedio() {
                      var data = google.visualization.arrayToDataTable([
                        ['Agentes', 'Tarefas Concluidas'],
                        ['<?php echo $ranking_tempo[0]['nome'] ?>', <?php echo $ranking_tempo[0]['tempo'] ?>],
                        ['<?php echo $ranking_tempo[1]['nome'] ?>', <?php echo $ranking_tempo[1]['tempo'] ?>],
                        ['<?php echo $ranking_tempo[2]['nome'] ?>', <?php echo $ranking_tempo[2]['tempo'] ?>],
                        ['<?php echo $ranking_tempo[3]['nome'] ?>', <?php echo $ranking_tempo[3]['tempo'] ?>],
                        ['<?php echo $ranking_tempo[4]['nome'] ?>', <?php echo $ranking_tempo[4]['tempo'] ?>]
                      ]);

                      var options = {
                        title: 'Ranking Tempo Médio Por Agente',
                        chartArea: {width: '50%'},
                        hAxis: {
                          title: 'Tempo Médio',
                          minValue: 0
                        },
                        vAxis: {
                          title: 'Agente'
                        }
                      };

                      var chart = new google.visualization.BarChart(document.getElementById('drawsTempoMedio'));
                      chart.draw(data, options);
                    }
                  google.charts.load('current', {'packages':['bar']});
                  google.charts.setOnLoadCallback(drawKm);

                  function drawKm() {
                    var data = google.visualization.arrayToDataTable([
                      ['Status', 'KM'],
                      ['Esperado', 2020],
                      ['Executado', 3000]
                    ]);

                    var options = {
                      chart: {
                        title: 'Km',
                        subtitle: 'Kms Esperados e Executados',
                      }
                    };

                    var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                    chart.draw(data, google.charts.Bar.convertOptions(options));
                  }
                  google.charts.load('current', {'packages':['corechart']});
                  google.charts.setOnLoadCallback(drawTarefas);

                  function drawTarefas() {
                    var data = google.visualization.arrayToDataTable([
                      ['Data', 'Tarefas Executadas'],
                      ['2019-10-01',  15],
                      ['2019-10-02',  11],
                      ['2019-10-04',  5],
                      ['2019-10-07',  21],
                      ['2019-10-08',  52],
                      ['2019-10-09',  3],
                      ['2019-10-11',  12],
                      ['2019-10-14',  11],
                      ['2019-10-15',  9],
                      ['2019-10-16',  23],
                      ['2019-10-17',  4],
                      ['2019-10-18',  14],
                      ['2019-10-21',  11],
                      ['2019-10-22',  13],
                      ['2019-10-23',  3],
                      ['2019-10-29',  8],
                      ['2019-10-30',  2],
                      ['2019-10-31',  50],
                    ]);

                    var options = {
                      curveType: 'function',
                      legend: { position: 'bottom' }
                    };

                    var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

                    chart.draw(data, options);
                  }
    </script>
    <script>
        $(document).ready(function() {
            Morris.Bar({
                element: 'morris-bar-chart1',
                data: [{ y: 'Esperado', a: 2020},
                    { y: 'Executado', a: 3000 }],
                xkey: 'y',
                ykeys: ['a'],
                labels: ['Series A'],
                hideHover: 'auto',
                resize: true,
                barColors: ['#1ab394'],
            });
        });
    </script>
    <script>
        $(document).ready(function(){

                $('.tagsinput').tagsinput({
                tagClass: 'label label-primary'
            });

            var $image = $(".image-crop > img")
            $($image).cropper({
                aspectRatio: 1.618,
                preview: ".img-preview",
                done: function(data) {
                    // Output the result data for cropping image.
                }
            });

            var $inputImage = $("#inputImage");
            if (window.FileReader) {
                $inputImage.change(function() {
                    var fileReader = new FileReader(),
                            files = this.files,
                            file;

                    if (!files.length) {
                        return;
                    }

                    file = files[0];

                    if (/^image\/\w+$/.test(file.type)) {
                        fileReader.readAsDataURL(file);
                        fileReader.onload = function () {
                            $inputImage.val("");
                            $image.cropper("reset", true).cropper("replace", this.result);
                        };
                    } else {
                        showMessage("Please choose an image file.");
                    }
                });
            } else {
                $inputImage.addClass("hide");
            }

            $("#download").click(function() {
                window.open($image.cropper("getDataURL"));
            });

            $("#zoomIn").click(function() {
                $image.cropper("zoom", 0.1);
            });

            $("#zoomOut").click(function() {
                $image.cropper("zoom", -0.1);
            });

            $("#rotateLeft").click(function() {
                $image.cropper("rotate", 45);
            });

            $("#rotateRight").click(function() {
                $image.cropper("rotate", -45);
            });

            $("#setDrag").click(function() {
                $image.cropper("setDragMode", "crop");
            });

            $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

            $('#data_2 .input-group.date').datepicker({
                startView: 1,
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true,
                format: "dd/mm/yyyy"
            });

            $('#data_3 .input-group.date').datepicker({
                startView: 2,
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true
            });

            $('#data_4 .input-group.date').datepicker({
                minViewMode: 1,
                keyboardNavigation: false,
                forceParse: false,
                forceParse: false,
                autoclose: true,
                todayHighlight: true
            });

            $('#data_5 .input-daterange').datepicker({
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true
            });

            var elem = document.querySelector('.js-switch');
            var switchery = new Switchery(elem, { color: '#1AB394' });

            var elem_2 = document.querySelector('.js-switch_2');
            var switchery_2 = new Switchery(elem_2, { color: '#ED5565' });

            var elem_3 = document.querySelector('.js-switch_3');
            var switchery_3 = new Switchery(elem_3, { color: '#1AB394' });

            var elem_4 = document.querySelector('.js-switch_4');
            var switchery_4 = new Switchery(elem_4, { color: '#f8ac59' });
                switchery_4.disable();

            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green'
            });

            $('.demo1').colorpicker();

            var divStyle = $('.back-change')[0].style;
            $('#demo_apidemo').colorpicker({
                color: divStyle.backgroundColor
            }).on('changeColor', function(ev) {
                        divStyle.backgroundColor = ev.color.toHex();
                    });

            $('.clockpicker').clockpicker();

            $('input[name="daterange"]').daterangepicker();

            $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

            $('#reportrange').daterangepicker({
                format: 'MM/DD/YYYY',
                startDate: moment().subtract(29, 'days'),
                endDate: moment(),
                minDate: '01/01/2012',
                maxDate: '12/31/2015',
                dateLimit: { days: 60 },
                showDropdowns: true,
                showWeekNumbers: true,
                timePicker: false,
                timePickerIncrement: 1,
                timePicker12Hour: true,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                opens: 'right',
                drops: 'down',
                buttonClasses: ['btn', 'btn-sm'],
                applyClass: 'btn-primary',
                cancelClass: 'btn-default',
                separator: ' to ',
                locale: {
                    applyLabel: 'Submit',
                    cancelLabel: 'Cancel',
                    fromLabel: 'From',
                    toLabel: 'To',
                    customRangeLabel: 'Custom',
                    daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr','Sa'],
                    monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    firstDay: 1
                }
            }, function(start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            });

            $(".select2_demo_1").select2();
            $(".select2_demo_2").select2();
            $(".select2_demo_3").select2({
                placeholder: "Select a state",
                allowClear: true
            });


            $(".touchspin1").TouchSpin({
                buttondown_class: 'btn btn-white',
                buttonup_class: 'btn btn-white'
            });

            $(".touchspin2").TouchSpin({
                min: 0,
                max: 100,
                step: 0.1,
                decimals: 2,
                boostat: 5,
                maxboostedstep: 10,
                postfix: '%',
                buttondown_class: 'btn btn-white',
                buttonup_class: 'btn btn-white'
            });

            $(".touchspin3").TouchSpin({
                verticalbuttons: true,
                buttondown_class: 'btn btn-white',
                buttonup_class: 'btn btn-white'
            });

            $('.dual_select').bootstrapDualListbox({
                selectorMinimalHeight: 160
            });


        });

        $('.chosen-select').chosen({width: "100%"});

        $("#ionrange_1").ionRangeSlider({
            min: 0,
            max: 5000,
            type: 'double',
            prefix: "$",
            maxPostfix: "+",
            prettify: false,
            hasGrid: true
        });

        $("#ionrange_2").ionRangeSlider({
            min: 0,
            max: 10,
            type: 'single',
            step: 0.1,
            postfix: " carats",
            prettify: false,
            hasGrid: true
        });

        $("#ionrange_3").ionRangeSlider({
            min: -50,
            max: 50,
            from: 0,
            postfix: "°",
            prettify: false,
            hasGrid: true
        });

        $("#ionrange_4").ionRangeSlider({
            values: [
                "January", "February", "March",
                "April", "May", "June",
                "July", "August", "September",
                "October", "November", "December"
            ],
            type: 'single',
            hasGrid: true
        });

        $("#ionrange_5").ionRangeSlider({
            min: 10000,
            max: 100000,
            step: 100,
            postfix: " km",
            from: 55000,
            hideMinMax: true,
            hideFromTo: false
        });

        $(".dial").knob();

        var basic_slider = document.getElementById('basic_slider');

        noUiSlider.create(basic_slider, {
            start: 40,
            behaviour: 'tap',
            connect: 'upper',
            range: {
                'min':  20,
                'max':  80
            }
        });

        var range_slider = document.getElementById('range_slider');

        noUiSlider.create(range_slider, {
            start: [ 40, 60 ],
            behaviour: 'drag',
            connect: true,
            range: {
                'min':  20,
                'max':  80
            }
        });

        var drag_fixed = document.getElementById('drag-fixed');

        noUiSlider.create(drag_fixed, {
            start: [ 40, 60 ],
            behaviour: 'drag-fixed',
            connect: true,
            range: {
                'min':  20,
                'max':  80
            }
        });
    </script>
</body>

</html>
