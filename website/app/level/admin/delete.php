<?php  
$page = "admin";
$id = "delete";
include '../../../config/config.php';
include $rootlink. '/config/function.security.php';
require $rootlink. '/app/templates/header.php';

if (! isset($_GET['id'])){
    header ('location: index.php');
}else{
    $id = intval($_GET['id']);
    $sql = "DELETE FROM projecten WHERE id = '$id'";

    if(! $query = DB::query($sql)){
        echo 'Fout bij verwijderen van item';
    }else{
        header('location: index.php');
    }
}