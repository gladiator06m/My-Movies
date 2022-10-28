<?php

class Database
{
    private static $dbHost = "localhost";
    private static $dbName = "mymovies";
    private static $dbUsername = "root";
    private static $dbUserpassword = "";
    
    private static $connection = null;
    
    public static function connect()
    {
        if(self::$connection == null)
        {
            try
            {
              self::$connection = new PDO ("mysql:host=" . self::$dbHost . ";dbname=" . self::$dbName , self::$dbUsername, self::$dbUserpassword);
            }
            catch(PDOException $e)
            {
                die($e->getMessage());
            }
        }
        return self::$connection;
    }
    
    public static function disconnect()
    {
        self::$connection = null;
    }

}


//Function anti-attaque XSS
function checkInput($data) 
{
  $data = trim($data); // Supprime les espaces (ou d'autres caractères) en début et fin de chaîne
  $data = stripslashes($data); // Supprime les antislashs d'une chaîne
  $data = htmlspecialchars($data); // Convertit les caractères spéciaux en entités HTML
  return $data;
}
?>
