<footer>
        <section class="well3">
          <div class="container">
            <ul class="row contact-list">
              <li class="grid_4">
                <div class="box">
                  Contactez-nous<br>Tél :+212 664364860 <br> 
                  Email:<a href="mailto:info@nacrbleu.com">info@nacrbleu.com</a><br>
                  <a href="#">Suivez nous sur facebook</a><br><a href="#">Suivez nous sur Twitter</a>
                  
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
            <div class="copyright">Nacr Bleu © <span id="copyright-year"></span>.&nbsp;</a>Tous droits réservés.
            </div>
          </div>
        </section>
      </footer>