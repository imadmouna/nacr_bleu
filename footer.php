<footer>
        <section class="well3">
          <div class="container">
            <ul class="row contact-list">
              <li class="grid_4">
                <div class="box">
                  Contactez-nous<br>Téléphone : <?php
                      $t = mysql_fetch_array(mysql_query("select tel from infos"));
                      echo stripslashes(utf8_decode($t[0]));
                    ?> <br>Fixe : <?php
                      $t = mysql_fetch_array(mysql_query("select fixe from infos"));
                      echo stripslashes(utf8_decode($t[0]));
                    ?><br> Fax : <?php
                      $t = mysql_fetch_array(mysql_query("select fax from infos"));
                      echo stripslashes(utf8_decode($t[0]));
                    ?><br> 
                  Email : <a href="mailto:info@nacrebleu.com"><?php
                      $t = mysql_fetch_array(mysql_query("select email from infos"));
                      echo stripslashes(utf8_decode($t[0]));
                    ?></a><br>
                  <a href="<?php
                      $t = mysql_fetch_array(mysql_query("select fb_page from infos"));
                      echo stripslashes(utf8_decode($t[0]));
                    ?>">Suivez nous sur facebook</a><br><a href="<?php
                      $t = mysql_fetch_array(mysql_query("select twitter_page from infos"));
                      echo stripslashes(utf8_decode($t[0]));
                    ?>">Suivez nous sur Twitter</a><br><a href="<?php
                      $t = mysql_fetch_array(mysql_query("select instagram from infos"));
                      echo stripslashes(utf8_decode($t[0]));
                    ?>">Suivez nous sur instagram</a>
                  
                </div>
               
              </li>
              <li class="grid_4">
                <div class="box">
                 <strong>Plan du site</strong><br>

                  <a href="index.php">Accueil</a><br>
                  

                  <?php
                    $req = mysql_query("select * from categorie order by id_cat");
                    while($t = mysql_fetch_array($req)){
                  ?>
                    
                      <a href="liste.php?id_cat=<?php echo $t[0];?>"><?php echo $t[1];?></a>
                      <br>
                  <?php
                    }
                  ?>


                  
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
            <div class="copyright">Nacre Bleu © <span id="copyright-year"></span>.&nbsp;</a>Tous droits réservés.
            </div>
          </div>
        </section>
      </footer>