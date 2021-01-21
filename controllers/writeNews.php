<?php
include('models/writeNews.php');


if(!empty($_POST['titre'])){
  upArticle($_POST['titre'],$_POST['texte'],$_FILES['imageArticle']['name']);
  }

include("views/writeNews.php");

?>