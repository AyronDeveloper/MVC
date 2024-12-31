<?php
require_once("./configs/router/navigate.php");

class ErrorNavigate extends Navigate{
    
    public static function error($redirection=null){
        if(!empty($redirection)){
            header("Location: ".$redirection);
            exit;
        }elseif(self::getStatusGlobal()){
            errorController::index();
        }
    }
}
?>