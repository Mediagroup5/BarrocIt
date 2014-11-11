<?php
$page = "development";
$id = "index";
include '../../../config/config.php';
include $rootlink. '/config/function.security.php';
require $rootlink. '/app/templates/header.php';
?>
    <h2 class="ha2">Customer data</h2>
    <table class="table table-striped">
        <thead>
<!--        <tr>
            <th>Customer number</th>
            <th>Company name</th>
            <th>Initials</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Address</th>
            <th>Zip code</th>
            <th>Residence</th>
            <th>Phone number</th>
            <th>Email</th>
            <th>Offer Status</th>
            <th>Start date</th>
            <th>Appointments</th>

        </tr>-->
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
        if (! $query = DB::query($sql)){
            echo "Failed to get customer data from database...";
        }
        if (mysqli_num_rows($query) > 0 ){
            while ($row = mysqli_fetch_object($query)){




                $customer_number = $row->klant_nr;
                $company_name = $row->bedrijfs_naam;
                $initials = $row->voorletters;
                $firstname = $row->voornaam;
                $lastname = $row->achternaam;
                $address = $row->adres;
                //echo "<td>" . $row->adres2 . "</td>";
                $zip_code = $row->postcode;
                //echo "<td>" . $row->postcode2 . "</td>";
                $residence = $row->residentie;
                //echo "<td>" . $row->residentie2 . "</td>";
                $phone_number = $row->telefoon_nr;
                //echo "<td>" . $row->telefoonnummer2 . "</td>";
                //echo "<td>" . $row->fax_nr . "</td>";
                $email = $row->email;
                //echo "<td>" . $row->offer_numbers . "</td>";
                //echo "<td>" . $row->inkomsten . "</td>";
                $offer_status = $row->offer_status;
                //echo "<td>" . $row->prospect . "</td>";
                $date_action = $row->date_action;
                //echo "<td>" . $row->last_contact_date . "</td>";
                //echo "<td>" . $row->next_action . "</td>";
                // echo "<td>" . $row->sale_percentage . "</td>";
                //echo "<td>" . $row->creditworthy . "</td>";
                //echo "<td>" . $row->maintenance_contract . "</td>";
                //echo "<td>" . $row->open_projects . "</td>";
                $applications = $row->applications;
                //$row->internal_contact_person . "</td>";
                //echo "<td>" . $row->bankrekeningnummer . "</td>";
                //echo "<td>" . $row->crediet . "</td>";
                //echo "<td>" . $row->saldo . "</td>";
                //echo "<td>" . $row->aantal_facturen . "</td>";
                //echo "<td>" . $row->omzetbedrag . "</td>";
                //echo "<td>" . $row->limiet . "</td>";
                //echo "<td>" . $row->grootboekrekeningnummer . "</td>";
                //echo "<td>" . $row->btw_code . "</td>";




            }
        }
        ?>
        <form action="klant.php" method="post">
            <div class="form-group">
                <label for="Customer number">Customer number</label>
                <input type="text" name="klant_nr" id="klant_nr" value="<?php echo $customer_number ?>" class="form-control"/>
            </div>
            <br>
            <div class="form-group">
                <label for="Company name">Company name</label>
                <input type="text" name="bedrijfs_naam" id="bedrijfs_naam" value="<?php echo $company_name?>" class="form-control"/>
            </div>
            <br>
            <div class="form-group">
                <label for="Initials">Initials</label>
                <input type="text" name="voorletters" id="voorletters" value="<?php echo $initials ?>" class="form-control"/>
            </div>
            <br>
            <div class="form-group">
                <label for="Firstname">Firstname</label>
                <input type="text" name="voornaam" id="voornaam" value="<?php echo $firstname?>" class="form-control"/>
            </div>
            <br>
            <div class="form-group">
                <label for="Lastname">Lastname</label>
                <input type="text" name="lastname" id="lastname" value="<?php echo $lastname ?>" class="form-control"/>
            </div>
            <br>
            <div class="form-group">
                <label for="Address">Address</label>
                <input type="text" name="address" id="address" value="<?php echo $address?>" class="form-control"/>
            </div>
            <br>
            <div class="form-group">
                <label for="Zip_code">Zip_codes</label>
                <input type="text" name="zip_code" id="zip_code" value="<?php echo $zip_code ?>" class="form-control"/>
            </div>
            <br>
            <div class="form-group">
                <label for="Residence">Residence</label>
                <input type="text" name="residence" id="residence" value="<?php echo $residence?>" class="form-control"/>
            </div>
            <br>
            <div class="form-group">
                <label for="Phone number">Phone number</label>
                <input type="text" name="phone_number" id="phone_number" value="<?php echo $phone_number?>" class="form-control"/>
            </div>
            <br>
            <div class="form-group">
                <label for="Email">Email</label>
                <input type="text" name="email" id="email" value="<?php echo $email ?>" class="form-control"/>
            </div>
            <br>
            <div class="form-group">
                <label for="Offer status">Offer status</label>
                <input type="text" name="offer_status" id="offer_status" value="<?php echo $offer_status?>" class="form-control"/>
            </div>
            <br>
            <div class="form-group">
                <label for="Date action">Date action</label>
                <input type="text" name="date_action" id="date_action" value="<?php echo $date_action ?>" class="form-control"/>
            </div>
            <br>
            <div class="form-group">
                <label for="Applications">Applications</label>
                <input type="text" name="applications" id="applications" value="<?php echo $applications?>" class="form-control"/>
            </div>
            <br>
        </form>
        </tbody>
    </table>
<!--    <a href="add.php">add</a>-->
    <?php
include $rootlink. "/app/templates/footer.php";
    ?>
</div>