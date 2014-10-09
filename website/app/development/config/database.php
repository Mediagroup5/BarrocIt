<?php
if (isset($_POST['submit'])){
    $titel = mysqli_real_escape_string($con, $_POST['titel']);
    $beschrijving = mysqli_real_escape_string($con, $_POST['beschrijving']);
    $genre = mysqli_real_escape_string($con, $_POST['genre']);
    $id = $_POST['id'];
    $sql = "UPDATE twodb SET titel = '$titel', beschrijving = '$beschrijving', genre = '$genre' WHERE id = '$id'";

    if(! $query = mysqli_query($con, $sql)){
        echo 'update query mislukt';
    }else{
        header('location: ../twodb.php');
    }
}