<?php
session_start();
error_reporting(0);
include('includes/connect.php');


if(!(isset($_SESSION['email'])) and !(isset($_SESSION['password'])))
	{	
		session_destroy();
		header('location:login/adminLogin.php');

}
else{

if(isset($_GET['del']))
{
$id=$_GET['del'];


$sql = "delete from prof WHERE id={$id}";
if (mysqli_query($connect,$sql))
{
	$msg="Professuer supprimé avec succées";
}
else
{
	$error="Erreur de supp";
}





}

if(isset($_POST['submit'])){

	$supp=$_POST['supp'];

	
	foreach ($supp as $key => $value) {
		
	$sql="DELETE from prof where id='$value'";
	if(mysqli_query($connect,$sql)){$msg="Les professeurs selectionés sont supprimés avec succés";}
	else $error="erreur de suppréssion des professeurs";
	
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
	
	<title>Manage Users</title>

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

<?php include('includes/config.php');
include('includes/connect.php');
?>
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Liste des professeurs</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Liste des professeurs</div>
							<div class="panel-body">
							<?php if($error){?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php }?>
								<form method="POST">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th class="text-center">#</th>
												<th class="text-center">Image</th>
                                                <th class="text-center">Nom et Prénom</th>
                                                <th class="text-center">Email</th>
                                                <th class="text-center">Matiere</th>
                                                <th class="text-center">Telephone</th>
												<th class="text-center">Action</th>
												<th class="text-center">Select</th>	
										</tr>
									</thead>
									
									<tbody>

<?php
include('includes/connect.php');
$sql="SELECT *  FROM prof";
$res=mysqli_query($connect,$sql);
if(mysqli_num_rows($res) > 0) 
{
	while($row = mysqli_fetch_assoc($res)) 
{				?>	
										<tr align="center">
											<td><?php echo htmlentities($cnt);?></td>
											<td><img src="/../prof/images/<?php echo $row['image'];?>" style="width:60px; border-radius:50%;"/></td>
                                            <td><?php echo $row['nompr'];?></td>
                                            <td><?php echo $row['email'];?></td>
                                            <td><?php echo $row['mat'];?></td>
											<td><?php echo $row['tel'];?></td>
											
											
                                            

                                            
                                            
        
</td>
<?php 

 echo $_SESSION['ahmed'];
 ?>                       
											
<td align="center">
<a href="update_teacher.php?id=<?php echo $row['id'];?>" onclick="return confirm('Do you want to Edit');">&nbsp; <i class="fa fa-pencil"></i></a>&nbsp;&nbsp;
<a href="teacher_list.php?del=<?php echo $row['id'];?>" onclick="return confirm('Voulez vous vraiment supprimer ce professeur?');"><i class="fa fa-trash" style="color:red"></i></a>&nbsp;&nbsp;

</td>
<td><input type="checkbox" name="supp[]" value="<?php echo $row['id'];?>" style="text-align:center;"></td>
										</tr>
										
										<?php $cnt=$cnt+1; }} ?>
										
										
									</tbody>
									<tr>
										<td colspan="7"></td>
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

<?php } ?>