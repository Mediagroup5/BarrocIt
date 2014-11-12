<?php
//USERS CLASS by Jordy
//Haalt alle Data uit een sessie
//Je kan nu gebruik maken van GetUserData("id");
//Maar je kunt hier natuurlijk ook de andere values mee ophalen.
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
//UserData class
Class UserData
{

   private $gebruikers_id;
   private $username;
   private $gebruikersrol;
   private $actief;
   //contructor
    public function __construct($id)
    {
       
       $sql = DB::query("SELECT * FROM gebruikers WHERE gebruikers_id = '".$id."' LIMIT 1");
	   $row = DB::fetch($sql);
	   
	   $this->gebruikers_id = $row->gebruikers_id;
	   $this->username = $row->username;
	   $this->gebruikersrol = $row->gebruikersrol;
	   $this->actief = $row->actief;
	}
	// haalt alle gebruikers op
	public static function FetchAllItems()
	{
       $sql = DB::query("SELECT gebruikers_id FROM gebruikers");
	   $content = "";
	   while ($row = DB::fetch($sql))
	   {
			$user = new UserData($row->gebruikers_id);
			switch($user->getRole())
			{
			   case 1:
			   $rol = "Finance";
			   break;
			   case 2:
			   $rol = "Development";
			   break;
			   case 3:
			   $rol = "Sales";
			   break;
			   case 4:
			   $rol = "Admin";
			   break;
			   
			   Default:
			   $rol = "No role found!";
			   break;
			   
			}
			if($user->getStatus() == 1)
			{
			$status = "Active";
			}
			else
			{
			$status = "Non-active";
			}
            $content = $content." <tr>
                  <td>" . $user->getUserId() . "</td>
                  <td>" . $user->getUsername() . "</td>
                  <td>" . $rol . "</td>
                  <td>" . $status . "</td>
                  <td><a href='./port_list.php?id=". $user->getUserId() . "'> Show portfolio items </a></td>
                  </tr>";
             
		}	
		return $content;
	}
	// Functies voor het ophalen van gegevens.
	public function getUserId()
	{
	   return $this->gebruikers_id;
	}
	public function getUsername()
	{
	   return $this->username;
	}
	public function getStatus()
	{
	   return $this->actief;
	}
	public function getRole()
	{
	   return $this->gebruikersrol;
	}
}
	
?>