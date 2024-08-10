<?php

function rutas($url_next, $rutas){
    $error=true;
    //echo $url_next;
    $existeHttps=strpos($url_next,"?");

    if($existeHttps!=false){
        $url_next=substr($url_next,0,$existeHttps);
    }

    foreach($rutas as $url){

        //VERIFICA SI EXISTE /: ESO SIGNIFICA QUE SE ESTA SOLICITANDO PARAMETROS PARA LA FUNCION
        $existeParametros=strpos($url[0],"/:");

        //VALIDA TIENE /:
        if($existeParametros!=false){
            //GUARDAR LA CADENA DESPUES DEL PRIMER /:
            $parametros=substr($url[0],$existeParametros);
            //GUARDA LA CADENA ANTES DEL PRIMER /:
            $url[0]=substr($url[0],0,$existeParametros);

            //echo $url[0];
            
            //echo "<br>";

            //echo $parametros;

            //echo "<br>";
            
            //CREAR UN ARRAY EN BASE /: Y LIMPIA PARA QUE NO HAYA ESPACIO
            $arrayParametros=explode("/:",$parametros);
            $arrayParametros=array_values(array_filter($arrayParametros, fn($array)=>$array!=""));
            //var_dump($arrayParametros);

            //echo "<br>";
            
            $urlSinParametros=substr($url_next,0,$existeParametros);
            //echo $urlSinParametros;

            //echo "<br>";

            $parametrosUrl=substr($url_next,$existeParametros);
            //echo $parametrosUrl;

            //echo "<br>";
            if($urlSinParametros==$url[0]){
                $error=false;

                $parametrosUrl=explode("/",$parametrosUrl);
                $parametrosUrl=array_values(array_filter($parametrosUrl, fn($array)=>$array!=""));
                //var_dump($parametrosUrl);
                //echo "<br>";
    
                $nameController=$url[1]."Controller";
                $nameMetodo=$url[2];
    
                $controlador=new $nameController();
                call_user_func_array([$controlador,$nameMetodo],$parametrosUrl);
                return;
            }

        }else{
            if($url_next==$url[0]){
                $error=false;
    
                $nameController=$url[1]."Controller";
                $nameMetodo=$url[2];
    
                $controlador=new $nameController();
                $controlador->$nameMetodo();
                return;
            }
        }
    }

    if($error){
        $controlador=new errorController();
        $controlador::index();
        return;
    }


}
?>