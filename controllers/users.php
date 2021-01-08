<?php
//session_start();
include('models/users.php');


$users = ReadUsers();


//functions

    if(isset($_GET['deleteUser'])){
    DeleteUser($_GET['deleteUser']);
    }
    
    if(!empty($_POST['contact'])){
      getUpdateCoords($_POST['tel'],$_POST['mail'],$_POST['fb'],$_POST['numero'],$_POST['rue'],$_POST['cp'],$_POST['ville']);
    }
    
   
    if(!empty($_POST['contactUser'])){
      getUpdateUser($_POST['nom'],$_POST['mail'],$_POST['statut'],$_POST['id']);
      echo'<script type="text/javascript">window.location = "?page=users#gestion";</script>';
    }
   
    if(!empty($_GET['majUser'])){
      $usersMaj = ReadUsersMaj($_GET['majUser']);
      //echo'<script type="text/javascript">window.location = "?page=admin#gestion";</script>';
    }
   
    
    if(!empty($_POST['newUser'])){
      getCreateUser($_POST['name'],sha1($_POST['mdp']),$_POST['mail'],$_POST['statut']);
    }
    

//functions



include('views/users.php');