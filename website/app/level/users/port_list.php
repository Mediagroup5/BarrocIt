<?php  
$id = "users_index";
include '../../../config/config.php';
require $rootlink. '/app/templates/header.php';

if(!isset($_GET['id']))
{
   header("location: ./index.php");
}
else
{
  $userid = Security($_GET['id']);
}
?>
  <h2 class="ha2">Portfolio</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Medewerker</th>
            <th>Portfiliotype</th>
            <th>omschrijving</th>
            <th>Aanvangsdatum</th>
            <th>Einddatum</th>
            <th>Opmerking</th>
        </tr>
        </thead>
        <tbody>
        <?php
        echo Portfolio::FetchAllItems($userid);
        ?>
        </tbody>
    </table>
<?php
   include $rootlink. "/app/templates/footer.php";
?>
</div>
