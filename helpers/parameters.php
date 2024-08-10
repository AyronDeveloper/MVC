<?php 
$protocol=isset($_SERVER['HTTPS'])&&$_SERVER['HTTPS']=='on'?'https':'http';

$host=$_SERVER['HTTP_HOST'];

$uri=$_SERVER['REQUEST_URI'];

//ESTA URL ES PARA UTILIZARLO EN TU SERVIDOR CUANDO TU PROYECTO ESTE TERMINADO
//$url=$protocol.'://'.$host."/";

$url=$protocol.'://'.$host."/proyectos/PHP/miMVC/";
define("URL",$url);

$completeURL=$protocol.'://'.$host.$uri;

$url_len=strlen($url);

$url_next=substr($completeURL,$url_len);

if(substr($url_next,-1)=="/" && $url_next!="/"){
    $newURL=rtrim($url_next,"/");
    $newURL=URL.$newURL;
    header("Location: $newURL",true,301);
}  
?>