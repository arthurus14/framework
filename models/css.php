<?php
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