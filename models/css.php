<?php


$orange = "orange";

//attribuer les valeurs de la bdd à des variables globales

function ReadCss(){
  global $bdd; //connection bdd depuis les codes d'une autre page

	$css = array();

	$req = $bdd->query('SELECT * FROM apparence');

	while($data = $req->fetch())
	{
		$css[] = $data;
	}
	return $css;
}
?>