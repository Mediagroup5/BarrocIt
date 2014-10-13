<?php  

if (!isset($_SESSION['name'])) {
	header('location: ./login.php');
}

$rank = User::GetUserData("rank");


//checkt of rank gelijk is aan pagina

if($page == "admin" && $rank != 4)
{
redirect($rank);
}
if($page == "sales" && $rank != 3)
{
redirect($rank);
}
elseif($page == "development" && $rank != 2)
{
redirect($rank);
}
elseif($page == "finance" && $rank != 1)
{
redirect($rank);
}

?>