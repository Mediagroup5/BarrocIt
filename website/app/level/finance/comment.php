<?php

$page = "finance";
$id = "comment";
include '../../../config/config.php';
include $rootlink. '/config/function.security.php';
require $rootlink. '/app/templates/header.php';
?>
    <h1>Comments</h1>
    <table class="table table-striped">
        <tr>
            <th>Name</th>
            <th>Date</th>
            <th>Reaction</th>
        </tr>
        <?php
        $sql = "SELECT * FROM reacties";
        if (! $query = mysqli_query($con, $sql)){
            echo "Kan gegevens niet uit database halen";
        }
        if (mysqli_num_rows($query) > 1 ){
            while ($row = mysqli_fetch_object($query)){
                echo "<tr>";
                echo "<td>" . $row->naam . "</td>";
                echo "<td>" . $row->datum . "</td>";
                echo "<td>" . $row->reactie . "</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
    <form action="comment.php" method="post">
        <h2> Add Comment</h2>
        <div class="form-group">
            <label for="Naam">Name</label>
            <input type="text" name="naam" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="Datum">Date</label>
            <input type="date" name="datum" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="Reactie">Reaction</label>
            <textarea name="reactie" cols="60" rows="10" class="form-control"></textarea>
        </div>
        <input type="hidden" name="id"/>
        <div class="form-group">
            <input type="submit" name="submit" value="submit" class="btn btn-primary"/>
        </div>
    </form>
<?php
if (isset($_POST['submit'])){

    $naam = mysqli_real_escape_string($con, $_POST['naam']);
    $datum = mysqli_real_escape_string($con, $_POST['datum']);
    $reactie = mysqli_real_escape_string($con, $_POST['reactie']);

    $sql = "INSERT INTO reacties (naam, datum, reactie) VALUES ('$naam', '$datum','$reactie')";

    if(! $query = mysqli_query($con, $sql)){
        echo "Toevoegen mislukt...";
    }else{
        $msg = "Toevoegen is gelukt";
        header('location:comment.php?msg=' . $msg);
    }
}
?>
<a href="index.php" class="btn btn-primary">Back</a>