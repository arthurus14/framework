<?php

include('models/article.php');

$article = ReadArticles();
$myArticles = ReadMyArticles($_SESSION['name']);

$document = ReadDowloand();

if(isset($_POST['deleteMultiple'])){
$countDelete = count($_POST['records']);
deleteMultiple($countDelete,$_POST['img']);
echo'<script type="text/javascript">window.location = "?page=article";</script>';
}
if(isset($_POST['deleteFiles'])){
$countDelete = count($_POST['records']);
deleteFiles($countDelete,$_POST['fichier']);
echo'<script type="text/javascript">window.location = "?page=article";</script>';
}
if(isset($_GET['delete'])){
DeleteArticle($_GET['delete']);
}


if(!empty($_POST['publier'])){
  getCreateArticle($_POST['titre'],$_POST['texte'],$_FILES['image']['name'],$_POST['date'],$_SESSION['name'],$_POST['telechargement']);
  echo'<script type="text/javascript">window.location = "?page=article";</script>';
}

if(!empty($_GET['maj'])){
  $upd = getReadArticle($_GET['maj']);
}

if(!empty($_POST['updates'])){
  $updates = getUpdate($_POST['titre'],$_POST['texte'],$_POST['id'],$_POST['dates'],$_FILES['image']['name'],$_POST['telechargement']);
  echo'<script type="text/javascript">window.location = "?page=article#gestion";</script>';

}


if(!empty($_POST['upload'])){
  uploadFile($_POST['nom'],$_FILES['image']['name']);
}

include('views/article.php');
?>