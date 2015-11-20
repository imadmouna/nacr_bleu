<?php
include("../connect.php");

if(isset($_POST['name']) and isset($_POST['email']) and isset($_POST['phone']) and isset($_POST['message'])){
  if($_POST['name'] and $_POST['email'] and $_POST['phone'] and $_POST['message']){
      //mail("contact@nacrebleu.com","SOURCE | SITE WEB: Message de: ".utf8_decode(strtoupper($_POST['name']))."\nEmail: ".utf8_decode($_POST['email'])."\nTelephone: ".utf8_decode($_POST['phone'])."\n\nContenu: ".utf8_decode($_POST['message']));
      mail("mimadl3a@gmail.com","SOURCE | SITE WEB: Message de: ".utf8_decode(strtoupper($_POST['name']))."\nEmail: ".utf8_decode($_POST['email'])."\nTelephone: ".utf8_decode($_POST['phone'])."\n\nContenu: ".utf8_decode($_POST['message']));
      
  }
}
?>
