<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/connect.php');
if(!(isset($_SESSION['email'])) and !(isset($_SESSION['pass'])))
	{	
		session_destroy();
		header('location:login/studentLogin.php');

}	


else{
    
	$etudiant=$_SESSION['email'];
	$sql1="SELECT id  FROM feedback where status='1' AND reciver='$etudiant' ";
    $res1=mysqli_query($connect,$sql1);
	$count=0;
if(mysqli_num_rows($res1) > 0) 
{	
	while($row = mysqli_fetch_assoc($res1)) 
{
	$count=$count+1;
}
$_SESSION['countetudiant']=$count;
}	

$sql3="SELECT id  FROM feedback where reciver='$etudiant' ";
    $res3=mysqli_query($connect,$sql3);
	$total=0;
if(mysqli_num_rows($res3) > 0) 
{	
	while($row3 = mysqli_fetch_assoc($res3)) 
{
	$total=$total+1;
}
$_SESSION['totaletudiant']=$total;

}
if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM matiere WHERE id=$id";
    $result = mysqli_query($connect, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = '../prof/uploads/' . $file['document'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('../prof/uploads/' . $file['document']));
        readfile('../prof/uploads/' . $file['document']);

    
        exit;
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
	
	<title>Page des Matieres</title>

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

						<h2 class="page-title">Page des matieres (cours)</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Cours</div>
							<div class="panel-body">
							<?php if($error){?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php }?>
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										
                                                <th class="text-center">Titre</th>
												<th class="text-center">Matiere</th>
                                                <th class="text-center">Description</th>
												<th class="text-center">Document</th>
												<th class="text-center">Telecharger</th>
												
                                        
										</tr>
									</thead>
									
									<tbody>

<?php

include('includes/connect.php');


















include('includes/connect.php');
include('prof_auth.php');
echo $_POST['email'];
$sql1="SELECT mat  FROM prof where email='teacher@teacher.com' ";
$res1=mysqli_query($connect,$sql1);

if(mysqli_num_rows($res1) > 0) 
{
	while($row = mysqli_fetch_assoc($res1)) 
{		
$libel=$row['mat'];
}
}

$sql="SELECT *  FROM matiere where type='cours' ";
$res=mysqli_query($connect,$sql);
if(!(isset($_SESSION['email'])) and !(isset($_SESSION['pass'])))
	{	
		session_destroy();
		header('location:login/studentLogin.php');

}
else{
if(mysqli_num_rows($res) > 0) 

	while($row = mysqli_fetch_assoc($res)) 
{				?>	
										<tr class="text-center">
                                            <td><?php echo $row['titre'];?></td>
											<td><?php echo $row['libel'];?></td>

                                            <td><?php echo $row['description'];?></td>
											<td><?php echo $row['document'];?></td>
											
											
											
											
											
                                            

                                            
                                            
        
</td>
                                            
											
<td>

<a href="download.php?id=<?php echo $row['id'];?>" onclick="return confirm('Do you want to telecharger');">&nbsp; <i class="fa fa-download"></i></a>&nbsp;&nbsp;

</td>

										</tr>
										
										<?php $cnt=$cnt+1; }} ?>
										
										
									</tbody>
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
				<?php }?>