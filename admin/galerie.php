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

if(isset($_POST["libelle"]) and $_POST["libelle"]){
  mysql_query("insert into categorie(libelle) values('".utf8_encode(addslashes($_POST["libelle"]))."')");
  echo "<script language='javascript'>document.location.href='galerie.php';</script>";
}

if(isset($_REQUEST['id_sp']) and is_numeric($_REQUEST['id_sp']) and isset($_REQUEST['id']) and is_numeric($_REQUEST['id'])){
  mysql_query("delete from galerie where id = ".$_REQUEST['id_sp']);
  echo "<script language='javascript'>document.location.href='galerie.php?id=".$_REQUEST['id']."';</script>";
}


if(isset($_REQUEST['spr']) and isset($_REQUEST['id']) and $_REQUEST['id'] and $_REQUEST['spr']=="all"){
  mysql_query("delete from galerie where id_bien=".$_REQUEST['id']);
  echo "<script language='javascript'>document.location.href='galerie.php?id=".$_REQUEST['id']."';</script>";
}


$a = 0;
$qqq=mysql_query("select id from galerie");
while($ttt = mysql_fetch_array($qqq)){
  if(isset($_POST['ch'.$ttt[0]]) and $_POST['ch'.$ttt[0]]){
    mysql_query("delete from galerie where id = ".$_POST['ch'.$ttt[0]]);
    $a = 1;
  }
}
if($a == 1){
  echo "<script language='javascript'>document.location.href='galerie.php?id=".$_REQUEST['id']."';</script>";
}



if(isset($_FILES['photos']['tmp_name']) and isset($_POST['id'])){
  if($_FILES['photos']['tmp_name']){
    $err = 0;
    for($i = 0 ; $i < count($_FILES['photos']['tmp_name']) ; $i++){
      $type="";
      $prop=getimagesize($_FILES['photos']['tmp_name'][$i]);
      if($prop[1]>=400){
        if($_FILES['photos']['type'][$i]=='image/jpeg'){$type="jpg";}
        if($_FILES['photos']['type'][$i]=='image/gif'){$type="gif";}
        if($_FILES['photos']['type'][$i]=='image/png'){$type="png";}
        

        $tq = mysql_fetch_array(mysql_query("select dossier from bien where id=".$_POST['id']));
        if($tq){
          $dossier = $tq[0];
          //CREER SOURCE DOSSIER
          $fichier_max = "images/bien/".$dossier."/big/";
          
          $fichier_src = time()."_".$_FILES['photos']['name'][$i];
          
          //COPIER LES FICHIERS
          copy($_FILES['photos']['tmp_name'][$i],"../".$fichier_max.$fichier_src);         
          
          //SAUVEGARDE DB          
          mysql_query("insert into galerie(chemin, date_ajout, id_bien) values('".addslashes($fichier_src)."','".date("Y/m/d")."',".$_POST['id'].")");
          echo "<script language='javascript'>document.location.href='galerie.php?id=".$_POST['id']."';</script>";
        }
        
      }else{
        $err = 1;
      }
    }//END FOR
    if($err == 1){
      echo "<script language='javascript'>alert('Une ou plusieurs photos ne respectent pas la taille minimum requise, veuillez utiliser une image de taille superieure !');</script>";
      echo "<script language='javascript'>document.location.href='galerie.php?id=".$_POST['id']."';</script>";
    }
  }
}



?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Administration | NACR BLEU</title>
    <style type="text/css">
      .icheckbox_square-blue, .iradio_square-blue {
        border: 3px solid #FFF !important;
      }
    </style>
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
            Photos de la galerie
            <small>Panneau de controle</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">Photos de la galerie</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Nouvelles photos</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="galerie.php" enctype="multipart/form-data">
                  <div class="box-body">

                    <div class="form-group">
                      <label for="exampleInputEmail1">Photos *</label>
                      <input class="form-control" type="file" name="photos[]" required multiple>
                      <input type="hidden" name="id" value="<?php echo $_REQUEST['id'];?>" />
                    </div>

                    

                  </div>

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Valider</button>
                  </div>
                </form>
              </div><!-- /.box -->



              <!-- general form elements -->
              <div class="box box-alert">
                <div class="box-header">
                  <h3 class="box-title">Liste des photos</h3>
                  <a class="btn btn-danger btn-xs pull-right btn-spr-all">Supprimer tout</a>
                </div><!-- /.box-header -->
                
                <div class="box-body">

                  <div class="row" style="padding-left:40px">
                    <form method="post" action="galerie.php?id=<?php echo $_REQUEST['id']; ?>">
                  <?php

                    $tq = mysql_fetch_array(mysql_query("select dossier from bien where id=".$_REQUEST['id']));
                    $dossier = $tq[0];

                    $q = mysql_query("select * from galerie where id_bien=".$_REQUEST['id']." order by id");
                    while($tab = mysql_fetch_array($q)){
                  ?>
                  <span style="float:left;padding:20px;">
                  <table width="120" border="0" cellspacing="0" cellpadding="0" style="font-size:11px;">
                    <tr>
                      <td align="left" valign="top">
                        <div style="float:left;position:absolute;padding-left:0px">
                          <input type="checkbox" name="ch<?php echo $tab[0];?>" value="<?php echo $tab[0];?>" />
                        </div>
                        <img src="../images/bien/<?php echo $dossier;?>/big/<?php echo stripslashes(utf8_decode($tab[1])); ?>" width="100" height="100" style="border:1px solid #ccc;padding:2px" />
                      </td>
                    </tr>
                    <tr>
                      <td align="left" valign="top">
                        
                      <a href="javascript:sup('<?php echo $tab[0];?>','<?php echo $tab['id_bien'];?>')" title="Supprimer">Supprimer</a>
                      </td>
                    </tr>
                  </table>
                </span>
                  <?php
                    }
                  ?>
                  <div class="col-md-12">
                    <input type="submit" value="Valider la suppression" class="btn btn-primary" />
                  </div>
                </form>
                </div>
                </div>

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
    <!-- CK Editor -->
    <script src="//cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>

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
    </script>


    <link href="dist/css/select2.css" rel="stylesheet" />
    <link href="dist/css/select2-bootstrap.css" rel="stylesheet" />
    <script src="dist/js/select2.min.js"></script>

    <script type="text/javascript">
      $('select').select2();

      function sup(id, id_bien){
        if(confirm('Etes-vous sure de supprimer cette photo?')){
          document.location.href='galerie.php?id_sp='+id+'&id='+id_bien;
        }
      }
      $(".btn-spr-all").click(function(){
        if(confirm('Etes-vous sure de supprimer toutes les photos?')){
          document.location.href='galerie.php?id=<?php echo $_REQUEST['id'];?>&spr=all';
        }
      });
    </script>

    <!-- AdminLTE for demo purposes <script src="dist/js/demo.js" type="text/javascript"></script>-->
    
  </body>
</html>