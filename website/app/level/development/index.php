<?php  
$page = "development";
$id = "index";
include '../../../config/config.php';
include $rootlink. '/config/function.security.php';
require $rootlink. '/app/templates/header.php';
?>

    <h2 class="ha2">Customers</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Customer number</th>
            <th>Company name</th>
            <th>Initials</th>
            <th>First name</th>
            <th>Last name</th>
            <th>View project</th>
            <th>Customer data</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT * FROM klantgegevens";
        if (! $query = mysqli_query($con, $sql)){
            echo "Kan gegevens niet uit database halen";
        }
        if (mysqli_num_rows($query) > 1 ){
            while ($row = mysqli_fetch_object($query)){
                echo "<tr>";
                echo "<td>" . $row->klant_nr . "</td>";
                echo "<td>" . $row->bedrijfs_naam . "</td>";
                echo "<td>" . $row->voorletters . "</td>";
                echo "<td>" . $row->voornaam . "</td>";
                echo "<td>" . $row->achternaam . "</td>";
                echo "<td><a href='project.php?id=". $row->klant_nr . "'> View project </a></td>";
                echo "<td><a href='klant.php?id=" . $row->klant_nr . "'> Customer data </a></td>";
                echo "</tr>";
            }
        }
        ?>
        </tbody>
    </table>
<!--    <a href="add.php">add</a>-->
<a href="comment.php" class="btn btn-primary"> Comments </a>
    <?php
include $rootlink. "/app/templates/footer.php";
    ?>
</div>

   