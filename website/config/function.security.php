<?php  

if (!isset($_SESSION['name'])) {
	header('location: ./login.php');
}

$rank = User::GetUserData("gebruikersrol");


//checkt of rank gelijk is aan pagina

if($page == "admin" && $rank != 4)
{
redirect($rank, $link);
}
if($page == "sales" && $rank != 3)
{
redirect($rank, $link);
}
elseif($page == "development" && $rank != 2)
{
redirect($rank, $link);
}
elseif($page == "finance" && $rank != 1)
{
redirect($rank, $link);
}

?>