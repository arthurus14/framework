
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- <link rel="stylesheet" type="text/css" href="../css/bootsrap.min.css"> -->

    <title>Rédaction articles</title>
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

        <div class="row">
                <div class="col-sm-6">
                    <h3 class="text-center">Rédiger un article</h3>
                    <form  action="" method="POST">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Titre</label>
                            <input type="text" class="form-control" name="titre"  placeholder="titre">
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Mon article</label>
                            <textarea class="form-control" name="texte" placeholder="texte" rows="3"></textarea>

                        </div>

                        <div class="form-group">
                            <button type="submit" name="publier" value="publier"  class="btn btn-primary">Publier</button>
                        </div>
                    </form>
                </div>
            </div>

            <?php 
                   if(!empty($serveur) && $serveur ===200){
                    echo"</br>";
                    echo '<p id="resultat"  class="p-3 mb-2 bg-success text-white">"';
                      ?>
                        <script>
                            document.getElementById('resultat').innerHTML=('Données envoyées avec succès');
                        </script>
                      <?php
                   }
                        
            ?>


        </div>

           
            
         

        
               
    </body>
</html>

