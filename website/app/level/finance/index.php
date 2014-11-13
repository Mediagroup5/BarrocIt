<?php  
$page = "finance";
$id = "index";
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

    <h2 class="ha2">Customers</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Customer Name</th>
            <th>Company Name</th>
            <th>Bank Account</th>
            <th>Crediet</th>
            <th>Revenue amount</th>
            <th>Limiet</th>
            <th>Ledger account</th>
            <th>BKR(Credit Office Registration)</th>
            <th>Activated invoices</th>
            <th>Deactivated invoices</th>
            <th>Initials</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Invoices</th>
            <th>Customer Data</th>
        </tr>
        </thead>
        <tbody>
        <?php
		//word er een id meegegeven via de url of niet?
        if(isset($_GET['id']))
        {
        $sql = "SELECT * FROM klantgegevens WHERE klant_nr = '".Security($_GET['id'])."'";
        }
        else
        {
         $sql = "SELECT * FROM klantgegevens";
      

        }
        if (! $query = DB::query($sql)){
            echo "Kan gegevens niet uit database halen";
        }
      
        if (DB::num_rows($query) > 0 ){
            while ($row = DB::fetch($query)){
                echo "<tr>";

        
          if($row->bkr == 'No')

                {
                echo "<td class='rood'>" . $row->klant_nr . "</td>";
                echo "<td class='rood'>" . $row->bedrijfs_naam . "</td>";
                echo "<td class='rood'>" . $row->bankrekeningnummer . "</td>";
                $count = 0;
				//haal de facturen op voor berekeningen
                $sqlfact = DB::query("SELECT * FROM factuur WHERE klant_nr = '".$row->klant_nr."'");
				//reken limiet uit
                while($factrow = DB::fetch($sqlfact))
                {
                   $count = $count + ($factrow->bedrag/100 * 121 -$row->limiet);    
                }
                echo "<td class='rood'>" . $count . "</td>";
                $count = 0;
                $sqlfact = DB::query("SELECT * FROM factuur WHERE klant_nr = '".$row->klant_nr."'");
                while($factrow = DB::fetch($sqlfact))

                {
				//reken bedrag uit
                   $count = $count + $factrow->bedrag/100 * 121;    
                    
                }

                echo "<td class='rood'>" . $count . "</td>";
                echo "<td class='rood'>" . $row->limiet . "</td>";
                echo "<td class='rood'>" . $row->grootboekrekeningnummer . "</td>";
                echo "<td class='rood'>" . $row->bkr . "</td>";


                echo "<td class='rood'><a href='facturen.php?id=". $row->klant_nr . "'> </a></td>";
                echo "<td class='rood'><a href='facturen.php?id=". $row->klant_nr . "'>  </a></td>";
                echo "<td class='rood'>" . $row->voorletters . "</td>";
                echo "<td class='rood'>" . $row->voornaam . "</td>";
                echo "<td class='rood'>". $row->achternaam . "</td>";
                echo "<td class='rood'><a href='facturen.php?id=". $row->klant_nr . "'>  </a></td>";
                echo "<td class='rood'><a href='klant.php?id=" . $row->klant_nr . "'> </a></td>";
                

                }
                else
                {
              
                


                echo "<td>" . $row->klant_nr . "</td>";
                echo "<td>" . $row->bedrijfs_naam . "</td>";
                echo "<td>" . $row->bankrekeningnummer . "</td>";
                $count = 0;
                $sqlfact = DB::query("SELECT * FROM factuur WHERE klant_nr = '".$row->klant_nr."'");
                while($factrow = DB::fetch($sqlfact))

                {
                   $count = $count + ($factrow->bedrag/100 * 121 -$row->limiet);    
                }
                echo "<td>" . $count . "</td>";
                $count = 0;
                $sqlfact = DB::query("SELECT * FROM factuur WHERE klant_nr = '".$row->klant_nr."'");
                while($factrow = DB::fetch($sqlfact))

                {
                   $count = $count + $factrow->bedrag /100 * 121;    
                    
                }

                echo "<td>" . $count . "</td>";
                echo "<td>" . $row->limiet . "</td>";
                echo "<td>" . $row->grootboekrekeningnummer . "</td>";
                echo "<td>" . $row->bkr . "</td>";
                echo '<td><a href="facturen.php?status=activated&id='.$row->klant_nr.'"><div class="btn btn-primary">Activated</div></a></td>';
                echo '<td><a href="facturen.php?status=deactivated&id='.$row->klant_nr.'"><div class="btn btn-primary">Deactivated</div></a></td>';
                echo "<td>" . $row->voorletters . "</td>";
                echo "<td>" . $row->voornaam . "</td>";
                echo "<td>". $row->achternaam . "</td>";
                echo '<td><a href="facturen.php?id='.$row->klant_nr.'"><div class="btn btn-primary">See Invoices</div></a></td>';
                echo '<td><a href="klant.php?id='.$row->klant_nr.'"><div class="btn btn-primary">Customer Data</div></a></td>';
                

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
