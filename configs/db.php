<?php 
class Database{
    public static function connect(){
        $db=new PDO("mysql:host=$_ENV[DB_HOST]; dbname=$_ENV[DB_NAME]; ",$_ENV["DB_USER"], $_ENV["DB_PASSWORD"]);
        $db->exec("SET NAMES 'utf8'");
        return $db;
    }
}
?>