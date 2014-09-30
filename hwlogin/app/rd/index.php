<?php include '../templates/header.php'; ?>


<div class="projects">
<div class="container">
    <div class="header">
        <h1>Projects</h1>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Project naam</th>
            <th>Opdrachtgever</th>
        </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT ALL FROM projecten";

            ?>
        </tbody>
    </table>
</div>
</div>
</body>
</html>


<?php include '../templates/footer.php'; ?>