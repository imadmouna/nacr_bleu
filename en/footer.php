<footer>
        <section class="well3">
          <div class="container">
            <ul class="row contact-list">
              <li class="grid_4">
                <div class="box">
                  Contact us<br>Cell Phone : <?php
                      $t = mysql_fetch_array(mysql_query("select tel from infos"));
                      echo stripslashes(utf8_decode($t[0]));
                    ?> <br>Office Phone : <?php
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
                    ?>">Follow us on facebook</a><br><a href="<?php
                      $t = mysql_fetch_array(mysql_query("select twitter_page from infos"));
                      echo stripslashes(utf8_decode($t[0]));
                    ?>">Follow us on Twitter</a><br><a href="<?php
                      $t = mysql_fetch_array(mysql_query("select instagram from infos"));
                      echo stripslashes(utf8_decode($t[0]));
                    ?>">Follow us on instagram</a>
                  
                </div>
               
              </li>
              <li class="grid_4">
                <div class="box">
                 <strong>Sitemap</strong><br>

                  <a href="index.php">Home</a><br>
                  

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
            <div class="copyright">Nacre Bleu © <span id="copyright-year"></span>.&nbsp;</a>All rights reserved.
            </div>
          </div>
        </section>
      </footer>