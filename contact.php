<?php
include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Contact</title>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/google-map.css">
    <link rel="stylesheet" href="css/mailform.css">
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
    <a href="contact.php" style="float:right;">Contactez-Nous</a></div></ul>
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
        <div id="map"></div>
        <style>
  #map {
   
    height: 400px;
    background-color: #CCC;
  }
</style>
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script>
      function initialize() {
        var mapCanvas = document.getElementById('map');
        var mapOptions = {
          center: new google.maps.LatLng(31.652036, -7.9946365),
          zoom: 8,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(mapCanvas, mapOptions)
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
        
        <section class="well1 ins3">
          <div class="container">
          
            <h22>Nos informations de Contact</h22>
            <div class="row off1">
              <div class="grid_6">
                <dl class="info">
                      <dt><img src="images/88.png"> Siège social :</dt>
                      <dd>Km 1,5 Daoudiate, Marrakech</dd>
                      <dt><img src="images/89.png">Téléphone :</dt>
                      <dd>    Tél : +212 (0)6 64 36 48 60<br>
   							  Tél : +212 (0)5 24 31 76 76<br>
    						  Fax : +212 (0)5 24 31 74 74<br>
    						   <img src="images/90.png">&nbsp;<strong>Email :</strong><a href="mailto:info@nacrbleu.com">info@nacrbleu.com</a>

					  </dd>
                     
                </dl
                   ></div>
                   
                   <div class="grid_3">
                    <dl class="info">
                     <ul class="row contact-list">
                      <dt>Horaire de Travail</dt>
                      <dd>
                        <ul>
                          <li> Lundi - Vendredi : 08:15 - 18:00</li>
                          <li>Samedi : 08:15 - 17:00</li>
                          <li>Dimanche - Fermé</li>
                         
                        </ul>
                      </dd>
                      </ul>
                      <ul class="row contact-list">
                       <dt>Réseaux Sociaux</dt>
                      <dd><img src="images/91.png">&nbsp;<a href="#">Suivez nous sur facebook</a><br><img src="images/92.png">				<a href="#">Suivez nous sur Twitter</a></dd>
                      </ul>
                    </dl>
                  </div> 
                
               
            </div>
              
              
           
          </div>
        </section>
       <hr>
        <section class="well1">
          <div class="container">
            <h22>Contactez-Nous</h22>
            <form method="post" action="bat/rd-mailform.php" class="mailform off2">
              <input type="hidden" name="form-type" value="contact">
              <fieldset class="row">
                <label class="grid_4">
                  <input type="text" name="name" placeholder="Nom:" data-constraints="@LettersOnly @NotEmpty">
                </label>
                <label class="grid_4">
                  <input type="text" name="phone" placeholder="Telephone:" data-constraints="@Phone">
                </label>
                <label class="grid_4">
                  <input type="text" name="email" placeholder="Email:" data-constraints="@Email @NotEmpty">
                </label>
                <label class="grid_12">
                  <textarea name="message" placeholder="Message:" data-constraints="@NotEmpty"></textarea>
                </label>
                <div class="mfControls grid_12">
                  <button type="submit" class="btn">Envoyer le Message</button>
                </div>
              </fieldset>
            </form>
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