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
    <title>D&eacute;tail du bien</title>
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


        <script type="text/javascript" src="slider/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="slider/js/jssor.slider-20.mini.js"></script>
    <!-- use jssor.slider-20.debug.js instead for debug -->
    <script>
        jQuery(document).ready(function ($) {
            
            var jssor_1_SlideshowTransitions = [
              {$Duration:1200,x:0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:-0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:-0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:-0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:0.3,$Cols:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:0.3,$Rows:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:0.3,$Cols:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:-0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:0.3,$Rows:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:-0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,$Delay:20,$Clip:3,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,$Delay:20,$Clip:3,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,$Delay:20,$Clip:12,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,$Delay:20,$Clip:12,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2}
            ];
            
            var jssor_1_options = {
              $AutoPlay: true,
              $SlideshowOptions: {
                $Class: $JssorSlideshowRunner$,
                $Transitions: jssor_1_SlideshowTransitions,
                $TransitionsOrder: 1
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $ThumbnailNavigatorOptions: {
                $Class: $JssorThumbnailNavigator$,
                $Cols: 10,
                $SpacingX: 8,
                $SpacingY: 8,
                $Align: 360
              }
            };
            
            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
            
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizes
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 800);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            //responsive code end
        });
    </script>

    <style>
        
        /* jssor slider arrow navigator skin 05 css */
        /*
        .jssora05l                  (normal)
        .jssora05r                  (normal)
        .jssora05l:hover            (normal mouseover)
        .jssora05r:hover            (normal mouseover)
        .jssora05l.jssora05ldn      (mousedown)
        .jssora05r.jssora05rdn      (mousedown)
        */
        .jssora05l, .jssora05r {
            display: block;
            position: absolute;
            /* size of arrow element */
            width: 40px;
            height: 40px;
            cursor: pointer;
            background: url('slider/img/a17.png') no-repeat;
            overflow: hidden;
        }
        .jssora05l { background-position: -10px -40px; }
        .jssora05r { background-position: -70px -40px; }
        .jssora05l:hover { background-position: -130px -40px; }
        .jssora05r:hover { background-position: -190px -40px; }
        .jssora05l.jssora05ldn { background-position: -250px -40px; }
        .jssora05r.jssora05rdn { background-position: -310px -40px; }

        /* jssor slider thumbnail navigator skin 01 css */
        /*
        .jssort01 .p            (normal)
        .jssort01 .p:hover      (normal mouseover)
        .jssort01 .p.pav        (active)
        .jssort01 .p.pdn        (mousedown)
        */
        .jssort01 .p {
            position: absolute;
            top: 0;
            left: 0;
            width: 72px;
            height: 72px;
        }
        
        .jssort01 .t {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }
        
        .jssort01 .w {
            position: absolute;
            top: 0px;
            left: 0px;
            width: 100%;
            height: 100%;
        }
        
        .jssort01 .c {
            position: absolute;
            top: 0px;
            left: 0px;
            width: 68px;
            height: 68px;
            border: #000 2px solid;
            box-sizing: content-box;
            background: url('slider/img/t01.png') -800px -800px no-repeat;
            _background: none;
        }
        
        .jssort01 .pav .c {
            top: 2px;
            _top: 0px;
            left: 2px;
            _left: 0px;
            width: 68px;
            height: 68px;
            border: #000 0px solid;
            _border: #fff 2px solid;
            background-position: 50% 50%;
        }
        
        .jssort01 .p:hover .c {
            top: 0px;
            left: 0px;
            width: 70px;
            height: 70px;
            border: #fff 1px solid;
            background-position: 50% 50%;
        }
        
        .jssort01 .p.pdn .c {
            background-position: 50% 50%;
            width: 68px;
            height: 68px;
            border: #000 2px solid;
        }
        
        * html .jssort01 .c, * html .jssort01 .pdn .c, * html .jssort01 .pav .c {
            /* ie quirks mode adjust */
            width /**/: 72px;
            height /**/: 72px;
        }
        
    </style>

    


    <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 800px; height: 456px; overflow: hidden; background-color: #24262e;">
        <!-- Loading Screen -->
        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
            <div style="position:absolute;display:block;background:url('slider/img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
        </div>
        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 800px; height: 356px; overflow: hidden;">
            
            <?php
              $qq= mysql_query("select * from galerie where id_bien = ".$_REQUEST['id']);
              while($tt = mysql_fetch_array($qq)){
            ?>
            <div style="display: none;">
                <img data-u="image" src="images/bien/<?php echo $tab['dossier']."/big/".$tt['chemin']; ?>" />
                <img data-u="thumb" src="images/bien/<?php echo $tab['dossier']."/big/".$tt['chemin']; ?>" />
            </div>
            <?php
              }
            ?>
            
        </div>
        <!-- Thumbnail Navigator -->
        <div data-u="thumbnavigator" class="jssort01" style="position:absolute;left:0px;bottom:0px;width:800px;height:100px;" data-autocenter="1">
            <!-- Thumbnail Item Skin Begin -->
            <div data-u="slides" style="cursor: default;">
                <div data-u="prototype" class="p">
                    <div class="w">
                        <div data-u="thumbnailtemplate" class="t"></div>
                    </div>
                    <div class="c"></div>
                </div>
            </div>
            <!-- Thumbnail Item Skin End -->
        </div>
        <!-- Arrow Navigator -->
        <span data-u="arrowleft" class="jssora05l" style="top:158px;left:8px;width:40px;height:40px;"></span>
        <span data-u="arrowright" class="jssora05r" style="top:158px;right:8px;width:40px;height:40px;"></span>
        <a href="http://www.jssor.com" style="display:none"></a>
    </div>

    



              </li>
          <?php
            }
          ?>



              <li class="grid_5">
                <ul>
                  <li>
                    <strong>Ville:</strong><?php $v = mysql_fetch_array(mysql_query("select ville from ville where id = ".$tab['id_ville'])); echo stripslashes(utf8_decode($v['ville'])); ?>
                  </li>
                  <li>
                    <strong>Prix:</strong><?php echo stripslashes(utf8_decode($tab['prix'])); ?>
                  </li>
                  <li>
                    <strong>Superficie:</strong><?php echo stripslashes(utf8_decode($tab['superficie'])); ?>
                  </li>
                  <li>
                    <strong>Nombre de pi&egrave;ces:</strong><?php echo stripslashes(utf8_decode($tab['nbr_piece'])); ?>
                  </li>
                  <li>
                    <strong>Description:</strong><?php echo stripslashes(utf8_decode($tab['Description'])); ?>
                  </li>
                </ul>
              </li>


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
</body>
</html>