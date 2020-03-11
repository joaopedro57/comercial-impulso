<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Solides -Register</title>

    <link href="<?php echo asset() ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo asset() ?>font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo asset() ?>css/animate.css" rel="stylesheet">
    <link href="<?php echo asset() ?>css/style.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="<?php echo asset() ?>img/icone_solides2.png"/>


</head>

<body class="gray-bg">
       
    <div class="middle-box text-center loginscreen   animated fadeInDown">
        <?php if($this->session->flashdata("msg_erro")): ?>
        <p  class="alert alert-danger"><?php echo $this->session->flashdata("msg_erro") ?></p>
        <?php endif ; ?>
        <div class="middle-box text-center loginscreen   animated fadeInDown">
        <?php if($this->session->flashdata("sucess")): ?>
        <p  class="alert alert-success"><?php echo $this->session->flashdata("sucess") ?></p>
        <?php endif ; ?>
        <div>
            <div>

                 <img alt="image"  src="<?php echo asset() ?>img/logo.png" height="80" width="300" />

            </div>
            <h3>Registrar no Sistema</h3>
            <p>Crie seu úsario e senha aqui</p>
            <form class="m-t" role="form" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" name="idPipe" class="form-control" placeholder="ID do Pipedrive" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="novaSenha" class="form-control" placeholder="Password" required="">
                </div>
                <div class="form-group">
                    <input type="phone" name="telefone" class="form-control" placeholder="Telefone" required="">
                </div>
                 <div class="form-group"><label class="col-sm-2 control-label">Cargo:</label>
                   <div class="col-sm-10">
                        <select class="form-control m-b" name="novoCargo">
                            <option>Selecione: </option>
                            <option>Closer</option>
                            <option>Coordenador</option>
                            <option>Gestora Comercial</option>
                            <option>One Shot</option>
                            <option>SDR</option>
                            <option>Sales Ops</option>
                        </select>
                    </div>
                </div>
                 <div class="form-group"><label class="col-sm-2 control-label">Equipe:</label>
                    <div class="col-sm-10">
                        <select class="form-control m-b" name="equipe">
                        <option>Selecione: </option>
                        <?php foreach ($cargo as $coordenador): ?>
                        <option><?php echo $coordenador['name'] ?></option>  
                        <?php endforeach ?>
                        </select>
                    </div>
                </div>  
                <label class="col-sm-12 control-label">Sua Foto:</label>
                <input type="file" name="foto">
                <br>
                <button type="submit" class="btn btn-primary block full-width m-b" value="Entrar">Register</button>

                <p class="text-muted text-center"><small>Já está cadastrado?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="<?php echo base_url()?> ">Login</a>
            </form>
            <p class="m-t"> <small>Solides Tecnologia LTDA &copy; 2018-2020</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo asset() ?>js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo asset() ?>js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo asset() ?>js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
</body>

</html>
