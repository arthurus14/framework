<?php
function afficher_articles(){
	global $bdd; //connection bdd depuis les codes d'une autre page

	$news = array();

	$req = $bdd->query('SELECT * FROM articles');

	while($data = $req->fetch())
	{
		$news[] = $data;
	}
	return $news;

}
function AllPastArticles(){

	global $bdd; //connection bdd depuis les codes d'une autre page

	$news = array();

	$req = $bdd->query('SELECT * FROM articles WHERE dates < NOW() ORDER BY dates');

	while($data = $req->fetch())
	{
		$news[] = $data;
	}
	return $news;

}

function futureEvents(){
	global $bdd; //connection bdd depuis les codes d'une autre page

	$news = array();

	$req = $bdd->query('SELECT * FROM articles WHERE dates > NOW() ORDER BY dates');

	while($data = $req->fetch())
	{
		$news[] = $data;
	}
	return $news;

}

function articles($id){
	global $bdd; //connection bdd depuis les codes d'une autre page

	$news = array();

	$req = $bdd->query('SELECT * FROM articles WHERE id = "'.$id.'" ');

	while($data = $req->fetch())
	{
		$news[] = $data;
	}
	return $news;

}

function afficher_articles_a_venir(){
	global $bdd; //connection bdd depuis les codes d'une autre page

	$soon = array();

	$req = $bdd->query('SELECT * FROM articles');

	while($data = $req->fetch())
	{
		$soon[] = $data;
	}
	return $soon;

}
function connexion(){
	global $bdd;

	if(isset($_POST['mail']) && isset($_POST['pwd'])){
		$req = $bdd->prepare('SELECT * FROM user WHERE mail = ? AND pwd = ?');
		$req->execute(array($_POST['mail'],sha1($_POST['pwd'])));
		$result = $req->fetch();
		$count = $req->rowCount($req);
		if($count == 1){
			//créer la session
		$_SESSION['statut'] = $result['statut'];
		$_SESSION['name'] = $result['name'];
		header('Location: ?page=admin');
		}
	}else{
		//header('Location:/mvc');
	}

}
?>
