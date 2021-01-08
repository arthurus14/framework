<?php
//mes fonctions

function ReadUsers(){
  global $bdd; //connection bdd depuis les codes d'une autre page

	$user = array();

	$req = $bdd->query('SELECT * FROM user');

	while($data = $req->fetch())
	{
		$user[] = $data;
	}
	return $user;
}
function ReadUsersMaj($maj){
  global $bdd; //connection bdd depuis les codes d'une autre page

	$user = array();

	$req = $bdd->query('SELECT * FROM user WHERE id = "'.$maj.'" ');

	while($data = $req->fetch())
	{
		$usersMaj[] = $data;
	}
	return $usersMaj;
}



function getUpdateUser($name,$mail,$statut,$id){

	global $bdd;

	$req = $bdd->prepare('UPDATE user SET name = :name, mail = :mail, statut = :statut WHERE id = "'.$id.'" ');
	$req->execute(array(
		'name' => $name,
		'mail' => $mail,
		'statut' => $statut
		));
}

function getCreateUser($name,$pwd,$mail,$statut){
	global $bdd;
	$req = $bdd->prepare('SELECT * FROM user WHERE mail = ? ');
	$req->execute(array($mail));
	$result = $req->fetch();
	$count = $req->rowCount($req);
	if($count == 0){
		//créer la session
		$req = $bdd->prepare('INSERT INTO user(name, pwd, statut, mail) VALUES(:name, :pwd, :statut, :mail)');
		$req->execute(array(
			'name' => $name,
			'pwd' => $pwd,
			'statut' => $statut,
			'mail'	=> $mail
			));
	}

}


function DeleteUser($id){
	global $bdd;

		$req = $bdd->query('DELETE FROM user WHERE id = "'.$id.'" ');
		$req->execute();
		echo'<script type="text/javascript">window.location = "?page=users";</script>';
		//refresh page
}

?>
