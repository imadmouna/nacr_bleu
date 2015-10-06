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

function resizeImage($file_src, $file_dest, $new_width, $new_height, $proportional=true){   
    $attr=getimagesize($file_src);
    $fw=$attr[0]/$new_width;
    $fh=$attr[1]/$new_height;
    
    if($proportional)
      $f=$fw>$fh?$fw:$fh;
    else
      $f=$fw>$fh?$fh:$fw;

    $w=$attr[0]/$f;
    $h=$attr[1]/$f;
        
    $file_src_infos=pathinfo($file_src);
    
    $ext=strtolower($file_src_infos['extension']);
    if($ext=="jpg")
      $ext="jpeg";
    
    $func="imagecreatefrom".$ext;
    $src  = $func($file_src);
    
    // Création de l'image de destination. La taille de la miniature sera wxh 
    $x=0;
    $y=0;
    if($proportional)
      $dest = imagecreatetruecolor($w,$h);
    else
    {
      $dest = imagecreatetruecolor($new_width,$new_height);
      $x=($new_width-$w)/2;
      $y=($new_height-$h)/2;
    }

    // Configuration du canal alpha pour la transparence
    imagealphablending($dest,false);
    imagesavealpha($dest,true);

    // Redimensionnement de src sur dest 
    imagecopyresampled($dest,$src,$x,$y,0,0,$w,$h,$attr[0],$attr[1]);

    $func="image".$ext;
    $func($dest, $file_dest);
    imagedestroy($dest);
    
    return true;    
}

if(isset($_POST['titre']) and isset($_POST['prix']) and isset($_POST['superficie']) and isset($_POST['nbrp']) 
  and isset($_POST['cat']) and isset($_POST['scat']) and isset($_POST['ville']) and isset($_POST['editor1']) and isset($_FILES['photo']['tmp_name'])){
  
  if($_POST['titre'] and $_POST['prix'] and $_POST['superficie'] and $_POST['nbrp'] and $_POST['cat'] and $_POST['scat'] 
    and $_POST['ville'] and $_POST['editor1'] and $_FILES['photo']['tmp_name']){

      $err = 0;
      $value="";
      $prop=getimagesize($_FILES['photo']['tmp_name']);
      if($prop[1]>=400){
        if($_FILES['photo']['type']=='image/jpeg'){$type="jpg";}
        if($_FILES['photo']['type']=='image/gif'){$type="gif";}
        if($_FILES['photo']['type']=='image/png'){$type="png";}

        $dossier = time();
        
        //CREER SOURCE DOSSIER
        $fichier_max = "images/bien/".$dossier."/big/";
        $fichier_min = "images/bien/".$dossier."/small/";



        mkdir("../images/bien/".$dossier,0777);
        mkdir("../images/bien/".$dossier."/big/",0777);
        mkdir("../images/bien/".$dossier."/small/",0777);
        
        $fichier_src = time()."_".$_FILES['photo']['name'];
        
        //COPIER LES FICHIERS
        copy($_FILES['photo']['tmp_name'],"../".$fichier_max.$fichier_src);
        copy($_FILES['photo']['tmp_name'],"../".$fichier_min.$fichier_src);
        
        //REDIMENSIONNER LES FICHIERS COPIES
        resizeImage("../".$fichier_max.$fichier_src, "../".$fichier_max.$fichier_src, 600, 600, $proportional=true);
        resizeImage("../".$fichier_min.$fichier_src, "../".$fichier_min.$fichier_src, 150, 150, $proportional=true);
        
        //SAUVEGARDE DB
       mysql_query(
          "INSERT INTO `nacr_bleu`.`bien` (`titre`, `Description`, `prix`, `superficie`, `nbr_piece`, `id_ville`, `id_cat`, `id_sous_cat`, `photo`, `dossier`) 
          VALUES (
            '".addslashes(utf8_encode($_POST['titre']))."',
            '".addslashes(utf8_encode($_POST['editor1']))."',
            '".addslashes(utf8_encode($_POST['prix']))."',
            '".addslashes(utf8_encode($_POST['superficie']))."',
            '".addslashes(utf8_encode($_POST['nbrp']))."',
            '".addslashes(utf8_encode($_POST['ville']))."',
            '".addslashes(utf8_encode($_POST['cat']))."',
            '".addslashes(utf8_encode($_POST['scat']))."',
            '".$fichier_src."',
            '".$dossier."'
            );"
        );
       echo "<script language='javascript'>document.location.href='dashboard.php';</script>";
      }else{
        $err = 1;
      }
      if($err == 1){
        echo "<script language='javascript'>alert('La photo ne respecte pas la taille minimum requise, veuillez utiliser une image de taille superieure !');</script>";
      } 






    
  }

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
            Dashboard
            <small>Panneau de controle</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Nouveau bien</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="dashboard.php" enctype="multipart/form-data">
                  <div class="box-body">

                    <div class="form-group">
                      <label for="exampleInputEmail1">Titre *</label>
                      <input class="form-control" name="titre" placeholder="Entrez le titre" value="<?php if(isset($_POST['titre']) and $_POST['titre'])echo $_POST['titre']; ?>" required>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Prix *</label>
                      <input class="form-control" name="prix" placeholder="Entrez le prix" value="<?php if(isset($_POST['prix']) and $_POST['prix'])echo $_POST['prix']; ?>" required>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Superficie *</label>
                      <input class="form-control" name="superficie" placeholder="Entrez la superficie" value="<?php if(isset($_POST['superficie']) and $_POST['superficie'])echo $_POST['superficie']; ?>" required>
                    </div>                    

                    <div class="form-group">
                      <label for="exampleInputEmail1">Nombre de pi&egrave;ces *</label>
                      <input class="form-control" name="nbrp" placeholder="Entrez le nombre de pieces" value="<?php if(isset($_POST['nbrp']) and $_POST['nbrp'])echo $_POST['nbrp']; ?>" required>
                    </div>            


                    <div class="form-group">
                      <label for="exampleInputEmail1">Cat&eacute;gorie *</label>
                       <select id="cat" name="cat" class="form-control" required>
                        <option value=""></option>
                        <?php
                          $r = mysql_query("select * from categorie order by id_cat");
                          while($tt = mysql_fetch_array($r)){
                        ?>
                        <option value="<?php echo $tt[0];?>"><?php echo $tt[1];?></option>
                        <?php
                          }
                        ?>
                    </select>
                    </div>  


                    <div class="form-group">
                      <label for="exampleInputEmail1">Sous cat&eacute;gorie *</label>
                       <select id="scat" name="scat" class="form-control" required>
                        
                        </select>
                    </div>  


                    <div class="form-group">
                      <label for="exampleInputEmail1">Ville *</label>
                       <select id="ville" name="ville" class="form-control" required>
                        <option value=""></option>
                        <?php
                          $r = mysql_query("select * from ville order by id");
                          while($tt = mysql_fetch_array($r)){
                        ?>
                        <option value="<?php echo $tt[0];?>"><?php echo $tt[1];?></option>
                        <?php
                          }
                        ?>
                    </select>
                    </div>  






                    <div class="form-group">
                      <label for="exampleInputEmail1">Description *</label>
                      <textarea id="editor1" name="editor1" rows="10" cols="80" required><?php if(isset($_POST['nbrp']) and $_POST['nbrp'])echo $_POST['nbrp'];else echo "Entrez la Description"; ?></textarea>
                    </div>


                    <div class="form-group">
                      <label for="exampleInputEmail1">Photo principale </label>
                      <input class="form-group" type="file" name="photo" id="photo" />
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
                  <h3 class="box-title">Liste des biens</h3>
                </div><!-- /.box-header -->
                
                <div class="box-body">


                  <?php
                    $q = mysql_query("select * from bien order by id");
                    while($tab = mysql_fetch_array($q)){
                  ?>

                  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:11px">
                    <tr>
                      <td width="200" align="left" valign="top">
                        <img src="../images/bien/<?php echo $tab[9];?>/small/<?php echo $tab[10];?>" width="50" height="50" style="padding:2px;border:1px solid #ccc" />
                      </td>
                      <td width="200" align="left" valign="top"><?php echo stripslashes(utf8_decode($tab[1]));?></td>
                      
                      <td width="100" align="left" valign="top">&nbsp;</td>
                      <td align="right" valign="top">&nbsp;</td>
                      <td align="right" valign="top">
                      
                      <a href="galerie.php?id=<?php echo $tab[0];?>" title="<?php echo stripslashes(utf8_decode($tab[1]));?>">Galerie photos</a>
                      &nbsp;&nbsp;&nbsp;
                      <a href="modifierBien.php?id=<?php echo $tab[0];?>" title="Modifier <?php echo stripslashes(utf8_decode($tab[1]));?>">Modifier</a>
                      &nbsp;&nbsp;&nbsp;
                      <a href="javascript:sup('<?php echo $tab[0];?>')" title="Supprimer">Supprimer</a>
                      </td>
                    </tr>
                  </table><br>
                  <?php
                    }
                  ?>
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
    <script type="text/javascript">
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();


        $("#cat").click(function(){
          valeur = $(this).val();
          $.ajax({
                type: "POST",
                url: "ajax/getSCat.php",
                data: {id:valeur},
                success: function(data){
                  $("#scat").html(data);
                },
                dataType: "html"
          });
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