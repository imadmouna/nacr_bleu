<?php 
  session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Administration | NACR BLEU</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />


    <script language="javascript">
      function verifier(){
        if(document.getElementById("login").value!="" && document.getElementById("pass").value!=""){
            try{xh1=new XMLHttpRequest();}
              catch(e){
                try{xh1=new ActiveXObject("Microsoft.XMLHTTP");}
                catch(e1){
                  alert("Objet non supporté!");
                }
              }
            xh1.onreadystatechange=function(){
              if(xh1.readyState==4){
                if(xh1.responseText=='Erreur, les donnees saisies sont incorrectes!'){
                  document.getElementById("divi").innerHTML="Erreur, les données saisies sont incorrectes!";
                }else if(xh1.responseText=="Erreur, le mot de passe esr incorrect!"){
                  document.getElementById("divi").innerHTML="Erreur, le mot de passe esr incorrect!";
                }else{
                  document.write(xh1.responseText);
                }
              }else{
                document.getElementById("divi").innerHTML="<img src='images/loading.gif' />";
              }
            }
                  
            xh1.open("post","ajax/ajax_auth.php",true);
            xh1.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
            xh1.send("login="+document.getElementById("login").value+"&pass="+document.getElementById("pass").value);
            }else{
              document.getElementById('divi').innerHTML="Les champs sont vides !";
            }
      }
      </script>




    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <b>Administration</b><br>NACR BLEU
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Authentifiez-vous!</p>
        <form action="index.php" method="post">
          <div class="form-group has-feedback">
            <input type="text" id="login" class="form-control" placeholder="Login"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" id="pass" class="form-control" placeholder="Mot de passe"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">    
              <div class="checkbox icheck">
                <div id="divi">
                  
                </div>
              </div>                        
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="button" onclick="javascript:verifier()" class="btn btn-primary btn-block btn-flat">Valider</button>
            </div><!-- /.col -->
          </div>
        </form>

        

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.3 -->
    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>