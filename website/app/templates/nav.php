   <nav role="navigation" class="navbar navbar-default">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                  <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                  </button>
              </div>

              <!-- Collection of nav links and other content for toggling -->
              <div id="navbarCollapse" class="collapse navbar-collapse">
                  <ul class="nav navbar-nav">
				  
<?php
    if(User::GetUserData("gebruikersrol") == 1)
    {
  
		if($id == "index") { echo '<li class="active">'; } else { echo "<li>"; }
	    echo '<a href="'.$link.'/level/finance/index.php">Home</a></li>';
					  
        if($id == "facturen") { echo '<li class="active">'; } else { echo "<li>"; }
		echo '<a href="'.$link.'/level/finance/facturen.php">Invoices</a></li>';
					  
        if($id == "add") { echo '<li class="active">'; } else { echo "<li>"; }
		echo '<a href="'.$link.'/level/finance/add.php">Add Invoices</a></li>';

        if($id == "comment") { echo '<li class="active">'; } else { echo "<li>"; }
        echo '<a href="'.$link.'/level/finance/comment.php">Comments</a></li>';

   }
   
    if(User::GetUserData("gebruikersrol") == 2)
    {
					  
		if($id == "index") { echo '<li class="active">'; } else { echo "<li>"; }
		echo '<a href="'.$link.'/level/development/index.php">Home</a></li>';
					  
        if($id == "project") { echo '<li class="active">'; } else { echo "<li>"; }
		echo '<a href="'.$link.'/level/development/project.php">Projects</a></li>';
					  
        if($id == "add") { echo '<li class="active">'; } else { echo "<li>"; }
		echo '<a href="'.$link.'/level/development/add.php"> Add Project</a></li>';

        if($id == "comment") { echo '<li class="active">'; } else { echo "<li>"; }
        echo '<a href="'.$link.'/level/development/comment.php">Comments</a></li>';
				
		
	}
		
     if(User::GetUserData("gebruikersrol") == 3)
    {
					  
	    if($id == "index") { echo '<li class="active">'; } else { echo "<li>"; }
	    echo '<a href="'.$link.'/level/sales/index.php">Home</a></li>';
					  
        if($id == "afspraak") { echo '<li class="active">'; } else { echo "<li>"; }
	    echo '<a href="'.$link.'/level/sales/afspraak.php">Appointments</a></li>';
					  
    

        if($id == "comment") { echo '<li class="active">'; } else { echo "<li>"; }
        echo '<a href="'.$link.'/level/sales/comment.php">Comments</a></li>';
					
    }
		
     if(User::GetUserData("gebruikersrol") == 4)
    {
                  
					  
	    if($id == "index") { echo '<li class="active">'; } else { echo "<li>"; }
	    echo '<a href="'.$link.'/level/admin/index.php">Home</a></li>';
					  
        if($id == "projects") { echo '<li class="active">'; } else { echo "<li>"; }
	    echo '<a href="'.$link.'/level/admin/projects.php">Projects</a></li>';
					  
        if($id == "invoices") { echo '<li class="active">'; } else { echo "<li>"; }
	    echo '<a href="'.$link.'/level/admin/invoices.php">Invoices</a></li>';

        if($id == "comment") { echo '<li class="active">'; } else { echo "<li>"; }
        echo '<a href="'.$link.'/level/admin/comment.php">Comments</a></li>';
					 
	}
	
	
	
	    if($id == "users_index") { echo '<li class="active">'; } else { echo "<li>"; }
	    echo '<a href="../users/index.php">Portfolio klant</a></li>';
					  
 
	
?>

 <form  class="search" action="indexsearch.php" method="get">
    <label for="Search">Search</label>
    <input type="search" name="search" />
</form>
		      </ul>
                  <ul class="nav navbar-nav navbar-right">
                      <li><a class="btn-secondary" href="<?php echo $link; ?>/controllers/authcontroller.php?logout=1"><b>Log out</b></a></li>
                  </ul>
              </div>
          </nav>