<?php
$page = "development";
$id = "index";
include '../../../config/config.php';
include $rootlink. '/config/function.security.php';
require $rootlink. '/app/templates/header.php';
?>
    <h2 class="ha2">Customer data</h2>
    <table class="table table-condensed">
        <thead>
        <tr>
            <th>Customer number</th>
            <th>Company name</th>
            <th>Initials</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Address</th>
            <th>Address 2</th>
            <th>Zip code</th>
            <th>Zip code 2</th>
            <th>Residence</th>
            <th>Residence 2</th>
            <th>Phone number</th>
            <th>Phone number 2</th>
            <th>Fax number</th>
            <th>Email</th>
            <th>Offer numbers</th>
            <th>Income amount</th>
            <th>Offer Status</th>
            <th>Exception</th>
            <th>Start date</th>
            <th>Appointments</th>
            <th>Intern contact person</th>
            <th>Bank account number</th>
            <th>Credit</th>
            <th>Balance</th>
            <th>Number of invoices</th>
            <th>Sales amount</th>
            <th>Limit</th>
            <th>Ledger account</th>
            <th>VAT code</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if(!isset($_GET['id']))
        {
            die("Geen Id ingegeven.");
        }
        else
        {
            $id = Security($_GET['id']);
        }
        $sql = "SELECT * FROM klantgegevens WHERE klant_nr = '$id'";
        if (! $query = mysqli_query($con, $sql)){
            echo "Failed to get customer data from database...";
        }
        if (mysqli_num_rows($query) > 0 ){
            while ($row = mysqli_fetch_object($query)){
                echo "<tr>";
                echo "<td>" . $row->klant_nr . "</td>";
                echo "<td>" . $row->bedrijfs_naam . "</td>";
                echo "<td>" . $row->voorletters . "</td>";
                echo "<td>" . $row->voornaam . "</td>";
                echo "<td>" . $row->achternaam . "</td>";
                echo "<td>" . $row->adres . "</td>";
                echo "<td>" . $row->adres2 . "</td>";
                echo "<td>" . $row->postcode . "</td>";
                echo "<td>" . $row->postcode2 . "</td>";
                echo "<td>" . $row->residentie . "</td>";
                echo "<td>" . $row->residentie2 . "</td>";
                echo "<td>" . $row->telefoon_nr . "</td>";
                echo "<td>" . $row->telefoonnummer2 . "</td>";
                echo "<td>" . $row->fax_nr . "</td>";
                echo "<td>" . $row->email . "</td>";
                echo "<td>" . $row->offer_numbers . "</td>";
                echo "<td>" . $row->inkomsten . "</td>";
                echo "<td>" . $row->offer_status . "</td>";
                echo "<td>" . $row->prospect . "</td>";
                echo "<td>" . $row->date_action . "</td>";
               //echo "<td>" . $row->last_contact_date . "</td>";
                //echo "<td>" . $row->next_action . "</td>";
               // echo "<td>" . $row->sale_percentage . "</td>";
                //echo "<td>" . $row->creditworthy . "</td>";
                //echo "<td>" . $row->maintenance_contract . "</td>";
                //echo "<td>" . $row->open_projects . "</td>";
                echo "<td>" . $row->applications . "</td>";
                echo "<td>" . $row->internal_contact_person . "</td>";
                echo "<td>" . $row->bankrekeningnummer . "</td>";
                echo "<td>" . $row->crediet . "</td>";
                echo "<td>" . $row->saldo . "</td>";
                echo "<td>" . $row->aantal_facturen . "</td>";
                echo "<td>" . $row->omzetbedrag . "</td>";
                echo "<td>" . $row->limiet . "</td>";
                echo "<td>" . $row->grootboekrekeningnummer . "</td>";
                echo "<td>" . $row->btw_code . "</td>";
                echo "</tr>";
            }
        }
        ?>
        </tbody>
    </table>
<!--    <a href="add.php">add</a>-->
    <?php
include $rootlink. "/app/templates/footer.php";
    ?>
</div>