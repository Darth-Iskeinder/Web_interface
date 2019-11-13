<?php


class Db 
{
    //Database get Connection
    public static function getConnection() 
    {
        $paramsPath = ROOT.'/config/db_params.php';
        $params = include($paramsPath);
        
        
        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
        $db = new PDO($dsn, $params['user'], $params['pass']);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
              
        $db->exec("SET NAMES utf8");
        
        return $db;
        
    }
}
