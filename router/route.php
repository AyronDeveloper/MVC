<?php 
require_once("./router/navigate.php");

class Route extends Navigate{
    
    public static function get($link,$method){
        $request_method=$_SERVER["REQUEST_METHOD"];

        if($request_method=="GET"){
            self::navigate($link,$method);
        }

    }

    public static function post($link,$method){
        $request_method=$_SERVER["REQUEST_METHOD"];

        if($request_method=="POST"){
            self::navigate($link,$method);
        }
    }

    public static function put($link,$method){
        $request_method=$_SERVER["REQUEST_METHOD"];

        if($request_method=="PUT"){
            self::navigate($link,$method);
        }
    }

    public static function delete($link,$method){
        $request_method=$_SERVER["REQUEST_METHOD"];

        if($request_method=="DELETE"){
            self::navigate($link,$method);
        }
    }

    public static function combo($request,$link,$method){
        $request_method=$_SERVER["REQUEST_METHOD"];

        foreach($request as $res){
            $res=strtoupper($res);

            if($request_method==$res){
                self::navigate($link,$method);
            }

        }

    }
}
?>