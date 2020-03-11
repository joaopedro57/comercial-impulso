<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Planilha Indicadores</title>

    <link href="<?php echo asset() ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo asset() ?>font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo asset() ?>css/animate.css" rel="stylesheet">
    <link href="<?php echo asset() ?>css/style.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="<?php echo asset() ?>img/icone_solides2.png"/>

</head>

<body class="gray-bg">

    <div class="col-lg-3"></div>
    <div class="col-lg-6 text-center" style="margin-top: 112px">
      
      <img alt="image"  src="<?php echo asset() ?>img/logo.png" height="80" width="300"/>
      <br><br>
      <form class="m-t" role="form" method="post">
        
        <div class="form-group">
          <input type="text" name="id" class="form-control" placeholder="ID">
        </div>

        <button type="submit" class="btn btn-primary block full-width m-b" value="Entrar" onclick="pipe()">Preencher Planilha</button>
      </form>

      <button class="btn btn-primar" onclick="authenticate().then(loadClient)"> Logar</button>
      <button class="btn btn-primar" onclick="execute()" >Atualizar Infos</button>
    
    </div>
    <div class="col-lg-3"></div>

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
      "spreadsheetId": "1WxH4VI_0JVtnUxkotdRLEd2LGBq_NNlHY3zQMWaV9vk",
      "range": "#1- Novos Clientes!A1",
      "includeValuesInResponse": "false",
      "insertDataOption": "INSERT_ROWS",
      "responseDateTimeRenderOption": "SERIAL_NUMBER",
      "responseValueRenderOption": "FORMATTED_VALUE",
      "valueInputOption": "USER_ENTERED",
      "resource": {
        "majorDimension": "ROWS",
        "values": [
          [
            "<?php echo $dados['numero'] ?>" ,
            "<?php echo $dados['cliente'] ?>" ,
            "<?php echo $dados['link_crm'] ?>" ,            
            "<?php echo $dados['link_pipe'] ?>" ,
            "<?php echo $dados['plano'] ?>" ,
            "<?php echo $dados['mercado'] ?>" ,
            "<?php echo $dados['sdr'] ?>" ,
            "<?php echo $dados['closer'] ?>" ,
            "<?php echo $dados['valor_venda'] ?>" ,
            "<?php echo $dados['data_diagnostico'] ?>",
            "<?php echo $dados['data_ganho'] ?>",
            "<?php echo $dados['ciclo'] ?>",
            "<?php echo $dados['resumo_cs'] ?>",
            " " ,
            "<?php echo $dados['pagamento'] ?>",
            "<?php echo $dados['parcela'] ?>",
            "<?php echo $dados['parcela_atrasada'] ?>" ,
            "<?php echo $dados['n_funcionarios'] ?>" ,
            "<?php echo $dados['origem'] ?>" ,
            "<?php echo $dados['condicoes'] ?>" ,
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
