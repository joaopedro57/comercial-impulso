<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>indicação</title>

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
            <h3>Indicação para o Farmer</h3>
            <p>Antes de preencher clique no botão "Logar" e entre com a conta "sucessodocliente.solides".<br />Em seguida preencha o formulario e clique em registrar.</p>
             <button class="btn btn-primary block full-width m-b" onclick="authenticate().then(loadClient)"> Logar</button>
                <div class="form-group">
                                    <select class="form-control m-b" name="nomeCS" id="cs">
                                        <option>Selecione o CS:</option>
                                        <option>Amanda O.</option>
                                        <option>Amanda M.</option>
                                        <option>Caroline</option>
                                        <option>Camila</option>
                                        <option>Caio</option>
                                        <option>Felipe</option>
                                        <option>Francis</option>
                                        <option>Ingreds</option>
                                        <option>Letícia</option>
                                        <option>Luma</option>
                                        <option>Michel</option>
                                        <option>Rafael</option>
                                        <option>Thayná</option>
                                    </select>
                <div class="form-group">
                    <input type="text" name="empresa" class="form-control" placeholder="Nome da Empresa" required="" id="empresa">
                </div>
                <div class="form-group">
                    <input type="text" name="id_cliente" class="form-control" placeholder="ID do Cliente" required="" id="idCliente">
                </div>
                <div class="form-group">
                    <input type="text" name="url" class="form-control" placeholder="URL (CIT)" required="" id="url">
                </div>
                <div class="form-group">
                    <input type="phone" name="telefone" class="form-control" placeholder="Telefone de Contato" required="" id="telefone">
                </div>
                 <div class="form-group">
                    <select class="form-control m-b" name="tipo" id="tipo">
                      <option>Selecione o tipo:</option>
                      <option>Upsell</option>
                      <option>Avulso</option>
                      <option>Novo Cliente</option>
                  </select>
                </div>
                <div class="form-group" style="text-align: left">
                    <label for="exampleTextarea">Resumo dos Objetivos do Cliente:</label>
                    <textarea class="form-control" id="resumo"  name="resumo" rows="3" id="resumo"></textarea>
                </div>
                <button class="btn btn-primary block full-width m-b" onclick="execute()" >Registrar Oportunidade</button>
                
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

<!-- Google API -->

<script src="https://apis.google.com/js/api.js"></script>
<script>
  /**
   * Sample JavaScript code for sheets.spreadsheets.values.append
   * See instructions for running APIs Explorer code samples locally:
   * https://developers.google.com/explorer-help/guides/code_samples#javascript
   */
  function dataAtualFormatada(){
    var data = new Date();
    var dia = data.getDate();
    if (dia.toString().length == 1)
      dia = "0"+dia;
    var mes = data.getMonth()+1;
    if (mes.toString().length == 1)
      mes = "0"+mes;
    var ano = data.getFullYear();  
    return dia+"/"+mes+"/"+ano;
  }
  function mesAtual(){
    var data = new Date();
    var mes = data.getMonth()+1;
    if (mes.toString().length == 1)
      mes = "0"+mes;
    return mes;
  }

  function authenticate() {
    return gapi.auth2.getAuthInstance()
        .signIn({scope: "https://www.googleapis.com/auth/drive https://www.googleapis.com/auth/drive.file https://www.googleapis.com/auth/spreadsheets"})
        .then(function() { console.log("Sign-in successful"); },
              function(err) { console.error("Error signing in", err); });
  }
  function loadClient() {
    return gapi.client.load("https://content.googleapis.com/discovery/v1/apis/sheets/v4/rest")
        .then(function() { console.log("GAPI client loaded for API"); },
              function(err) { console.error("Error loading GAPI client for API", err); });
  }
  // Make sure the client is loaded and sign-in is complete before calling this method.
  function execute() {
    return gapi.client.sheets.spreadsheets.values.append({
      "spreadsheetId": "1QiuTsMCCeSQehfyQ9xvDwYiX3KZ04JbW92QJKBwph0I",
      "range": "Contas Trabalhadas!A1",
      "includeValuesInResponse": "false",
      "insertDataOption": "INSERT_ROWS",
      "responseDateTimeRenderOption": "SERIAL_NUMBER",
      "responseValueRenderOption": "FORMATTED_VALUE",
      "valueInputOption": "USER_ENTERED",
      "resource": {
        "majorDimension": "ROWS",
        "values": [
          [
            document.getElementById('url').value,
            document.getElementById('empresa').value,
            "-",            
            document.getElementById('cs').value,
            "Indicação",
            dataAtualFormatada(),
            mesAtual(),
            document.getElementById('tipo').value,
            "-",
            "Em andamento",
            "-",
            "-",
            document.getElementById('resumo').value,
          ]
        ]
      }
    })
        .then(function(response) {
                // Handle the results here (response.result has the parsed body).
                console.log("Response", response);
                alert("Lead cadastro com sucesso.");
              },
              function(err) { console.error("Execute error", err); });
  }
  gapi.load("client:auth2", function() {
    gapi.auth2.init({client_id: '832740055940-qpc9f821afal8rhutp7f901a0psc80gu.apps.googleusercontent.com'});
  });
</script>

</body>

</html>
