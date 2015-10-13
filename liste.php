<?php
include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Liste</title>
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
  <body onload="loadListe()">
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
        <br>
        <section>
          <div class="container banner_wr">
            <div class="container hr">
              <ul class="row product-list myliste">

                
              </ul>
            </div>
            <div class="container">
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
      function loadListe(){
        $.ajax({
          type: "POST",
          url: "ajax/getListe.php",
          data: {
            id_cat:"<?php if(isset($_REQUEST['id_cat']) and $_REQUEST['id_cat']) echo $_REQUEST['id_cat']; else echo "0";?>",
            id_sous_cat:"<?php if(isset($_REQUEST['id_sous_cat']) and $_REQUEST['id_sous_cat']) echo $_REQUEST['id_sous_cat']; else echo "0";?>"},
          success: function(data){
            $(".myliste").append(data);
          },
          dataType: "html"
        });
      }

    </script>

</body>
</html>