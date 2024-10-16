<?php
require_once("./configs/router/navigate.php");

class ErrorNavigate extends Navigate{
    
    public static function error(){
        if(self::getStatusGlobal()){
            errorController::index();
        }
    }
}
?>