<?php

class Portfolio
{
   private $port_id;
   private $gebruikers_id;
   private $type;
   private $omschrijving;
   private $aanv_datum;
   private $eind_datum;
   private $opmerking;
   
    public function __construct($id)
    {
       
	   $con = get_my_db();
       $sql = $con->query("SELECT * FROM portfolio WHERE port_id = '".$id."' LIMIT 1");
	   $row = mysqli_fetch_object($sql);
	   
	   $this->port_id = $row->port_id;
	   $this->gebruikers_id = $row->gebruikers_id;
	   $this->type = $row->type;
	   $this->omschrijving = $row->omschrijving;
	   $this->aanv_datum = $row->aanv_datum;
	   $this->eind_datum = $row->eind_datum;
	   $this->opmerking = $row->opmerking;
	}
	
	public static function FetchAllItems($id)
	{
	   $con = get_my_db();
       $sql = $con->query("SELECT port_id FROM portfolio WHERE gebruikers_id = '".$id."'");
	   $content = "";
	   while ($row = mysqli_fetch_object($sql))
	   {
			$port = new Portfolio($row->port_id);
            $content = $content." <tr>
                  <td>" . $port->getCustName($id) . "</td>
                  <td>" . $port->getType() . "</td>
                  <td>" . $port->getOmschr() . "</td>
                  <td>" . $port->getStartDatum() . "</td>
                  <td>" . $port->getEindDatum() . "</td>
                  <td>" . $port->getOpmerking() . "</td>
                  <td><a href='./edit.php?id=". $port->getId() . "'> Edit item </a></td>
                  </tr>";
             
		}	
		return $content;
	}
	//Update functie
	public function update($type,$desc,$startdate,$enddate,$comment)
	{
	    $con = get_my_db();
     	$con->query("UPDATE portfolio SET type = '".$type."', omschrijving = '".$desc."', aanv_datum = '".$startdate."', eind_datum = '".$enddate."', opmerking = '".$comment."' WHERE port_id = '".$id."' LIMIT 1") OR DIE(mysqli_error($con));
	}
	
	//Alle get functies
	public function getCustName($id)
	{
	   $con = get_my_db();
	   $sql = $con->query("SELECT username FROM gebruikers WHERE gebruikers_id = '".$id."' LIMIT 1") or die(mysqli_error($con));
	   if(mysqli_num_rows($sql) > 0)
	   {
	      $row = mysqli_fetch_object($sql);
	      return $row->username;
	   }
	   else
	   {
	       return "User not found!";
	   }
	}
	
	public function getId()
	{
	   return $this->port_id;
	}
	
	public function getGebr_id()
	{
	   return $this->gebruikers_id;
	}
	
	public function getType()
	{
	   return $this->type;
	}
	
	public function getOmschr()
	{
	   return $this->omschrijving;
	}
	
	public function getStartDatum()
	{
	   return $this->aanv_datum;
	}
	
	public function getEindDatum()
	{
	   return $this->eind_datum;
	}
	
	public function getOpmerking()
	{
	   return $this->opmerking;
	}
	

}
	
?>