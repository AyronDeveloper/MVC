<?php
class Utils{
    public static function sessionAdmin(){
        if(!isset($_SESSION["administradorPage"])){
            header("Location: ".url()."administrador");
        }else{
            return true;
        }
    }

    public static function alertError($errores, $campo){
        $alert="";
        if(isset($errores[$campo])&& !empty($campo)){
            $alert=$errores[$campo];
        }
        return $alert;
    }

    public static function deleteAlert($alert){
        unset($_SESSION[$alert]);
    }

    public static function nameRandomImage($image){
        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyz0123456789abcdefghijklmnopqrstuvwxyz';
        $random=substr(str_shuffle($caracteres),0,rand(20,30));

        //recuperacion del tipo de imagen si es PNG, JPG o mp4 etc
        $posType=stripos(strrev($image["name"]),".");
        $reverse=strrev($image["name"]);

        $imageType=substr($reverse,0,$posType);
        $nameImagen=$random.".".strrev($imageType);
        
        $resutl=$nameImagen;
        return $resutl; 
    }
}
?>