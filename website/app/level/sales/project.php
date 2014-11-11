<?php  
$page = "sales";
$id = "project";
include '../../../config/config.php';
include $rootlink. '/config/function.security.php';
require $rootlink. '/app/templates/header.php';

if(!isset($_GET['id']))
{
    die("Geen Id ingegeven.");
}
else
{
    $id = Security($_GET['id']);
}

if(isset($_GET['actie']) && isset($_GET['fact_nr']))
{
    $factid = Security($_GET['fact_nr']);
    if($_GET['actie'] == "activeer")
    {
        $con->query("UPDATE projecten SET status_project = '1' WHERE projectnr_id = '".$factid."' LIMIT 1");
    }
	elseif($_GET['actie'] == "deactiveer")
	{
	    $con->query("UPDATE projecten SET status_project = '0' WHERE projectnr_id = '".$factid."' LIMIT 1");
    }
}
?>

   
    <h2 class="ha2">Projecten</h2>
    <table class="table table-striped">
        <thead>
    
        <tr>
            <th>Project Name</th>
            <th>Maintenance Contract</th>
            <th>Hardware</th>
            <th>Software</th>
            <th>Start date</th>
            <th>End Date</th>
            <th>Customer NUmber</th>
            <th>Appointments</th>
          	<th>Active/non-active</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT projectnr_id, project_naam, onderhoudscontract, hardware, software, begin_datum, eind_datum, klant_nr, afspraken, status_project FROM projecten WHERE klant_nr = '".$id."'";
     
		if (! $query = DB::query($sql)){
            echo "Kan gegevens niet uit database halen";
        }
        if (DB::num_rows($query) > 0 ){
            while ($row = DB::fetch($query)){
                echo "<tr>";
                echo "<td>" . $row->project_naam . "</td>";
                echo "<td>" . $row->onderhoudscontract . "</td>";
                echo "<td>" . $row->hardware . "</td>";
                echo "<td>" . $row->software . "</td>";
                echo "<td>" . $row->begin_datum . "</td>";
                echo "<td>" . $row->eind_datum . "</td>";
                echo "<td>" . $row->klant_nr . "</td>";
                echo '<td> <a href="./afspraak.php?id='.$id.'&actie=activeer&fact_nr='.$row->projectnr_id.'"><div class="btn btn-primary">Appointments</div></a></td>';
				
				if($row->status_project == 0)
				{
                    echo '<td> <a href="./project.php?id='.$id.'&actie=activeer&fact_nr='.$row->projectnr_id.'"><div class="btn btn-primary">Activate</div></a></td>';
			    }
				elseif($row->status_project == 1)
				{
			        echo '<td> <a href="./project.php?id='.$id.'&actie=deactiveer&fact_nr='.$row->projectnr_id.'"><div class="btn btn-primary">Deactivate</div></a></td>';
				}
				
						
                echo "</tr>";
            }
        }
        ?>
        </tbody>

    </table>


    <?php
include $rootlink. "/app/templates/footer.php";
    ?>
</div>

   