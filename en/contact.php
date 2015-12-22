<?php
include("connect.php");

if(isset($_POST['name']) and isset($_POST['email']) and isset($_POST['phone']) and isset($_POST['message'])){
  if($_POST['name'] and $_POST['email'] and $_POST['phone'] and $_POST['message']){
      //mail("","SOURCE | SITE WEB: Message de: ".utf8_decode(strtoupper($_POST['name']))."\nEmail: ".utf8_decode($_POST['email'])."\nTelephone: ".utf8_decode($_POST['phone'])."\n\nContenu: ".utf8_decode($_POST['message']));
      if(!mail("contact@nacrebleu.com","SOURCE | SITE WEB","Message de: ".utf8_decode(strtoupper($_POST['name']))."\nEmail: ".utf8_decode($_POST['email'])."\nTelephone: ".utf8_decode($_POST['phone'])."\n\nContenu: ".utf8_decode($_POST['message']))){
        echo "<script>alert('Erreur lors de envoi du mail, veuillez reessayer plus tard!')</script>";
      }else{
        echo "<script>document.location.href='contact.php'</script>";
      }
      
  }
}
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
                      <dd><?php
                      $t = mysql_fetch_array(mysql_query("select siege_social from infos"));
                      echo stripslashes(utf8_decode($t[0]));
                    ?></dd>
                      <dt><img src="images/89.png">Téléphone :</dt>
                      <dd>    Téléphone : <?php
                      $t = mysql_fetch_array(mysql_query("select tel from infos"));
                      echo stripslashes(utf8_decode($t[0]));
                    ?><br>Fixe : <?php
                      $t = mysql_fetch_array(mysql_query("select fixe from infos"));
                      echo stripslashes(utf8_decode($t[0]));
                    ?><br>Faxe : <?php
                      $t = mysql_fetch_array(mysql_query("select fax from infos"));
                      echo stripslashes(utf8_decode($t[0]));
                    ?><br>
   					<img src="images/90.png">&nbsp;<strong>Email : </strong><a href="mailto:info@nacrebleu.com"><?php
                      $t = mysql_fetch_array(mysql_query("select email from infos"));
                      echo stripslashes(utf8_decode($t[0]));
                    ?></a>

					  </dd>
                     
                </dl
                   ></div>
                   
                   <div class="grid_3">
                    <dl class="info">
                     <ul class="row contact-list">
                      
                      </ul>
                      <ul class="row contact-list">
                       <dt>Réseaux Sociaux</dt>
                      <dd>
                        <p><img src="images/91.png">&nbsp;<a href="<?php
                      $t = mysql_fetch_array(mysql_query("select fb_page from infos"));
                      echo stripslashes(utf8_decode($t[0]));
                    ?>">Suivez nous sur facebook</a><br><img src="images/92.png">				<a href="<?php
                      $t = mysql_fetch_array(mysql_query("select twitter_page from infos"));
                      echo stripslashes(utf8_decode($t[0]));
                    ?>">Suivez nous sur Twitter</a><br><img src="images/93.png">				<a href="<?php
                      $t = mysql_fetch_array(mysql_query("select instagram from infos"));
                      echo stripslashes(utf8_decode($t[0]));
                    ?>">Suivez nous sur Instagram</a></p>
                        <p>&nbsp;</p>
                      </dd>
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
            <form method="post" action="contact.php" class="mailform ">
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