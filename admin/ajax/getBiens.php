<div class="col-md-12">
<?php
  include("../../connect.php");
  $q = mysql_query("select * from bien order by id");

  if(isset($_POST['id_cat']) and $_POST['id_cat'])
    $q = mysql_query("select * from bien where id_cat=".$_POST['id_cat']." order by id");

  if(isset($_POST['id_sous_cat']) and $_POST['id_sous_cat'])
    $q = mysql_query("select * from bien where id_sous_cat=".$_POST['id_sous_cat']." order by id");

  
  if(isset($_POST['id_cat']) and $_POST['id_cat'] and isset($_POST['id_sous_cat']) and $_POST['id_sous_cat'])
    $q = mysql_query("select * from bien where id_cat=".$_POST['id_cat']." and id_sous_cat=".$_POST['id_sous_cat']." order by id");



  while($tab = mysql_fetch_array($q)){
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:11px">
  <tr>
    <td width="200" align="left" valign="top">
      <img src="../images/bien/<?php echo $tab[9];?>/small/<?php echo $tab[10];?>" width="50" height="50" style="padding:2px;border:1px solid #ccc" />
    </td>
    <td width="200" align="left" valign="top"><?php echo stripslashes(utf8_decode($tab[1]));?></td>
    
    <td width="100" align="left" valign="top">&nbsp;</td>
    <td align="right" valign="top">&nbsp;</td>
    <td align="right" valign="top">
    
    <a href="galerie.php?id=<?php echo $tab[0];?>" title="<?php echo stripslashes(utf8_decode($tab[1]));?>">Galerie photos</a>
    &nbsp;&nbsp;&nbsp;
    <a href="modifierBien.php?id=<?php echo $tab[0];?>" title="Modifier <?php echo stripslashes(utf8_decode($tab[1]));?>">Modifier</a>
    &nbsp;&nbsp;&nbsp;
    <a href="javascript:sup('<?php echo $tab[0];?>')" title="Supprimer">Supprimer</a>
    </td>
  </tr>
</table><br>


<?php
  }
?>
</div>