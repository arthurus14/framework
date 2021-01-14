<?php
include('models/contact.php');


if(isset($_POST['mail'])&&isset($_POST['message'])&&isset($_POST['tel'])){
    message($_POST['mail'],$_POST['message'],$_POST['tel']);
}
include('views/contact.php');

?>