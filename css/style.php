<?php
    header("Content-type: text/css; charset: UTF-8");

   $color = "red";
   $bgColor = "orange";
   $font = "porter";


   
?>

@font-face {
 font-family: "porter";
 src: url("../fonts/porter.woff") format("woff");
}

#gestion{
  color: <?php echo $color; ?>;
}

body{
    background-color: <?php echo $bgColor; ?> ;
}
h1{
    font-family: <?php echo $font; ?>;
}
#include{
    background-color: red;
}
.footer{
    background-color:white;
    margin-top:10%;
}
#mapid{ 
    height: 280px; 
}
#formulaire{
    margin-top:12%;
    margin-left:25%;
}