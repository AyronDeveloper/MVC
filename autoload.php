<?php 
function app_autoload($classname){
    if(strpos($classname,"Controller")!==false){
        $filename=__DIR__ ."/controllers/".$classname.".php";
    }else{
        $filename=__DIR__."/models/".$classname.".php";
    }
    
    if(file_exists($filename)){
        require_once($filename);
    }
}
spl_autoload_register("app_autoload");
?>