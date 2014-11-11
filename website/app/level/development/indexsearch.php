<?php
$page = "development";
$id = "index";
include '../../../config/config.php';
include $rootlink. '/config/function.security.php';
require $rootlink. '/app/templates/header.php';

$search = Security($_GET['search']);

	if ($search) {
	
		$query = "SELECT * FROM klantgegevens WHERE bedrijfs_naam LIKE '%" . $search ."%'
		OR klant_nr LIKE '%" . $search ."%' ";
		$result = DB::query($query);
?>

	<div class="container">
		<h1>Search results:</h1> 
			<table class="table table-striped">
				<thead>
					<tr>
						<th>customerNummer</th>
						<th>companyName</th>
						<th>address</th>
						<th>postcode</th>
						<th>residence</th>
						<th>telephonenumber</th>
						<th>email</th>
					</tr>
				</thead>
				
				<tbody class="projects">
					<?php 
						while ($row = mysqli_fetch_object($result)) {
							echo '<tr>';
							echo '<td>' . $row->klant_nr . '</a></td>';
							echo '<td>' . $row->bedrijfs_naam . '</a></td>';
							echo '<td>' . $row->adres . '</a></td>';
							echo '<td>' . $row->postcode . '</a></td>';
							echo '<td>' . $row->residentie . '</a></td>';
							echo '<td>' . $row->telefoon_nr . '</a></td>';
							echo '<td>' . $row->email . '</a></td>';
							echo '</tr>';
						}
	}
?>
				</tbody>		
			</table>
		<a href="index.php" class="btn btn-primary">Back</a>
	</div>