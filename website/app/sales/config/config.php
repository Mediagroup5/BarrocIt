<?php

$con = mysqli_connect('localhost', 'root', '', 'barroc_it');
if(!($con)){
    echo 'verbinding mislukt';
}else{
    echo "het werkt";
}
