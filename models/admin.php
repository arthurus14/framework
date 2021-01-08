<?php
//mes fonctions
function getCreateArticle($titre,$texte,$image,$date,$nom,$telechargement){
	global $bdd;
	$req = $bdd->prepare('INSERT INTO articles(titre, texte, images, dates, auteur, telechargement) VALUES(:titre, :texte, :images, :dates, :auteur, :telechargement)');
	$req->execute(array(
		'titre' => $titre,
		'texte' => $texte,
		'images' => preg_replace('/([^.a-z0-9]+)/i','', $image),
		'dates'	=> date_format (new DateTime($date), 'Y-m-d'),
		'auteur' => $nom,
		'telechargement' => $telechargement
		));
		if(isset($_FILES['image']))
		{
		//resize
		//fin resize
	$dossier = 'images/';
	$fichier = basename($_FILES['image']['name']);
	//$taille_maxi = 100000;
	//$taille = filesize($_FILES['image']['tmp_name']);
	$extensions = array('.png', '.gif', '.jpg', '.jpeg');
	$extension = strrchr($_FILES['image']['name'], '.');
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
	     if(move_uploaded_file($_FILES['image']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
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
//voir enregistrement image dans un dossier

}
//image resize
function convertImage($source,$dst,$width,$height,$quality){
	$imageSize = getimagesize($source);


	$exten = pathinfo($source, PATHINFO_EXTENSION);
	var_dump("exten : ".$exten);
	if($exten =="jpg"){
		$imageRessouce = imagecreatefromjpeg($source);
		$imageFinal = imagecreatetruecolor($width,$height);
		$final = imagecopyresampled($imageFinal,$imageRessouce,0,0,0,0,$width,$height,$imageSize[0],$imageSize[1]);
		imagejpeg($imageFinal,$dst,$quality);
	}
	if($exten =="png"){
		$imageRessouce = imagecreatefrompng($source);
		$imageFinal = imagecreatetruecolor($width,$height);
		$final = imagecopyresampled($imageFinal,$imageRessouce,0,0,0,0,$width,$height,$imageSize[0],$imageSize[1]);
		imagepng($imageFinal,$dst,9);
	}

}
//fin image resize


function ReadCoords(){
  global $bdd; //connection bdd depuis les codes d'une autre page

	$user = array();

	$req = $bdd->query('SELECT * FROM coords');

	while($data = $req->fetch())
	{
		$coords[] = $data;
	}
	return $coords;
}
function ReadArticles(){
  global $bdd; //connection bdd depuis les codes d'une autre page

	$article = array();

	$req = $bdd->query('SELECT * FROM articles ORDER BY id DESC');

	while($data = $req->fetch())
	{
		$article[] = $data;
	}
	return $article;
}
function ReadMyArticles($nom){
  global $bdd; //connection bdd depuis les codes d'une autre page

	$article = array();

	$req = $bdd->query('SELECT * FROM articles WHERE auteur = "'.$nom.'" ');

	while($data = $req->fetch())
	{
		$article[] = $data;
	}
	return $article;
}
function getReadArticle($maj){
  global $bdd; //connection bdd depuis les codes d'une autre page

	$upd = array();

	$req = $bdd->query('SELECT * FROM articles WHERE id = "'.$maj.'" ');

	while($data = $req->fetch())
	{
		$upd[] = $data;
	}
	return $upd;
}
function getUpdate($titre,$texte,$id,$date,$image,$telechargement){

	global $bdd;

//if image !empty else
if(!empty($image)){
	$req = $bdd->prepare('UPDATE articles SET titre = :titre, texte = :texte, dates = :dates, images = :images, telechargement = :telechargement WHERE id = "'.$id.'" ');
	$req->execute(array(
		'titre' => $titre,
		'texte' => $texte,
		'images' => preg_replace('/([^.a-z0-9]+)/i','', $image),
		'dates'	=> date_format (new DateTime($date), 'Y-m-d'),
		'telechargement' => $telechargement
		));
}else{
	$req = $bdd->prepare('UPDATE articles SET titre = :titre, texte = :texte, dates = :dates, telechargement = :telechargement WHERE id = "'.$id.'" ');
	$req->execute(array(
		'titre' => $titre,
		'texte' => $texte,
		'dates'	=> date_format (new DateTime($date), 'Y-m-d'),
		'telechargement' => $telechargement
		));
}
	if(isset($_FILES['image']))
	{
$dossier = 'images/';
$fichier = basename($_FILES['image']['name']);
//$taille_maxi = 100000;
$taille = filesize($_FILES['image']['tmp_name']);
$extensions = array('.png', '.gif', '.jpg', '.jpeg');
$extension = strrchr($_FILES['image']['name'], '.');
//Début des vérifications de sécurité...
if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
{
     $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
}
/*if($taille>$taille_maxi)
{
     $erreur = 'Le fichier est trop gros...';
}*/
if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
{
     //On formate le nom du fichier ici...
     $fichier = strtr($fichier,
          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
     $fichier = preg_replace('/([^.a-z0-9]+)/i', '', $fichier);
     if(move_uploaded_file($_FILES['image']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
     {
          echo 'Upload effectué avec succès !';
     }
     else //Sinon (la fonction renvoie FALSE).
     {
          echo 'Echec de l\'upload !';
     }

}else{
     echo $erreur;
}


	}

}

function getUpdateCoords($tel,$mail,$fb,$numero,$rue,$cp,$ville){

	global $bdd;

	$req = $bdd->prepare('UPDATE coords SET tel = :tel, mail = :mail, fb = :fb, numero = :numero, rue = :rue, cp = :cp, ville = :ville ');
	$req->execute(array(
		'tel' => $tel,
		'mail' => $mail,
		'fb'	=> $fb,
		'numero' => $numero,
		'rue' => $rue,
		'cp' => $cp,
		'ville' => $ville

		));
}



function DeleteArticle($id){
	global $bdd;

		//$img = $bdd->prepare('SELECT images FROM articles WHERE id = ? ');
		//$img->execute(array($id));
		//$result = $img->fetch();
		unlink("images/wow.jpg");
		//select img de l'article avec l'id $id
		//ajouter script effacer image avec unlink
		$req = $bdd->query('DELETE FROM articles WHERE id = "'.$id.'" ');
		$req->execute();
		echo'<script type="text/javascript">window.location = "?page=admin#gestion";</script>';

}


function deleteMultiple($countDelete){
	global $bdd;
	$i = 0;
	while($i<$countDelete){
		$key = $_POST['records'][$i];
		$image = $_POST['img'][$i];

		unlink("images/".$image);
		//var_dump("resultat = ".$image);

		$req = $bdd->query('DELETE FROM articles WHERE id = "'.$key.'" ');
		$req->execute();
		$i++;
	}
}
function uploadFile($nom,$img){
	global $bdd;

	$exten = pathinfo($img, PATHINFO_EXTENSION);


	$req = $bdd->prepare('INSERT INTO upload (fichier) VALUES(:fichier)');
	$req->execute(array(
		'fichier' => $nom.'.'.$exten
		));

		if(isset($_FILES['image']))
		{
		//resize
		//fin resize
	$dossier = 'telechargement/';

	$fichier = basename($nom.'.'.$exten);
	//$taille_maxi = 100000;
	//$taille = filesize($_FILES['image']['tmp_name']);
	$extensions = array('.png', '.gif', '.jpg', '.jpeg', '.pdf', '.txt', '.doc');
	$extension = strrchr($_FILES['image']['name'], '.');
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
			 if(move_uploaded_file($_FILES['image']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
			 {
				 $taille = getimagesize('telechargement/'.$fichier);
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

}
function ReadDowloand(){
	global $bdd; //connection bdd depuis les codes d'une autre page

	$user = array();

	$req = $bdd->query('SELECT * FROM upload');

	while($data = $req->fetch())
	{
		$document[] = $data;
	}
	return $document;

}
function ReadAllFiles(){
	global $bdd; //connection bdd depuis les codes d'une autre page

	$user = array();

	$req = $bdd->query('SELECT * FROM upload');

	while($data = $req->fetch())
	{
		$files[] = $data;
	}
	return $files;
}
function deleteFiles($countDelete){
	global $bdd;
	$i = 0;
	while($i<$countDelete){
		$key = $_POST['records'][$i];
		$image = $_POST['fichier'][$i];

		unlink("telechargement/".$image);
		//var_dump("resultat = ".$image);

		$req = $bdd->query('DELETE FROM upload WHERE id = "'.$key.'" ');
		$req->execute();
		$i++;
	}
}
?>
