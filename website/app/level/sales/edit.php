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
    $sql = "SELECT id, klant_nr, bedrijfs_naam, voorletters, voornaam, achternaam FROM klantgegevens where id = '$id'";
    $query = mysqli_query($con, $sql);
    if(mysqli_num_rows($query) == 1){
        $row = mysqli_fetch_object($query);
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
</div>
        <input type="hidden" name="afspraken_id" value="<?php echo $row->afspraken_id; ?>"/>
        <div class="form-group col-md-2">
            <input class="btn btn-warning" type="submit" value="Update" name="submit"/>
        </div>
    </form>

</div>
<?php
if (isset($_POST['submit'])){
    $klant_nr = mysqli_real_escape_string($con, $_POST['klant_nr']);
    $bedrijfs_naam = mysqli_real_escape_string($con, $_POST['bedrijfs_naam']);
    $voorletters = mysqli_real_escape_string($con, $_POST['voorletters']);
    $voorletters = mysqli_real_escape_string($con, $_POST['voornaam']);
 	$voorletters = mysqli_real_escape_string($con, $_POST['achternaam']);
	$id = $_POST['id'];
    $sql = "UPDATE klantgegevens SET klant_nr = '$klant_nr', bedrijfs_naam = '$bedrijfs_naam', voorletters = '$voorletters', voornaam = '$voornaam', achternaam = '$achternaam' WHERE id = '$id'";

    if(! $query = mysqli_query($con, $sql)){
        echo 'update query mislukt';
    }else{
        header('location: index.php');
    }
}
?>


