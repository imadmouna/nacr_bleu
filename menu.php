<ul data-type="navbar" class="sf-menu">
  <li class="activee"><a href="index.php">Accueil</a></li>
  

  <?php
    $req = mysql_query("select * from categorie order by id_cat limit 0,5");
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