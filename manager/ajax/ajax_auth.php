<?php 
	session_start();
	include("../../connect.php");
	if(isset($_POST['login']) and isset($_POST['pass'])){

	

    	// Your code here to handle a successful verification
		$t=mysql_fetch_array(mysql_query("select * from manager where login='".addslashes($_POST['login'])."'"));
		if($t[0]){

			$salt = $t[2];
			$pass = $t[1];
			$crypt = crypt(addslashes($_POST['pass']), $salt);

			if($crypt == $pass){
				$_SESSION['admin']=$_POST['login'];
				$_SESSION['last_login']=$t['last_login'];
				mysql_query("update manager set last_login='".date("D d M H")."h".date(", Y")."'");
				echo "<script language='javascript'>document.location.href='dashboard.php';</script>";
			}else{
				echo "Erreur, le mot de passe esr incorrect!";
			}
		}else{
			echo "Erreur, les donnees saisies sont incorrectes!";
		}
	
	}
?>