<!doctype html>
<html lang="fr">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- <link rel="stylesheet" type="text/css" href="../css/bootsrap.min.css"> -->


  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

  <title>CDF</title>
</head>

<body>
  <div class="container-fluid">

 <?php include('controllers/menu.php'); ?>

    <div class="jumbotron-fluid">
<!-- image de présentation  -->
      <img src="images/Saint-aubin-sur-mer-calvados.jpg" class="img-fluid" alt="Responsive image">
     
    </div>

   


<!-- affiche les articles  -->
<div class="row mt-3" id="pastEvents">
  <?php foreach ($article as $n) { ?>

  <div class="col-sm-4">
    <div class="card">
      <img src="<?php echo "images/".$n['images'] ?>"  alt="Responsive image" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title"><?php echo $n['titre'] ?></h5>
        <?php  $date = new DateTime($n['dates']); ?>
        <p class="card-text"><?php echo $date->format('d-m-Y'); ?></p>
        <p class="card-text"><?php echo substr($n['texte'],0,70)." ..." ?></p>
        <a href="?article=<?php echo $n['id'] ?>" class="btn btn-primary">En savoir plus d'avantage</a>
      </div>
    </div>
  </div>

  <?php } ?>
</div>


<!--autres cards -->
<br />
    
<?php include('controllers/footer.php'); ?>

    <!-- modal espace connexion -->
    <div class="modal fade" id="adminLogin" tabindex="-1" role="dialog" aria-labelledby="adminLogin" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="adminLogin">Connexion administration</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form  action="" method="post" role="form">
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="text"  class="form-control-plaintext" name="mail" placeholder="email@example.com" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Mot de passe</label>
    <div class="col-sm-10">
    <input type="password"  class="form-control-plaintext" name="pwd" placeholder="Mot de passe" required>
    </div>
  </div>
  <div class="form-group ">
    <button type="submit" class="btn btn-primary">Connexion</button>
  </div>
</form>
      </div>

    </div>
  </div>
</div>

<!-- modal articles -->
<div class="modal show" id="article" tabindex="-1" role="dialog" aria-labelledby="article" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
    <?php
    foreach ($arti as $n ) {
      ?>
    <h5 class="modal-title" id="article"><?php  echo $n['titre']; ?></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>


  <div class="modal-body">
      <img src="<?php echo "images/".$n['images'] ?>" class="card-img-top" alt="...">
    <?php echo $n['texte']; ?>

    <?php  $date = new DateTime($n['dates']); ?>
    <p class="card-text">Le : <strong><?php echo $date->format('d-m-Y'); ?></strong></p>
    <?php if(!empty($n['telechargement'])){ ?><a href="telechargement/<?php echo $n['telechargement']; ?>"  download="<?php echo $n['telechargement']; ?>"class="btn btn-success" role="button">fiche inscription</a><?php

    }  ?>

    <!-- Load Facebook SDK for JavaScript -->
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

  <!-- mettre à jour les données du site -->
  <div class="fb-share-button"
    data-href="https://www.cdf.com"
    data-layout="button_count">
  </div>
<! -- fin facebook-->
<?php } ?>
  </div>

</div>
</div>
</div>
<!-- fin modal -->

  </div> <!-- /container -->


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>

<?php

if(isset($_GET['article'])){
  ?>
  <script>
  $(function(){
    $("#article").modal('show');
  });
  </script>

  <?php
}
 ?>

 <?php

 if(isset($_GET['Allarticles'])){
   ?>
   <script>
   $(function(){
     $("#AllPastEvents").show();
     $("#pastEvents").hide();
   });
   </script>

   <?php
 }else{
?>
<script>
$(function(){
  $("#AllPastEvents").hide();
});
</script>

<?php
 }

?>




</html>
