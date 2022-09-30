<?php
class db
{
    public static $dbHost,$dbPassword,$dbUser,$dbConn;
    function __construct()
    {
        db::$dbHost="mysql:host=localhost;dbname=project";  
        db::$dbUser="root";
        db::$dbPassword=""; 
        db::$dbConn= new PDO(db::$dbHost,db::$dbUser,db::$dbPassword); 
    }
}
?>