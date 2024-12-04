<?php
class Http{
    private static $parametersGet;
    private static $parametersPost;
    private static $parametersPut;
    private static $parametersDelete;
    private static $parametersFiles;


    public static function get($param=null){

        if(count($_GET)>0){
            self::$parametersGet=$_GET;
    
            if(empty($param)){
                return self::$parametersGet;
            }else{
                return self::$parametersGet[$param];
            }
        }

    }

    public static function post($param=null){
        
        $request_method=$_SERVER["REQUEST_METHOD"];

        if($request_method=="POST"){

            if(!array_key_exists("PUT",$_POST) && !array_key_exists("DELETE",$_POST)){
                self::$parametersPost=$_POST;
    
                if(empty($param)){
                    return self::$parametersPost;
                }else{
                    return self::$parametersPost[$param];
                }
            }
        }

    }

    public static function put($param=null){
        $request_method=$_SERVER["REQUEST_METHOD"];
        
        if($request_method=="PUT"){

            $_PUT=json_decode(file_get_contents("php://input"),true);
            self::$parametersPut=$_PUT;
    
            if(empty($param)){
                return self::$parametersPut;
            }else{
                return self::$parametersPut[$param];
            }

        }
        elseif($request_method=="POST" && isset($_POST["PUT"]) && $_POST["PUT"]=="_PUT"){

            $put=$_POST;
            unset($put["PUT"]);

            self::$parametersPut=$put;
    
            if(empty($param)){
                return self::$parametersPut;
            }else{
                return self::$parametersPut[$param];
            }

        }
        
    }

    public static function delete($param=null){
        $request_method=$_SERVER["REQUEST_METHOD"];
        
        if($request_method=="DELETE"){
            $_DELETE=json_decode(file_get_contents("php://input"),true);
            self::$parametersDelete=$_DELETE;
    
            if(empty($param)){
                return self::$parametersDelete;
            }else{
                return self::$parametersDelete[$param];
            }

        }
        elseif($request_method=="POST" && isset($_POST["DELETE"]) && $_POST["DELETE"]=="_DELETE"){

            $delete=$_POST;
            unset($delete["DELETE"]);

            self::$parametersDelete=$delete;

            if(empty($param)){
                return self::$parametersDelete;
            }else{
                return self::$parametersDelete[$param];
            }

        }
    }

    public static function files($param=null,$arg=null){

        if(count($_FILES)>0){
            self::$parametersFiles=$_FILES;

            if(empty($param)){
                return self::$parametersFiles;
            }else{
                if(empty($arg)){
                    return self::$parametersFiles[$param];
                }else{
                    return self::$parametersFiles[$param][$arg];
                }
            }
        }

    }


    public static function method($method){

        $method=strtoupper($method);

        if($method=="PUT"){
            $input_put="<input type='hidden' name='PUT' value='_PUT'>";

            return $input_put;

        }
        elseif($method=="DELETE"){
            $input_delete="<input type='hidden' name='DELETE' value='_DELETE'>";

            return $input_delete;
        }

    }

}
?>