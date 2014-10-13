<?php
//USERS CLASS by Jordy
//Haalt alle UserData uit een sessie


class User
{
	
	private static $superuser;
	
	public static function GetUserData($value)
	{
	
		if(isset($_SESSION['name'])) {
			static::$superuser = $_SESSION['name'];
		
			return self::$superuser->$value;
		}
		else
		{
		return "Niet gevonden";
		}
		
		
	
	}
	}
	
?>