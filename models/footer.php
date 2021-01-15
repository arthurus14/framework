<?php

function ReadCoords(){
    global $bdd; //connection bdd depuis les codes d'une autre page
  

      $req = $bdd->query('SELECT * FROM coords');
  
      while($data = $req->fetch())
      {
          $coords[] = $data;
      }
      return $coords;
  }

?>