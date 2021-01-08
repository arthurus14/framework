<?php
include('models/writeNews.php');


if(!empty($_POST['titre'])){
  upArticle($_POST['titre'],$_POST['texte']);
  }

include("views/writeNews.php");

?>