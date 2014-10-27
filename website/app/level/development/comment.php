<?php

if (isset($_POST['submit'])){

    $naam = mysqli_real_escape_string($con, $_POST['naam']);
    $datum = mysqli_real_escape_string($con, $_POST['datum']);
    $reactie = mysqli_real_escape_string($con, $_POST['reactie']);
    $id = $_POST['id'];
    $sql = "UPDATE reacties SET naam = '$naam', datum = '$datum', reactie = '$reactie' WHERE id = '$id'";

    if(! $query = mysqli_query($con, $sql)){
        echo "Toevoegen mislukt...";
    }else{
        $msg = "Toevoegen is gelukt";
        header('location:index.php?msg=' . $msg);
    }
}