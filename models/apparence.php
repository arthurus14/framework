<?php

function apparence($titre,$bgColor){

    $bdd = new PDO('mysql:host=localhost;dbname=creaweb','root','');
	$comments = $bdd->prepare('INSERT INTO apparence(titreSite,bgColor) VALUES(?,?)');
	$affectedLines = $comments->execute(array($titre,$bgColor));

	global $serveur;
	$serveur = http_response_code();;
	return $serveur;
}

?>
