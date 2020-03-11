<div class="row">
<section class="novo-cupom">
  <div class="container">
    <div class="box-form">
      <h2>Novo cupom</h2>
        <h3><span>Cadastro de cupons para a venda de créditos profile.</span></h3>
        <br>
        <br>
      <form action="" method="post" name="form-cupom">
        <input type="hidden" name="user_id" id="user_id" value="<?php echo $user['user_id'] ?>">
        <input type="hidden" name="cargo" id="cargo" value="<?php echo $user['cargo'] ?>">
        <h3><span>Dados do Cupom</span></h3>
        <div class="row">
          <div class="col-md-8">
            <div class="form-group">
              <label>Nome do cupom:</label>
              <input type="text" name="cupom" id="cupom" required="required" value="" class="form-control" maxlength="15" />
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Aplicar densconto de (%):</label>
              <input type="number" name="desconto" id="desconto" required="required" value="" class="form-control" />
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
            <div class="form-group">
                <label>Pode ser usado quantas vezes:</label>
                <input type="number" name="quantidade" id="quantidade" required="required" value="1" class="form-control" />
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label>Vence em:</label>
                <input type="text" name="vencimento" id="vencimento" required="required" data-mask="00/00/0000" class="form-control" value="<?php echo date("d/m/Y",strtotime("+7 days")) ?>" />
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label>Quantidade de Créditos:</label>
                <input type="number" name="credito" id="credito"  value="" class="form-control" />
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label>Valor Total:</label>
                <input type="number" name="total" id="total"  value="" class="form-control" />
            </div>
          </div>
        </div>
        <h3><span>Dados do Cliente</span></h3>
        <div class="row">
  
          <div class="col-md-3">
            <div class="form-group">
              <label>Já é cliente?</label>
                <select name="status" id="status">
                  <option value=""></option>
                  <option value="Sim">Sim</option>
                  <option value="Nao">Não</option>
                </select>
            </div>
          </div>
        </div>

        <div style="display: none;" class="cliente">
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label>IDCLIFOR</label>
                  <input type="number" name="idclifor" id="idclifor"  value="" class="form-control" />
              </div>
            </div>
          </div>
        </div>
        <div style="display: none;" class="n_cliente">
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label>Nome:</label>
                  <input type="text" name="nome_cliente" id="nome_cliente"  value="" class="form-control" />
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Email:</label>
                  <input type="email" name="email_cliente" id="email_cliente"  value="" class="form-control" />
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>CPF/CNPJ:</label>
                  <input type="text" name="cpf_cnpj" id="cpf_cnpj"  value="" class="form-control" />
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <a class="btn btn-primary" id="gerarCupom">Salvar cupom</a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
</div>
<div class="row">
  <div class="container">
    <div class="ibox-content">
      <input type="text" class="form-control input-sm m-b-xs" id="filter" placeholder="Search in table">
      <table class="footable table table-stripped toggle-arrow-tiny" data-filter=#filter>
        <thead>
          <tr>
            <th data-toggle="true">Cupom</th>
            <th data-hide="all">Quantidade de Créditos</th>
            <th data-hide="all">Nome do Cliente</th>
            <th data-hide="all">Desconto</th>
            <th data-hide="all">Valor</th>
            <th>Utilizado</th>
            <th>Vence Em</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($lista as $item): ?>
            <tr>
              <td><?php echo $item['cupom'] ?></td>
              <td><?php echo $item['qnt_creditos'] ?></td>
              <td><?php echo $item['nome_cliente'] ?></td>
              <td><?php echo $item['valor'] ?>%</td>
              <td>R$<?php echo $item['valor_total'] ?></td>
              <td><?php echo $item['utilizado'] ?>/<?php echo $item['quantidade'] ?></td>
              <td>
                <?php $data = new DateTime($item['vencimento']);
                    echo $data->format('d/m/Y'); ?>      
              </td>
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
