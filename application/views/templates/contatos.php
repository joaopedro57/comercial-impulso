<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <?php $index = 0; ?>
            <?php foreach ($contato as $dados): ?>
            <div class="col-lg-4">
                <div class="contact-box" style = "height: 186px !important;">
                    <div class="col-lg-3" style="max-height: 115px">
                        <div class="text-center">
                            <img alt="image" class="img-circle m-t-xs img-responsive" src="<?php echo asset(), $dados['img'] ?>">
                            <div class="m-t-xs font-bold"><?php echo $dados['cargo']; ?></div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <h3><strong><?php echo $dados['name'] ?></strong></h3>
                        <address>
                            <strong><?php echo $dados['email'] ?></strong><br>
                            <p title="Phone">Telefone: (31) <?php echo $dados['telefone'] ?></p>
                            <form class="m-t" role="form" method="post">
                              <div class="col-sm-9">
                                <select class="form-control m-b" name="<?php echo $dados['user_id'] ?>">
                                    <option>Ativo</option>
                                    <option>Inativo</option>
                                </select>
                            </div>
                        </address>
                    </div>
                    <div class="clearfix"></div>
                        </a>
                </div>
            </div>
            <?php $index ++ ?>
             <?php endforeach; ?>
            <div>
            <?php if ($user['cargo'] == "Gestora Comercial" || $user['cargo'] == "Sales Ops" || $user['cargo'] == "Coordenador"): ?>
                <button type="submit" class="btn btn-primary block full-width m-b" value="Entrar">Salvar</button>
            <?php endif ?>
            </div>
            </form>
        </div>
    </div>
</div>