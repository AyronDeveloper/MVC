<?php 
class CnxPostgresql{
    public static function connect(){
        $pgsql=new PDO("pgsql:host=$_ENV[PGSQL_HOST];port=$_ENV[PGSQL_PORT];dbname=$_ENV[PGSQL_DBNAME];",$_ENV["PGSQL_USER"], $_ENV["PGSQL_PASSWORD"]);
        $pgsql->exec("SET NAMES 'utf8'");
        return $pgsql;
    }
}
?>