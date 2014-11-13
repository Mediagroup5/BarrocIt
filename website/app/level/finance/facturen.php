<?php  
$page = "finance";
$id = "facturen";
include '../../../config/config.php';
include $rootlink. '/config/function.security.php';
require $rootlink. '/app/templates/header.php';

//status check
if(isset($_GET['status']))
{
   if($_GET['status'] == "deactivated")
   {
      //laat alle deactivated invoices zien
      $active = 0;
   }
   elseif($_GET['status'] == "activated")
   {
      //laat alle activated invoices zien
      $active = 1;
   }
   else
   {
      //laat alle invoices zien
      $active = 2;
   }
}
else
{
   $active = 2;
}
?>

<style>
    .rood {
        background-color: indianred !important;
        color: lightgray !important;
}

</style>

<div class="container">
    <h2 class="ha2">Invoices</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Customer number</th>
            <th>Invoice number</th>
            <th>Amount</th>
            <th>Project number</th>
            <th>VAT(incl)</th>
            <th>Start Date</th>
            <th>Last Date</th>
            <th>Quantity</th>
            <th>Description</th>
            <th>Number</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Remove</th>
        </tr>
        </thead>
        <tbody>
        <?php
		// word er een id meegegeven? zoja dan laat hij de facturen zien van een specifieke klant
        if(isset($_GET['id']))
        {
        $sql = "SELECT * FROM factuur WHERE klant_nr = '".Security($_GET['id'])."'";
        }
        else
        {
         $sql = "SELECT * FROM factuur";
        }
		//voerd update query uit
        if (! $query = DB::query($sql)){
            echo "Kan gegevens niet uit database halen";
        }
        //aanal rows hoger dan 0?
        if (DB::num_rows($query) > 0 ){
            while ($row = DB::fetch($query)){
                echo "<tr>";
     //laat alle invoices zien
	if($active == 2)
	{ 
	      //als de factuur_tot tijd lager is dan de tijd van nu word de invoice rood
          if($row->factuur_tot < time())
                {
                echo "<td class='rood'>" . $row->klant_nr . "</td>";
                echo "<td class='rood'>" . $row->factuur_nr . "</td>";
                echo "<td class='rood'>" . $row->bedrag . "</td>";
                echo "<td class='rood'>" . $row->project_nr . "</td>";
                $BTW = 0;
                $sqlfact = DB::query("SELECT * FROM factuur WHERE factuur_nr = '".$row->factuur_nr."'");
                while($factrow = DB::fetch($sqlfact))
                {
                   $BTW = $BTW + $factrow->bedrag /100 * 121;    
                }
                echo "<td class='rood'>" . $BTW . "</td>";
                echo "<td class='rood'>" . date("Y-m-d",$row->factuur_begin)  . "</td>";
                echo "<td class='rood'>" . date("Y-m-d",$row->factuur_tot) . "</td>";
                echo "<td class='rood'>" . $row->hoeveelheid . "</td>";
                echo "<td class='rood'>" . $row->beschrijving . "</td>";
                echo "<td class='rood'>" . $row->aantal . "</td>";
                echo "<td class='rood'>Suspended</td>";
                echo "<td class='rood'><a href='edit.php?id=". $row->factuur_nr . "'>  </a></td>";
                echo "<td class='rood'><a href='delete.php?id=" . $row->factuur_nr . "'><div class='btn btn-primary'>Delete</div></a></td>";
				
                }
                else
                {
				//anders is de invoice niet verlopen. 
                echo "<td>" . $row->klant_nr . "</td>";
                echo "<td>" . $row->factuur_nr . "</td>";
                echo "<td>" . $row->bedrag . "</td>";
                echo "<td>" . $row->project_nr . "</td>";
                $BTW = 0;
				//reken de BTW/VAT uit
                $sqlfact = DB::query("SELECT * FROM factuur WHERE factuur_nr = '".$row->factuur_nr."'");
                while($factrow = DB::fetch($sqlfact))
                {
                   $BTW = $BTW + $factrow->bedrag /100 * 121;   
                }
                echo "<td>" . $BTW . "</td>";
                echo "<td>" . date("Y-m-d",$row->factuur_begin) . "</td>";
                echo "<td>" . date("Y-m-d",$row->factuur_tot) . "</td>";
                echo "<td>" . $row->hoeveelheid . "</td>";
                echo "<td>" . $row->beschrijving . "</td>";
                echo "<td>" . $row->aantal . "</td>";
                echo "<td>Active</td>";
                echo '<td><a href="edit.php?id='.$row->factuur_nr.'"><div class="btn btn-primary">Edit</div></a></td>';
                echo '<td><a href="delete.php?id='.$row->factuur_nr.'"><div class="btn btn-primary">Delete</div></a></td>';
            

                }


                echo "</tr>";
    }
    //laat alle activated invoices zien
	elseif($active == 1)
	{
	  //is de factuur tot hoger dan de tijd? dan is de invoice niet verlopen
	  if($row->factuur_tot > time())
                {
               
				
                echo "<td>" . $row->klant_nr . "</td>";
                echo "<td>" . $row->factuur_nr . "</td>";
                echo "<td>" . $row->bedrag . "</td>";
                echo "<td>" . $row->project_nr . "</td>";
                $BTW = 0;
                $sqlfact = DB::query("SELECT * FROM factuur WHERE factuur_nr = '".$row->factuur_nr."'");
                while($factrow = DB::fetch($sqlfact))
                {
                   $BTW = $BTW + $factrow->bedrag /100 * 121;   
                }
                echo "<td>" . $BTW . "</td>";
                echo "<td>" . $row->factuur_begin . "</td>";
                echo "<td>" . $row->factuur_tot . "</td>";
                echo "<td>" . $row->hoeveelheid . "</td>";
                echo "<td>" . $row->beschrijving . "</td>";
                echo "<td>" . $row->aantal . "</td>";
                echo "<td>" . $row->status . "</td>";
                echo '<td><a href="edit.php?id='.$row->klant_nr.'"><div class="btn btn-primary">Edit</div></a></td>';
                echo '<td><a href="delete.php?id='.$row->klant_nr.'"><div class="btn btn-primary">Delete</div></a></td>';
                }


                echo "</tr>";
	
	}
	//laat alle deactived invoices zien
	elseif($active == 0)
	{
	  //als de factuur tot tijd lager is de de daadwerkelijke tijd dan is de onvoice verlopen
	  if($row->factuur_tot < time())
                {
               
				
                echo "<td class='rood'>" . $row->klant_nr . "</td>";
                echo "<td class='rood'>" . $row->factuur_nr . "</td>";
                echo "<td class='rood'>" . $row->bedrag . "</td>";
                echo "<td class='rood'>" . $row->project_nr . "</td>";
                $BTW = 0;
				//factuur bedrag berekenen
                $sqlfact = DB::query("SELECT * FROM factuur WHERE factuur_nr = '".$row->factuur_nr."'");
                while($factrow = DB::fetch($sqlfact))
                {
                   $BTW = $BTW + $factrow->bedrag /100 * 121;    
                }
                echo "<td class='rood'>" . $BTW . "</td>";
                echo "<td class='rood'>" . $row->factuur_begin . "</td>";
                echo "<td class='rood'>" . $row->factuur_tot . "</td>";
                echo "<td class='rood'>" . $row->hoeveelheid . "</td>";
                echo "<td class='rood'>" . $row->beschrijving . "</td>";
                echo "<td class='rood'>" . $row->aantal . "</td>";
                echo "<td class='rood'>" . $row->status . "</td>";
                echo '<td><a href="edit.php?id='.$row->klant_nr.'"><div class="btn btn-primary"></div></a></td>';
                echo '<td><a href="delete.php?id='.$row->klant_nr.'"><div class="btn btn-primary"><div class="btn btn-primary">Delete</div></div></a></td>';
				

                }


                echo "</tr>";
	
	}
   

   }
	
}






        ?>
        </tbody>
    </table>
  
   <?php
include $rootlink. "/app/templates/footer.php";
?>
</div>
