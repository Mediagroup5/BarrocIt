<?php  
$page = "finance";
$id = "index";
include '../../../config/config.php';
include $rootlink. '/config/function.security.php';
require $rootlink. '/app/templates/header.php';
?>
  
        
  
    <h2 class="ha2">Klanten</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Klant nummer</th>
            <th>Bedrijfs naam</th>
            <th>Bankrekeningnummer</th>
            <th>Crediet</th>
            <th>Revenue amount</th>
            <th>Limiet</th>
            <th>Ledger account</th>
            <th>BKR</th>
            <th>Activated invoices</th>
            <th>Deactivated invoices</th>
            <th>Voorletter</th>
            <th>Voornaam</th>
            <th>Achternaam</th>
            <th>Facturen bekijken</th>
            <th>Klant gegevens</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT * FROM klantgegevens";
        if (! $query = mysqli_query($con, $sql)){
            echo "Kan gegevens niet uit database halen";
        }
        if (mysqli_num_rows($query) > 0 ){
            while ($row = mysqli_fetch_object($query)){
                echo "<tr>";
                echo "<td>" . $row->klant_nr . "</td>";
                echo "<td>" . $row->bedrijfs_naam . "</td>";
                echo "<td>" . $row->bankrekeningnummer . "</td>";
                $count = 0;
                $sqlfact = $con->query("SELECT * FROM factuur WHERE klant_nr = '".$row->klant_nr."'");
                while($factrow = mysqli_fetch_object($sqlfact))

                {
                   $count = $count + ($row->limiet - $factrow->bedrag);    
                }
                echo "<td>" . $count . "</td>";
                $count = 0;
                $sqlfact = $con->query("SELECT * FROM factuur WHERE klant_nr = '".$row->klant_nr."'");
                while($factrow = mysqli_fetch_object($sqlfact))
                {
                   $count = $count + $factrow->bedrag;    
                }
                $sqlfact = $con ->query("SELECT bedrag FROM factuur WHERE bedrag = limiet");
                echo "<td>" . $count . "</td>";
                echo "<td>" . $row->limiet . "</td>";
                echo "<td>" . $row->grootboekrekeningnummer . "</td>";
                echo "<td>" . $row->bkr . "</td>";
                echo "<td>" . $row->activated_facturen . "</td>";
                echo "<td>" . $row->deactivated_facturen . "</td>";
                echo "<td>" . $row->voorletter . "</td>";
                echo "<td>" . $row->voornaam . "</td>";
                echo "<td>" . $row->achternaam . "</td>";
                echo "<td><a href='facturen.php?id=". $row->klant_nr . "'> Factuur bekijk </a></td>";
                echo "<td><a href='klant.php?id=" . $row->klant_nr . "'> Klant gegevens </a></td>";
                echo "</tr>";
            }
        }





        // $sql = "SELECT bedrag FROM factuur";
        // if (! $query = mysqli_query($con, $sql)){

        // }
        // $bedrag = 3;

        // $inkomsten = ($row->bedrag + $row->bedrag);

        // var_dump($inkomsten);
        ?>
        </tbody>
    </table>
 <?php
include $rootlink. "/app/templates/footer.php";
?>
</div>
