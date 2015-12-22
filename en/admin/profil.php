<?php
session_start();
if(!isset($_SESSION["admin"])){
  echo "<script language='javascript'>document.location.href='index.php';</script>";
}

if(isset($_REQUEST["dec"]) and $_REQUEST["dec"]=="1"){
  session_destroy();
  echo "<script language='javascript'>document.location.href='index.php';</script>";
}
include("../connect.php");

if(isset($_REQUEST['id_sp']) and is_numeric($_REQUEST['id_sp'])){
  mysql_query("delete from bien where id = ".$_REQUEST['id_sp']);
  echo "<script language='javascript'>document.location.href='dashboard.php';</script>";
}



if(isset($_POST['pass']) and $_POST['pass']){

  $salt = md5(time());
  mysql_query("update manager set pass='".crypt(addslashes(utf8_encode($_POST['pass'])),$salt)."',salt = '".$salt."', last_login='".date("D d M H")."h".date(", Y")."'");
  session_destroy();
  echo "<script language='javascript'>document.location.href='index.php';</script>";
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Administration | NACR BLEU</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="dist/css/skins/skin-blue.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue">
    <div class="wrapper">
      
      <?php
        include("header.php");
      ?>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <?php
          include("sidebar.php");
        ?>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Mon profil
            <small>Panneau de controle</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">Mon profil</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Modifier mot de passe</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" id="form" method="post" action="profil.php">
                  <div class="box-body">

                    <div class="form-group">
                      <label for="exampleInputEmail1">Mot de passe *</label>
                      <input class="form-control" id="p1" name="pass" placeholder="Entrez le mot de passe"  required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Retapez le mot de passe *</label>
                      <input class="form-control" id="p2" placeholder="Entrez le mot de passe a nouveau"  required>
                    </div>


                  </div>

                  <div class="box-footer">
                    <button type="button" class="btn btn-primary btn-sub">Modifier le mot de passe</button>
                  </div>
                </form>
              </div><!-- /.box -->



              <!-- general form elements -->
              





        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2015.</strong> Tous droits r&eacute;serv&eacute;s.
      </footer>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes 
    <script src="dist/js/demo.js" type="text/javascript"></script>-->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- CK Editor -->
    <script src="//cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(function () {
        
        $('.btn-sub').click(function(){
          if( $('#p1').val() == $('#p2').val() && ($('#p1').val() != "" && $('#p2').val()!="") ){
            $('#form').submit();
          }else{
            alert("Le mot de passe est incorect !");
          }
        });
        
      });
    </script>


    <link href="dist/css/select2.css" rel="stylesheet" />
    <link href="dist/css/select2-bootstrap.css" rel="stylesheet" />
    <script src="dist/js/select2.min.js"></script>

    <script type="text/javascript">
      $('select').select2();
      function sup(id){
        if(confirm('Etes-vous sure de supprimer cette entite?')){
          document.location.href='dashboard.php?id_sp='+id;
        }
      }
    </script>

    <!-- AdminLTE for demo purposes <script src="dist/js/demo.js" type="text/javascript"></script>-->
    
  </body>
</html>