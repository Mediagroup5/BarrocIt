<?php  
$id = "users_index";
include '../../../config/config.php';
include '../../../config/classes/class.portfolio.php';
require $rootlink. '/app/templates/header.php';


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
        echo Portfolio::FetchAllItems();
        ?>
        </tbody>
    </table>
<?php
   include $rootlink. "/app/templates/footer.php";
?>
</div>
