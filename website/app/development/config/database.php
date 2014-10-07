<?php
if (isset($_POST['submit'])){
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $wachtwoord = mysqli_real_escape_string($con, $_POST['wachtwoord']);
    $gebruikersrol = mysqli_real_escape_string($con, $_POST['gebruikersrol']);
    $id = $_POST['id'];
    $sql = "UPDATE gebruikers SET email = '$email', wachtwoord = '$wachtwoord', gebruikersrol = '$gebruikersrol' WHERE id = '$id'";

    if(! $query = mysqli_query($con, $sql)){
        echo 'update query mislukt';
    }else{
        header('location: ../index.php');
    }
}