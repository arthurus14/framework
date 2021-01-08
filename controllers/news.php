<?php
include('models/news.php');
//$news = afficher_contact();
function addPost(){
  console.log('addPost');
}
if(isset($_GET['action'])){
	if($_GET['action' =='addPost']){
		//addPost();
		console.log('routeur');
	}
}
  $user = "jérémy";
include('views/news.php'); //dirname chemin du dossier parent
//bien mettre la vue correspondante au model ;)



?>
