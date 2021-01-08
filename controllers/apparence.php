<?php
include('models/apparence.php');

if(isset($_POST['websiteName'])&&isset($_POST['bgColor'])){
    apparence($_POST['websiteName'],$_POST['bgColor']);
}

include('views/apparence.php');

?>