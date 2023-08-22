
<?php

class DBCOnnection {
    private static $pdo;
    public static function makeConnection () {
        try {
            self::$pdo = self::$pdo ? 
                :new PDO('mysql:host=localhost;dbname=basic-database','root' , '');
            return self::$pdo;
        } catch (PDOException $e){
            $e->getMessage();
        }
    }
}