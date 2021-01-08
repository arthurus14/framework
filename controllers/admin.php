<?php
//session_start();
include('models/admin.php');
//$users = ReadUsers();
//$article = ReadArticles();
//$myArticles = ReadMyArticles($_SESSION['name']);
//$AllFiles = ReadAllFiles();
//$coords = ReadCoords();

//$document = ReadDowloand();

if(isset($_POST['deleteMultiple'])){
$countDelete = count($_POST['records']);
deleteMultiple($countDelete,$_POST['img']);
echo'<script type="text/javascript">window.location = "?page=admin";</script>';
}
if(isset($_POST['deleteFiles'])){
$countDelete = count($_POST['records']);
deleteFiles($countDelete,$_POST['fichier']);
echo'<script type="text/javascript">window.location = "?page=admin";</script>';
}
if(isset($_GET['delete'])){
DeleteArticle($_GET['delete']);
}

if(isset($_GET['deleteUser'])){
DeleteUser($_GET['deleteUser']);
}

if(!empty($_POST['contact'])){
  getUpdateCoords($_POST['tel'],$_POST['mail'],$_POST['fb'],$_POST['numero'],$_POST['rue'],$_POST['cp'],$_POST['ville']);
}

if(!empty($_POST['publier'])){
  getCreateArticle($_POST['titre'],$_POST['texte'],$_FILES['image']['name'],$_POST['date'],$_SESSION['name'],$_POST['telechargement']);
  echo'<script type="text/javascript">window.location = "?page=admin";</script>';
}
if(!empty($_POST['contactUser'])){
  getUpdateUser($_POST['nom'],$_POST['mail'],$_POST['statut'],$_POST['id']);
  echo'<script type="text/javascript">window.location = "?page=admin#gestion";</script>';
}
/*if($_POST['update']){
  getUpdate($_POST['titre'],$_POST['texte'],$_POST['image'],$_POST['id']);
}
*/
if(!empty($_GET['maj'])){
  $upd = getReadArticle($_GET['maj']);
}
if(!empty($_GET['majUser'])){
  $usersMaj = ReadUsersMaj($_GET['majUser']);
  //echo'<script type="text/javascript">window.location = "?page=admin#gestion";</script>';
}
/*
if(!empty($_POST['updates']) && !empty($_FILES['image']['name'])){
  $updates = getUpdateImage($_POST['titre'],$_FILES['image']['name'],$_POST['texte'],$_POST['id'],$_POST['dates']);
}
*/
if(!empty($_POST['updates'])){
  $updates = getUpdate($_POST['titre'],$_POST['texte'],$_POST['id'],$_POST['dates'],$_FILES['image']['name'],$_POST['telechargement']);
  echo'<script type="text/javascript">window.location = "?page=admin#gestion";</script>';

}

if(!empty($_POST['newUser'])){
  getCreateUser($_POST['name'],sha1($_POST['mdp']),$_POST['mail'],$_POST['statut']);
}
if(!empty($_POST['upload'])){
  uploadFile($_POST['nom'],$_FILES['image']['name']);
}
include('views/admin.php');


?>
