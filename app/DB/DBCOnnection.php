<?php
namespace App\Db;

class DBConnection 
{
    private static $pdo;
    public static function makeConnection ($array) 
    {
        try 
        {
            self::$pdo = self::$pdo ? 
                :new \PDO("mysql:host={$array['host']};dbname={$array['name']}",$array['user'] , $array['password']);
            return self::$pdo;
        } catch (\PDOException $e)
        {
            $e->getMessage();
        }
    }
}