<?php 
	session_start();
	include("../../connect.php");
	if(isset($_POST['id'])){
    	// Your code here to handle a successful verification
		$t=mysql_fetch_array(mysql_query("select * from sous_categorie where id_cat=".$_POST['id']));
		if($t[0]){
			$html = "";
			$req = mysql_query("select * from sous_categorie where id_cat=".$_POST['id']);
			while($tt=mysql_fetch_array($req)){
				$html .= "<option value='".$tt[0]."'>".$tt[2]."</option>";
			}
			echo $html;
		}
	
	}
?>