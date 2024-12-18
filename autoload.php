<?php 
function app_autoload($classname){
    $filename="";

    if(strpos($classname,"Controller")!==false){
        $filename=__DIR__ ."/controllers/".$classname.".php";
    }
    elseif(strpos($classname,"Cnx")===0){
       $filename=__DIR__."/configs/database/".$classname.".php";
    }
    else{
        $filename=__DIR__."/models/".$classname.".php";
    }
    
    if(file_exists($filename)){
        require_once($filename);
    }
}
spl_autoload_register("app_autoload");
?>