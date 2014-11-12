<?php  
$id = "users_index";
include '../../../config/config.php';
include $rootlink. '/app/templates/header.php';


    
	//check of submit is mee gestuurd
	if(isset($_POST['submit']))
	{
	//check of alles is ingevult
	   if(trim($_POST['gebruikers_id']) || trim($_POST['type']) || trim($_POST['desc']) || trim($_POST['startdate']) || trim($_POST['enddate']) || trim($_POST['comment']))
	   {
	      //defineer variables
	      $type = $_POST['type'];
		  $desc = $_POST['desc'];
		  $startdate = $_POST['startdate'];
		  $enddate = $_POST['enddate'];
		  $comment = $_POST['comment'];
		  $gebruikers_id = $_POST['gebruikers_id'];
	      Portfolio::insert($gebruikers_id,$type,$desc,$startdate,$enddate,$comment);
		  header("location: ./port_list.php?id=".$gebruikers_id);
	   }
	
	}
	
	

?>
<div class="container">
    <div class="page-header">
        <h1>portfolio wijzigen</h1>
    </div>
    <form action="add.php" method="POST">
	
        <div class="form-group col-md-4 ">
            <label for="username">Username</label>
              <select  class="form-control" name="gebruikers_id">
                    <?php
					//haalt alle klanten op
                    $sql = DB::query("SELECT gebruikers_id,username FROM gebruikers");
                    while($row = DB::fetch($sql))
                    {
                        echo'<option value="'.$row->gebruikers_id.'">'.$row->username.'</option>';
                    }
				   ?>
                </select>
        </div>
        <div class="form-group col-md-4">
            <label for="type">Portfolio type</label>
            <select  class="form-control" name="type">
                  
                    <option value="Opleiding">Opleiding</option>
                    <option value="Werkgever">Werkgever</option>
                    <option value="NAW">NAW</option>
                  
                </select>
        </div>
        <div class="form-group col-md-4">
            <label for="Description">Description</label>
            <input type="text" class="form-control" name="desc" id="desc"
                  placeholder="Description"/>
        </div>
        <div class="form-group col-md-4">
            <label for="startdate">Start date</label>
            <input type="date" class="form-control" name="startdate" id="startdate"
                   placeholder="Start date"/>
        </div>
        <div class="form-group col-md-4">
            <label for="enddate">End date</label>
            <input type="date" class="form-control" name="enddate" id="enddate"
                  placeholder="End date"/>
        </div>
      
        <div class="form-group col-md-4">
            <label for="comment">Comment</label>
            <input type="text" class="form-control" name="comment" id="comment"
                   placeholder="Comment"/>
        </div>
        
         <div class="form-group col-md-2">
            <input class="btn btn-warning" type="submit" value="Update" name="submit"/>
        </div>
    </form>

</div>
