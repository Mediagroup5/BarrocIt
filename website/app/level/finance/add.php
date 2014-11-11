<?php  
$page = "finance";
$id = "add";
include '../../../config/config.php';
include $rootlink. '/config/function.security.php';
require $rootlink. '/app/templates/header.php';

if(isset($_POST['submit'])){


    if(! empty($_POST['klant']) && ! empty($_POST['bedrag']) && ! empty($_POST['pr_nr']) && ! empty($_POST['hoeveelheid']) && ! empty($_POST['beschrijving']) && ! empty($_POST['status'])){
        $klant_nr = Security($_POST['klant']);
        $bedrag = Security($_POST['bedrag']);
        $project_nr = Security($_POST['pr_nr']);
        $hoeveelheid = Security($_POST['hoeveelheid']);
        $beschrijving = Security($_POST['beschrijving']);
         $status = Security($_POST['status']);

		
		$time = time();
		$newtime = strtotime($time.' + 1 months');    
        $sql = "INSERT INTO factuur (klant_nr, bedrag, project_nr, factuur_begin, factuur_tot, hoeveelheid,
beschrijving, status) VALUES ('$klant_nr', '$bedrag', '$project_nr', '$time', '$newtime', '$hoeveelheid', '$beschrijving', '$status' )";

        if (! $query = DB::query($sql)){
            echo 'Factuur toevoegen is niet gelukt...</a>'.mysqli_error(DB::$con);
        }else{
            header('location: facturen.php');
        }
    }else{
     //   header('location: facturen.php');
	 echo "<h2>Vul alles in! </h2>";
    }
}
?>

    <form action="add.php" method="post" class="form col-md-12">
        <h2 class="ha2">Add Invoices</h2>
                <label for="klant">Company Name</label>
                <select  class="form-control" name="klant">
                    <?php
                    $sql = DB::query("SELECT klant_nr,bedrijfs_naam FROM klantgegevens");
                    while($row = DB::fetch($sql))

                        echo'<option value="'.$row->klant_nr.'">'.$row->bedrijfs_naam.'</option>';
                    ?>
                </select>
                <br><br>
        <div class="form-group col-md-6">
            <label for="Bedrag">Amount</label>
            <input type="number" class="form-control" name="bedrag" id="bedrag" placeholder="Bedrag"/>
        </div>
        <div class="form-group col-md-6">
            <label for="Factuur duur">Quantity</label>
            <input type="text" class="form-control" name="hoeveelheid" id="hoeveelheid" placeholder="Last date"/>
        </div>
        <div class="form-group col-md-6">
            <label for="Beschrijving">Description</label>
            <input type="text" class="form-control" name="beschrijving" id="beschrijving" placeholder="Description"/>
        </div>
		 <div class="form-group col-md-6">
            <label for="pr_nr">Project Number</label>
            <input type="number" class="form-control" name="pr_nr" id="pr_nr" placeholder="Project number"/>
        </div>
        <div class="form-group col-md-6">
            <label for="Status">Status</label>
            <input type="number" class="form-control" name="status" id="Status" placeholder="Status"/>
        </div>
        <div class="form-group col-md-6 ">
            <input type="submit" class="btn btn-warning" value="Submit" name="submit"/>
        </div>

    </form>
<?php

include $rootlink. "/app/templates/footer.php";
