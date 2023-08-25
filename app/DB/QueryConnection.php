<?php

namespace App\Db;

class QueryConnection 
{
    private static $pdo;
    private static $log;

    public static function make(\PDO $pdo , $log = null) 
    {
        self::$pdo = $pdo;
        self::$log = $log;
    }

    public static function getQuery ( $tabel_name , $method = null) 
    {   
        $query_str = "SELECT * FROM  $tabel_name " ;
        if(is_array($method)) {
            $query_str .= " WHERE " . implode(' ' , $method) ;
        }
        $query = self::execute($query_str  );
        return $query -> fetchAll(\PDO::FETCH_OBJ );
        
    }

    public static function insert ($tabel , $data) 
    {
        $data_key = array_keys($data);
        $data_key_st = implode(',' ,  $data_key);
        $strang = str_repeat("?," , count($data_key) - 1 ) . "?";
        $query = "INSERT INTO `{$tabel}` ({$data_key_st}) VALUE ({$strang})";
        self::execute($query , array_values($data));
    }

    public static function update ($tabel , $id  , $data)
    {
        $data_values = array_values($data);
        $data_key  = array_keys($data);
        $fildes = implode('= ? ,' , $data_key ) . " = ?";
        $query = "UPDATE `{$tabel}` SET $fildes  WHERE `id` = '{$id}'";
        self::execute($query , $data_values);
    }

    public static function delete ($tabel , $id  , $column = 'id' , $operater = '=') 
    {
        $query = "DELETE FROM `{$tabel}`WHERE  {$column}  {$operater} {$id}  ";
        self::execute($query);
    }

    private static function execute($query , $value = []) 
    {
        if(self::$log) {
            self::$log->info($query);
        } 
        $statment = self::$pdo -> prepare($query);
        $statment -> execute($value);
        return $statment;
    }
}