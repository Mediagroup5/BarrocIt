<?php
include '../../../config/config.php';

if (! isset($_GET['id'])){
    header ('location: facturen.php');
}else{
    $id = intval($_GET['id']);
    $sql = "DELETE FROM factuur WHERE factuur_nr = '$id'";

    if(! $query = DB::query($sql)){
        echo 'Fout bij verwijderen van item';
    }else{
        header('location: facturen.php');
    }
}