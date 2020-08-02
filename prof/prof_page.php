<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/connect.php');

if(!(isset($_SESSION['email'])) and !(isset($_SESSION['pass'])))
	{	
		session_destroy();
		header('location:login/profLogin.php');

}
else{
	$prof=$_SESSION['email'];
	$sql1="SELECT id  FROM feedback where status='1' AND reciver='$prof' ";
    $res1=mysqli_query($connect,$sql1);

if(mysqli_num_rows($res1) > 0) 
{	$count=0;
	while($row = mysqli_fetch_assoc($res1)) 
{
	$count=$count+1;
}
$_SESSION['count']=$count;
}	

$sql3="SELECT id  FROM feedback where reciver='$prof' ";
    $res3=mysqli_query($connect,$sql3);

if(mysqli_num_rows($res3) > 0) 
{	$total=0;
	while($row3 = mysqli_fetch_assoc($res3)) 
{
	$total=$total+1;
}
$_SESSION['total']=$total;

}

	
if(isset($_GET['del']))
{
$id=$_GET['del'];
$sql = "SELECT * FROM matiere WHERE id=$id";
$result = mysqli_query($connect, $sql);
$file = mysqli_fetch_assoc($result);
		$filepath = 'uploads/' . $file['document'];
	
		if (file_exists($filepath)) {
$myFile = $filepath;
unlink($myFile) or die("Couldn't delete file");}
$sql = "DELETE from matiere WHERE id={$id}";
if (mysqli_query($connect,$sql))
{
	$msg="matiere supprimé avec succées";

}
else
{
	$error="erreur de suppression";
}


}

if(isset($_POST['submit'])){

	$supp=$_POST['supp'];

	
	foreach ($supp as $key => $value) {
		$sql = "SELECT * FROM matiere WHERE id=$value";
$result = mysqli_query($connect, $sql);
$file = mysqli_fetch_assoc($result);
		$filepath = 'uploads/' . $file['document'];
	
		if (file_exists($filepath)) {
$myFile = $filepath;
unlink($myFile) or die("Couldn't delete file");}
		
	$sql="DELETE from matiere where id='$value'";
	if(mysqli_query($connect,$sql)){$msg="Les matieres selectionés sont supprimés avec succés";}
	else $error="erreur de suppréssion des matieres";
	
	}
	
}

 ?>
<!doctype html>
<html lang="en" class="no-js">

<head>

	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>PolyOnline</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
  <style>

	.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
	background: #dd3d36;
	color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
	background: #5cb85c;
	color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}

		</style>

</head>

<body>
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
			<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Liste des cours - TP - TD</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Liste des cours - TP - TD</div>
							<div class="panel-body">
							<?php if($error){?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php }?>
								<form method="POST">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th class="text-center">Type</th>
                                                <th class="text-center">titre</th>
                                                <th class="text-center">description</th>
												<th class="text-center">document</th>
												<th class="text-center">Action</th>
												<th class="text-center">Select</th>
												
                                        
										</tr>
									</thead>
									
									<tbody>

<?php

include('includes/connect.php');





$email=$_SESSION["email"];


include('includes/connect.php');


$sql1="SELECT mat  FROM prof where email='$email' ";
$res1=mysqli_query($connect,$sql1);
if(!(isset($_SESSION['email'])) and !(isset($_SESSION['pass'])))
	{	
		session_destroy();
		header('location:adminLogin.php');

}
else{
if(mysqli_num_rows($res1) > 0) 
{
	while($row = mysqli_fetch_assoc($res1)) 
{		
$libel=$row['mat'];

}
}
$_SESSION['libel']=$libel;
$sql="SELECT *  FROM matiere where libel='$libel' ";
$res=mysqli_query($connect,$sql);

if(mysqli_num_rows($res) > 0) 
{
	while($row = mysqli_fetch_assoc($res)) 
{				?>	
										<tr class="text-center">
											<td><?php echo $row['type']?></td>
                                            <td><?php echo $row['titre'];?></td>
                                            <td><?php echo $row['description'];?></td>
											<td><?php echo $row['document'];?></td>
											
											
											
											
											
                                            

                                            
                                            
        
</td>
                                            
											
<td>
<a href="update_matiere.php?id=<?php echo $row['id'];?>" onclick="return confirm('Do you want to Edit');">&nbsp; <i class="fa fa-pencil"></i></a>&nbsp;&nbsp;
<a href="prof_page.php?del=<?php echo $row['id'];?>" onclick="return confirm('Voulez vous vraiment supprimer cet matiere?');"><i class="fa fa-trash" style="color:red"></i></a>&nbsp;&nbsp;
<a href="download.php?idfile=<?php echo $row['id'];?>" onclick="return confirm('Do you want to telecharger');">&nbsp; <i class="fa fa-download"></i></a>&nbsp;&nbsp;

</td>
<td><input type="checkbox" name="supp[]" value="<?php echo $row['id'];?>" style="text-align:center;"></td>
										</tr>
										
										<?php $cnt=$cnt+1; }} ?>
										
										
									</tbody>
									<tr>
										<td colspan="5"></td>
	<td align="center"><input type="submit" value="Suppression" class="btn btn-danger" name="submit"></td>

</tr>
</form>
								</table>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
	<script type="text/javascript">
				 $(document).ready(function () {          
					setTimeout(function() {
						$('.succWrap').slideUp("slow");
					}, 3000);
					});
		</script>

</body>
</html>
				<?php }} ?>
				