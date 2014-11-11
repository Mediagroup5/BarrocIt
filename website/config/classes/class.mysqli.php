<?php
//Mysqli Class

Class DB
{

   private $host;
   private $username;
   private $password;
   private $database;
   public static $con;
   
    public function __construct($host,$username,$password,$database)
    {
	   $this->host = $host;
	   $this->username = $username;
	   $this->password = $password;
	   $this->database = $database;
	   
	   self::connect($this->host, $this->username, $this->password, $this->database);
	}
	
	public static function connect($host,$username,$password,$database)
	{
	    self::$con = new mysqli($host,$username,$password,$database);
	}
	
	public static function query($sql)
	{
	   return self::$con->query($sql); 
	}
	
	public static function fetch($sql)
	{
	   return mysqli_fetch_object($sql); 
	}
	
	public static function fetch_assoc($sql)
	{
	   return mysqli_fetch_object($sql); 
	}
	
	public static function num_rows($sql)
	{
	   return mysqli_num_rows($sql); 
	}
	
	public static function escape($sql)
	{
	   return mysqli_real_escape_string(self::$con, $sql); 
	}
	
	
	
}
	
?>