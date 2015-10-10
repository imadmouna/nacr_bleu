<ul data-type="navbar" class="sf-menu">
  <li class="active"><a href="index.php">Accueil</a></li>
  <li><a href="Villa et maison.html">Villa et maison</a>
    <ul>
      <li><a href="#">A Louer</a></li>
      <li><a href="#">A Vendre</a></li>
    </ul>
  </li>
  <li><a href="Magasin et commerce">magasin et commerce</a>
  <ul>
      <li><a href="#">Vente des Magasins</a></li>
      <li><a href="#">Location des Magasins</a></li>
    </ul>
  </li>
  <li><a href="Appartements.html">appartements</a>
  <ul>
      <li><a href="#">Appartement a Louer</a></li>
      <li><a href="#">Appartement a Vendre</a></li>
    </ul>
  </li>
  <li><a href="terrain et ferme.html">terrain et ferme</a>
  </li>
  <li>
    <a href="Location vacance.html">location vacance</a>
    <ul>
      <li><a href="#">Louer une Appartement</a></li>
      <li><a href="#">Louer une Villa</a></li>
    </ul>
  </li>

  <?php
    $req = mysql_query("select * from categorie order by id_cat");
    while($t = mysql_fetch_array($req)){
  ?>
    <li>
      <a href="liste.php?id_cat=<?php echo $t[0];?>"><?php echo $t[1];?></a>
      <ul>
        <?php
          $reqA = mysql_query("select * from sous_categorie where id_cat=".$t[0]." order by id_sous_cat");
          while($tA = mysql_fetch_array($reqA)){
        ?>
        <li><a href="liste.php?id_sous_cat=<?php echo $tA[0];?>"><?php echo $tA[2];?></a></li>
        <?php
          }
        ?>
      </ul>
    </li>
  <?php
    }
  ?>


</ul>