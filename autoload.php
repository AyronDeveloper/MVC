<?php 
function controller_autoload($classname){
    $filename="controllers/".$classname.".php";
    if(file_exists($filename)){
        include($filename);
    }else{
        include("controllers/errorController.php");
    }
}
spl_autoload_register("controller_autoload");
?>