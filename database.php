<?php
class Database
{
    private static $dbName = 'sisacademico' ;
    private static $dbHost = '127.5.113.2:3306' ;
    private static $dbUsername = 'adminF9VZqXQ';
    private static $dbUserPassword = 'JXzTDhDU7X4_';
     
    private static $cont  = null;
     
    public function __construct() {
        die('Função Init não foi executada corretamente');
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
