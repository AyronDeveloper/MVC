<?php
function url($ruta=""){
    $protocol=isset($_SERVER['HTTPS'])&&$_SERVER['HTTPS']=='on'?'https':'http';
    
    $host=$_SERVER['HTTP_HOST'];
    
    $url=$protocol.'://'.$host."$_ENV[ROUTER_MAIN]";

    return $url.$ruta;
}


function fixURL(){
    $protocol=isset($_SERVER['HTTPS'])&&$_SERVER['HTTPS']=='on'?'https':'http';

    $host=$_SERVER['HTTP_HOST'];
    
    $uri=$_SERVER['REQUEST_URI'];
    
    $url=$protocol.'://'.$host."$_ENV[ROUTER_MAIN]";

    $completeURL=$protocol.'://'.$host.$uri;

    $url_len=strlen($url);
    
    $url_next=substr($completeURL,$url_len);
    
    if(substr($url_next,-1)=="/" && $url_next!="/"){
        $newURL=rtrim($url_next,"/");
        $newURL=$url.$newURL;
        header("Location: $newURL",true,301);
    }  
}

fixURL();
?>