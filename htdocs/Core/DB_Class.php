<?php
class DB
{
    private static $db = null;
    public static function getConnection()
    {
        if(is_null(self::$db)) 
            self::$db = new \PDO("mysql:host=localhost;dbname=swjb;charset=utf8mb4", "root", '');
        return self::$db;
    }

    public static function execute($sql, $data = [])
    {
        $q = self::getConnection()->prepare($sql);
        return $q->execute($data);
    }
    public static function fetch($sql, $data = [], $options = \PDO::FETCH_OBJ)
    {
        $q = self::getConnection()->prepare($sql);
        $q->execute($data);
        return $q->fetch($options);
    }
    public static function fetchAll($sql, $data = [], $options = \PDO::FETCH_OBJ)
    {
        $q = self::getConnection()->prepare($sql);
        $q->execute($data);
        return $q->fetchAll($options);
    }
    
    public static function lastInsertId()
    {
        return self::getConnection()->lastInsertId();
    }
    public static function find($table, $id) {
        return self::fetch("SELECT * FROM `$table` WHERE id = ?", [$id]);
    }
    public static function who($user_id) {
        return self::fetch("SELECT * FROM users WHERE user_id = ?", [$user_id]);
    }
    
}
