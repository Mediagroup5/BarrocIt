<?php  
$id = "users_index";
include '../../../config/config.php';
require $rootlink. '/app/templates/header.php';


?>
  
 <h2 class="ha2">Portfolio</h2> <a href="./add.php"><div style="right: 20%; margin-top: -25px; position: absolute;" class="btn btn-primary">Add portfolio item</div></a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Userid</th>
            <th>Username</th>
            <th>Role</th>
            <th>Active</th>
		    <th>Edit</th>
        </tr>
        </thead>
        <tbody>
        <?php
		//haalt alle gebruikers op
        echo UserData::FetchAllItems();
        ?>
        </tbody>
    </table>
<?php
   include $rootlink. "/app/templates/footer.php";
?>
</div>
