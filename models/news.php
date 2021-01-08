<?php

function postComment($titre,$texte)
{
		$bdd = new PDO('mysql:host=localhost;dbname=creaweb','root','');
		$titre = $_POST['titre'];
		$texte = $_POST['texte'];
		$comments = $bdd->prepare('INSERT INTO articles(titre,texte) VALUES(?,?)');
		$affectedLines = $comments->execute(array($titre,$texte));


}

?>
