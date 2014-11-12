<?php
//Mysqli Class - verbinding met database

Class DB
{
   //variables
   private $host;
   private $username;
   private $password;
   private $database;
   public static $con;
   
   // De contructor
    public function __construct($host,$username,$password,$database)
    {
	   $this->host = $host;
	   $this->username = $username;
	   $this->password = $password;
	   $this->database = $database;
	   
	   self::connect($this->host, $this->username, $this->password, $this->database);
	}
	
	//Mysqli Verbindings functie
	public static function connect($host,$username,$password,$database)
	{
	    self::$con = new mysqli($host,$username,$password,$database);
	}
	
	// Functie om een Query uit te voeren
	public static function query($sql)
	{
	   return self::$con->query($sql); 
	}
	//Fetch de sql result => returned een object
	public static function fetch($sql)
	{
	   return mysqli_fetch_object($sql); 
	}
	//Fetch de sql result => returned een array
	public static function fetch_assoc($sql)
	{
	   return mysqli_fetch_assoc($sql); 
	}
	//Tellen van alle rows
	public static function num_rows($sql)
	{
	   return mysqli_num_rows($sql); 
	}
	//Post en GET beveiligings functie
	public static function escape($sql)
	{
	   return mysqli_real_escape_string(self::$con, $sql); 
	}
	
	
	
}
	
?>