<?php

class DbConfig {

    private function __construct() {
        
    }

    /**
     * 
     * @return \PDO
     */
    public static function getDB() {
        $db = new PDO('mysql:host=localhost;dbname=trading;charset=utf8', 'root', '') or die(mysql_error());
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }

    public static function queryForObject($sql, $array) {
        $returnCode = 0;
        try {
            $statement = self::getDB()->prepare($sql);
            $statement->execute($array);
        } catch (PDOException $Exception) {
            $returnCode = 1;
        }
        return $returnCode;
    }

    public static function query($sql) {
        $statement = self::getDB()->prepare($sql);
        $statement->execute();
        return $statement;
    }

    public static function readQuery($sql, $params, $class) {
        $stmt = self::getDB()->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, $class);
        $stmt->execute($params);
        return $stmt->fetch();
    }

    public static function readAllQuery($sql, $params, $class) {
        //$stmt = self::getDB()->query($sql);
        $stmt = self::getDB()->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, $class);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }
}
