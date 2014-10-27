<h1>Reacties</h1>
<table>
    <tr>
        <th>Naam</th>
        <th>Datum</th>
        <th>Reactie</th>
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
    <h2>Reactie plaatsen</h2>
    <div class="form-group">
        <label for="Naam">Naam</label>
        <input type="text" name="naam" class="form-control" id="naam"/>
    </div>
    <div class="form-group">
        <label for="Datum">Datum</label>
        <input type="date" name="datum" class="form-control" id="datum"/>
    </div>
    <div class="form-group">
        <label for="Reactie">Reactie</label>
        <textarea name="reactie" id="reactie" cols="30" rows="10" class="form-control"></textarea>
    </div>
    <input type="hidden" name="id"/>
    <div class="form-group">
        <input type="submit" name="submit" value="submit" class="btn btn-primary"/>
    </div>
</form>
<?php

?>
</body>
</html>