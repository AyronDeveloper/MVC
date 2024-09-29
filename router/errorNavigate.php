<?php 
require_once("./router/navigate.php");

class ErrorNavigate extends Navigate{
    
    public static function error(){
        if(self::getStatusGlobal()){
            errorController::index();
        }
    }
}
?>