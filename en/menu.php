<div id="topbarMobile" style="display:none;position:fixed;right:20px;top:10px;height:25px;padding-left:0px;color:black">
  <ul id="mymenu">
    <li><a href="#"> FR</a></li>
    <li>&nbsp;</li>
    <li><a href="#"> EN</a></li>
    <li>&nbsp;</li>
    <li><a href="#"> AR</a></li>
    <li>&nbsp;</li>
    <li><a href="contact.php">Contact</a></li>
  </ul>
</div>
<div id="topbar" style="position:absolute;right:2%;top:10px;width:220px;height:25px;background-color:#D3BA8B;padding-left:25px;color:white">
<style>
ul#mymenu li {
    display:inline;
}
</style>
	<ul id="mymenu">
    	<li><a href="contact.php">Contact</a> - </li>
    	<li>Language</li>
        <li>&nbsp;</li>
    	<li>
        <a href="#"><img style="padding-top:5px" src="images/fr.png"></a>
      </li>
    	<li>
        <a href="#"><img style="padding-top:5px" src="images/en.png"></a>
      </li>
      <li>
        <a href="#"><img style="padding-top:5px" src="images/ar.png"></a>
      </li>
      
    </ul>
</div>


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