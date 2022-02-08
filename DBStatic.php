<?php


class DBStatic
{
    private static string $server;
    private static string $db;
    private static string $user;
    private static string $password;

    /**
     * DBStatic constructor.
     */
    public function __construct() {
        self::$server ='localhost';
        self::$db = 'bdd_cours';
        self::$user = 'root';
        self::$password = '';
    }

    /**
     * @return PDO|null
     */
    static function connect () : ?PDO {
      try {
          $conn = new PDO("mysql:host=".self::$server.";dbname=".self::$db.";charset=utf8", self::$user, self::$password);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          echo "Connection ok";
      }
      catch (PDOException $e){
          echo "Error : " . $e->getMessage();
          return null;
      }
      return $conn;
    }
}
