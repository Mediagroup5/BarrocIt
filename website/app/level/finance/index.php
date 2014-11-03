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
            <th>BKR</th>
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
        if(isset($_GET['id']))
        {
        $sql = "SELECT * FROM klantgegevens WHERE klant_nr = '".Security($_GET['id'])."'";
        }
        else
        {
         $sql = "SELECT * FROM klantgegevens";
      

        }
        if (! $query = mysqli_query($con, $sql)){
            echo "Kan gegevens niet uit database halen";
        }
      
        if (mysqli_num_rows($query) > 0 ){
            while ($row = mysqli_fetch_object($query)){
                echo "<tr>";

        
          if($row->bkr == 'nee')

                {
                echo "<td class='rood'>" . $row->klant_nr . "</td>";
                echo "<td class='rood'>" . $row->bedrijfs_naam . "</td>";
                echo "<td class='rood'>" . $row->bankrekeningnummer . "</td>";
                $count = 0;
                $sqlfact = $con->query("SELECT * FROM factuur WHERE klant_nr = '".$row->klant_nr."'");
                while($factrow = mysqli_fetch_object($sqlfact))

                {
                   $count = $count + ($factrow->bedrag -$row->limiet);    
                }
                echo "<td class='rood'>" . $count . "</td>";
                $count = 0;
                $sqlfact = $con->query("SELECT * FROM factuur WHERE klant_nr = '".$row->klant_nr."'");
                while($factrow = mysqli_fetch_object($sqlfact))

                {
                   $count = $count + $factrow->bedrag;    
                }

                echo "<td class='rood'>" . $count . "</td>";
                echo "<td class='rood'>" . $row->limiet . "</td>";
                echo "<td class='rood'>" . $row->grootboekrekeningnummer . "</td>";
                echo "<td class='rood'>" . $row->bkr . "</td>";
                echo "<td class='rood'><a href='facturen.php?id=". $row->klant_nr . "'> Activated Invoices </a></td>";
                echo "<td class='rood'><a href='facturen.php?id=". $row->klant_nr . "'> Deactivated Invoices </a></td>";
                echo "<td class='rood'>" . $row->voorletters . "</td>";
                echo "<td class='rood'>" . $row->voornaam . "</td>";
                echo "<td class='rood'>". $row->achternaam . "</td>";
                echo "<td class='rood'><a href='facturen.php?id=". $row->klant_nr . "'> See Invoices </a></td>";
                echo "<td class='rood'><a href='klant.php?id=" . $row->klant_nr . "'> Customer Data </a></td>";
                

                }
                else
                {
              
                


                echo "<td>" . $row->klant_nr . "</td>";
                echo "<td>" . $row->bedrijfs_naam . "</td>";
                echo "<td>" . $row->bankrekeningnummer . "</td>";
                $count = 0;
                $sqlfact = $con->query("SELECT * FROM factuur WHERE klant_nr = '".$row->klant_nr."'");
                while($factrow = mysqli_fetch_object($sqlfact))

                {
                   $count = $count + ($factrow->bedrag -$row->limiet);    
                }
                echo "<td>" . $count . "</td>";
                $count = 0;
                $sqlfact = $con->query("SELECT * FROM factuur WHERE klant_nr = '".$row->klant_nr."'");
                while($factrow = mysqli_fetch_object($sqlfact))

                {
                   $count = $count + $factrow->bedrag;    
                }

                echo "<td>" . $count . "</td>";
                echo "<td>" . $row->limiet . "</td>";
                echo "<td>" . $row->grootboekrekeningnummer . "</td>";
                echo "<td>" . $row->bkr . "</td>";
                echo "<td><a href='facturen.php?id=". $row->klant_nr . "'> Activated Invoices </a></td>";
                echo "<td><a href='facturen.php?id=". $row->klant_nr . "'> Deactivated Invoices </a></td>";
                echo "<td>" . $row->voorletters . "</td>";
                echo "<td>" . $row->voornaam . "</td>";
                echo "<td>". $row->achternaam . "</td>";
                echo "<td><a href='facturen.php?id=". $row->klant_nr . "'> See Invoices </a></td>";
                echo "<td><a href='klant.php?id=" . $row->klant_nr . "'> Customer Data </a></td>";

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
