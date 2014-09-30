<?php require 'templates/header.php'; ?>

<div class="container">
	<p>hier mag je niet komen als je niet ingelogd bent en de rol als admin hebt...</p>

	<form method="post" action="controllers/usersController.php" role="form" class="users-form col-md-8 col-md-offset-2">
		<fieldset>
		<legend>Creëer gebruiker</legend>
			
			<ul>
			<?php  
			// succes of fail message
			if (isset($_GET['msg'])) {
				echo '<li>' .  htmlspecialchars($_GET['msg']) . '</li>';
			}
			?>
			</ul>

			<div class="form-group col-md-5">
				<label for="voornaam">Voornaam</label>
				<input type="voornaam" name="voornaam" id="voornaam" class="form-control">	
			</div>
			<div class="form-group col-md-2">
				<label for="tussenvoegsel">Tussenvoegsel</label>
				<input type="tussenvoegsel" name="tussenvoegsel" id="tussenvoegsel" class="form-control">	
			</div>
			<div class="form-group col-md-5">
				<label for="achternaam">Achternaam</label>
				<input type="achternaam" name="achternaam" id="achternaam" class="form-control">	
			</div>
			<div class="form-group col-md-6">
				<label for="username">Username</label>
				<input type="username" name="username" id="username" class="form-control">	
			</div>
			<div class="form-group col-md-6">
				<label for="email">Email</label>
				<input type="email" name="email" id="email" class="form-control">	
			</div>
			<div class="form-group col-md-6">
				<label for="password">Password</label>
				<input type="password" name="password" id="password" class="form-control">
			</div>
			<div class="form-group col-md-6">
				<label for="rol">Gebruikersrol</label>
				<select name="rol" id="rol" class="form-control">
					<option value=""></option>
					<option value="1">Financiën</option>
					<option value="2">Research & Development</option>
					<option value="3">Human Resources</option>
					<option value="4">IT</option>
					<option value="5">Administrator</option>
				</select>
			</div>
			<div class="form-group col-md-12">
				<input type="submit" value="Maak gebruiker aan" name="createUser" class="btn btn-large">
			</div>
		</fieldset>
	</form>
</div>

<?php require 'templates/footer.php'; ?>