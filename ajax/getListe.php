<?php include("../connect.php"); ?>

  <?php

  $t = "";
  $req= "";

  	if(isset($_POST['id_cat']) and $_POST['id_cat']!="0"){
  		$req = mysql_query("select * from bien where id_cat = '".$_POST['id_cat']."' limit 0,2");
  		$req1 = mysql_query("select * from bien where id_cat = '".$_POST['id_cat']."' limit 0,2");
  		$ta = mysql_fetch_array($req);
  	}

  	if(isset($_POST['id_sous_cat']) and $_POST['id_sous_cat']!="0"){
  		$req = mysql_query("select * from bien where id_sous_cat = '".$_POST['id_sous_cat']."' limit 0,2");
  		$req1 = mysql_query("select * from bien where id_sous_cat = '".$_POST['id_sous_cat']."' limit 0,2");
  		$ta = mysql_fetch_array($req);
  	}
    
    if($ta){
    	while($t = mysql_fetch_array($req1)){
  ?>
	<li class="grid_6">
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
	</li>
	  <?php
	    	}
		}
	  ?>

<li class="grid_12 btn_load" style='text-align:center'>
	<br>
	<a class="btn" onclick="javascript:loadListe('2')">Charger plus</a>
</li>
