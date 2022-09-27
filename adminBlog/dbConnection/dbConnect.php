<?php
class db
{
    public static $dbConn,$dbHost,$dbPassword,$dbUser;
    function __construct()
    {
        db::$dbHost="mysql:host=localhost;dbname=project1";  
        db::$dbUser="root";
        db::$dbPassword=""; 
        db::$dbConn= new PDO(db::$dbHost,db::$dbUser,db::$dbPassword); 
    }
}
?>