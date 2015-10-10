<?php
include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Accueil</title>
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
           
            <h1 class="brand_name"><input type="image" src="images/logo_footer.png"></h1>
            
          </div>
  <ul class="row contact-list">
    <a href="contact.html" style="float:right;">Contactez-Nous</a></div></ul>
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
        <section class="camera_container">
          <div id="camera" class="camera_wrap">
            

            <?php
              $req1 = mysql_query("select * from slider order by id");
              while($tab1 = mysql_fetch_array($req1)){
            ?>
              <div data-src="<?php echo $tab1[1];?>">
                <div class="camera_caption fadeIn">
                  <div class="container">
                    <div class="row">
                      <div class="preffix_6 grid_6"></div>
                    </div>
                  </div>
                </div>
              </div>
            <?php
              }
            ?>

          </div>
        </section>

        <p>&nbsp;</p>

        <section>
          <div class="container banner_wr">
            <div class="container hr">
              <ul class="row product-list">

                <li class="grid_6">
                  <?php
                    $t = mysql_fetch_array(mysql_query("select * from mise_avant m join bien b on b.id = m.id_bien limit 0,1"));
                    if($t){
                  ?>
                  <div class="box wow fadeInRight">
                    <div class="box_aside">
                       <img src="<?php echo "images/bien/".$t['dossier']."/big/".$t['photo'];?>" height="250" width="250"> 
                    </div>
                    <div class="box_cnt__no-flow">
                      <h3><a href="#"><?php echo stripslashes(utf8_decode($t['titre']));?></a></h3>
                      <p>
                        <?php echo stripslashes(utf8_decode($t['Description']));?>
                      </p>
                    </div>
                  </div>

                  <hr>

                  <?php
                    }
                  ?>


                  <?php
                    $t = mysql_fetch_array(mysql_query("select * from mise_avant m join bien b on b.id = m.id_bien limit 1,1"));
                    if($t){
                  ?>
                  <div data-wow-delay="0.2s" class="box wow fadeInRight">
                    <div class="box_aside">
                       <img src="<?php echo "images/bien/".$t['dossier']."/big/".$t['photo'];?>" height="250" width="250"> 
                    </div>
                    <div class="box_cnt__no-flow">
                      <h3><a href="#"><?php echo stripslashes(utf8_decode($t['titre']));?></a></h3>
                      <p>
                        <?php echo stripslashes(utf8_decode($t['Description']));?>
                      </p>
                    </div>
                  </div>


                  <?php
                    }
                  ?>

                  

                </li>
                <li class="grid_6">


                  <?php
                    $t = mysql_fetch_array(mysql_query("select * from mise_avant m join bien b on b.id = m.id_bien limit 2,1"));
                    if($t){
                  ?>
                  <div data-wow-delay="0.3s" class="box wow fadeInRight">
                    <div class="box_aside">
                       <img src="<?php echo "images/bien/".$t['dossier']."/big/".$t['photo'];?>" height="250" width="250"> 
                    </div>
                    <div class="box_cnt__no-flow">
                      <h3><a href="#"><?php echo stripslashes(utf8_decode($t['titre']));?></a></h3>
                      <p>
                        <?php echo stripslashes(utf8_decode($t['Description']));?>
                      </p>
                    </div>
                  </div>

                  <hr>

                  <?php
                    }
                  ?>

                  <?php
                    $t = mysql_fetch_array(mysql_query("select * from mise_avant m join bien b on b.id = m.id_bien limit 3,1"));
                    if($t){
                  ?>
                  <div data-wow-delay="0.4s" class="box wow fadeInRight">
                    <div class="box_aside">
                       <img src="<?php echo "images/bien/".$t['dossier']."/big/".$t['photo'];?>" height="250" width="250"> 
                    </div>
                    <div class="box_cnt__no-flow">
                      <h3><a href="#"><?php echo stripslashes(utf8_decode($t['titre']));?></a></h3>
                      <p>
                        <?php echo stripslashes(utf8_decode($t['Description']));?>
                      </p>
                    </div>
                  </div>

                  <hr>

                  <?php
                    }
                  ?>
                </li>
              </ul>
            </div>
            <div class="container hr">
              <ul class="row product-list">
                <li class="grid_6">
                  <div class="box wow fadeInRight">
                    <div class="box_aside"></div>
                  </div>
                  <div data-wow-delay="0.2s" class="box wow fadeInRight">
                    <div class="box_aside"></div></div></li>
                <li class="grid_6">
                  <div data-wow-delay="0.3s" class="box wow fadeInRight">
                    <div class="box_aside"></div>
                  </div>
                  <div data-wow-delay="0.4s" class="box wow fadeInRight">
                    <div class="box_aside"></div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </section>
        <section class="well ins1"></section>
        <section class="well1">
          <div class="container">
            <div class="row">
              <div class="grid_7">
                <h3>A Propos</h3><img src="images/logo_footer.png" alt="">
                <p>
                    <?php
                      $t = mysql_fetch_array(mysql_query("select texte from apropos"));
                      echo stripslashes(utf8_decode($t[0]));
                    ?>
                </p>
              </div>
              
              <div class="grid_5">
                <div class="info-box">
                  <h3 class="fa-comment">M&eacute;t&eacute;o Marrakech</h3>
                  <hr>
                  <!-- widget meteo -->
<div id="widget_705e297ff3439d6933c8c1c6ec6ce2f7">
<span id="l_705e297ff3439d6933c8c1c6ec6ce2f7"><a href="http://www.my-meteo.fr/previsions+meteo+maroc/marrakech.html"></a></span>
<script type="text/javascript">
(function() {
  var my = document.createElement("script"); my.type = "text/javascript"; my.async = true;
  my.src = "http://services.my-meteo.fr/widget/js2.php?ville=334&format=carre&nb_jours=3&temps&vent&c1=ebffcc&c2=ebffcc&c3=57AACD&c4=57AACD&c5=ffffff&c6=ffd4d4&police=0&t_icones=13&x=336&y=254&id=705e297ff3439d6933c8c1c6ec6ce2f7";
  var z = document.getElementsByTagName("script")[0]; z.parentNode.insertBefore(my, z);
})();
</script>
</div>
<!-- widget meteo -->
                  <h3></h3>
                 
                 
                  <hr>
                  <h3></h3>
                  <dl>
                    <dt><a href="Contact.html">Contacter-Nous pour plus d'information</a></dt>
                  </dl>
                </div>
                
                  
                  
                  <div class="item">
                   
                      <div class="box_aside"><img src="" alt=""></div>
                      <div class="box_cnt__no-flow">
                        <p>
                          <q></q>
                        </p>
                        
                      </div>
                  
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>
      <!--
      ========================================================
                                  FOOTER
      ========================================================
      -->
      <footer>
        <section class="well3">
          <div class="container">
            <ul class="row contact-list">
              <li class="grid_4">
                <div class="box">
                  <div class="box_aside"></div>
                  <div class="box_cnt__no-flow">
                    <div class="box_cnt__no-flow">Contactez-nous<br>Tél :+212 664364860 <br> Email:<a href="mailto:info@nacrbleu.com">info@nacrbleu.com</a><br><a href="#">Suivez nous sur facebook</a><br><a href="#">Suivez nous sur Twitter</a></div>
                  </div>
                </div>
               
              </li>
              <li class="grid_4">
                <div class="box">
                 <strong>Plan du site</strong><br>
                 <a href="#">Accueil</a><br>
                 <a href="#">Villa et Maison</a><br>
                 <a href="#">Magasin et commerce</a><br>
                 <a href="#">Appartement</a><br>
                 <a href="#">Terrain et Ferme</a><br>
                 <a href="#">Location Vacance</a>
                  
                </div>
                
              </li>
              <li class="grid_4">
                <div class="box">
                  
                </div>
                <div class="box">
                  
                </div>
              </li>
            </ul>
          </div>
        </section>
        <section>
          <div class="container">
            <div class="copyright">Nacr Bleu © <span id="copyright-year"></span>.&nbsp;</a>Tous droits réservés.
            </div>
          </div>
        </section>
      </footer>
    </div>
    <script src="js/script.js"></script>
</body>
</html>