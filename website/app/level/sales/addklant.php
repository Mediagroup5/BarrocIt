<?php  
$page = "sales";
$id = "addklant";
include '../../../config/config.php';
include $rootlink. '/config/function.security.php';
require $rootlink. '/app/templates/header.php';

if(isset($_POST['submit'])){
    if(!empty($_POST['bedrijfs_naam']) || !empty($_POST['voornaam']) || !empty($_POST['achternaam'])
        || !empty($_POST['adres']) || !empty($_POST['postcode']) || !empty($_POST['residentie'])
        || !empty($_POST['woonplaats']) || !empty($_POST['telefoon_nr']) || !empty($_POST['email'])){
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
    $woonplaats = Security($_POST['woonplaats']);
    $telefoon_nr = Security($_POST['telefoon_nr']);
    $telefoonnummer2 = Security($_POST['telefoonnummer2']);
    $fax_nr = Security($_POST['fax_nr']);
    $email = Security($_POST['email']);

    $con->query("INSERT INTO klantgegevens(bedrijfs_naam, voorletters, voornaam, achternaam, adres, adres2,
    postcode, postcode2, residentie, residentie2, woonplaats, telefoon_nr, telefoonnummer2, fax_nr, email)
    VALUES ('".$bedrijfs_naam."', '".$voorletters."', '".$voornaam."', '".$achternaam."', '".$adres."', '".$adres2."',
    '".$postcode."', '".$postcode2."', '".$residentie."', '".$residentie2."', '".$woonplaats."',
    '".$telefoon_nr."', '".$telefoonnummer2."', '".$fax_nr."', '".$email."')") or die(mysqli_error($con));
    }else{
        echo "Vul alle velden in!";
    }
}
?>
<div class="container">
    <h1>Klant toevoegen</h1>
    <form action="./addklant.php" method="post">
        <div class="form-group">
            <label for="Klant nummer">Klant nummer</label>
        </div>
        <div class="form-group">
            <label for="Bedrijfs naam">Bedrijfs naam</label>
            <input type="text" class="form-control" name="bedrijfs_naam"/>
        </div>
        <div class="form-group">
            <label for="Voorletters">Voorletters</label>
            <input type="text" class="form-control" name="voorletters"/>
        </div>
        <div class="form-group">
            <label for="Voornaam">Voornaam</label>
            <input type="text" class="form-control" name="voornaam"/>
        </div>
        <div class="form-group">
            <label for="Achternaam">Achternaam</label>
            <input type="text" class="form-control" name="achternaam"/>
        </div>
        <div class="form-group">
            <label for="Adres">Adres</label>
            <input type="text" class="form-control" name="adres"/>
        </div>
        <div class="form-group">
            <label for="Adres2">Adres2</label>
            <input type="text" class="form-control" name="adres2"/>
        </div>
        <div class="form-group">
            <label for="Postcode">Postcode</label>
            <input type="text" class="form-control" name="postcode"/>
        </div>
        <div class="form-group">
            <label for="Postcode2">Postcode2</label>
            <input type="text" class="form-control" name="postcode2"/>
        </div>
        <div class="form-group">
            <label for="Residentie">Residentie</label>
            <input type="text" class="form-control" name="residentie"/>
        </div>
        <div class="form-group">
            <label for="Residentie2">Residentie2</label>
            <input type="text" class="form-control" name="residentie2"/>
        </div>
        <div class="form-group">
            <label for="Woonplaats">Woonplaats</label>
            <input type="text" class="form-control" name="woonplaats"/>
        </div>
        <div class="form-group">
            <label for="Telefoon nummer">Telefoon nummer</label>
            <input type="text" class="form-control" name="telefoon_nr"/>
        </div>
        <div class="form-group">
            <label for="Telefoon nummer2">Telefoon nummer2</label>
            <input type="text" class="form-control" name="telefoonnummer2"/>
        </div>
        <div class="form-group">
            <label for="Fax nummer">Fax nummer</label>
            <input type="text" class="form-control" name="fax_nr"/>
        </div>
        <div class="form-group">
            <label for="Email">Email</label>
            <input type="text" class="form-control" name="email"/>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-warning" name="submit" value="submit"/>
        </div>
    </form>
</div>
<?php
include $rootlink. "/app/templates/footer.php";
?>
