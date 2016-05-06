<?php
class Db {
    private static $instance;
    private $conn;

    private function __construct() {}

    /**
     *
     * @return conn
     */
    private static function getInstance(){
        if (self::$instance == null){
            $className = __CLASS__;
            self::$instance = new $className;
        }

        return self::$instance;
    }

    public function __clone() {
        throw new Exception("Can't clone a singleton");
    }

    /**
     *
     * @return conn
     */
    private static function initConnection(){
        $db = self::getInstance();
        $db->conn = new mysqli(Config::$host, Config::$login, Config::$password, Config::$dbname);
        $db->conn->set_charset('utf8');
        return $db;
    }

    /**
     * @return mysqli
     */
    public static function getconn() {
        try {
            $db = self::initConnection();
            return $db->conn;
        } catch (Exception $ex) {
            echo "I was unable to open a connection to the database. " . $ex->getMessage();
            return null;
        }
    }


}