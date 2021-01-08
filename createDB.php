<!doctype html>
<html lang="fr">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- <link rel="stylesheet" type="text/css" href="../css/bootsrap.min.css"> -->



  <title>Création de la base de données</title>
</head>

<body>


  <div class="container">

     <h1>Nous allons créer la base de données de votre site.</h1>

     <h2>Entrez les informations de connexion à phpmyadmin</h2>
    <div class="row">
            <div class="col-sm-3">
            
                <form method="POST" action="">
                  <div class="form-group">
                        <label for="exampleInputEmail1">host</label>
                        <input type="text" class="form-control"  aria-describedby="emailHelp" name="host" placeholder="nom de l'hôte">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">nom de la base de données que vous avez crée au préalable dans phpmyadmin</label>
                        <input type="text" class="form-control"  aria-describedby="emailHelp" name="dbname" placeholder="nom de la base de données">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">utilisateur</label>
                        <input type="text" class="form-control"  aria-describedby="emailHelp" name="username" placeholder="utilisateur">
                        <small id="emailHelp" class="form-text text-muted">Entrez le nom d'utilisateur de phpmyadmin</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">mot de passe</label>
                        <input type="password" class="form-control" name="password"  placeholder="Password">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Créer la base de données</button>
                </form>

            </div>
  </div>

</body>

</html>

<?php
    if(!empty($_POST['dbname']) && !empty($_POST['username'])&& !empty($_POST['host'])){
        echo "merci d'avoir entré les informations. <br>";
        echo "host :".$_POST['host']."<br>";
        echo "nom bdd :".$_POST['dbname']."<br>";
        echo "user :".$_POST['username']."<br>";
        echo "password :".$_POST['password']."<br>";
    
        createDB($_POST['host'],$_POST['dbname'],$_POST['username'],$_POST['password']);
    }


    function createDB($host,$dbname,$user,$password){
        
        try {
           
            $bdd = new PDO( "mysql:host=".$host.";dbname=".$dbname, $user, $password);
            //$bdd = new PDO('mysql:host=localhost:3307;dbname=cdf','root','CaenNormandie14');
        } catch (PDOException $e) {
            echo 'Échec de la connexion : ' . $e->getMessage();
            exit;
        }

        if($bdd){
            echo "la connexion est établie.";

            $sql= "CREATE TABLE IF NOT EXISTS `mabase` (";
            $sql .= "`id` int(11) NOT NULL auto_increment,";
            $sql .= "`nom` text NOT NULL,";
            $sql .= "`prenom` text NOT NULL,";
            $sql .= "`age` int NOT NULL,";
            $sql .= "PRIMARY KEY  (`id`),";
            $sql .= "UNIQUE KEY `id_2` (`id`),";
            $sql .= "KEY `id` (`id`)";
            $sql .= ") ENGINE=MyISAM;";

            $contact= "CREATE TABLE IF NOT EXISTS `contact` (";
            $contact .= "`id` int(11) NOT NULL auto_increment,";
            $contact .= "`nom` text NOT NULL,";
            $contact .= "`prenom` text NOT NULL,";
            $contact .= "`age` int NOT NULL,";
            $contact .= "PRIMARY KEY  (`id`),";
            $contact .= "UNIQUE KEY `id_2` (`id`),";
            $contact .= "KEY `id` (`id`)";
            $contact .= ") ENGINE=MyISAM;";
             
            $bdd->prepare($sql)->execute();
            $bdd->prepare($contact)->execute();

            echo "votre base de données a été crée avec succès.";
        
    }
}
    

?>
