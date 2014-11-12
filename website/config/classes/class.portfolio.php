<?php
// Portfolio class voor de portfolio pagina
class Portfolio
{
   private $port_id;
   private $gebruikers_id;
   private $type;
   private $omschrijving;
   private $aanv_datum;
   private $eind_datum;
   private $opmerking;
   
   // contructor
    public function __construct($id)
    {
       
	   $sql = DB::query("SELECT * FROM portfolio WHERE port_id = '".$id."' LIMIT 1");
	   $row = DB::fetch($sql);
	   
	   $this->port_id = $row->port_id;
	   $this->gebruikers_id = $row->gebruikers_id;
	   $this->type = $row->type;
	   $this->omschrijving = $row->omschrijving;
	   $this->aanv_datum = $row->aanv_datum;
	   $this->eind_datum = $row->eind_datum;
	   $this->opmerking = $row->opmerking;
	}
	// haalt alle portfolio items op van een bepaalde gebruiker.
	public static function FetchAllItems($id)
	{
	    $sql = DB::query("SELECT port_id FROM portfolio WHERE gebruikers_id = '".$id."'");
	   $content = "";
	   while ($row = DB::fetch($sql))
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
	//Update een item
	public function update($type,$desc,$startdate,$enddate,$comment)
	{
     	DB::query("UPDATE portfolio SET type = '".$type."', omschrijving = '".$desc."', aanv_datum = '".$startdate."', eind_datum = '".$enddate."', opmerking = '".$comment."' WHERE port_id = '".$id."' LIMIT 1") OR DIE(mysqli_error($con));
	}
	
	//Functie voor ophalen customer name
	public function getCustName($id)
	{
	   $sql = DB::query("SELECT username FROM gebruikers WHERE gebruikers_id = '".$id."' LIMIT 1") or die(mysqli_error($con));
	   if(DB::num_rows($sql) > 0)
	   {
	      $row = DB::fetch($sql);
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