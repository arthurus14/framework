<?php
include('models/apparence.php');



if(isset($_POST['websiteName'])&&isset($_POST['headerColor'])&&isset($_POST['bgColor'])&&isset($_POST['footerColor'])){
    apparence($_POST['websiteName'],$_POST['bgColor'],$_POST['headerColor'],$_POST['footerColor']);
}

if(isset($_POST['h1Color'])&&isset($_POST['h1Police'])&&isset($_POST['h2Color'])&&isset($_POST['h2Police'])){
    apparencePolice($_POST['h1Color'],$_POST['h1Police'],$_POST['h2Color'],$_POST['h2Police']);
}


if(isset($_FILES['logo']['name'])){
    upload($_FILES['logo']['name'],$_POST['dossier'],$_POST['phpMyAdmin']);
}

$css = getValue();

include('views/apparence.php');

?>