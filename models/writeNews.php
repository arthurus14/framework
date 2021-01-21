<?php

ini_set('display_errors', 1);

function upArticle($titre,$texte,$imageArticle){
	global $bdd;
	$comments = $bdd->prepare('INSERT INTO articles(titre,texte,imageArticle) VALUES(?,?,?)');
    $comments->execute(array($titre,$texte,'images/'.$imageArticle));



	if(isset($_FILES['imageArticle']))
	{
	//resize
	//fin resize
$dossier = 'images/';
$fichier = basename($_FILES['imageArticle']['name']);
//$taille_maxi = 100000;
//$taille = filesize($_FILES['logo']['tmp_name']);
$extensions = array('.png', '.gif', '.jpg', '.jpeg');
$extension = strrchr($_FILES['imageArticle']['name'], '.');
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
	 if(move_uploaded_file($_FILES['imageArticle']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
	 {
			 $taille = getimagesize('images/'.$fichier);
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



		
	
//voir enregistrement image dans un dossier


?>
