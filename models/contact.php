<?php

function message($mail,$message,$tel){

    global $bdd;

	$contact = $bdd->prepare('INSERT INTO email(mail,contenu,tel) VALUES(?,?,?)');
    $contact->execute(array($mail,$message,$tel));

    echo $mail;

	global $serveur;
	$serveur = http_response_code();;
	return $serveur;
}

?>