<?php  
$page = "development";
$id = "project";
include '../../../config/config.php';
include $rootlink. '/config/function.security.php';
require $rootlink. '/app/templates/header.php';
?>
<style>
    .rood {
        background-color: indianred !important;
        color: lightgray !important;
}

</style>
   
    <h2>Projects</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Project Name</th>
            <th>Maintenance Contract</th>
            <th>Hardware</th>
            <th>Software</th>
            <th>Start date</th>
            <th>End Date</th>
            <th>Customer Number</th>
            <th>Appointments</th>
            <th>Active/non-active</th>
        </tr>
        </thead>
        <tbody>
        <?php
		if(isset($_GET['id']))
		{
	     	$id = Security($_GET['id']);
            $sql = "SELECT projectnr_id, project_naam, onderhoudscontract, hardware, software, begin_datum, eind_datum, klant_nr, afspraken, status_project FROM projecten WHERE klant_nr = '".$id."' LIMIT 1";
        }
		else
		{
		   $sql = "SELECT projectnr_id, project_naam, onderhoudscontract, hardware, software, begin_datum, eind_datum, klant_nr, afspraken, status_project FROM projecten";
		}
	   if (! $query = mysqli_query($con, $sql)){
            echo "Kan gegevens niet uit database halen";
        }
        if (mysqli_num_rows($query) > 0 ){
            while ($row = mysqli_fetch_object($query)){
                echo "<tr>";
				
				if($row->status_project == 0)
				{
				echo "<td class='rood'>" . $row->project_naam . "</td>";
                echo "<td class='rood'>" . $row->onderhoudscontract . "</td>";
                echo "<td class='rood'>" . $row->hardware . "</td>";
                echo "<td class='rood'>" . $row->software . "</td>";
                echo "<td class='rood'>" . $row->begin_datum . "</td>";
                echo "<td class='rood'>" . $row->eind_datum . "</td>";
                echo "<td class='rood'>" . $row->klant_nr . "</td>";
                echo "<td class='rood'>" . $row->afspraken . "</td>";
                echo "<td class='rood'>" . $row->status_project . "</td>";
                echo "<td class='rood'>Deactivated!</td>";
				}
				else
				{
                echo "<td>" . $row->project_naam . "</td>";
                echo "<td>" . $row->onderhoudscontract . "</td>";
                echo "<td>" . $row->hardware . "</td>";
                echo "<td>" . $row->software . "</td>";
                echo "<td>" . $row->begin_datum . "</td>";
                echo "<td>" . $row->eind_datum . "</td>";
                echo "<td>" . $row->klant_nr . "</td>";
                echo "<td>" . $row->afspraken . "</td>";
                echo "<td>" . $row->status_project . "</td>";
                echo "<td><a href='edit.php?id=". $row->projectnr_id . "'> Edit </a></td>";
				}
				
             //   echo "<td><a href='delete.php?id=" . $row->projectnr_id . "'> Verwijderen </a></td>";
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

   