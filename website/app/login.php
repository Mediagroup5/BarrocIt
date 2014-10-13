<?php 
require '../config/config.php';
require 'templates/login_header.php';

if(isset($_SESSION['name']))
{
$rol = User::GetUserData("gebruikersrol");
redirect($rol);
}

 ?>
 <div class="jumbotron jumbo-login">
      <div class="container">
        <h1 class="text_1 text-center">BARROC IT. </h1>
        <form action="./controllers/authController.php" METHOD="POST" class="form-login col-md-4 col-md-offset-4" >
        	<?php 
	  if(isset($_SESSION['error']))
	  {
	  echo $_SESSION['error'];
	  unset($_SESSION['error']);
	  }
	  ?><legend class="subhead">Please Log in</legend>
        	<div class="form-group">
        		<label for="username">Username</label>
        		<input type="text" name="username" id="username" class="form-control">
        	</div>
        	<div class="form-group">
        		<label for="password">Password</label>
        		<input type="password" name="password" id="password" class="form-control">
        	</div>
        	<div class="form-group">
        		<input type="submit" name="authUser" value="submit" class="btn btn-primary">
        	</div>
        </form>
      </div>
 </div>

<?php
 require 'templates/footer.php';
 ?>