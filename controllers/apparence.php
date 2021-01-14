<?php
include('models/apparence.php');

if(isset($_POST['websiteName'])&&isset($_POST['bgColor'])){
    apparence($_POST['websiteName'],$_POST['bgColor']);
}


if(isset($_FILES['logo']['name'])){
    upload($_FILES['logo']['name']);
}
include('views/apparence.php');

?>