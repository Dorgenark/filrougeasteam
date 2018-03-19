<?php
if(!isset($_SESSION))
{
    session_start();
}
if (empty($_SESSION['login'])){
  header('Location: ../admin.php');
}
class Database
  {
    private static  $dbHost = "localhost";
    private static  $dbUsername = "id5055971_root";
    private static  $dbUserPassword = "admin";
    private static  $dbName = "id5055971_filrougestream";

      private static $cont  = null;

      public function __construct() {
          die('Init function is not allowed');
      }

      public static function connect()
      {
         // One connection through whole application
         if ( null == self::$cont )
         {
          try
          {
            self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword);
          }
          catch(PDOException $e)
          {
            die($e->getMessage());
          }
         }
         return self::$cont;
      }

      public static function disconnect()
      {
          self::$cont = null;
      }
  }
?>
