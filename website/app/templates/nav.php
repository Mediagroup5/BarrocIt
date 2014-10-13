  <?php
  if($page == "finance")
  {
  ?>
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
					  
					  if($id == "index") { echo '<li class="active">'; } else { echo "<li>"; }
					  echo '<a href="./index.php">Home</a></li>';
					  
                      if($id == "facturen") { echo '<li class="active">'; } else { echo "<li>"; }
					  echo '<a href="./facturen.php">facturen</a></li>';
					  
                      if($id == "invoices") { echo '<li class="active">'; } else { echo "<li>"; }
					  echo '<a href="./invoices.php">Invoices
					  
					  
					  </a></li>';
					  ?>
                  </ul>
                  <ul class="nav navbar-nav navbar-right">
                      <li><a class="btn-secondary" href="<?php echo $link; ?>/controllers/authcontroller.php?logout=1"><b>Log out</b></a></li>
                  </ul>
              </div>
          </nav>
		  <?php
		  }
		  ?>
		    <?php
  if($page == "development")
  {
  ?>
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
					  
					  if($id == "index") { echo '<li class="active">'; } else { echo "<li>"; }
					  echo '<a href="./index.php">Home</a></li>';
					  
                      if($id == "projects") { echo '<li class="active">'; } else { echo "<li>"; }
					  echo '<a href="./projects.php">Projects</a></li>';
					  
                      if($id == "invoices") { echo '<li class="active">'; } else { echo "<li>"; }
					  echo '<a href="./invoices.php">Invoices
					  
					  
					  </a></li>';
					  ?>
                  </ul>
                  <ul class="nav navbar-nav navbar-right">
                      <li><a class="btn-secondary" href="<?php echo $link; ?>/controllers/authcontroller.php?logout=1"><b>Log out</b></a></li>
                  </ul>
              </div>
          </nav>
		  <?php
		  }
		  ?>
		    <?php
  if($page == "sales")
  {
  ?>
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
					  
					  if($id == "index") { echo '<li class="active">'; } else { echo "<li>"; }
					  echo '<a href="./index.php">Home</a></li>';
					  
                      if($id == "projects") { echo '<li class="active">'; } else { echo "<li>"; }
					  echo '<a href="./projects.php">Projects</a></li>';
					  
                      if($id == "invoices") { echo '<li class="active">'; } else { echo "<li>"; }
					  echo '<a href="./invoices.php">Invoices
					  
					  
					  </a></li>';
					  ?>
                  </ul>
                  <ul class="nav navbar-nav navbar-right">
                      <li><a class="btn-secondary" href="<?php echo $link; ?>/controllers/authcontroller.php?logout=1"><b>Log out</b></a></li>
                  </ul>
              </div>
          </nav>
		  <?php
		  }
		  ?>
		    <?php
  if($page == "admin")
  {
  ?>
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
					  
					  if($id == "index") { echo '<li class="active">'; } else { echo "<li>"; }
					  echo '<a href="./index.php">Home</a></li>';
					  
                      if($id == "projects") { echo '<li class="active">'; } else { echo "<li>"; }
					  echo '<a href="./projects.php">Projects</a></li>';
					  
                      if($id == "invoices") { echo '<li class="active">'; } else { echo "<li>"; }
					  echo '<a href="./invoices.php">Invoices
					  
					  
					  </a></li>';
					  ?>
                  </ul>
                  <ul class="nav navbar-nav navbar-right">
                      <li><a class="btn-secondary" href="<?php echo $link; ?>/controllers/authcontroller.php?logout=1"><b>Log out</b></a></li>
                  </ul>
              </div>
          </nav>
		  <?php
		  }
		  ?>