<?php  
$page = "sales";
$id = "addklant";
include '../../../config/config.php';
include $rootlink. '/config/function.security.php';
require $rootlink. '/app/templates/header.php';

if(isset($_POST['submit'])){
    if(!empty($_POST['bedrijfs_naam']) || !empty($_POST['voornaam']) || !empty($_POST['achternaam'])
        || !empty($_POST['adres']) || !empty($_POST['postcode']) || !empty($_POST['residentie'])
        || !empty($_POST['telefoon_nr']) || !empty($_POST['email'])){
    $bedrijfs_naam = Security($_POST['bedrijfs_naam']);
    $voorletters = Security($_POST['voorletters']);
    $voornaam = Security($_POST['voornaam']);
    $achternaam = Security($_POST['achternaam']);
    $adres = Security($_POST['adres']);
    $adres2 = Security($_POST['adres2']);
    $postcode = Security($_POST['postcode']);
    $postcode2 = Security($_POST['postcode2']);
    $residentie = Security($_POST['residentie']);
    $residentie2 = Security($_POST['residentie2']);
    $telefoon_nr = Security($_POST['telefoon_nr']);
    $telefoonnummer2 = Security($_POST['telefoonnummer2']);
    $fax_nr = Security($_POST['fax_nr']);
    $email = Security($_POST['email']);
    $bankrekeningnummer = Security($_POST['bankrekeningnummer']);
    
    
    $con->query("INSERT INTO klantgegevens(bedrijfs_naam, voorletters, voornaam, achternaam, adres, adres2,
    postcode, postcode2, residentie, residentie2, telefoon_nr, telefoonnummer2, fax_nr, email, bankrekeningnummer)
    VALUES ('".$bedrijfs_naam."', '".$voorletters."', '".$voornaam."', '".$achternaam."', '".$adres."', '".$adres2."',
    '".$postcode."', '".$postcode2."', '".$residentie."', '".$residentie2."',
    '".$telefoon_nr."', '".$telefoonnummer2."', '".$fax_nr."', '".$email."' '".$bankrekeningnummer."')") or die(mysqli_error(DB::$con));
    }else{
        echo "All records required!";
    }
}
?>
<div class="container">
    <h1>Add Customer</h1>
    <form action="./addklant.php" method="post">
        
        <div class="form-group">
            <label for="Bedrijfs naam">Company Name</label>
            <input type="text" class="form-control" name="bedrijfs_naam"/>
        </div>
        <div class="form-group">
            <label for="Voorletters">Initials</label>
            <input type="text" class="form-control" name="voorletters"/>
        </div>
        <div class="form-group">
            <label for="Voornaam">First Name</label>
            <input type="text" class="form-control" name="voornaam"/>
        </div>
        <div class="form-group">
            <label for="Achternaam">Last Name</label>
            <input type="text" class="form-control" name="achternaam"/>
        </div>
        <div class="form-group">
            <label for="Adres">Adress</label>
            <input type="text" class="form-control" name="adres"/>
        </div>
        <div class="form-group">
            <label for="Adres2">Adress2</label>
            <input type="text" class="form-control" name="adres2"/>
        </div>
        <div class="form-group">
            <label for="Postcode">Zip code</label>
            <input type="text" class="form-control" name="postcode"/>
        </div>
        <div class="form-group">
            <label for="Postcode2">Zip code 2</label>
            <input type="text" class="form-control" name="postcode2"/>
        </div>
        <div class="form-group">
            <label for="Residentie">Residence</label>
            <input type="text" class="form-control" name="residentie"/>
        </div>
        <div class="form-group">
            <label for="Residentie2">residence2</label>
            <input type="text" class="form-control" name="residentie2"/>
        </div>
   
        <div class="form-group">
            <label for="Telefoon nummer">Phone Number</label>
            <input type="text" class="form-control" name="telefoon_nr"/>
        </div>
        <div class="form-group">
            <label for="Telefoon nummer2">Phone Number2</label>
            <input type="text" class="form-control" name="telefoonnummer2"/>
        </div>
        <div class="form-group">
            <label for="Fax nummer">Fax Number</label>
            <input type="text" class="form-control" name="fax_nr"/>
        </div>
        <div class="form-group">
            <label for="Email">Email</label>
            <input type="text" class="form-control" name="email"/>
        </div>
        <div class="form-group">
            <label for="bankrekeningnummer">Bank account</label>
            <input type="text" class="form-control" name="bankrekeningnummer"/>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="submit" value="submit"/>
        </div>
    </form>
</div>
<?php
include $rootlink. "/app/templates/footer.php";
?>
