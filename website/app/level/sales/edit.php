<?php  
$page = "sales";
$id = "edit";
include '../../../config/config.php';
include $rootlink. '/config/function.security.php';
require $rootlink. '/app/templates/header.php';

if (! isset($_GET['id'])){
    header('location: index.php');
}else{
    $id = intval($_GET['id']);
    $sql = "SELECT klant_nr, bedrijfs_naam, voorletters, voornaam, achternaam, adres FROM klantgegevens WHERE klant_nr = '$id'";
    $query = DB::query($sql);
    if(DB::num_rows($query) == 1){
        $row = DB::fetch($query);
    }

}

?>
<div class="container">
    <div class="page-header">
        <h1>Klantgegevens wijzigen</h1>
    </div>
    <form action="edit.php" method="POST">
        
        
           <div class="form-group col-md-4">
            <label for="klant_nr">klant nummer</label>
            <input type="text" class="form-control" value='<?php echo $row->klant_nr;?>'name="klant_nr" id="klant_nr" placeholder="klant nummer"/>
        </div>
        
        <div class="form-group col-md-4">
            <label for="datum">bedrijfs naam</label>
            <input type="text" class="form-control" value='<?php echo $row->bedrijfs_naam;?>' name="bedrijfs_naam" id="bedrijfs_naam" placeholder="bedrijfs_naam"/>
            	 </div>
      
              <div class="form-group col-md-4">
            <label for="contact_persoon">voorletters</label>
            <input type="text" class="form-control" value='<?php echo $row->voorletters;?>'name="voorletters" id="voorletters" placeholder="voorletters persoon"/>
            
        </div>
               <div class="form-group col-md-4">
            <label for="contact_persoon">voornaam</label>
            <input type="text" class="form-control" value='<?php echo $row->voornaam;?>'name="voornaam" id="voornaam" placeholder="voornaam persoon"/>
</div>
        
                       <div class="form-group col-md-4">
            <label for="contact_persoon">achternaam</label>

            <input type="text" class="form-control" value='<?php echo $row->achternaam;?>'name="achternaam" id="achternaam" placeholder="achternaam persoon"/>
            
            
                                   <div class="form-group col-md-18">
            <label for="contact_persoon">Adres</label>
            <input type="text" class="form-control" value='<?php echo $row->adres;?>'name="adres" id="adres" placeholder="adres persoon"/>
            
            
            
 
        <input type="hidden" name="klant_nr" value="<?php echo $row->klant_nr; ?>"/>
	        <div class="form-group col-md-4">
            <input class="btn btn-warning" type="submit" value="Update" name="submit"/>
        </div>
    </form>

</div>
<?php
if (isset($_POST['submit'])){
    $klant_nr = Security($_POST['klant_nr']);
    $bedrijfs_naam = Security($_POST['bedrijfs_naam']);
    $voorletters = Security($_POST['voorletters']);
    $voornaam = Security($_POST['voornaam']);
 	$achternaam = Security($_POST['achternaam']);
 	$adres = Security($_POST['adres']);

	$klant_nr = $_POST['klant_nr'];
    $sql = "UPDATE klantgegevens SET klant_nr = '$klant_nr', bedrijfs_naam = '$bedrijfs_naam', voorletters = '$voorletters', voornaam = '$voornaam', achternaam = '$achternaam' WHERE klant_nr = '$klant_nr'";

    if(! $query = DB::query($sql)){
        echo 'update query mislukt';
    }else{
        header('location: index.php');
    }
}
?>


