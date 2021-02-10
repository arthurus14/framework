<?php
session_start();
ini_set('display_errors', 1);


try {
	
	$bdd = new PDO('mysql:host=localhost;dbname=creaweb','root','root');
	//$bdd = new PDO('mysql:host=localhost:3307;dbname=cdf','root','CaenNormandie14');
} catch (PDOException $e) {
    echo 'Échec de la connexion : ' . $e->getMessage();
    exit;
}


if(!empty($_GET['page']) AND is_file('controllers/'.$_GET['page'].'.php')){ //is_file = si fichier présent sur le serveur
	include('controllers/'.$_GET['page'].'.php');

	if(isset($_GET['action'])){
		if($_GET['action' =='addPost']){
			//addPost();
			
			echo "routeur";
		}
	}

}else{
	include('controllers/index.php');

}


//var_dump($_GET['page']);

?>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel='stylesheet' type='text/css' href='css/style.php' />

