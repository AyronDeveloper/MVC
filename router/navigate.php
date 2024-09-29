<?php

class Navigate{
    private static $controller;
    private static $statusGlobal=true;

    private static function url(){
        
        $protocol=isset($_SERVER['HTTPS'])&&$_SERVER['HTTPS']=='on'?'https':'http';

        $host=$_SERVER['HTTP_HOST'];

        $uri=$_SERVER['REQUEST_URI'];

        $url=$protocol.'://'.$host."$_ENV[ROUTER_MAIN]";

        $completeURL=$protocol.'://'.$host.$uri;

        $url_len=strlen($url);

        $url_next=substr($completeURL,$url_len);

        return $url_next;
    }

    public static function setStatusGlobal($status){
        self::$statusGlobal=$status;
    }

    public static function getStatusGlobal(){
        return self::$statusGlobal;
    }

    public static function navigate($link, $method){
        if(!self::$statusGlobal){
            return;
        }

        $url_next=self::url();

        $error=true;
        //echo $url_next;
        $existeHttps=strpos($url_next,"?");
    
        if($existeHttps!=false){
            $url_next=substr($url_next,0,$existeHttps);
        }

                
        //VERIFICA SI EXISTE /: ESO SIGNIFICA QUE SE ESTA SOLICITANDO PARAMETROS PARA LA FUNCION
        $existeParametros=strpos($link,"/:");

        //VALIDA TIENE /:
        if($existeParametros!=false){
            //GUARDAR LA CADENA DESPUES DEL PRIMER /:
            $parametros=substr($link,$existeParametros);
            //GUARDA LA CADENA ANTES DEL PRIMER /:
            $link=substr($link,0,$existeParametros);

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
            if($urlSinParametros==$link){
                self::$statusGlobal=false;

                $parametrosUrl=explode("/",$parametrosUrl);
                $parametrosUrl=array_values(array_filter($parametrosUrl, fn($array)=>$array!=""));
                //var_dump($parametrosUrl);
                //echo "<br>";
    
                $nameMetodo=$method;
    
                $controlador=self::$controller;
                call_user_func_array([$controlador,$nameMetodo],$parametrosUrl);
                return;
            }

        }else{
            if($url_next==$link){
                self::$statusGlobal=false;
    
                $nameMetodo=$method;
    
                $controlador=self::$controller;
                $controlador->$nameMetodo();
                return;
            }
        }
    
    }

    public static function controller($controller){
        self::$controller=new $controller();

        return new self;
    }

    public function group($function){
        $function();
    }
}

?>