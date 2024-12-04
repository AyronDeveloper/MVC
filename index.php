<?php
session_start();

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials:true");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');

require_once(__DIR__."/vendor/autoload.php");

$dotenv=Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

require_once("./autoload.php");
require_once("./configs/helpers/parameters.php");
require_once("./configs/database/db.php");
require_once("./configs/Http/Http.php");
require_once("./configs/router/route.php");
require_once("./configs/router/api.php");
require_once("./configs/router/errorNavigate.php");
require_once("./configs/helpers/utils.php");
require_once("./configs/helpers/vali.php");


Route::controller(homeController::class)->group(function(){
    Route::get("","index");
});

Api::controller(apiController::class)->group(function(){
    Api::get("","index");
});

ErrorNavigate::error();
?>