<?php
	
  global $bdd; //connection bdd depuis les codes d'une autre page

  

	$bdd = new PDO('mysql:host=localhost;dbname=creaweb','root','root');

	var_dump($bdd);


	function ReadCss(){
		global $bdd; //connection bdd depuis les codes d'une autre page
	  
	
		  $req = $bdd->query('SELECT * FROM apparence');
	  
		  while($data = $req->fetch())
		  {
			  $cssVar[] = $data;
		  }
		  return $cssVar;
	  }
	
	  $css = ReadCss();

	  foreach($css as $n){

		echo " bgColor ".$n['bgColor'];
		echo " headerColor ".$n['headerColor'];
		echo "footerColor ".$n['footerColor'];
		echo "h1Color ".$n['h1Color'];
		echo "h2Color ".$n['h2Color'];
		echo "h1Police ".$n['h1Police'];
		echo "h2Police ".$n['h2Police'];

		$color = $n['bgColor'];
		$headerColor = $n['headerColor'];
		$footerColor = $n['footerColor'];
		$h1Color = $n['h1Color'];
		$h2Color = $n['h2Color'];
		$h1Police = $n['h1Police'];
		$h2Police = $n['h2Police'];


	  }

	





?>