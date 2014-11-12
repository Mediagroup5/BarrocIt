<?php  
$page = "users";
$id = "edit";
include '../../../config/config.php';
include $rootlink. '/app/templates/header.php';

if (! isset($_GET['id'])){
    header('location: index.php');
}
else
{
    $id = Security($_GET['id']);
	
	if(isset($_POST['submit']))
	{
	   if(trim($_POST['Username']) || trim($_POST['type']) || trim($_POST['desc']) || trim($_POST['startdate']) || trim($_POST['enddate']) || trim($_POST['comment']))
	   {
	      $type = $_POST['type'];
		  $desc = $_POST['desc'];
		  $startdate = $_POST['startdate'];
		  $enddate = $_POST['enddate'];
		  $comment = $_POST['comment'];
	      Portfolio::update($id,$type,$desc,$startdate,$enddate,$comment);
		  header("location: ./port_list.php?id=3");
	   }
	
	}
   	$port = new Portfolio($id);
	$type = $port->getType();
    $desc = $port->getOmschr();
    $startdate = $port->getStartDatum();
    $enddate = $port->getEindDatum();
    $comment = $port->getOpmerking();
    $userid = $port->getGebr_id();
	$username = $port->getCustName($userid);
	
}
?>
<div class="container">
    <div class="page-header">
        <h1>portfolio wijzigen</h1>
    </div>
    <form action="edit.php?id=<?php echo $id; ?>" method="POST">
	
        <div class="form-group col-md-4 ">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" id="username"
                   value="<?php echo $username; ?>" placeholder="Username"/ readonly>
        </div>
        <div class="form-group col-md-4">
            <label for="type">Portfolio type</label>
            <input type="text" class="form-control" name="type" id="type"
                   value="<?php echo $type; ?>" placeholder="Portfolio type"/>
        </div>
        <div class="form-group col-md-4">
            <label for="Description">Description</label>
            <input type="text" class="form-control" name="desc" id="desc"
                   value="<?php echo $desc; ?>" placeholder="Description"/>
        </div>
        <div class="form-group col-md-4">
            <label for="startdate">Start date</label>
            <input type="date" class="form-control" name="startdate" id="startdate"
                   value="<?php echo $startdate; ?>" placeholder="Start date"/>
        </div>
        <div class="form-group col-md-4">
            <label for="enddate">End date</label>
            <input type="date" class="form-control" name="enddate" id="enddate"
                   value="<?php echo $enddate; ?>" placeholder="End date"/>
        </div>
      
        <div class="form-group col-md-4">
            <label for="comment">Comment</label>
            <input type="text" class="form-control" name="comment" id="comment"
                   value="<?php echo $comment; ?>" placeholder="Comment"/>
        </div>
        
         <div class="form-group col-md-2">
            <input class="btn btn-warning" type="submit" value="Update" name="submit"/>
        </div>
    </form>

</div>
