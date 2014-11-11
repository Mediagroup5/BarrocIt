<?php
$page = "sales";
$id = "index";
include '../../../config/config.php';
include $rootlink. '/config/function.security.php';
require $rootlink. '/app/templates/header.php';
?>
<h2 class="ha2">Zoekresultaten</h2>
<table class="table table-striped">
    <thead>
    <tr>
        <th>Klant nummer</th>
        <th>Bedrijfsnaam</th>
        <th>Voorletter</th>
        <th>Voornaam</th>
        <th>Achternaam</th>
        <th>Project bekijken</th>
        <th>Klant gegevens</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $sql = "SELECT klant_nr, bedrijfs_naam, voorletter, voornaam, achternaam FROM klantgegevens";
    if (! $query = DB::query($sql)){
        echo "Kan gegevens niet uit database halen";
    }
    if (DB::num_rows($query) > 1 ){
        while ($row = DB::fetch($query)){
            echo "<tr>";
            echo "<td>" . $row->klant_nr . "</td>";
            echo "<td>" . $row->bedrijfs_naam . "</td>";
            echo "<td>" . $row->voorletter . "</td>";
            echo "<td>" . $row->voornaam . "</td>";
            echo "<td>" . $row->achternaam . "</td>";
            echo "<td><a href='project.php?id=". $row->klant_nr . "'> Project bekijk </a></td>";
            echo "<td><a href='klant.php?id=" . $row->klant_nr . "'> Klant gegevens </a></td>";
            echo "</tr>";
        }
    }
    ?>
    </tbody>
</table>

<form action="search.php">
    <div class="form-group">
        <input type="submit" name="terug" value="Terug" class="btn btn-primary">
    </div>
</form>
<?php
if(isset($_GET['terug'])){
    header("location:index.php");
}
include $rootlink. "/app/templates/footer.php";
?>
</div>
