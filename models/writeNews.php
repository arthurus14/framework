<?php

ini_set('display_errors', 1);

function upArticle($titre,$texte){
	$bdd = new PDO('mysql:host=localhost;dbname=creaweb','root','');
	$comments = $bdd->prepare('INSERT INTO articles(titre,texte) VALUES(?,?)');
	$affectedLines = $comments->execute(array($titre,$texte));

	global $serveur;
	$serveur = http_response_code();;
	return $serveur;
}



		
	
//voir enregistrement image dans un dossier


?>

