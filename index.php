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
require_once("./rutas.php");
require_once("./configs/db.php");
require_once("./helpers/parameters.php");
require_once("./helpers/utils.php");
require_once("./helpers/validation.php");



//nombre de la ruta / controller / metodo
$rutas=[
    ["","home", "index"]
];

rutas($url_next,$rutas);
?>