
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    

    <title>Administration</title>

  <?php
  if(!empty($_SESSION['statut']) AND  $_SESSION['statut'] == "admin" ||  $_SESSION['statut'] == "super_admin" ||  $_SESSION['statut'] == "redacteur"){
  }else
  {?>
  <script>
      window.location = "/framework";
  </script>
  <?php
  }
  ?>

    

<style type="text/css">

#sidebarMenu{
  margin-top: 60px;
}
#menu{
  color:black;
}
a{
  color:black!important;
}

</style>



  
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Js -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
  
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <ul><img class="imgFb" src="images/cdf.jpg" alt="logo facebook"></ul>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto">
          <span class="navbar-text" id="menu">Bonjour <?php echo "<strong>".$_SESSION['name']. "</strong>, vous êtes : ".$_SESSION['statut']; ?></span>
      </ul>

      <span class="navbar-text">
        <form method="POST">
          <button type="submit"  name="logout" value="logout" class="btn btn-danger" >Déconnexion</button>
        </form>
      </span>
    </div>
  </nav>

</header>

<body>
<div class="container-fluid" id="sidebarMenu">
  <div class="row">
    <nav  class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">
              <span data-feather="home"></span>
              Tableau de bord
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=users">
              
              <span data-feather="file"></span>
              <i id="fa" class="fa fa-user fa-1x" class="card-img-top"></i>
              Utilisateurs
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=writeNews">
              <span data-feather="shopping-cart"></span>
              <i id="fa" class="fa fa-pencil fa-1x" class="card-img-top"></i>
              Rédaction article
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=article">
              <span data-feather="shopping-cart"></span>
              <i id="fa" class="fa fa-book fa-1x" class="card-img-top"></i>
              Mes articles
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=apparence">
              <span data-feather="shopping-cart"></span>
              <i id="fa" class="fa fa-gear fa-1x" class="card-img-top"></i>
              Apparence
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=adresse">
              <span data-feather="users"></span>
              <i id="fa" class="fa fa-address-book fa-1x" class="card-img-top"></i>
              Corrdonnées
            </a>
          </li>
         
        </ul>

       
      </div>
    </nav>

    
<div class="container">
     <h1>Espace de gestion</h1>
</div>

</body>



<?php

    if(!empty($_POST['logout'])){
      //echo'<script type="text/javascript">alert("fin session");</script>';
     unset($_SESSION['statut']);
     echo'<script type="text/javascript">window.location = "?page=out";</script>';
    }

?>

    
  </body>

</html>
