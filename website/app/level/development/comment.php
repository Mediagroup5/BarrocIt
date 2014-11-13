<?php

$page = "development";
$id = "comment";
include '../../../config/config.php';
include $rootlink. '/config/function.security.php';
require $rootlink. '/app/templates/header.php';
?>
    <h1>Comments</h1>
<br><br>
    <table class="table table-striped">
<!--        <tr>
            <th>Name</th>
            <th>Date</th>
            <th>Comment</th>
        </tr>-->
        <?php
        $sql = "SELECT * FROM reacties";
        if (! $query = DB::query($sql)){
            echo "Kan gegevens niet uit database halen";
        }
        if (DB::num_rows($query) > 1 ){
            while ($row = DB::fetch($query)){

                $name = $row->naam;
                $date = $row->datum;
                $comment = $row->reactie;
                ?>
                <form action="comment.php" method="post">
                    <div class="form-group">
                        <label for="Name">Name</label>
                        <input type="text" name="name" id="name" value="<?php echo $name ?>" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="Date">Date</label>
                        <input type="text" name="date" id="date" value="<?php echo $date ?>" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="Comment">Comment</label>
                        <textarea type="text" name="comment" id="comment" class="form-control"><?php echo $comment?></textarea>
                    </div>
                    <br><br>
                </form>
        <?php
            }
        }
        $dateToday = date("d/m/Y");
        ?>
    </table>
    <form action="comment.php" method="post">
        <h2>Add comment</h2>
        <div class="form-group">
            <label for="Naam">Name</label>
            <input type="text" name="naam" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="Datum">Date</label>
            <input type="text" name="datum" value="<?php echo $dateToday ?>" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="Reactie">Comment</label>
            <textarea name="reactie" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <input type="hidden" name="id"/>
        <div class="form-group">
            <input type="submit" name="submit" value="Submit" class="btn btn-primary"/>
        </div>
    </form>
<?php

if (isset($_POST['submit'])){

    $naam = Security($_POST['naam']);
    $datum = Security($_POST['datum']);
    $reactie = Security($_POST['reactie']);

    $sql = "INSERT INTO reacties (naam, datum, reactie) VALUES ('$naam', '$datum','$reactie')";

    if(! $query = DB::query($sql)){
        echo "Toevoegen mislukt...";
    }else{
        $msg = "Toevoegen is gelukt";
        header('location:comment.php?msg=' . $msg);
    }
}
?>
<a href="index.php" class="btn btn-primary">Back</a>