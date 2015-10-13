<?php
	include("../connect.php");
?>


<li class="grid_6">
  <?php
    $t = mysql_fetch_array(mysql_query("select * from mise_avant m join bien b on b.id = m.id_bien limit 0,1"));
    if($t){
  ?>
  <div class="box">
    <div class="box_aside">
       <img src="<?php echo "images/bien/".$t['dossier']."/big/".$t['photo'];?>" height="250" width="250"> 
    </div>
    <div class="box_cnt__no-flow">
      <h3><a href="detail.php?id=<?php echo $t['id'];?>"><?php echo stripslashes(utf8_decode($t['titre']));?></a></h3>
      <p>
        <?php echo stripslashes(utf8_decode($t['Description']));?>
      </p>
    </div>
  </div>


  <?php
    }
  ?>
</li>

<?php

?>