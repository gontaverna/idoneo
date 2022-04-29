<?php

class Database
{
   private $host;
   private $db;
   private $user;
   private $pass;
   private $charset;

    public function __construct()
    {
        $this->host = DB_HOST;
        $this->db = DB_NAME;
        $this->user = DB_USER;
        $this->pass = DB_PASS;
        $this->charset = DB_CHARSET;

    }


    function connect()
    {
        try
        {
          
          //  $connection = "mysql:host=".$this->host.'";dbname="'.$this->db.'";dbuser="'.$this->user.';dbpass="'.$this->pass.'";charset="'.$this->charset.'"';
            $connection = "mysql:host=$this->host;dbname=$this->db";
            $options = [
                 PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                 PDO::ATTR_EMULATE_PREPARES => false,
            ];
            $pdo = new PDO($connection,$this->user, $this->pass, $options);
    
        
            return $pdo;
        }
        catch (PDOException $ex)
        {
            throw new Exception($ex->getMessage());
        }
        
    }
}
 

?>