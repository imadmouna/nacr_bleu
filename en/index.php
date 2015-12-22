<?php
include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/camera.css">
    <link rel="stylesheet" href="css/owl-carousel.css">
    <script src="js/jquery.js"></script>
    <script src="js/jquery-migrate-1.2.1.js"></script>
    <!-- Insert to your webpage before the </head> -->
    <script src="sliderengine/amazingslider.js"></script>
    <link rel="stylesheet" type="text/css" href="sliderengine/amazingslider-1.css">
    <script src="sliderengine/initslider-1.js"></script>


    <link rel="stylesheet" href="files/jquery.bxslider.css" type="text/css" />
    <script src="files/jquery.bxslider.js"></script>


    <!-- End of head section HTML codes -->
    
    
    <!--[if lt IE 9]>
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
        <ul class="bxslider" style="padding:0px !important;z-index: 1 !important;">
          <?php
              $aa = 0;
              $tqq = mysql_query("select * from slider order by id");
              if($tqq){
                while($tt = mysql_fetch_array($tqq)){
            ?>
                  
            <li><a href="<?php echo $tt[2];?>"><img src="<?php echo $tt[1];?>" /></a></li>

            <?php 
                }
              }
            ?>
        </ul>
      </div>
      

      
      
      
      
        <p>&nbsp;</p>

        <section>
          <div class="container banner_wr">
            <div class="container hr">
              <ul class="row product-list">

                
                  <?php
                    $a = 0;
                    $tq = mysql_fetch_array(mysql_query("select * from mise_avant m join bien b on b.id = m.id_bien"));
                    $query = mysql_query("select * from mise_avant m join bien b on b.id = m.id_bien");
                    if($tq){
                      while($t = mysql_fetch_array($query)){
                        
                  ?>
                  <li class="grid_6"  style="font-weight: lighter;">
                    <div class="box wow fadeInRight">
                      <div class="box_aside">
     <a href="detail.php?id=<?php echo $t['id'];?>"><img src="<?php echo "images/bien/".$t['dossier']."/big/".$t['photo'];?>" height="250" width="250"></a> 
                      </div>
                      <div class="box_cnt__no-flow">
                        <h3><a href="detail.php?id=<?php echo $t['id'];?>"><?php echo stripslashes(utf8_decode($t['titre']));?></a></h3>
                        <p>
                          <?php echo substr(stripslashes(utf8_decode($t['Description'])),0,100)."...";?>
                        </p>
                      </div>
                    </div>
                  </li>

                  <?php 
                    $a+=1;                  
                    if($a%2 == 0)echo '<li class="grid_12">&nbsp;</li>';
                      }
                    }
                  ?>
                
                
              </ul>
            </div>
            
          </div>
        </section>
        <section class="well ins1"></section>
        <section class="well1">
          <div class="container">
            <div class="row">
              <div class="grid_7">
                <h3>About us</h3><img src="images/logo_footer.png" alt="">
                <p>
                    <?php
                      $t = mysql_fetch_array(mysql_query("select texte from apropos"));
                      echo stripslashes(utf8_decode($t[0]));
                    ?>
                </p>
              </div>
              
              <div class="grid_5">
                <div class="info-box">
                  <h3 class="fa-comment">Weather forecast Marrakech</h3>
                  <hr>
                  <style type="text/css">
                    #widget_705e297ff3439d6933c8c1c6ec6ce2f7{
                      width: 100% !important;
                    }
                    #widget_705e297ff3439d6933c8c1c6ec6ce2f7 iframe{
                      width: 100% !important;
                    }
                  </style>
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
      <?php
        include("footer.php");
      ?>
    </div>
    <script src="js/script.js"></script>
</body>
</html>