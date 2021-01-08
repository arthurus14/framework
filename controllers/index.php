<?php
//session_start();
include('models/index.php');
include('models/admin.php');
include('models/users.php');
$article = afficher_articles();
$soon = afficher_articles_a_venir();
$coords = ReadCoords();
//afficher article par id
if(isset($_GET['article'])){
$arti = articles($_GET['article']);
}
if(isset($_GET['Allarticles'])){
$AllPastArti = AllPastArticles();
}
if(isset($_GET['prochainsEvenements'])){
$futureEvents = futureEvents();
}
connexion();

include('views/index.php');


?>
