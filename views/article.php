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



  <title>Liste article</title>
</head>

<body>
  <?php

  if(!empty($_SESSION['statut']) AND  $_SESSION['statut'] == "admin" ||  $_SESSION['statut'] == "super_admin" ||  $_SESSION['statut'] == "redacteur"){

  }
  else
  {?>

  <script>
      window.location = "/cdf";
  </script>

  <?php

  }

  ?>

  <div class="container">

    

   
   

    <h1 id="gestion">Espace de gestion des articles</h1><br/>

    <div class="row">


    



		





  <?php if($_SESSION['statut'] == "super_admin" || $_SESSION['statut'] == "admin" ){ ?>
    <div class="table-responsive">

    

      <table class="table table-striped">
    <thead>
      <tr>
        <th class="th-lg"></th>
        <th class="th-lg">nom</th>
        <th class="th-lg">résumé</th>
        <th class="th-lg">image</th>
        <th class="th-lg">date</th>
        <th class="th-lg">auteur</th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach ($article as $n) {
          ?>
          <tr>
            <th scope="row"></th>
            <td><?php echo $n['titre'] ?></td>
            <td><?php echo substr($n['texte'], 0, 20) ?></td>
            <td><img src="<?php echo "images/".$n['images'] ?>"style="width:20%; height:auto"></td>
            <?php  $date = new DateTime($n['dates']); ?>
            <td><?php echo $date->format('d-m-Y'); ?></td>
            <td><?php echo $n['auteur'] ?></td>
            <td><a href="?page=article&maj=<?php echo $n['id'] ?>"><button type="button"  class="btn btn-primary" >modifier</button></a></td>
            <!-- <td><a href="?page=admin&delete=<?php echo $n['id'] ?>"><button type="button"  class="btn btn-danger">supprimer</button></td></a> -->
            <td class="form-check"><form action="" method="POST">
              <input class="form-check-input" type="checkbox" name="records[]" value="<?php echo $n['id'] ?>">
              <input class="form-control" type="hidden" name="img[]" value="<?php echo $n['images'] ?>">
          </td>
          </tr>

        <?php
        }
      ?>

    </tbody>
  </table>

  <?php } ?>
    </div>

    <!-- gestion des rédacteurs -->

    <?php if($_SESSION['statut'] == "redacteur"){ ?>
      <div class="table-responsive">

        <center><h2>Gestion de mes articles</h2></center>

        <table class="table table-striped">
      <thead>
        <tr>
          <th class="th-lg"></th>
          <th class="th-lg">nom</th>
          <th class="th-lg">résumé</th>
          <th class="th-lg">image</th>
          <th class="th-lg">date</th>
          <th class="th-lg">auteur</th>
        </tr>
      </thead>
      <tbody>
        <?php
          foreach ($myArticles as $n) {
            ?>
            <tr>
              <th scope="row"></th>
              <td><?php echo $n['titre'] ?></td>
              <td><?php echo substr($n['texte'], 0, 20) ?></td>
              <td><img src="<?php echo "images/".$n['images'] ?>"style="width:20%; height:auto"></td>
              <?php  $date = new DateTime($n['dates']); ?>
              <td><?php echo $date->format('d-m-Y'); ?></td>
              <td><?php echo $n['auteur'] ?></td>
              <td><a href="?page=article&maj=<?php echo $n['id'] ?>"><button type="button"  class="btn btn-primary" >modifier</button></a></td>
              <!-- <td><a href="?page=admin&delete=<?php echo $n['id'] ?>"><button type="button"  class="btn btn-danger">supprimer</button></td></a> -->
              <td class="form-check"><form action="" method="POST">
                <input class="form-check-input" type="checkbox" name="records[]" value="<?php echo $n['id'] ?>">
                <input class="form-control" type="hidden" name="img[]" value="<?php echo $n['images'] ?>">
            </td>
            </tr>
          <?php
          }
        ?>

      </tbody>
    </table>

    <?php } ?>
      </div>
    <!-- bouton suppression -->
    <div class="container">


    <div class="row">
      <div class="form-group">
        <input type="submit" name="deleteMultiple" value="suppression" class="btn btn-danger">
      </div>
    </div>
    </form>
    </div>
  </div>



    <!--autres cards -->

    <!-- Footer -->
    <footer id="contact" class="page-footer font-small blue pt-4">

   

      <div class="modal" id="majArticle" tabindex="-1" role="dialog" >
      <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" >Modifier un article</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>


        <div class="modal-body">
          <form action="" method="POST" enctype="multipart/form-data" >
      <div class="form-group row">

        <?php foreach ($upd as $u ) { ?>


      <label class="col-sm-2 col-form-label"></label>
      <div class="col-sm-10">
        <input type="text"  class="form-control-plaintext" name="titre" value="<?php  echo $u['titre']?> "  required>
        <input type="hidden"  class="form-control-plaintext" name="id" value="<?php  echo $u['id']?> "  required>
      </div>
      </div>
      <!-- date picker-->
      <div class="row">
             <div class='col-sm-6'>
                 <div class="form-group">
                     <div class='input-group date dateRangePicker'>
                       <?php  $dates = new DateTime($u['dates']); ?>
                         <input type='text' class="form-control" name="dates" value="<?php  echo $dates->format('d-m-Y');?> " required />
                         <span class="input-group-addon">
                             <span class="fa fa-calendar fa-2x"></span>
                         </span>
                     </div>
                 </div>
             </div>
           </div>
      <!-- fin datepicker-->

          <div class="form-group row">
              <label class="col-sm-6 col-form-label"></label>
              <img src="<?php echo "images/".$u['images'] ?>" alt="image" id="preloadImage">
                         <input type="file" class="form-control-file" name="image"  id="imgInp" >
          </div>


      <div class="form-group row">
      <label for="inputPassword" class="col-sm-2 col-form-label"></label>
      <div class="col-sm-10">
      <textarea class="editor" rows="5" name="texte"  value="" required><?php echo $u['texte'] ?></textarea>
      </div>

      <label class="col-sm-4 col-form-label">fiche inscription</label>
      <select class="col-sm-2" name="telechargement">
        <option value="<?php echo $u['telechargement']; ?>"><?php if(!empty($u['telechargement'])){ echo $u['telechargement'];}  ?>aucun</option>
        <?php foreach ($document as $n) { ?>
          <option value="<?php echo $n['fichier']; ?>"><?php echo $n['fichier']; ?></option>

        <?php } ?>
      </select>

      </div>
      <?php  } ?>
      <div class="form-group ">
      <button type="submit"  name="updates" value="updates" class="btn btn-primary" >Modifier</button>
      </div>
      </form>
        </div>

      </div>
      </div>
      </div>

    </footer>

   
  
 
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>
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

<script>
$('#summernote').summernote({
  popover: {
image: [],
lien: [],
air: []
},
  toolbar: [
     // [groupName, [list of button]]
     ['style', ['bold', 'italic', 'underline', 'clear']],
     ['font', ['strikethrough', 'superscript', 'subscript']],
     ['fontsize', ['fontsize']],
     ['color', ['color']],
     ['para', ['ul', 'ol', 'paragraph']],
     ['height', ['height']]
   ]                 // set focus to editable area after initializing summernote
});

</script>
 <script>
    ClassicEditor
    .create( document.querySelector( '.editor' ), {
        //removePlugins: [ 'Heading' ],
        toolbar: [ 'bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote', 'link', 'heading' ]
    } )
    .catch( error => {
        console.log( error );
    } );
</script>

<script>
   ClassicEditor
   .create( document.querySelector( '#editor' ), {
       //removePlugins: [ 'Heading' ],
       toolbar: [ 'bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote', 'link', 'heading' ]
   } )
   .catch( error => {
       console.log( error );
   } );
</script>
<script>

(function($){
$.fn.datepicker.dates['fr'] = {
days: ["dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi"],
daysShort: ["dim.", "lun.", "mar.", "mer.", "jeu.", "ven.", "sam."],
daysMin: ["dim", "lun", "ma", "me", "jeu", "ven", "sam"],
months: ["janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre"],
monthsShort: ["janv.", "févr.", "mars", "avril", "mai", "juin", "juil.", "août", "sept.", "oct.", "nov.", "déc."],
today: "Aujourd'hui",
monthsTitle: "Mois",
clear: "Effacer",
weekStart: 1,
format: "dd-mm-yyyy"
};
}(jQuery));
$('.dateRangePicker').datepicker({
language: 'fr',
autoclose: true,
todayHighlight: true
})
</script>

</body>
<?php
  if(!empty($_GET['maj'])){
    echo'<script>$(function(){$("#majArticle").modal("show");});</script>';
  }
   if(isset($_POST['update'])){
     echo'<script>$(function(){$("#majArticle").modal("hide");});</script>';
   }
  if(!empty($_POST['logout'])){
    //echo'<script type="text/javascript">alert("fin session");</script>';
   unset($_SESSION['statut']);
   echo'<script type="text/javascript">window.location = "?page=out";</script>';
  }
  ?>
</html>
