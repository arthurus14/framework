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

<!-- 
page de contact

créer le header (animation avec image et contact) et le footer (map et coordonnées) en include

statistique de vu sur les articles et les pages
-->

  <title>Apparence</title>
</head>
<script type="text/javascript" src="./js/scripts.js"></script>
<body>
  <?php

  if(!empty($_SESSION['statut']) AND  $_SESSION['statut'] == "admin" ||  $_SESSION['statut'] == "super_admin"){

  }
  else
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>toggle();</script>

<body>




    <h1 id="gestion">Espace de gestion de l'apparence du site</h1><br/>


<div class="container" class="row">
<div id="sidebarMenu">
  <div class="row">
    <nav  class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
          <button id="clicNomSite">Nom du site</button>
          </li>
         
          <li class="nav-item">
          <button id="clicLogo">Logo du site</button>
          </li> 
          
          <li class="nav-item">
          <button id="clicJumbo">Jumbotron</button>
          </li> 

          <li class="nav-item">
          <button id="clicCharactere">Police de charactères</button>
          </li> 
        </ul>

       
      </div>
    </nav>

  <div>
  <div class="row">
 
    <form id="nomDuSite" action="" method="POST" class="col">

<div class="form-group">
<div class="col-6">
<input class="form-control" type="text" name="websiteName" placeholder="Nom du site" id="example-text-input">
</div>
</div>

<div class="form-group">
<label for="example-color-input" class="col-12 col-form-label">Couleur de fond en tête</label>
<div class="col-6">
<input class="form-control" type="color" name="headerColor" value="#563d7c" id="example-color-input">
</div>
</div>

<div class="form-group">
<label for="example-color-input" class="col-12 col-form-label">Couleur de fond body</label>
<div class="col-6">
<input class="form-control" type="color" name="bgColor" value="#563d7c" id="example-color-input">
</div>
</div>

<div class="form-group">
<label for="example-color-input" class="col-12 col-form-label">Couleur de fond pied de page</label>
<div class="col-6">
<input class="form-control" type="color" name="footerColor" value="#563d7c" id="example-color-input">
</div>
</div>

<div class="form-group">
  <div class="col-6">
    <button type="submit" class="btn btn-primary">Enregistrer</button>
  </div>
</div>
</form>



<form id="logoSite" action="" method="POST" class="col" enctype="multipart/form-data">


<div class="form-group" >
<div class="col-6">
<label >Logo du site</label>
<input type="file" class="form-control-file" name="logo" >
<input type="text" class="form-control-file" name="dossier" value="logo" >
<input type="text" class="form-control-file" name="phpMyAdmin" value="logo" >
</div>
</div>


<div class="form-group">
<div class="col-6">
<button type="submit" class="btn btn-primary">Enregistrer</button>
</div>
</div>
</form>


<form id="jumboSite" action="" method="POST" class="col" enctype="multipart/form-data">


<div class="form-group" >
<div class="col-6">
<label >Jumbotron</label>
<input type="file" class="form-control-file" name="logo" >
<input type="text" class="form-control-file" name="dossier" value="jumbotron" >
<input type="text" class="form-control-file" name="phpMyAdmin" value="jumbotron" >

</div>
</div>


<div class="form-group">
<div class="col-6">
<button type="submit" class="btn btn-primary">Enregistrer</button>
</div>
</div>
</form>

<?php 
                   if(!empty($serveur) && $serveur ===200){
                    echo"</br></br>";
                    echo '<p id="resultat"  class="col-6 bg-success text-white">"';
                      ?>
                        <script>
                            document.getElementById('resultat').innerHTML=('Données envoyées avec succès');
                        </script>
                      <?php
                   }
                        
            ?>
    </div>
    <div class="col">
        <h1><?php //include("admin.php");  ?></h1>
    </div>
  </div>
  <div class="row">
    <div class="col">
    
    <form id="charactere" action="" method="POST" class="col">


<div class="form-group">
<label for="example-color-input" class="col-12 col-form-label">Couleur H1</label>
<div class="col-6">
<input class="form-control" type="color" name="h1Color" value="#563d7c" id="example-color-input">
</div>
</div>

<div class="form-group">
<label for="example-color-input" class="col-12 col-form-label">Police H1</label>
<div class="col-6">
<select class="form-select" name="h1Police" aria-label="Default select example">
  <option selected>Open this select menu</option>
  <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option>
</select>
</div>
</div>



<div class="form-group">
<label for="example-color-input" class="col-12 col-form-label">Couleur H2</label>
<div class="col-6">
<input class="form-control" type="color" name="h2Color" value="#563d7c" id="example-color-input">
</div>
</div>

<div class="form-group">
<label for="example-color-input" class="col-12 col-form-label">Police H2</label>
<div class="col-6">
<select class="form-select" name="h2Police" aria-label="Default select example">
  <option selected>Open this select menu</option>
  <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option>
</select>
</div>
</div>



<div class="form-group">
  <div class="col-6">
    <button type="submit" class="btn btn-primary">Enregistrer</button>
  </div>
</div>
</form>
    </div>
    <div class="col">
      2 of 3
    </div>
    <div class="col">
      3 of 3
    </div>
  </div>
</div>
  
</div>



</body>
    <!--autres cards -->

    <!-- Footer -->
    <footer id="contact" class="page-footer font-small blue pt-4">

   

     


   

    </footer>

    

  </div> <!-- /container -->


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

  <!-- boostrap date picker -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>



  <script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>

  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>







</body>

</html>
