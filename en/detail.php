<?php
include("connect.php");
$tab = "";
if(isset($_REQUEST['id']) and $_REQUEST['id']){
  $req= mysql_query("select * from bien where id= ".$_REQUEST['id']);
  $tab = mysql_fetch_array($req);
  if(!$tab){
    echo "<script language='javascript'>document.location.href='index.php';</script>";
  }
}else{
  echo "<script language='javascript'>document.location.href='index.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>D&eacute;tail</title>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/camera.css">
    <link rel="stylesheet" href="css/owl-carousel.css">
    <script src="js/jquery.js"></script>
    <script src="js/jquery-migrate-1.2.1.js"></script><!--[if lt IE 9]>
    <html class="lt-ie9">
      <div style="clear: both; text-align:center; position: relative;"><a href="http://windows.microsoft.com/en-US/internet-explorer/.."><img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    </html>
    <script src="js/html5shiv.js"></script><![endif]-->
    <script src="js/device.min.js"></script>



  <link rel="stylesheet" href="files/jquery.bxslider.css" type="text/css" />
  <script src="files/jquery.bxslider.js"></script>

  </head>
  <body>
    <div class="page">
      <!--
      ========================================================
      							HEADER
      ========================================================
      
      
      -->
      <header>
        <div class="container">
          <div class="brand">
           
           <a href="index.php"><input type="image" src="images/logo_footer.png"></a>
            
          </div>
  <ul class="row contact-list">
    <a href="contact.php" style="float:right;"></a></div></ul>
        <div id="stuck_container" class="stuck_container">
          <div class="container">
            <nav class="nav">
              <?php include("menu.php")?>
            </nav>
          </div>
        </div>
      </header>
      <!--
      ========================================================
                                  CONTENT
      ========================================================
      -->
      <main>
        

        
            
        <section class="well ins1">

          <div class="container hr">
            <ul class="row">


              <li class="grid_12">
                <?php
                  if(is_array($tab))echo "<h3>".stripslashes(utf8_decode($tab['titre']))."</h3><br />";
                ?>
              </li>

    <?php
      $qqtest= mysql_query("select * from galerie where id_bien = ".$_REQUEST['id']);
      $ttest = mysql_fetch_array($qqtest);

      if($ttest){
    ?>

              <li class="grid_7">

                <script type="text/javascript">
                    $(document).ready(function(){
                      
                      $('.bxslider').bxSlider({
                        pager: false,
                        controls: true,
                        mode: 'fade',
                        captions: false,
                        auto: true
                      });

                    });
                  </script>

                <div class="slider" style="margin:0px !important">
                  <ul class="bxslider" style="padding:0px !important">
                    <?php
                      $qq= mysql_query("select * from galerie where id_bien = ".$_REQUEST['id']);
                      while($tt = mysql_fetch_array($qq)){
                    ?>
                        <li><img data-u="image" src="images/bien/<?php echo $tab['dossier']."/big/".$tt['chemin']; ?>" /></li>                    
                    <?php
                      }
                    ?>
                  </ul>
                </div>



    



              </li>
          <?php
            }
          ?>



              <li class="grid_5">
                <ul>
                  <li>
                    <strong>Ville : </strong><?php $v = mysql_fetch_array(mysql_query("select ville from ville where id = ".$tab['id_ville'])); echo stripslashes(utf8_decode($v['ville'])); ?>
                  </li>
                  <li>
                    <strong>Prix : </strong><?php echo stripslashes(utf8_decode($tab['prix'])); ?>
                  </li>
                  <li>
                    <strong>Superficie : </strong><?php echo stripslashes(utf8_decode($tab['superficie'])); ?>
                  </li>
                  <li>
                    <strong>Nombre de pi&egrave;ces : </strong><?php echo stripslashes(utf8_decode($tab['nbr_piece'])); ?>
                  </li>
                  <li>
                    <strong>Description : </strong><?php echo stripslashes(utf8_decode($tab['Description'])); ?>
                  </li>
                  <li>&nbsp;</li>
                  <li>
                    <ul>
                      <li style="width:40%;float:left;position:relative">
                        <input type="button" value="Telephone" id="btn-tel" style="color: #FFF;background-color: #5BC0DE;border-color: #46B8DA;padding:8px;width:110px" />
                        <div id="tel" style="display:none"><?php
                      $t = mysql_fetch_array(mysql_query("select tel from infos"));
                      echo "<a href='tel:".stripslashes(utf8_decode($t[0]))."'>".stripslashes(utf8_decode($t[0]))."</a>";
                    ?><br> Fixe : <?php
                      $t = mysql_fetch_array(mysql_query("select fixe from infos"));
                      echo "<a href='tel:".stripslashes(utf8_decode($t[0]))."'>".stripslashes(utf8_decode($t[0]))."</a>";
                    ?><br> Fax : <?php
                      $t = mysql_fetch_array(mysql_query("select fax from infos"));
                      echo stripslashes(utf8_decode($t[0]));
                    ?></div>
                      </li>
                      <li style="width:10%;float:left;position:relative">&nbsp;</li>
                      <li style="width:40%;float:left;position:relative">
                        <input type="button" value="Email" id="btn-email" style="color: #FFF;background-color: #5BC0DE;border-color: #46B8DA;padding:8px;width:110px" />
                        <div id="email" style="display:none"><a href="mailto:<?php
                      $t = mysql_fetch_array(mysql_query("select email from infos"));
                      echo stripslashes(utf8_decode($t[0]));
                    ?>">info@nacrebleu.com</a></div>
                      </li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li class="grid_12">&nbsp;</li>

              <?php 
              $rr = mysql_fetch_array(
                      mysql_query(
                        "select * from bien where id_cat = (select id_cat from bien where id = ".
                        $_REQUEST['id'].") and id_sous_cat = (select id_sous_cat from bien where id = ".
                        $_REQUEST['id'].") and id not in (".$_REQUEST['id'].") order by rand() limit 4"
                      )
                    );
                if($rr){
              ?>

              <li class="grid_12">
                  <strong style="font-size:20px"><br>Suggestions</strong>
                  <ul class="row product-list ">
                    <?php
                      $qu = mysql_query("select * from bien where id_cat = (select id_cat from bien where id = ".$_REQUEST['id'].") and id_sous_cat = (select id_sous_cat from bien where id = ".$_REQUEST['id'].") and id not in (".$_REQUEST['id'].") order by rand() limit 4");
                      while($tqu = mysql_fetch_array($qu)){
                    ?>
                    <li class="grid_3">
                      <div class="box">
                        <div class="box_aside">
                           <a href="detail.php?id=<?php echo $tqu['id'];?>"><img style="padding:3px;border:solid 1px #ccc" src="<?php echo "images/bien/".$tqu['dossier']."/big/".$tqu['photo'];?>" height="100" width="100"> 
                        </div>
                        <div class="box_cnt__no-flow">
                          <strong><a href="detail.php?id=<?php echo $tqu['id'];?>"><?php echo stripslashes(utf8_decode($tqu['titre']));?></a></strong>
                        </div>
                      </div>
                    </li>
                    <?php
                      }
                    ?>
                  </ul>
              </li>

              <?php
                }
              ?>


            </ul>
          </div>






        </section>
        
      </main>
      <!--
      ========================================================
                                  FOOTER
      ========================================================
      -->
      <?php
        include("footer.php");
      ?>
    </div>
    <script src="js/script.js"></script>
    <script type="text/javascript">
      $("#btn-tel").click(function(){
        $("#tel").show();
      });
      $("#btn-email").click(function(){
        $("#email").show();
      });
    </script>
</body>
</html>