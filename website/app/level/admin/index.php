<?php  
$page = "admin";
$id = "index";
include '../../../config/config.php';
include $rootlink. '/config/function.security.php';

  if(isset($_POST['submit'])){

        if(! empty($_POST['Username']) && ! empty($_POST['Password']) && ! empty($_POST['Role'])){
            $Username = Security($_POST['Username']);
            $Password = Passhash($_POST['Password']);
            $Role = Security($_POST['Role']);

            $sql = "INSERT INTO users (username, password, gebruikersrol) VALUES ('$Username', '$Password', '$Role')";

            if (! $query = DB::query($sql)){
                echo 'Film toevoegen is niet gelukt. <a href="index.php"> Klik hier om terug te keren</a>';
            }else{
            //    header('location: index.php');
            }
        }
    }
	
require $rootlink. '/app/templates/header.php';
?>
<div class="container">
    <h1>projecten</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Username</th>
            <th>Password</th>
            <th>Role</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT * FROM gebruikers";
        if (! $query = DB::query($sql)){
            echo "Kan gegevens niet uit database halen";
        }
        if (DB::num_rows($query) > 0 ){
            while ($row = DB::fetch($query)){
                echo "<tr>";
                echo "<td>" . $row->username . "</td>";
                echo "<td>" . $row->password . "</td>";
				echo "<td>" . $row->gebruikersrol . "</td>";
            //    echo "<td><a href='edit.php?id=". $row->projectnr_id . "'> Bewerk </a></td>";
                echo "<td><a href='delete.php?id=" . $row->gebruikers_id . "'> X </a></td>";
                echo "</tr>";
            }
        }
        ?>
        </tbody>
    </table>

    <form action="index.php" method="POST">
        <h2>User toevoegen</h2>
        <div class="form-group col-md-4">
            <label for="Username">Username</label>
            <input type="text" class="form-control" name="Username" id="Username" placeholder="Username"/>
        </div>
        <div class="form-group col-md-4">
            <label for="Password">Password</label>
            <input type="Password" class="form-control" name="Password" id="Password" placeholder="Password"/>
        </div>
        <div class="form-group col-md-4">
            <label for="Role">Role</label>
          
<select  class="form-control" name="Role">
                  
                    <option value="1">Finance</option>
                    <option value="2">Development</option>
                    <option value="3">Sales</option>
					
                    <option value="4">Admin</option>
                  
                </select>
				</div>
        <div class="form-group col-md-4">
            <input type="submit" class="btn btn-success" value="toevoegen" name="submit"/>
        </div>
    </form>
   
</div>
