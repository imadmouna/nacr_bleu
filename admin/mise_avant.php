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

if(isset($_POST["liste"]) and $_POST["liste"]){

  $main_lst = array();
  $lst = explode(",", $_POST['liste']);
  foreach ($lst as $value) {
    if(isset($_POST['ch'.$value])){
      array_push($main_lst, $value);
    }
  }

  if(count($main_lst)>0){
    mysql_query("delete from mise_avant");
    foreach ($main_lst as $key => $value) {
      mysql_query("insert into mise_avant(id_bien) values(".$value.");");
    }
    echo "<script language='javascript'>document.location.href='mise_avant.php';</script>";
  }

}




$liste = "";
$liste_db_mea = array();
$q = mysql_query("select * from mise_avant");
while($ta = mysql_fetch_array($q)){
  array_push($liste_db_mea, $ta[1]);
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

    <link href="plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
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
            Mise en avant des biens
            <small>Panneau de controle</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">Mise en avant des biens</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

              <!-- general form elements -->
              



              <!-- general form elements -->
              <div class="box box-alert">


                <form method='post' action="mise_avant.php">
                <div class="box-header">
                  <h3 class="box-title">Liste des biens</h3>
                </div><!-- /.box-header -->
                
                <div class="box-body">
                  <div class="row" style="padding-left:40px">
                  <?php
                    $q = mysql_query("select * from bien order by id");
                    while($tab = mysql_fetch_array($q)){
                      $liste .= $tab['id'].",";
                  ?>
                  <span style="float:left;padding:20px;">
                    <table width="120" border="0" cellspacing="0" cellpadding="0" style="font-size:11px;">
                      <tr>
                        <td align="left" valign="top">
                          <img src="../images/bien/<?php echo $tab['dossier'];?>/big/<?php echo stripslashes(utf8_decode($tab['photo'])); ?>" width="70" height="70" style="border:1px solid #ccc;padding:2px" />
                          <br><b><?php echo stripslashes(utf8_decode($tab['titre']));?></b>
                        </td>
                      </tr>
                      <tr>
                        <td align="left" valign="top">
                          <div><br>
                            <input type="checkbox" name="ch<?php echo $tab['id'];?>" 
                            <?php foreach ($liste_db_mea as $key => $value) {
                              if($value == $tab['id'])echo "checked";
                            }?> 
                            />
                          </div>
                        </td>
                      </tr>
                    </table>
                  </span>
                  <?php
                    }
                  ?>
                </div>
                </div>



                  <input type="hidden" name="liste" value="<?php echo $liste; ?>" />

                  <div class="box-footer">                   
                      <button type="submit" class="btn btn-primary">Valider mon choix</button>
                  </div>

              </form>

              </div>





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
    
    
   

    <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>


    <script type="text/javascript">

      $(function () {

        "use strict";

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"]').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_minimal-blue'
        });
      });


      function sup(id, id_bien){
        if(confirm('Etes-vous sure de supprimer cette photo?')){
          document.location.href='galerie.php?id_sp='+id+'&id='+id_bien;
        }
      }
    </script>

    <!-- AdminLTE for demo purposes <script src="dist/js/demo.js" type="text/javascript"></script>-->
    
  </body>
</html>