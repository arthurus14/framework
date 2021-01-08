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

  </head>

  


<body>
  <?php

  if(!empty($_SESSION['statut']) AND  $_SESSION['statut'] == "admin" ||  $_SESSION['statut'] == "super_admin" ||  $_SESSION['statut'] == "redacteur"){

  }
  else
  {?>

  <script>
      window.location = "/framework";
  </script>

  <?php

  }

  ?>

  <div class="container">

    <!-- Static navbar -->

    <h1 id="gestion">Espace de gestion des utilisateurs</h1><br/>

<div class="modal-body">





          <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#newUser">créer utilisateur</a>

        <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col"></th>
          <th scope="col">id</th>
          <th scope="col">nom</th>
          <th scope="col">mail</th>
          <th scope="col">statut</th>
        </tr>
      </thead>
      <tbody>
        <?php
          foreach ($users as $n) {
            ?>
            <tr>
              <th scope="row"></th>
              <td><?php echo $n['id'] ?></td>
              <td><?php echo $n['name'] ?></td>
              <td><?php echo $n['mail'] ?></td>
              <td><?php echo $n['statut'] ?></td>
              <!-- data-target="#updateUser" -->
              <td><a href="?page=users&majUser=<?php echo $n['id'] ?>"><button type="button"  class="btn btn-primary" data-id="<? echo $n['id'] ?>">modifier</button></a></td>
              <td><a href="?page=users&deleteUser=<?php echo $n['id'] ?>"><button type="button"  class="btn btn-danger">supprimer</button></td></a>
            </tr>
          <?php
          }
        ?>

      </tbody>
    </table>
      </div>

    </div>
  </div>
</div>

  </div>

</div>
</div>
</div>

</nav>

</div>



<!-- new user -->

<div id="newUser" class="modal" tabindex="-1" role="dialog">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title">Nouvel utilisateur</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">

    <form  action="" method="POST" role="form">


<div class="form-group row">

<div class="col-sm-12">
  <input class="col-sm-3" type="text"  class="form-control-plaintext" name="name" placeholder="nom"  required>
  <input class="col-sm-3" type="text"  class="form-control-plaintext" name="mail" placeholder="mail" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
  <input class="col-sm-4" type="password"  class="form-control-plaintext" name="mdp" placeholder="mot de passe"  required>
<br/>
  <label for="admin">statut</label>
  <p  data-toggle="tooltip" title="rédacteur : rédige seulement des articles admin : peut en plus ajouter des utilisateurs "><i class="fa fa-info-circle"></i></p>
  <select class="col-sm-2" name="statut">
    <option value="admin">admin</option>
    <option value="redacteur">rédacteur</option>
  </select>
</div>
</div>

<div class="form-group ">
<button type="submit" name="newUser" value="newUser" class="btn btn-primary">Enregistrer</button>
</div>

</form>
  </div>
</div>
</div>
</div>


<!-- modalbox user -->



<!--updateUser -->
<div class="modal fade bd-example-modal-lg" id="updateUser" tabindex="-1" role="dialog" aria-labelledby="adminLogin" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="adminLogin">données utilisateur</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <form  action="" method="POST" role="form">
<div class="form-group row">
<label class="col-sm-2 col-form-label">utilisateur</label>
<?php foreach($usersMaj as $n){?>
<div class="col-sm-12">
  <input class="col-sm-3" type="text"  class="form-control-plaintext" name="nom" value="<?php echo $n['name'] ?>"  required>
  <input class="col-sm-3" type="text"  class="form-control-plaintext" name="mail" value="<?php echo $n['mail'] ?>"  required>
  <input class="col-sm-3" type="hidden"  class="form-control-plaintext" name="id" value="<?php echo $n['id'] ?>"  required>
  <!-- <input class="col-sm-3" type="text"  class="form-control-plaintext" name="statut" value="<?php //echo $n['statut'] ?>"  required> -->

  <select class="col-sm-3" name="statut">
    <option value="<?php echo $n['statut'] ?>"><?php echo $n['statut'] ?></option>
    <option value="admin">admin</option>
    <option value="redacteur">rédacteur</option>
  </select>

</div>
</div>

<div class="form-group ">
<button type="submit" name="contactUser" value="contactUser" class="btn btn-primary">mise à jour</button>
</div>
  <?php } ?>
</form>

  </div>

</div>
</div>
</div>

</nav>

</div>


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






  <!-- lien js fonctionne -->
</body>
<?php
  
   if(!empty($_GET['majUser'])){
       echo'<script>$(function(){$("#updateUser").modal("show");});</script>';
     }
     if(!empty($_POST['contactUser'])){
         echo'<script>$(function(){$("#updateUser").modal("hide");});</script>';
     }
  if(!empty($_POST['logout'])){
    //echo'<script type="text/javascript">alert("fin session");</script>';
   unset($_SESSION['statut']);
   echo'<script type="text/javascript">window.location = "?page=out";</script>';
  }
  ?>
</html>
