<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Solides - Login</title>

    <link href="<?php echo asset() ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo asset() ?>font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo asset() ?>css/animate.css" rel="stylesheet">
    <link href="<?php echo asset() ?>css/style.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="<?php echo asset() ?>img/icone_solides2.png"/>


</head>
<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div class="middle-box text-center loginscreen   animated fadeInDown">
        <?php if($this->session->flashdata("msg_erro")): ?>
        <p  class="alert alert-danger"><?php echo $this->session->flashdata("msg_erro") ?></p>
        <?php endif ; ?>
        <div>
            <div align="center">

                 <img alt="image"  src="<?php echo asset() ?>img/logo.png" height="80" width="300" />

            </div>
            <h3> Dashboard Comercial</h3>
            <p>
            </p>
            <h4><p aling="center">Login</p></h4>
            <form class="m-t" role="form" method="post">
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Username">
                </div>
                <div class="form-group">
                    <input type="password" name="senha" class="form-control" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b" value="Entrar">Login</button> 
                <a class="btn btn-sm btn-white btn-block" href="<?php echo base_url() ?>index.php/index/register">Criar Conta</a>
            </form>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo asset() ?>js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo asset() ?>js/bootstrap.min.js"></script>

</body>

</html>
