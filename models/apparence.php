<?php

function apparence($titre,$bgColor,$headerColor,$footerColor){

    global $bdd;
	$comment = $bdd->prepare("UPDATE apparence SET titreSite = '$titre',bgColor = '$bgColor',headerColor = '$headerColor',footerColor = '$footerColor' WHERE id = 15 ");
	$comment->execute();

	global $serveur;
	$serveur = http_response_code();;
	return $serveur;
}

function apparencePolice($h1Color,$h1Police,$h2Color,$h2Police){

    global $bdd;
	$comment = $bdd->prepare("UPDATE apparence SET h1Color = '$h1Color',h1Police = '$h1Police',h2Color = '$h2Color',h2Police = '$h2Police' WHERE id = 15 ");
	$comment->execute();

	
	global $serveur;
	$serveur = http_response_code();;
	return $serveur;
}


function upload($logo,$dossier,$phpMyAdmin){
	global $bdd;
	
	$comments = $bdd->prepare('INSERT INTO`'.$phpMyAdmin.'`(nom) VALUES(?)');
	$affectedLines = $comments->execute(array($dossier.'/'.$logo));
	
	//
	if(isset($_FILES['logo']))
		{
		//resize
		//fin resize
	$dossier;
	$fichier = basename($_FILES['logo']['name']);
	//$taille_maxi = 100000;
	//$taille = filesize($_FILES['logo']['tmp_name']);
	$extensions = array('.png', '.gif', '.jpg', '.jpeg');
	$extension = strrchr($_FILES['logo']['name'], '.');
	//Début des vérifications de sécurité...
	if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
	{
	     $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
	}
	if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
	{
	     //On formate le nom du fichier ici...
	     $fichier = strtr($fichier,
	          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
	          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
	     $fichier = preg_replace('/([^.a-z0-9]+)/i','', $fichier);
	     if(move_uploaded_file($_FILES['logo']['tmp_name'], './'.$dossier.'/' . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
	     {
				 //$taille = getimagesize('./'.$dossier.'/'.''.$fichier);
				 //var_dump($taille);
				 //convertImage('images/'.$fichier,'images/'.$fichier,'100','100',100);
						echo 'Upload effectué avec succès !';
	     }
	     else //Sinon (la fonction renvoie FALSE).
	     {
	          echo 'Echec de l\'upload !';
	     }
	}
	else
	{
	     echo $erreur;
	}
		}

	global $serveur;
	$serveur = http_response_code();;
	return $serveur;

}

function getValue(){
	global $bdd;
	$CSSapp = $bdd->query('SELECT * FROM apparence');
	$CSSapp->execute();
	return $CSSapp;
}
?>
