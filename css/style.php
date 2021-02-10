<?php
header("Content-type: text/css; charset: UTF-8");
include('../models/css.php');



?>

<?php


global $color;
global $headerColor;
global $footerColor;
global $h1Color;
global $h2Color;
global $h1Police;
global $h2Police;


//$color = "red";
$bgColor = $color;
$font = "porter";

?>
<style>
@font-face {
 font-family: "porter";
 src: url("../fonts/porter.woff") format("woff");
}




#gestion{
  color: <?php echo $h1Color; ?> ;
}

body{
    background-color: <?php echo $bgColor; ?> ;
}
h1{
    font-family: <?php echo $font; ?>;
    color : <?php echo $h1Color; ?>;
}
#include{
    background-color: red;
}
.footer{
    background-color: <?php echo $footerColor; ?>;
    margin-top:10%;
}
#mapid{ 
    height: 280px; 
}
#formulaire{
    margin-top:12%;
    margin-left:25%;
}
</style>
