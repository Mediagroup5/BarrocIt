<?php
include '../../../config/config.php';

if (! isset($_GET['id'])){
    header ('location: index.php');
}else{
    $id = intval($_GET['id']);
    $sql = "DELETE FROM factuur WHERE factuur_nr = '$id'";

    if(! $query = mysqli_query($con, $sql)){
        echo 'Fout bij verwijderen van item';
    }else{
        header('location: index.php');
    }
}