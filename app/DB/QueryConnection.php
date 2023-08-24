<?php

namespace App\Db;

class QueryConnection 
{
    private static $pdo;

    public static function make(\PDO $pdo) 
    {
        self::$pdo = $pdo;
    }

    public static function getQuery ( $tabel_name , $method = null) 
    {   
        $query_str = "SELECT * FROM  $tabel_name " ;
        if(is_array($method)) {
            $query_str .= " WHERE " . implode(' ' , $method) ;
        }
        $query = self::$pdo -> prepare($query_str );
        $query -> execute();
        return $query -> fetchAll(\PDO::FETCH_OBJ );
    }

    public static function insert ($tabel , $data) 
    {
        $data_key = array_keys($data);
        $data_key_st = implode(',' ,  $data_key);
        $strang = str_repeat("?," , count($data_key) - 1 ) . "?";
        $query = "INSERT INTO `{$tabel}` ({$data_key_st}) VALUE ({$strang})";
        $statment = self::$pdo -> prepare($query);
        $statment -> execute(array_values($data));
    }

    public static function update ($tabel , $id  , $data)
    {
        $data_values = array_values($data);
        $data_key  = array_keys($data);
        $fildes = implode('= ? ,' , $data_key ) . " = ?";
        $query = "UPDATE `{$tabel}` SET $fildes  WHERE `id` = '{$id}'";
        $statment = self::$pdo -> prepare($query);
        $statment -> execute($data_values);
    }

    public static function delete ($tabel , $id  , $column = 'id' , $operater = '=') 
    {
        $query = "DELETE FROM `{$tabel}`WHERE  {$column}  {$operater} {$id}  ";
        $statment = self::$pdo -> prepare($query);
        $statment -> execute();
    }
}